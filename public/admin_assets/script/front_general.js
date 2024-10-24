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

        $(".select2").select2();

        var tagify = new Tagify( document.querySelector(".myTagInput"), {
            originalInputValueFormat: valuesArr => valuesArr.map(item => item.value).join(',')
        });
        
        $("input[type='file']").change(function () {
            readURL(this);
        });

        function readURL(input) {
            var elem = $(input);
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    elem.next('img').attr('src', e.target.result);
                }
                reader.readAsDataURL(elem.get(0).files[0]);
            }
        }

        /*
        // for save user device id in DB
        function saveUserDeviceId(web_device_id){
            if(web_device_id){
                $.ajax({
                    type: 'POST',
                    url: baseUrl + 'auth/save_user_deviceid',
                    data: {
                        web_device_id: web_device_id
                    },
                    success: function (response) {
                        console.log(web_device_id);
                    }
                });
            }
        }
        async function getUserDeviceId() {
            return await OneSignal.getUserId();
        }
        (async () => {
            var web_device_id = await getUserDeviceId();
            saveUserDeviceId(web_device_id);
        })()
        */

        $(document).delegate('input[type="checkbox"]', "change", function (event) {
            var checkboxes = $('input:checkbox:checked').length;
            $(".totalcheckbox").val(checkboxes); 
        });
        
        $(document).delegate(".stock_offcanvas", "click", function (event) {
            var el = $(this);
            var stock_id = $(this).attr('data-id');
            var user_st_id = $(this).attr('data-user_st_id');
           if (stock_id) {
                $.ajax({
                    type: 'POST',
                    url: baseUrl + 'stock/stock_item',
                    data: {
                        'stock_id': stock_id,'user_st_id':user_st_id
                    },
                    success: function (response) {
                       
                        if (response) {
                            $("#stock_item").html(response);
                        }
                    }
                });
            }
        });

        $(document).delegate(".view_doc", "click", function (event) {
            var el = $(this);
            var material_id = $(this).attr('data-id');
            if (material_id) {
                $.ajax({
                    type: 'POST',
                    url: baseUrl + 'home/service_doc',
                    data: {
                        material_id: material_id
                    },
                    success: function (response) {
                        $(".file_borrower").html('-');
                        if (response) {
                            $(".file_borrower").html(response);
                        }
                    }
                });
            }
        });

        $(document).delegate(".send_stock_btn", "click", function (event) {
            $.ajax({
                type: 'POST',
                url: baseUrl + 'stock/send_stock_btn',
                data: { },
                success: function (response) {
                    window.location.href = baseUrl+"stock";
                }
            });
        });

        $(document).delegate(".melding_popup", "click", function (event) {
            var el = $(this);
            var melding_id = $(this).attr('data-id');
            var type = $(this).attr('data-type');

            if (melding_id) {
                $.ajax({
                    type: 'POST',
                    url: baseUrl + 'melding/molding_modal',
                    data: {
                        melding_id: melding_id,
                        type: type
                    },
                    success: function (response) {
                        if (response) {
                            $("#modal_popup").html(response)
                        }
                    }
                });
            }
        });

        $(".validNumber").on("keypress keyup blur", function (event) {
            $(this).val($(this).val().replace(/[^\d].+/, ""));
            if ((event.which < 48 || event.which > 57)) {
                event.preventDefault();
            }
        });

        // custom datatable
        $('#tTable').DataTable({
            "order": [],
        });

        // var id = window.location.pathname.split("/").pop();
        var queryString = window.location.search;
        // initDataTable('.table-user', baseUrl + 'home/getAjaxListData'+queryString+' ', [7,8], [7,8]);

        var user_id = window.location.href.split("/").pop();
        initDataTable('.table-user_technician_input', baseUrl + 'home/getTechnicianInputData', [3, 4, 5], [3, 4, 5], [], [1, 'desc']);
        initDataTable('.table-user_material_order', baseUrl + 'home/getMeterialOrderData', [1], [1], [], [0, 'desc']);

        $(document).delegate(".delete_material_order", "click", function (event) {
            if (delete_confirmation()) {
                var el = $(this);
                var record_id = $(this).attr('data-id');
                if (record_id) {
                    $.ajax({
                        type: 'POST',
                        url: baseUrl + 'home/delete_material_order',
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

        var query_string = window.location.search
        if (query_string == '') {
            query_string = "?tab=all";
        }
        initDataTable('.table-phonebook', baseUrl + 'phonebook/getAjaxListData' + query_string, [1], [1], [], [0, 'asc']);

        initDataTable('.table-contractor_users', baseUrl + 'contractor/getAjaxListData', [4, 6], [4, 6], [], [1, 'desc']);

        initDataTable('.table-contractor_user_technician_input', baseUrl + 'contractor/getTechnicianInputData/' + user_id, [3, 4], [3, 4], [], [1, 'desc']);
        var contractor_user_material_order = initDataTable('.table-contractor_user_material_order', baseUrl + 'contractor/getMeterialOrderData/' + user_id, [1], [1], [], [0, 'desc']);

        initDataTable('.table-material_list', baseUrl + 'home/getMaterialListData', [], [], [], [2, 'asc']);
        initDataTable('.table-user_meldings', baseUrl + 'melding/getAjaxListData', [7], [7], [], [0, 'desc']);

        $(document).delegate(".btn_approve_order", "click", function (event) {
            var record_id = $(this).attr('data-id');
            var status = $(this).attr('data-status');
            if (record_id) {
                $.ajax({
                    type: "POST",
                    url: baseUrl + "contractor/approve_order",
                    data: {
                        record_id: record_id, status: status 
                    },
                    success: function (result) {
                        contractor_user_material_order.ajax.reload();
                    }
                });
            }
        });

        $(document).delegate(".change_madadown_form", "click", function (event) {
            if($(this).is(":checked")) {
                var form_type = $(this).val();
                if(form_type){
                    $.ajax({
                        type: "POST",
                        url: baseUrl + "melding/load_madadata_form",
                        data: {
                            type: form_type
                        },
                        success: function (response) {
                            $('#frmMeldingForm .load_madadata_form').html(response);
                            $('#frmMeldingForm .load_madadata_form').removeClass('d-none');
                        }
                    });
                }
            }
            
        });
        
        $(document).delegate(".pollDetailform", "submit", function (e) {
            e.preventDefault();
            var _ele = $(this);
            $.ajax({
                type: 'POST',
                url: baseUrl+"home/save_poll_answers",
                data: new FormData(this),
                dataType: 'json',
                contentType: false,
                cache: false,
                processData:false,
                success: function(result){
                    _ele.closest(".poll_response_div").html(result)
                }
            });
        });

        $(document).delegate("#frmMeldingForm", "submit", function (e) {
            e.preventDefault();
            var _ele = $(this);
            $.ajax({
                type: 'POST',
                url: baseUrl+"melding/form",
                data: new FormData(this),
                dataType: 'json',
                contentType: false,
                cache: false,
                processData:false,
                beforeSend: function(result){
                    $('.btnFormSubmit').addClass('disabled');
                    $('.btnFormSubmit').attr('disabled', 'true');
                },
                success: function(result){
                    window.location.href = baseUrl+"melding";
                }
            });
        });

        $(document).delegate("#loadSelectedMaterialModal", "click", function (e) {
            e.preventDefault();
            // var formData = new FormData($('#frmMaterialOrder')[0]);
            var formData = $('#frmMaterialOrder').serialize();
            var material_ids = $("input[name='material_ids[]']:checkbox:checked").map(function(){ return $(this).val(); }).get();
            if(formData){
                if(material_ids.length > 0){
                    $('#submitMaterialOrder').show();
                }else{
                    $('#submitMaterialOrder').hide();
                }
                var showhtml = "";
                $.ajax({
                    type: 'POST',
                    url: baseUrl + 'home/showSelectedMaterials',
                    data: formData,
                    success: function(result){
                        showhtml = result;
                        $('#modalUserMaterialModal .loadModalContent').html(result);
                    }
                });
                $('#modalUserMaterialModal .loadModalContent').html(showhtml);
            }
        });

        $(document).delegate("#frmMaterialOrder", "submit", function (e) {
            e.preventDefault();
            var _ele = $(this);
            $.ajax({
                type: 'POST',
                url: baseUrl+"order_material",
                data: new FormData(this),
                dataType: 'json',
                contentType: false,
                cache: false,
                processData:false,
                beforeSend: function(result){
                    $('.btnFormSubmit').addClass('disabled');
                    $('.btnFormSubmit').attr('disabled', 'true');
                },
                success: function(result){
                    if(result.status==0){
                        // alert('select atleast one!');
                        $('.btnFormSubmit').removeClass('disabled');
                        $('.btnFormSubmit').removeAttr('disabled');
                    }else{
                        window.location.href = baseUrl+"materials";
                    }
                }
            });
        });

        $(document).delegate(".show_faq_document", "click", function (event) {
            var el = $(this);
            var faq_id = $(this).attr('data-id');
            if (faq_id) {
                $.ajax({
                    type: 'POST',
                    url: baseUrl + 'faq/show_faq_document',
                    data: {
                        faq_id: faq_id
                    },
                    success: function (response) {
                        if (response) {
                            $("#modal_show_faq_document .modal_popup").html(response)
                        }
                    }
                });
            }
        });

        var proj_id = window.location.href.split("/").pop();
        if(proj_id=='survey'){
            initDataTable('.table-front_surveys', baseUrl + 'survey/getAjaxListData', [8], [8], [], [0, 'asc']);
        }else{
           initDataTable('.table-front_surveys', baseUrl + 'survey/getAjaxListData/'+proj_id, [8], [8], [], [0, 'asc']);
        }
        var drawing_surveys = initDataTable('.table-drawing_surveys', baseUrl + 'survey/getDrawingSurveyData'+queryString+'', [2,10], [2,10], [], [0, 'asc']);

        $(document).delegate(".survey_offcanvas", "click", function (event) {
            var el = $(this);
            var record_id = $(this).attr('data-id');
            if (record_id) {
                $.ajax({
                    type: 'POST',
                    url: baseUrl + 'survey/load_survey_offcanvas',
                    data: {
                        record_id: record_id
                    },
                    success: function (response) {
                        if (response) {
                            $(".loadResult").html(response)
                        }
                    }
                });
            }
        });

        var last_id = window.location.href.split("/").pop();
        initDataTable('.table-survey_records', baseUrl + 'survey/getSurveyRecordsAjaxListData/'+ last_id, [], [], [], [0, 'asc']);

        $(document).delegate(".load_signature_view", "click", function (event) {
            var el = $(this);
            var record_id = $(this).attr('data-id');
            if (record_id) {
                $.ajax({
                    type: 'POST',
                    url: baseUrl + 'survey/load_signature_view',
                    data: {
                        record_id: record_id
                    },
                    success: function (response) {
                        if (response) {
                            $("#offcanvasRecordSignature .loadResult").html(response)
                        }
                    }
                });
            }
        });

        $(document).delegate(".btn_survey_status", "change", function (event) {
            var status = 0;
            var record_id = $(this).val();
            if (this.checked) {
                status = 1;
            }
            $.ajax({
                type: "POST",
                url: baseUrl + "backend/surveys/change_status",
                data: {
                    status: status,
                    record_id: record_id
                },
                success: function (result) {
                }
            });
        });

        $(document).delegate(".delete_survey", "click", function (event) {
            if (delete_confirmation()) {
                var el = $(this);
                var record_id = $(this).attr('data-id');
                if (record_id) {
                    $.ajax({
                        type: 'POST',
                        url: baseUrl + 'backend/surveys/delete_record',
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

        $(document).delegate("#frmSurveyStatusForm", "submit", function (e) {
            e.preventDefault();
            var _ele = $(this);
            $.ajax({
                type: 'POST',
                url: baseUrl + 'survey/set_status',
                data: new FormData(this),
                dataType: 'json',
                contentType: false,
                cache: false,
                processData:false,
                success: function(result){
                    if(result.code == 1){
                        $('.survey_offcanvas_error_msg').html('<div class="alert alert-success alert-dismissible"><strong>' + result.msg +'</strong></div>');
                    }else{ 
                        $('.survey_offcanvas_error_msg').html('<div class="alert alert-danger alert-dismissible"><strong>' + result.msg +'</strong></div>');
                    }
                }
            });
        });

        $(document).delegate("#frmSurveyStatusForm .btnRemarkShow", "click", function (e) {
            $('#frmSurveyStatusForm .formRemark').toggleClass('d-none');
            $('#frmSurveyStatusForm #survey_status').val('3');
        });
        
        $(document).delegate("#frmSurveyStatusForm .btnBeonStatus", "click", function (e) {
            $('#frmSurveyStatusForm .formBeonStatus').toggleClass('d-none');
            if($('#frmSurveyStatusForm .formBeonStatus').hasClass('d-none')){
                $('#frmSurveyStatusForm #beon_status_check').val('0');
            }else{
                $('#frmSurveyStatusForm #beon_status_check').val('1');
            }
        });

        $(document).delegate("#frmSurveyStatusForm .btnChangeStatus", "click", function (e) {
            var status = $(this).attr('data-status');
            if(status == 4){
                getUserLocation(function(latitude, longitude) {
                    if (latitude !== null && longitude !== null) {
                        $('#frmSurveyStatusForm #surveyor_lat').val(latitude);
                        $('#frmSurveyStatusForm #surveyor_long').val(longitude);
                        
                        $('#frmSurveyStatusForm #survey_status').val(status);
                        $('#frmSurveyStatusForm').submit();
                    }
                });
            }else{
                $('#frmSurveyStatusForm #survey_status').val(status);
                $('#frmSurveyStatusForm').submit();
            }
        });
        
        $(document).delegate("#frmSurveyStatusForm .btnNotathomestatus", "click", function (e) {
            getUserLocation(function(latitude, longitude) {
                if (latitude !== null && longitude !== null) {
                    $('#frmSurveyStatusForm #surveyor_lat').val(latitude);
                    $('#frmSurveyStatusForm #surveyor_long').val(longitude);
                }
            });

            $('#frmSurveyStatusForm .formNotatHome').toggleClass('d-none');
            if($('#frmSurveyStatusForm .formNotatHome').hasClass('d-none')){
                $('#frmSurveyStatusForm #not_home_status_check').val('0');
            }else{
                $('#frmSurveyStatusForm #not_home_status_check').val('1');
            }
        });

        $(document).delegate("#frmSurveyStatusDrawing .btnReturnStatus", "click", function (e) {
            var status = $(this).attr('data-status');
            $('#frmSurveyStatusDrawing #survey_status').val(status);
            $('#frmSurveyStatusDrawing .formReturn').toggleClass('d-none');
        });

        $(document).delegate(".unassign_survey", "click", function (event) {
            var c = confirm("Do you really want to unassign this survey?");
            if (c) {
                var el = $(this);
                var record_id = $(this).attr('data-id');
                if (record_id) {
                    $.ajax({
                        type: 'POST',
                        url: baseUrl + 'survey/unassign_survey',
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
            } else {
                return false;
            }
        });

        $(document).delegate(".load_survey_assign", "click", function (event) {
            var el = $(this);
            var record_id = $(this).attr('data-id');
            if (record_id) {
                $.ajax({
                    type: 'POST',
                    url: baseUrl + 'survey/load_survey_assign_form',
                    data: {
                        record_id: record_id
                    },
                    success: function (response) {
                        if (response) {
                            $("#mysurvey_offcanvas .loadSurveyResult").html(response)
                        }
                    }
                });
            }
        });

        $(document).delegate("#frmSurveyAssignDrawingForm", "submit", function (e) {
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: baseUrl + 'survey/load_survey_assign_form',
                data: new FormData(this),
                dataType: 'json',
                contentType: false,
                cache: false,
                processData:false,
                success: function(result){
                    if(result.code == 1){
                        $('.survey_offcanvas_error_msg').html('<div class="alert alert-success alert-dismissible"><strong>' + result.msg +'</strong></div>');
                        drawing_surveys.ajax.reload();
                        $('#mysurvey_offcanvas .btnCloseOffcanvas').trigger('click');
                    }else{
                        $('.survey_offcanvas_error_msg').html('<div class="alert alert-danger alert-dismissible"><strong>' + result.msg +'</strong></div>');
                    }
                }
            });
        });

        $(document).delegate(".deleteRecordEditImage", "click", function (event) {
            if (delete_confirmation()) {
                var image_id = $(this).attr('data-id');
                var record_id = $(this).attr('data-record_id');
                if (image_id) {
                    $.ajax({
                        type: 'POST',
                        url: baseUrl + 'survey/delete_record_edit_image',
                        data: {
                            record_id: image_id
                        },
                        success: function (response) {
                            if (response) {
                                refresh_record_image_list('edited', record_id);
                            }
                        }
                    });
                }
            }
        });

    });
})(jQuery, window, document);

function refresh_record_image_list(image_type, record_id){
    $.ajax({
        type: 'POST',
        url: baseUrl + 'survey/load_record_images/' + record_id,
        data: {
            image_type: image_type
        },
        success: function (response) {
            if (response) {
                $(".divRecordImagesType"+image_type).html(response)
            }
        }
    });
}

function getUserLocation(callback) {
    if ("geolocation" in navigator) {
        navigator.geolocation.getCurrentPosition(function(position) {
            const latitude = position.coords.latitude;
            const longitude = position.coords.longitude;
            callback(latitude, longitude);
        }, function(error) {
            console.error("Error getting user location:", error);
            callback(null, null);
        });
    } else {
        console.error("Geolocation is not available in this browser.");
        callback(null, null);
    }
}
