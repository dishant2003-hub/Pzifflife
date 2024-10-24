// Check if field is empty
function empty(data) {
    if (typeof(data) == 'number' || typeof(data) == 'boolean') {
        return false;
    }
    if (typeof(data) == 'undefined' || data === null) {
        return true;
    }
    if (typeof(data.length) != 'undefined') {
        return data.length === 0;
    }
    var count = 0;
    for (var i in data) {
        if (data.hasOwnProperty(i)) {
            count++;
        }
    }
    return count === 0;
}

// Returns datatbles export button array based on settings
function get_datatable_buttons(table) {

    var formatExport = {
        body: function(data, row, column, node) {
            // Fix for notes inline datatables
            // Causing issues because of the hidden textarea for edit and the content is duplicating
            // This logic may be extended in future for other similar fixes
            var newTmpRow = $('<div></div>', data);
            newTmpRow.append(data);

            if (newTmpRow.find('[data-note-edit-textarea]').length > 0) {
                newTmpRow.find('[data-note-edit-textarea]').remove();
                data = newTmpRow.html().trim();
            }

            if (newTmpRow.find('.row-options').length > 0) {
                newTmpRow.find('.row-options').remove();
                data = newTmpRow.html().trim();
            }

            if (newTmpRow.find('.table-export-exclude').length > 0) {
                newTmpRow.find('.table-export-exclude').remove();
                data = newTmpRow.html().trim();
            }

            // Datatables use the same imlpementation to strip the html.
            var div = document.createElement("div");
            div.innerHTML = data;
            var text = div.textContent || div.innerText || "";

            return text.trim();
        }
    };
    var table_buttons_options = [];

    table_buttons_options.push({
        extend: 'collection',
        text: 'Export',
        className: 'btn btn-default-dt-options',
        buttons: [{
            extend: 'excel', // Causing issues with formats, the excel is still using csv so in this case will work good
            // text: appLang.dt_button_excel,
            footer: true,
            exportOptions: {
                columns: [':not(.not-export)'],
                rows: function(index) {
                    return _dt_maybe_export_only_selected_rows(index, table);
                },
                format: formatExport,
            },
        }, {
            extend: 'csvHtml5',
            // text: appLang.dt_button_csv,
            footer: true,
            exportOptions: {
                columns: [':not(.not-export)'],
                rows: function(index) {
                    return _dt_maybe_export_only_selected_rows(index, table);
                },
                format: formatExport,
            }
        }, {
            extend: 'pdfHtml5',
            // text: appLang.dt_button_pdf,
            footer: true,
            exportOptions: {
                columns: [':not(.not-export)'],
                rows: function(index) {
                    return _dt_maybe_export_only_selected_rows(index, table);
                },
                format: formatExport,
            },
            orientation: 'landscape',
            customize: function(doc) {
                // Fix for column widths
                var table_api = $(table).DataTable();
                var columns = table_api.columns().visible();
                var columns_total = columns.length;
                var pdf_widths = [];
                var total_visible_columns = 0;
                for (i = 0; i < columns_total; i++) {
                    // Is only visible column
                    if (columns[i] == true) {
                        total_visible_columns++;
                    }
                }
                setTimeout(function() {
                    if (total_visible_columns <= 5) {
                        for (i = 0; i < total_visible_columns; i++) {
                            pdf_widths.push((735 / total_visible_columns));
                        }
                        doc.content[1].table.widths = pdf_widths;
                    }
                }, 10);

                if (app_language.toLowerCase() == 'persian' || app_language.toLowerCase() == 'arabic') {
                    doc.defaultStyle.font = Object.keys(pdfMake.fonts)[0];
                }
                //  doc.defaultStyle.font = 'test';
                doc.styles.tableHeader.alignment = 'left';
                doc.styles.tableHeader.margin = [5, 5, 5, 5];
                doc.pageMargins = [12, 12, 12, 12];
            }
        }, {
            extend: 'print',
            // text: appLang.dt_button_print,
            footer: true,
            exportOptions: {
                columns: [':not(.not-export)'],
                rows: function(index) {
                    return _dt_maybe_export_only_selected_rows(index, table);
                },
                format: formatExport,
            }
        }],
    });

    var tableButtons = $("body").find('.table-btn');
    $.each(tableButtons, function() {
        var b = $(this);
        if (b.length && b.attr('data-table')) {
            if ($(table).is(b.attr('data-table'))) {
                table_buttons_options.push({
                    text: b.text().trim(),
                    className: 'btn btn-default-dt-options',
                    action: function(e, dt, node, config) {
                        b.click();
                    }
                });
            }
        }
    });

    if (!$(table).hasClass('dt-no-serverside')) {
        table_buttons_options.push({
            text: '<i class="fa fa-refresh"></i>',
            className: 'btn btn-default-dt-options btn-dt-reload',
            action: function(e, dt, node, config) {
                dt.ajax.reload();
            }
        });
    }

    return table_buttons_options;
}

