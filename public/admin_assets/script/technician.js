var baseUrl = $('#base').val();

function delete_confirmation() {
    var c = confirm("Do you really want to delete this record?");
    if (c) {
        return true;
    } else {
        return false;
    }
}

(function ($, window, document, undefined) {
    $(document).ready(function () {

        var queryString = window.location.search;
        var technician_input = initDataTable('.table-technician_input', baseUrl + 'backend/technician_input/getAjaxListData' + queryString + ' ', [7, 8, 9], [6, 7, 8, 9], [], [0, 'desc']);
        $(document).delegate(".btn_technician_input_status", "change", function (event) {
            var status = 0;
            var record_id = $(this).val();
            if (this.checked) {
                status = 1; 
            }
            $.ajax({
                type: "POST",
                url: baseUrl + "backend/technician_input/change_status",
                data: {
                    status: status,
                    record_id: record_id
                },
                success: function (result) {

                }
            });
        });
        $(document).delegate(".delete_technician_input", "click", function (event) {
            if (delete_confirmation()) {
                var el = $(this);
                var record_id = $(this).attr('data-id');
                if (record_id) {
                    $.ajax({
                        type: 'POST',
                        url: baseUrl + 'backend/technician_input/delete_record',
                        data: {
                            record_id: record_id
                        },
                        success: function (response) {
                            if (response) {
                                el.closest("tr").hide();
                            }
                        }
                    });
                }
            }
        });
        $(document).delegate(".btnSetSuplimentNull", "click", function (event) {
            var el = $(this);
            var record_id = $(this).attr('data-id');
            if (record_id) {
                $.ajax({
                    type: 'POST',
                    url: baseUrl + 'backend/technician_input/set_supplement_null',
                    data: {
                        record_id: record_id
                    },
                    success: function (response) {
                        technician_input.ajax.reload();
                    }
                });
            }
        });
        
        initDataTable('.table-input_options', baseUrl + 'backend/input_options/getAjaxListData', [2, 3, 4], [2, 3, 4], [], [0, 'asc']);
        $(document).delegate(".btn_option_status", "change", function (event) {
            var status = 0;
            var record_id = $(this).val();
            if (this.checked) {
                status = 1;
            }
            $.ajax({
                type: "POST",
                url: baseUrl + "backend/input_options/change_status",
                data: {
                    status: status,
                    record_id: record_id
                },
                success: function (result) {

                }
            });
        });
        $(document).delegate(".delete_input_option", "click", function (event) {
            if (delete_confirmation()) {
                var el = $(this);
                var record_id = $(this).attr('data-id');
                if (record_id) {
                    $.ajax({
                        type: 'POST',
                        url: baseUrl + 'backend/input_options/delete_record',
                        data: {
                            record_id: record_id
                        },
                        success: function (response) {
                            if (response) {
                                el.closest("tr").hide();
                            }
                        }
                    });
                }
            }
        });

        initDataTable('.table-daily_technician_input', baseUrl + 'backend/technician_input/getTechnicianAjaxListData', [4, 5, 6,7], [4, 5, 6,7], [], [1, 'desc']);
        initDataTable('.table-daily_technician_bonus', baseUrl + 'backend/technician_input/getTechnicianBonusAjaxListData', [2, 3], [3], [], [0, 'desc']);

        $(document).delegate(".show_user_daily_inputs", "click", function (event) {
            var el = $(this);
            var user_id = $(this).attr('data-user_id');
            var input_date = $(this).attr('data-date');
            if (user_id && input_date) {
                $.ajax({
                    type: 'POST',
                    url: baseUrl + 'backend/technician_input/daily_input_modal',
                    data: {
                        user_id: user_id, input_date:input_date
                    },
                    success: function (response) {
                        if (response) {
                           $("#modal_popup").html(response)
                        } 
                    }
                });
            }
        });

        var technician_supplement_input = initDataTable('.table-technician_supplement_input', baseUrl + 'backend/technician_input/getSupplementAjaxListData' + queryString + ' ', [7, 8], [6, 7, 8], [], [0, 'desc']);
        $(document).delegate(".approve_supplement_input", "click", function (event) {
            var record_id = $(this).attr('data-id');
            var status = $(this).attr('data-status');
            if (record_id) {
                $.ajax({
                    type: "POST",
                    url: baseUrl + "backend/technician_input/approve_supplement_input",
                    data: {
                        record_id: record_id, status: status 
                    },
                    success: function (result) {
                        technician_supplement_input.ajax.reload();
                    }
                });
            }
        });

    });
})(jQuery, window, document);