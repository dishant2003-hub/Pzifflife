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

        /*
        // for save user device id in DB
        (pushalertbyiw = window.pushalertbyiw || []).push(['onReady', onPAReady]);
        function onPAReady() {
            web_device_id = PushAlertCo.subs_id;
            console.log(web_device_id); //if empty then user is not subscribed
            saveUserDeviceId(web_device_id);
        }*/


        $(".select2").select2();

        // var a = (new Tagify(document.querySelector(".myTagInput")));

        // var tagify = new Tagify( document.querySelector(".myTagInput"), {
        //     originalInputValueFormat: valuesArr => valuesArr.map(item => item.value).join(',')
        // });

        // $(".validNumber").inputFilter(function(value) {
        //     return /^-?\d*[.,]?\d*$/.test(value);
        // });

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

        // custom text editor
        $('.custom_text_editors').each(function () {
            CKEDITOR.replace($(this).prop('id'), {
                removeButtons: 'PasteFromWord'
            });
        });

        /*$(document).delegate("form", "submit", function (event) {
            var c = confirm("Do you really want to submit the form ?");
            if (c) {
                $("#loader").show();
                return true;
            } else {
                return false;
            }
        });*/

        $(document).delegate(".chkRowclick", "click", function (event) {
            var key = $(this).data('key');
            if (this.checked) {
                $('.chkRow' + key + '').each(function () {
                    this.checked = true;
                });
            } else {
                $('.chkRow' + key + '').each(function () {
                    this.checked = false;
                });
            }
        });

        var last_id = window.location.href.split("/").pop();
        var queryString = window.location.search;

        $(document).delegate(".btntoggle_earning", "click", function (event) {
            $('.lbltech_earning').toggleClass("d-none");
        });

        $(document).delegate(".btntoggle_contractorearning", "click", function (event) {
            $('.lblcontractor_earning').toggleClass("d-none");
        });

        initDataTable('.table-user', baseUrl + 'backend/users/getAjaxListData' + queryString + ' ', [5, 6], [5, 6]);
        $(document).delegate(".btn_user_status", "change", function (event) {
            var status = 0;
            var record_id = $(this).val();
            if (this.checked) {
                status = 1;
            }
            $.ajax({
                type: "POST",
                url: baseUrl + "backend/users/change_user_status",
                data: {
                    status: status,
                    record_id: record_id
                },
                success: function (result) {

                }
            });
        });
        $(document).delegate(".delete_user", "click", function (event) {
            if (delete_confirmation()) {
                var el = $(this);
                var record_id = $(this).attr('data-id');
                if (record_id) {
                    $.ajax({
                        type: 'POST',
                        url: baseUrl + 'backend/users/delete',
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
        $(document).delegate(".change_user_status", "click", function (event) {
            var record_id = $(this).attr('data-id');
            var status = $(this).attr('data-status');
            if (record_id && status) {
                $.ajax({
                    type: "POST",
                    url: baseUrl + "backend/users/change_user_status",
                    data: {
                        status: status,
                        record_id: record_id
                    },
                    success: function (result) {
                        location.reload();
                    }
                });
            }
        });
        $(document).delegate(".change_contractor_status", "click", function (event) {
            var record_id = $(this).attr('data-id');
            var status = $(this).attr('data-status');
            if (record_id && status) {
                $.ajax({
                    type: "POST",
                    url: baseUrl + "backend/contractor/change_status",
                    data: {
                        status: status,
                        contactor_id: record_id
                    },
                    success: function (result) {
                        location.reload();
                    }
                });
            }
        });

        initDataTable('.table-faq', baseUrl + 'backend/faq/getAjaxListData', [3,4,5], [3,4,5]);
        $(document).delegate(".btn_faq_status", "change", function (event) {
            var status = 0;
            var record_id = $(this).val();
            if (this.checked) {
                status = 1;
            }
            $.ajax({
                type: "POST",
                url: baseUrl + "backend/faq/change_status",
                data: {
                    status: status,
                    record_id: record_id
                },
                success: function (result) {

                }
            });
        });
        $(document).delegate(".delete_faq", "click", function (event) {
            if (delete_confirmation()) {
                var el = $(this);
                var record_id = $(this).attr('data-id');
                if (record_id) {
                    $.ajax({
                        type: 'POST',
                        url: baseUrl + 'backend/faq/delete_record',
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
        initDataTable('.table-faq_category', baseUrl + 'backend/faq_category/getAjaxListData', [2,3], [3,4]);
        $(document).delegate(".btn_faq_category_status", "change", function (event) {
            var status = 0;
            var record_id = $(this).val();
            if (this.checked) {
                status = 1;
            }
            $.ajax({
                type: "POST",
                url: baseUrl + "backend/faq_category/change_status",
                data: {
                    status: status,
                    record_id: record_id
                },
                success: function (result) {

                }
            });
        });
        $(document).delegate(".delete_faq_category", "click", function (event) {
            if (delete_confirmation()) {
                var el = $(this);
                var record_id = $(this).attr('data-id');
                if (record_id) {
                    $.ajax({
                        type: 'POST',
                        url: baseUrl + 'backend/faq_category/delete_record',
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

        $(document).delegate(".show_faq_document", "click", function (event) {
            var el = $(this);
            var faq_id = $(this).attr('data-id');
            if (faq_id) {
                $.ajax({
                    type: 'POST',
                    url: baseUrl + 'backend/faq/show_faq_document',
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



        initDataTable('.table-workspaces', baseUrl + 'backend/workspaces/getAjaxListData', [2, 3, 4, 5], [2, 3, 4, 5], [], [0, 'asc']);
        $(document).delegate(".btn_workspace_status", "change", function (event) {
            var status = 0;
            var record_id = $(this).val();
            if (this.checked) {
                status = 1;
            }
            $.ajax({
                type: "POST",
                url: baseUrl + "backend/workspaces/change_status",
                data: {
                    status: status,
                    record_id: record_id
                },
                success: function (result) {

                }
            });
        });
        $(document).delegate(".delete_workspace", "click", function (event) {
            if (delete_confirmation()) {
                var el = $(this);
                var record_id = $(this).attr('data-id');
                if (record_id) {
                    $.ajax({
                        type: 'POST',
                        url: baseUrl + 'backend/workspaces/delete_record',
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


        initDataTable('.table-user_role', baseUrl + 'backend/user_role/getAjaxListData', [3, 4, 5, 6], [ 3, 4, 5, 6]);
        $(document).delegate(".btn_user_role_status", "change", function (event) {
            var status = 0;
            var record_id = $(this).val();
            if (this.checked) {
                status = 1;
            }
            $.ajax({
                type: "POST",
                url: baseUrl + "backend/user_role/change_status",
                data: {
                    status: status,
                    record_id: record_id
                },
                success: function (result) {

                }
            });
        });
        $(document).delegate(".delete_user_role", "click", function (event) {
            if (delete_confirmation()) {
                var el = $(this);
                var record_id = $(this).attr('data-id');
                if (record_id) {
                    $.ajax({
                        type: 'POST',
                        url: baseUrl + 'backend/user_role/delete_record',
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


        initDataTable('.table-languages', baseUrl + 'backend/languages/getAjaxListData', [3, 4], [3, 4]);
        $(document).delegate(".btn_language_status", "change", function (event) {
            var status = 0;
            var record_id = $(this).val();
            if (this.checked) {
                status = 1;
            }
            $.ajax({
                type: "POST",
                url: baseUrl + "backend/languages/change_status",
                data: {
                    status: status,
                    record_id: record_id
                },
                success: function (result) {
                }
            });
        });
        $(document).delegate(".delete_language", "click", function (event) {
            if (delete_confirmation()) {
                var el = $(this);
                var record_id = $(this).attr('data-id');
                if (record_id) {
                    $.ajax({
                        type: 'POST',
                        url: baseUrl + 'backend/languages/delete_record',
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


        initDataTable('.table-category', baseUrl + 'backend/category/getcategoryListData', [], [], [0, 'dec']);
        $(document).delegate(".deletecategory", "click", function (event) {
            if (delete_confirmation()) {
                var el = $(this);
                var id = $(this).attr('category-id');
                $.ajax({
                    type: 'POST',
                    url: baseUrl + 'backend/category/delete',
                    data: {
                        id: id
                    },
                    success: function (response) {
                        if (response) {
                            el.closest("tr").hide();
                        }
                    }
                });
            }
        });

        $(document).delegate(".category_status", "change", function (event) {
            var status = 0;
            var id = $(this).val();
            if (this.checked) {
                status = 1;
            }

            $.ajax({
                type: "POST",
                url: baseUrl + "backend/category/change_status",
                data: {
                    status: status,
                    id: id
                },
                success: function (result) {

                }
            });
        });

        initDataTable('.table-product', baseUrl + 'backend/product/getListData', [], [], [], [0, 'desc']);
        $(document).delegate(".deleteproduct", "click", function (event) {
            if (delete_confirmation()) {
                var el = $(this);
                var id = $(this).attr('category-id');
                $.ajax({
                    type: 'POST',
                    url: baseUrl + 'backend/product/delete',
                    data: {
                        id: id
                    },
                    success: function (response) {
                        if (response) {
                            el.closest("tr").hide();
                        }
                    }
                });
            }
        });

        $(document).delegate(".product_status", "change", function (event) {
            var status = 0;
            var id = $(this).val();
            if (this.checked) {
                status = 1;
            }

            $.ajax({
                type: "POST",
                url: baseUrl + "backend/product/change_status",
                data: {
                    status: status,
                    id: id
                },
                success: function (result) {

                }
            });
        });

        initDataTable('.table-product_type', baseUrl + 'backend/product_type/getListData', [], [], [0, 'dec']);
        $(document).delegate(".footer_status", "change", function (event) {
            var status = 0;
            var id = $(this).val();
            if (this.checked) {
                status = 1;
            }
            $.ajax({
                type: "POST",
                url: baseUrl + "backend/product_type/footer_status",
                data: {
                    status: status,
                    id: id
                },
                success: function (result) {

                }
            });
        });

        // initDataTable('.table-gallery', baseUrl + 'backend/gallery/getListData', [], [], [0, 'dec']);
        $(document).delegate(".deletegallery", "click", function (event) {
            if (delete_confirmation()) {
                var id = $(this).attr('id');
                $.ajax({
                    type: 'POST',
                    url: baseUrl + 'backend/gallery/delete',
                    data: {
                        id: id
                    },
                    success: function (response) {
                        location.reload();
                    }
                });
            }
        });

        $('#dropzone').change(function(){ 
            formdata = new FormData();
            if($(this).prop('files').length > 0)
            {
                file = $(this).prop('files')[0];
                formdata.append("files", file);
            }
            $.ajax({
                type: "POST",
                url:  baseUrl + 'backend/gallery/dropzone',
                data: formdata,
                processData: false,
                contentType: false,
                success: function (result) {
                    location.reload();
                }
            });
        });

        initDataTable('.table-contact', baseUrl + 'backend/contact/getListData', [], [], [0, 'dec']);
        $(document).delegate(".deletecontact", "click", function (event) {
            if (delete_confirmation()) {
                var el = $(this);
                var id = $(this).attr('id');
                $.ajax({
                    type: 'POST',
                    url: baseUrl + 'backend/contact/delete',
                    data: {
                        id: id
                    },
                    success: function (response) {
                        if (response) {
                            el.closest("tr").hide();
                        }
                    }
                });
            }
        });

        initDataTable('.table-blog', baseUrl + 'backend/blog/getListData', [], [], [0, 'dec']);

        $('.custom_text_editors').each(function () {
            CKEDITOR.replace($(this).prop('id'), {
                removeButtons: 'PasteFromWord'
            });
        });

        $(document).delegate(".deleteblog", "click", function (event) {
            if (delete_confirmation()) {
                var el = $(this);
                var id = $(this).attr('blog-id');
                $.ajax({
                    type: 'POST',
                    url: baseUrl + 'backend/blog/delete',
                    data: {
                        id: id
                    },
                    success: function (response) {
                        if (response) {
                            el.closest("tr").hide();
                        }
                    }
                });
            }
        });



















        function load_navbar_notification() {
            var el = $(this);
            $.ajax({
                type: 'POST',
                url: baseUrl + 'backend/admin/load_navbar_notification',
                data: {
                    // record_id: record_id
                },
                success: function (response) {
                    if (response) {
                        $(".dropdown-notifications .dropdown-notifications-list .list-group-flush").html(response);
                    }
                }
            });
        }
        $(document).delegate(".read_notification", "click", function (event) {
            var el = $(this);
            var record_id = $(this).attr('data-id');
            if (record_id) {
                $.ajax({
                    type: 'POST',
                    url: baseUrl + 'backend/notification/read_notification',
                    data: {
                        record_id: record_id
                    },
                    success: function (response) {
                        if (response) {
                            el.closest(".alert").hide();
                            el.closest(".dropdown-notifications-item").hide();
                            load_navbar_notification();
                        }
                    }
                });
            }
        });
        $(document).delegate(".load_navbar_notification", "click", function (event) {
            load_navbar_notification();
        });

        initDataTable('.table-timeline', baseUrl + 'backend/timeline/getAjaxListData' + queryString, [3,4,5,6], [3,4,5,6], [], [0, 'desc']);
        $(document).delegate(".btn_timeline_status", "change", function (event) {
            var status = 0;
            var record_id = $(this).val();
            if (this.checked) {
                status = 1;
            }
            $.ajax({
                type: "POST",
                url: baseUrl + "backend/timeline/change_status",
                data: {
                    status: status,
                    record_id: record_id
                },
                success: function (result) {

                }
            });
        });
        $(document).delegate(".delete_timeline", "click", function (event) {
            if (delete_confirmation()) {
                var el = $(this);
                var record_id = $(this).attr('data-id');
                if (record_id) {
                    $.ajax({
                        type: 'POST',
                        url: baseUrl + 'backend/timeline/delete_record',
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

        $(document).delegate(".show_poll_answer", "click", function (event) {
            var el = $(this);
            var record_id = $(this).attr('data-id');
            if (record_id) {
                $.ajax({
                    type: 'POST',
                    url: baseUrl + 'backend/workspaces/get_timline_poll_detail',
                    data: {
                        record_id: record_id
                    },
                    success: function (response) {
                        if (response) {
                            $(".show_modal_content").html(response)
                        }
                    }
                });
            }
        });

        var phone_queryString = window.location.search;
        if (phone_queryString == '') {
            phone_queryString = "?tab=all";
        }
        initDataTable('.table-phonebook_list', baseUrl + 'backend/phonebook/getListAjaxListData' + phone_queryString, [1], [1], [], [0, 'asc']);

        initDataTable('.table-changelog', baseUrl + 'backend/changelog/getAjaxListData', [3, 4], [3, 4], [], [0, 'asc']);
        $(document).delegate(".btn_changelog_status", "change", function (event) {
            var status = 0;
            var record_id = $(this).val();
            if (this.checked) {
                status = 1;
            }
            $.ajax({
                type: "POST",
                url: baseUrl + "backend/changelog/change_status",
                data: {
                    status: status,
                    record_id: record_id
                },
                success: function (result) {

                }
            });
        });

        $(document).delegate(".editImage", "click", function (event) {
            $.ajax({
                type: 'POST',
                url: baseUrl + 'backend/surveys/editImage',
                data: {
                    image: "https://scaleflex.airstore.io/demo/stephen-walker-unsplash.jpg"
                },
                success: function (response) {
                    if (response) {
                        var obj = JSON.parse(response);
                         $("#modal_popup").html(obj);
                    }
                }
            });
        });

        $(document).delegate(".add_signature", "click", function (event) {
            $.ajax({
                type: 'POST',
                url: baseUrl + 'backend/surveys/add_signature',
                 
                success: function (response) {
                    if (response) {
                        var obj = JSON.parse(response);
                         $("#modal_popup").html(obj);
                    }
                }
            });
        });

        $(document).delegate(".delete_changelog", "click", function (event) {
            if (delete_confirmation()) {
                var el = $(this);
                var record_id = $(this).attr('data-id');
                if (record_id) {
                    $.ajax({
                        type: 'POST',
                        url: baseUrl + 'backend/changelog/delete_record',
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

        $('.checked_dis').attr('disabled',true);
        let SurveyIdsArray = [];
        $(document).delegate(".table #surveys_check_all", "click", function (e) {
            $('input.form-check-input:checkbox').not(this).prop('checked', this.checked);
            var checkboxes = $('.table tbody input:checkbox');

            for (var i = 0; i < checkboxes.length; i++) {
                var surveyId = checkboxes[i].value;
                if (checkboxes[i].checked) {
                    SurveyIdsArray.push(surveyId);
                    getSurveyIDOutput();
                    $('.checked_dis').attr('disabled',false);
                }else{
                    const index = SurveyIdsArray.indexOf(surveyId);
                    if (index !== -1) {
                        SurveyIdsArray.splice(index, 1);
                        getSurveyIDOutput();
                        $('.checked_dis').attr('disabled',true);
                    }
                }
            }
            if(!this.checked){
                SurveyIdsArray = [];
                getSurveyIDOutput();
            }
        });
        
        $(document).delegate('.table input[type="checkbox"]', "change", function (event) {
            var surveyId = $(this).val();
            if(surveyId != 1){
                // var checkboxes = $('.table tbody input:checkbox:checked').length;
    
                if($(this).is(':checked')){
                    const numberToAdd = surveyId;
                    if (!isNaN(numberToAdd) && !SurveyIdsArray.includes(numberToAdd)) {
                        SurveyIdsArray.push(numberToAdd);
                        getSurveyIDOutput();
                        $('.checked_dis').attr('disabled',false);
                    }
                }else{
                    const numberToRemove = surveyId;
                    const index = SurveyIdsArray.indexOf(numberToRemove);
                    if (index !== -1) {
                        SurveyIdsArray.splice(index, 1);
                        getSurveyIDOutput();
                    }
                    if(index == 0){
                        $('.checked_dis').attr('disabled',true);
                    }
                }

                var checkboxes = SurveyIdsArray.length;
                $(".totalcheckbox").val(checkboxes);
            }
        });

        function removeDuplicates(arr) {
            let unique = [];
            for (i = 0; i < arr.length; i++) {
                if (unique.indexOf(arr[i]) === -1) {
                    unique.push(arr[i]);
                }
            }
            return unique;
        }

        function getSurveyIDOutput() {
            var NewSurveyIdsArray = removeDuplicates(SurveyIdsArray);
            console.log(NewSurveyIdsArray);

            var checkboxes = NewSurveyIdsArray.length;
            $(".totalcheckbox").val(checkboxes);

            const selectedSurveyIds = NewSurveyIdsArray.join(',');
            $('.selectedSurveyIds').val(selectedSurveyIds);
            if (selectedSurveyIds) {
                $.ajax({
                    type: 'POST',
                    url: baseUrl + 'backend/surveys/save_selected_survey_ids',
                    data: {
                        selectedSurveyIds: selectedSurveyIds
                    },
                    success: function (response) {
                    }
                });
            }
        }

        var proj_id = window.location.href.split("/").pop();
        var tblsurveys = initDataTable('.table-surveys', baseUrl + 'backend/surveys/getAjaxListData/'+proj_id, [0,7,10,12,13], [0,7,10,12,13], [], [1, 'asc']); 
        var drawing_surveys = initDataTable('.table-drawing_surveys', baseUrl + 'backend/surveys/getDrawingSurveyData/'+proj_id, [0,2,9], [0,2,9], [], [1, 'asc']);

        var drawing_check_surveys = initDataTable('.table-drawing_check_surveys', baseUrl + 'backend/surveys/getDrawingCheckSurveyData/'+proj_id, [7,10,12,13], [7,10,12,13], [], [1, 'asc']);

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

        $(document).delegate(".survey_offcanvas", "click", function (event) {
            var el = $(this);
            var record_id = $(this).attr('data-id');
            var record_type = $(this).attr('data-type');
            var record_status = $(this).attr('data-status');
            if (record_id) {
                $.ajax({
                    type: 'POST',
                    url: baseUrl + 'backend/surveys/load_survey_offcanvas',
                    data: {
                        record_id: record_id,
                        record_type: record_type,
                        record_status: record_status,
                    },
                    success: function (response) {
                        if (response) {
                            $(".loadResult").html(response)
                        }
                    }
                });
            }
        });
        $(document).delegate(".survey_drawing", "click", function (event) {
            var el = $(this);
            var record_id = $(this).attr('data-id');
            if (record_id) {
                $.ajax({
                    type: 'POST',
                    url: baseUrl + 'backend/surveys/load_drawing_detail',
                    data: {
                        record_id: record_id,
                    },
                    success: function (response) {
                        if (response) {
                            $(".loadDrawing_detail").html(response);

                            var survey_record_id = $('#survey_record_id').val();
                            refresh_record_image_list('4', survey_record_id);

                            $('.mylightgallery a').simpleLightbox({
                                'disableRightClick': true,
                                'loop': false,
                            });
                        }
                    }
                });
            }
        });

        $(document).delegate("#frmDrawingSurveyStatusForm", "submit", function (e) {
            e.preventDefault();
            var _ele = $(this);
            $.ajax({
                type: 'POST',
                url: baseUrl + 'backend/surveys/set_status',
                data: new FormData(this),
                dataType: 'json',
                contentType: false,
                cache: false,
                processData:false,
                success: function(result){
                    if(result.code == 1){
                        $('.survey_offcanvas_error_msg').html('<div class="alert alert-success alert-dismissible"><strong>' + result.msg +'</strong></div>');
                        $('#survey_offcanvas .btn-close').trigger('click');
                        drawing_check_surveys.ajax.reload();
                    }else{
                        $('.survey_offcanvas_error_msg').html('<div class="alert alert-danger alert-dismissible"><strong>' + result.msg +'</strong></div>');
                    }
                }
            });
        });

        $(document).delegate("#frmSurveyStatusForm", "submit", function (e) {
            e.preventDefault();
            var _ele = $(this);
            $.ajax({
                type: 'POST',
                url: baseUrl + 'backend/surveys/set_status',
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

        initDataTable('.table-survey_records', baseUrl + 'backend/surveys/getSurveyRecordsAjaxListData/'+ last_id, [], [], [], [0, 'asc']);

        $(document).delegate(".load_signature_view", "click", function (event) {
            var el = $(this);
            var record_id = $(this).attr('data-id');
            if (record_id) {
                $.ajax({
                    type: 'POST',
                    url: baseUrl + 'backend/surveys/load_signature_view',
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

        $(document).delegate("#frmSurveyStatusForm .btnRemarkShow", "click", function (e) {
            $('#frmSurveyStatusForm .formRemark').toggleClass('d-none');
            $('#frmSurveyStatusForm #survey_status').val('3');
        });
        
        $(document).delegate("#frmSurveyStatusForm .btnBeonStatus", "click", function (e) {
            $('#frmSurveyStatusForm .formBeonStatus').toggleClass('d-none');
            var status = $(this).attr('data-status');
            $('#frmSurveyStatusForm #survey_status').val(status);
            if($('#frmSurveyStatusForm .formBeonStatus').hasClass('d-none')){
                $('#frmSurveyStatusForm #beon_status_check').val('0');
            }else{
                $('#frmSurveyStatusForm #beon_status_check').val('1');
            }
        });

        $(document).delegate("#frmSurveyStatusForm .btnChangeStatus", "click", function (e) {
            var status = $(this).attr('data-status');
            $('#frmSurveyStatusForm #survey_status').val(status);
            $('#frmSurveyStatusForm').submit();
        });

        $(document).delegate("#frmSurveyStatusForm .btnNotathomestatus", "click", function (e) {
            $('#frmSurveyStatusForm .formNotatHome').toggleClass('d-none');
            if($('#frmSurveyStatusForm .formNotatHome').hasClass('d-none')){
                $('#frmSurveyStatusForm #not_home_status_check').val('0');
            }else{
                $('#frmSurveyStatusForm #not_home_status_check').val('1');
            }
        });

        $(document).delegate("#frmSurveyStatusForm .btnReturnStatus", "click", function (e) {
            var status = $(this).attr('data-status');
            $('#frmSurveyStatusForm #survey_return_status').val(status);
            $('#frmSurveyStatusForm .formReturn').toggleClass('d-none');

            if($('#frmSurveyStatusForm .formReturn').hasClass('d-none')){
                $('#frmSurveyStatusForm #return_status_check').val('0');
            }else{
                $('#frmSurveyStatusForm #return_status_check').val('1');
            }
        });

        $(document).delegate("#frmSurveyStatusDrawing .btnReturnStatus", "click", function (e) {
            var status = $(this).attr('data-status');
            $('#frmSurveyStatusDrawing #survey_status').val(status);
            $('#frmSurveyStatusDrawing .formReturn').toggleClass('d-none');
        });

        $(document).delegate(".load_survey_assign", "click", function (event) {
            var el = $(this);
            var record_id = $(this).attr('data-id');
            var type = $(this).attr('data-type');
            if (record_id) {
                $.ajax({
                    type: 'POST',
                    url: baseUrl + 'backend/surveys/load_survey_assign_form',
                    data: {
                        record_id: record_id,
                        type: type,
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
                url: baseUrl + 'backend/surveys/load_survey_assign_form',
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

        $(document).delegate(".unassign_survey", "click", function (event) {
            var c = confirm("Do you really want to unassign this survey?");
            if (c) {
                var el = $(this);
                var record_id = $(this).attr('data-id');
                if (record_id) {
                    $.ajax({
                        type: 'POST',
                        url: baseUrl + 'backend/surveys/unassign_survey',
                        data: {
                            record_id: record_id
                        },
                        success: function (response) {
                            if (response) {
                                tblsurveys.ajax.reload();
                            }
                        }
                    });
                }
            } else {
                return false;
            }
        });
        $(document).delegate(".unassign_survey_drawer_user", "click", function (event) {
            var c = confirm("Do you really want to unassign drawer user?");
            if (c) {
                var el = $(this);
                var record_id = $(this).attr('data-id');
                var record_type = $(this).attr('data-type');
                if (record_id) {
                    $.ajax({
                        type: 'POST',
                        url: baseUrl + 'backend/surveys/unassign_survey_drawer_user',
                        data: {
                            record_id: record_id
                        },
                        success: function (response) {
                            if (response) {
                                if(record_type == "drawing_surveys"){
                                    drawing_surveys.ajax.reload();
                                }else{
                                    tblsurveys.ajax.reload();
                                }
                            }
                        }
                    });
                }
            } else {
                return false;
            }
        });
        
        $(document).delegate(".unassign_checked_survey_drawer_user", "click", function (event) {
            var c = confirm("Do you really want to unassign drawer user for selected records?");
            if (c) {
                var el = $(this);
                var selectedSurveyIds = $('.selectedSurveyIds').val();
                if (selectedSurveyIds) {
                    $.ajax({
                        type: 'POST',
                        url: baseUrl + 'backend/surveys/unassign_checked_survey_drawer_user',
                        data: {
                            selectedSurveyIds: selectedSurveyIds
                        },
                        success: function (response) {
                            if (response) {
                                tblsurveys.ajax.reload();
                            }
                        }
                    });
                }
            } else {
                return false;
            }
        });

        $(document).delegate(".unassign_checked_survey", "click", function (event) {
            var c = confirm("Do you really want to unassign Survey user for selected records?");
            if (c) {
                var el = $(this);
                var selectedSurveyIds = $('.selectedSurveyIds').val();
                if (selectedSurveyIds) {
                    $.ajax({
                        type: 'POST',
                        url: baseUrl + 'backend/surveys/unassign_checked_survey',
                        data: {
                            selectedSurveyIds: selectedSurveyIds
                        },
                        success: function (response) {
                            if (response) {
                                tblsurveys.ajax.reload();
                            }
                        }
                    });
                }
            } else {
                return false;
            }
        });

        $(document).delegate("#frmSurveyDrawingStatusForm", "submit", function (e) {
            e.preventDefault();

            var project_id = $('#project_id').val();
            $.ajax({
                type: 'POST',
                url: baseUrl + 'backend/surveys/project/'+project_id,
                data: new FormData(this),
                dataType: 'json',
                contentType: false,
                cache: false,
                processData:false,
                success: function(result){
                    location.reload();
                }
            });
        });

        
        $(document).delegate(".upload_product_image", "click", function (event) {
            var el = $(this);
            var proid = $(this).attr('user-id');
            $.ajax({
                type: 'POST',
                url: baseUrl + 'backend/product/upload_product_image',
                data: {
                    proid: proid
                },
                success: function (response) {
                    // el.closest("tr").hide();   
                    $('.modal-body').html(response);

                }
            });
        });
        
        $("#upload_form").submit(function (event) {
            event.preventDefault();
            var formData = new FormData(this);
            $('#modalCenter').modal('toggle');
            $.ajax({
                url: baseUrl + 'backend/product/upload_product',
                type: 'post',
                dataType: 'application/json',
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: function (data) {
                    if ($data) {
                        $('#modalCenter').modal('toggle');
                        var table = $('.table-product').DataTable();
                        table.ajax.reload();
                    }
                },

            });
        });
        
        $(document).delegate(".delete_product_image", "click", function (event) {
            if (delete_confirmation()) {
                var el = $(this);
                var img = $(this).attr('data-id');
                $.ajax({
                    type: 'POST',
                    url: baseUrl + 'backend/product/delete_image',
                    data: {
                        img: img
                    },
                    success: function (response) {
                        if (response) {
                            el.closest(".imgdiv").remove();
                            return false;
                        }

                    }
                });
            }
        });

        initDataTable('.table-visiters', baseUrl + 'backend/admin/getListData', [], [], [0, 'dec']);

        initDataTable('.table-enquiry', baseUrl + 'backend/enquiry/getListData', [], [], [0, 'dec']);
        $(document).delegate(".deleteenquiry", "click", function (event) {
            if (delete_confirmation()) {
                var el = $(this);
                var id = $(this).attr('data-id');
                $.ajax({
                    type: 'POST',
                    url: baseUrl + 'backend/enquiry/delete',
                    data: {
                        id: id
                    },
                    success: function (response) {
                        if (response) {
                            el.closest("tr").hide();
                        }
                    }
                });
            }
        });


    });
})(jQuery, window, document);

function refresh_record_image_list(image_type, record_id){
    $.ajax({
        type: 'POST',
        url: baseUrl + 'backend/surveys/load_record_images/' + record_id,
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