// Datatables custom job to page function
function _table_jump_to_page(table, oSettings) {

    var paginationData = table.DataTable().page.info();
    var previousDtPageJump = $("body").find('#dt-page-jump-' + oSettings.sTableId);

    if (previousDtPageJump.length) {
        previousDtPageJump.remove();
    }

    if (paginationData.pages > 6) {
        var jumpToPageSelect = $("<select></select>", {
            "class": "dt-page-jump-select form-control",
            'id': 'dt-page-jump-' + oSettings.sTableId
        });
        for (i = 1; i <= paginationData.pages; i++) {
            var selectedCurrentPage = ((paginationData.page + 1) === i) ? 'selected' : '';
            jumpToPageSelect.append("<option value='" + i + "'" + selectedCurrentPage + ">" + i + "</option>");
        }
        $("#" + oSettings.sTableId + "_wrapper .dt-page-jump").append(jumpToPageSelect);
    }
}

initDataTable = function(selector, url, notsearchable, notsortable, fnserverparams, defaultorder, remove_column_search = 1) {
    var table = typeof(selector) == 'string' ? $("body").find('table' + selector) : selector;
    if (table.length === 0) {
        return false;
    }

    fnserverparams = (fnserverparams == 'undefined' || typeof(fnserverparams) == 'undefined') ? [] : fnserverparams;
    // If not order is passed order by the first column
    if (typeof(defaultorder) == 'undefined') {
        defaultorder = [
            [0, 'asc']
        ];
    } else {
        if (defaultorder.length === 1) {
            defaultorder = [defaultorder];
        }
    }

    var user_table_default_order = table.attr('data-default-order');

    if (!empty(user_table_default_order)) {
        var tmp_new_default_order = JSON.parse(user_table_default_order);
        var new_defaultorder = [];
        for (var i in tmp_new_default_order) {
            // If the order index do not exists will throw errors
            if (table.find('thead th:eq(' + tmp_new_default_order[i][0] + ')').length > 0) {
                new_defaultorder.push(tmp_new_default_order[i]);
            }
        }
        if (new_defaultorder.length > 0) {
            defaultorder = new_defaultorder;
        }
    }

    var length_options = [5, 10, 25, 50, 100, 200, 500];
    var length_options_names = [5, 10, 25, 50, 100, 200, 500];

    app_tables_pagination_limit = parseFloat(100);

    if ($.inArray(app_tables_pagination_limit, length_options) == -1) {
        length_options.push(app_tables_pagination_limit);
        length_options_names.push(app_tables_pagination_limit);
    }

    length_options.sort(function(a, b) {
        return a - b;
    });
    length_options_names.sort(function(a, b) {
        return a - b;
    });

    length_options.push(-1);
    length_options_names.push('All');

    var dtSettings = {
        // "language": appLang.datatables,
        "processing": true,
        "retrieve": true,
        "serverSide": true,
        'paginate': true,
        'searchDelay': 750,
        "bDeferRender": true,
        "responsive": true,
        "autoWidth": false,
        // dom: "<'row'><'row'<'col-md-7'lB><'col-md-5'f>>rt<'row'<'col-md-4'i>><'row'<'#colvis'><'.dt-page-jump'>p>",
        "pageLength": app_tables_pagination_limit,
        "lengthMenu": [length_options, length_options_names], 
        "columnDefs": [{
            "searchable": false,
            "targets": notsearchable,
        }, {
            "sortable": false,
            "targets": notsortable
        }],
        "fnDrawCallback": function(oSettings) {
            _table_jump_to_page(this, oSettings);
            if (oSettings.aoData.length === 0) {
                $(oSettings.nTableWrapper).addClass('app_dt_empty');
            } else {
                $(oSettings.nTableWrapper).removeClass('app_dt_empty');
            }
        },
        "fnCreatedRow": function(nRow, aData, iDataIndex) {
            // If tooltips found
            $(nRow).attr('data-title', aData.Data_Title);
            $(nRow).attr('data-toggle', aData.Data_Toggle);
        },
        "initComplete": function(settings, json) {
            var t = this;
            var $btnReload = $('.btn-dt-reload');
            $btnReload.attr('data-toggle', 'tooltip');
            // $btnReload.attr('title', appLang.dt_button_reload);

            var $btnColVis = $('.dt-column-visibility');
            $btnColVis.attr('data-toggle', 'tooltip');
            // $btnColVis.attr('title', appLang.dt_button_column_visibility);

            if (t.hasClass('scroll-responsive')) {
                t.wrap('<div class="table-responsive"></div>');
            }

            var dtEmpty = t.find('.dataTables_empty');
            if (dtEmpty.length) {
                dtEmpty.attr('colspan', t.find('thead th').length);
            }

            // Hide mass selection because causing issue on small devices
            if ($(window).width() < 400 && t.find('tbody td:first-child input[type="checkbox"]').length > 0) {
                t.DataTable().column(0).visible(false, false).columns.adjust();
                $("a[data-target*='bulk_actions']").addClass('hide');
            }

            t.parents('.table-loading').removeClass('table-loading');
            t.removeClass('dt-table-loading');
            var th_last_child = t.find('thead th:last-child');
            var th_first_child = t.find('thead th:first-child');
            /*if (th_last_child.text().trim() == appLang.options) {
                th_last_child.addClass('not-export');
            }*/
            if (th_first_child.find('input[type="checkbox"]').length > 0) {
                th_first_child.addClass('not-export');
            }
            // $(document).CsrfAjaxGet();
        },
        orderCellsTop: 1,
        "order": defaultorder,
        "ajax": {
            "url": url,
            "type": "POST",
            "data": function(d) {
                if (typeof(csrfData) !== 'undefined') {
                    d[csrfData['token_name']] = csrfData['hash'];
                }
                for (var key in fnserverparams) {
                    d[key] = $(fnserverparams[key]).val();
                }
                if (table.attr('data-last-order-identifier')) {
                    d['last_order_identifier'] = table.attr('data-last-order-identifier');
                }
            }
        },
          /* "dom": "Bflrtip",
          buttons: [{
            extend:'excel',
            exportOptions: {
                columns: ':not(:last-child)',
              }
            }
             
          ] */
            // buttons:['excel',{extend:"copyHtml5",exportOptions:{columns:[0,":visible"]}},{extend:"pdfHtml5",exportOptions:{columns:":visible"}},{text:"JSON",action:function(a,o,t,r){var e=o.buttons.exportData();$.fn.dataTable.fileSave(new Blob([JSON.stringify(e)]),"Export.json")}},{extend:"print",exportOptions:{columns:":visible"}}]
        
        // buttons: get_datatable_buttons(table),
    };
    
    if(remove_column_search == 0){
        $(selector+" thead tr").clone(!0).appendTo(selector+" thead");
        $(selector+" thead tr:eq(1) th").each(function (a) {
            if((notsearchable.includes(a) ) == true){
                $(this).html('');
            }else{
                var t = $(this).text();
                $(this).html('<input type="text" class="form-control column_searchable" placeholder="Search ' + t + '" />');
                 $("input.column_searchable", this).on("keyup change", function () {
                    table.api().columns(a).search() !== this.value && table.api().columns(a).search(this.value).draw();
                });
            }
        });
    }

    if (table.hasClass('scroll-responsive')) {
        dtSettings.responsive = false;
    }

    table = table.dataTable(dtSettings);
    var tableApi = table.DataTable();

    var hiddenHeadings = table.find('th.not_visible');
    var hiddenIndexes = [];

    $.each(hiddenHeadings, function() {
        hiddenIndexes.push(this.cellIndex);
    });

    /*setTimeout(function() {
        for (var i in hiddenIndexes) {
            tableApi.columns(hiddenIndexes[i]).visible(false, false).columns.adjust();
        }
    }, 10);*/

    if (table.hasClass('customizable-table')) {
        var tableToggleAbleHeadings = table.find('th.toggleable');
        var invisible = $('#hidden-columns-' + table.attr('id'));
        try {
            invisible = JSON.parse(invisible.text());
        } catch (err) {
            invisible = [];
        }

        $.each(tableToggleAbleHeadings, function() {
            var cID = $(this).attr('id');
            if ($.inArray(cID, invisible) > -1) {
                tableApi.column('#' + cID).visible(false);
            }
        });

        // For for not blurring out when clicked on the link
        // Causing issues hidden column still to be shown as not hidden because the link is focused
        $('body').on('click', '.buttons-columnVisibility a', function() {
            $(this).blur();
        });
        
        /*table.on('column-visibility.dt', function(e, settings, column, state) {
            var hidden = [];
            $.each(tableApi.columns()[0], function() {
                var visible = tableApi.column($(this)).visible();
                var columnHeader = $(tableApi.column($(this)).header());
                if (columnHeader.hasClass('toggleable')) {
                    if (!visible) {
                        hidden.push(columnHeader.attr('id'))
                    }
                }
            });
            var data = {};
            data.id = table.attr('id');
            data.hidden = hidden;
            if (data.id) {
                $.post(admin_url + 'staff/save_hidden_table_columns', data).fail(function(data) {
                    // Demo usage, prevent multiple alerts
                    if ($('body').find('.float-alert').length === 0) {
                        alert_float('danger', data.responseText);
                    }
                });
            } else {
                console.error('Table that have ability to show/hide columns must have an ID');
            }
        });*/
    }

    // Fix for hidden tables colspan not correct if the table is empty
    if (table.is(':hidden')) {
        table.find('.dataTables_empty').attr('colspan', table.find('thead th').length);
    }

    table.on('preXhr.dt', function(e, settings, data) {
        if (settings.jqXHR) settings.jqXHR.abort();
    });

    $(document).on("change", ".dt-page-jump-select", function() {
        tableApi.page($(this).val() - 1).draw(false);
    });
    
    return tableApi;
}

var oldExportAction = function (self, e, dt, button, config) {
    if (button[0].className.indexOf('buttons-excel') >= 0) {
        if ($.fn.dataTable.ext.buttons.excelHtml5.available(dt, config)) {
            $.fn.dataTable.ext.buttons.excelHtml5.action.call(self, e, dt, button, config);
        }
        else {
            $.fn.dataTable.ext.buttons.excelFlash.action.call(self, e, dt, button, config);
        }
    } else if (button[0].className.indexOf('buttons-print') >= 0) {
        $.fn.dataTable.ext.buttons.print.action(e, dt, button, config);
    }
};

var newExportAction = function (e, dt, button, config) {
    var self = this;
    var oldStart = dt.settings()[0]._iDisplayStart;

    dt.one('preXhr', function (e, s, data) {
        // Just this once, load all data from the server...
        data.start = 0;
        data.length = 2147483647;

        dt.one('preDraw', function (e, settings) {
            // Call the original action function 
            oldExportAction(self, e, dt, button, config);

            dt.one('preXhr', function (e, s, data) {
                // DataTables thinks the first item displayed is index 0, but we're not drawing that.
                // Set the property to what it was before exporting.
                settings._iDisplayStart = oldStart;
                data.start = oldStart;
            });

            // Reload the grid with the original page. Otherwise, API functions like table.cell(this) don't work properly.
            setTimeout(dt.ajax.reload, 0);

            // Prevent rendering of the full data to the DOM
            return false;
        });
    });

    // Requery the server with the new one-time export settings
    dt.ajax.reload();
};
