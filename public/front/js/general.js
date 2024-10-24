var baseUrl = $('#base').val();

(function ($, window, document, undefined) {
    $(document).ready(function () {
        $('.panel .panel-h').click(function () {
            $(this).parents('li').children('.content').slideToggle();
            $(this).parents('li').toggleClass('active');
            $(this).parents('li').siblings('li').find('.content').slideUp();
            $(this).parents('li').siblings('li').removeClass('active')
        });
        $('.banner').on('init', function (event, slick) {
            $(".f_slide").removeClass("f_slide");
            $('.banner').css("visibility", "visible");
        });

        $('.banner').slick({
            autoplay: true,
            fade: true,
            arrows: false,
        });

        $('.service').click(function () {
            var id = $(this).attr('data-id');
            $('html,body').animate({ scrollTop: $("#" + id).offset().top }, 'slow');
        });

        $('.services').on('init', function (event, slick) {
            $('.services').css("visibility", "visible");
        });

        $('.services').slick({
            infinite: true,
            slidesToShow: 8,
            slidesToScroll: 8,
            arrows: false,
            dots: false,
            responsive: [{
                breakpoint: 1024,
                settings: {
                    autoplay: true,
                    slidesToShow: 6,
                    slidesToScroll: 6
                }
            },
            {
                breakpoint: 600,
                settings: {
                    autoplay: true,
                    slidesToShow: 3,
                    slidesToScroll: 3
                }
            }
            ]
        })

        $('.welcome-slider ul').on('init', function (event, slick) {
            $('.welcome-slider ul').css("visibility", "visible");
        });

        $('.welcome-slider ul').slick({
            infinite: true,
            autoplay: false,
            slidesToShow: 6,
            slidesToScroll: 3,
            arrows: true,
            dots: false,
            responsive: [{
                breakpoint: 1024,
                settings: {
                    infinite: true,
                    slidesToShow: 4,
                    slidesToScroll: 4,
                    infinite: true
                }
            },
            {
                breakpoint: 600,
                settings: {
                    infinite: true,
                    slidesToShow: 3,
                    slidesToScroll: 3
                }
            },
            {
                breakpoint: 480,
                settings: {
                    infinite: true,
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            }
            ]
        });

        $(".welcome-slider li:not(.view_all_link) img").hover(
            function () {
                $(".zoom-img img").attr('src', $(this).attr('src'));
                var obj = $(this)
                $(document).mousemove(function (event) {
                    /*var left = (obj.offset().left - 20);
                    var right = ($(window).width() - $(this).offset().left - 215);*/
                    div_width = $(window).width() / 2;
                    width = $(window).width();
                    if (width > 1440) {
                        left = event.clientX - $(".welcome-slider li:first").width() + 20 + 225; //255 for left margin
                        right = (div_width - event.clientX) + $(".zoom-img").width() + 90 + 225; //255 for right margin
                    } else if (width >= 1280 && width <= 1440) {
                        left = event.clientX + 100;
                        right = (width - event.clientX) + 100;
                    } else if (width >= 992 && width <= 1279) {
                        left = event.clientX + 50;
                        right = (width - event.clientX) + 100;
                    } else if (width >= 768 && width <= 991) {
                        left = event.clientX;
                        right = (width - event.clientX);
                    } else {
                        left = event.clientX;
                        right = (width - event.clientX);
                    }

                    var top = $(".welcome-slider li:first").height() + event.offsetX;
                    var tp = $(".welcome-slider li:first").offset().top - document.documentElement.scrollTop;

                    var height = $(".zoom-img").height() / 2 + event.offsetX;
                    if (tp <= 150) {
                        $(".zoom-img").css({
                            top: 0,
                            bottom: 'inherit'
                        });
                    } else if (($(window).height() - top) <= ($(".zoom-img").height() / 3)) {
                        $(".zoom-img").css({
                            bottom: 25,
                            top: 'inherit'
                        });
                    } else {
                        $(".zoom-img").css({
                            top: (tp - ($(".zoom-img").height() / 3)),
                            bottom: 'inherit'
                        });
                    }

                    if (event.clientX < (div_width)) {
                        $(".zoom-img").addClass('hover').css({
                            "left": left,
                            'right': 'inherit'
                        });
                    } else {
                        $(".zoom-img").addClass('hover').css({
                            "right": right,
                            'left': 'inherit'
                        });
                    }

                });
            },
            function () {
                $(document).unbind("mousemove");
                $(".zoom-img").removeClass('hover');
            },
        );

        $('.global-accrediations ul').on('init', function (event, slick) {
            $('.global-accrediations ul').css("visibility", "visible");
        });

        $('.global-accrediations ul').slick({
            infinite: true,
            autoplay: false,
            slidesToShow: 6,
            slidesToScroll: 6,
            arrows: false,
            dots: false,
            responsive: [{
                breakpoint: 1024,
                settings: {
                    slidesToShow: 4,
                    slidesToScroll: 4,
                    infinite: true
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            }
            ]
        });

        var p = $(".category-range li");
        for (i = 0; i < p.length; i++) {
            $(".category-range .links_ul_inner li:nth-child(" + (i + 1) + ")").css({
                "margin-left": (5 * i) + 'px'
            });
        }

        $('.heding-3').lettering('words');

        // hide #back-top first
        $("#back-top").hide();
    
        // fade in #back-top
        $(function() {
          $(window).scroll(function() {
            if ($(this).scrollTop() > 100) {
              $('#back-top').fadeIn();
            } else {
              $('#back-top').fadeOut();
            }
          });
    
          // scroll body to 0px on click
          $('#back-top a').click(function() {
            $('body,html').animate({
              scrollTop: 0
            }, 800);
            return false;
          });
        });
    
        //   Footer Heding click open deatil
        var width = $(window).width();
        if (width <= 767) {
          $(".f-click").on("click", function() {
            if ($(this).hasClass("active")) {
              $(this).removeClass("active");
              $(this).parents(".col-xs-12").find(".f-open").slideUp();
            } else {
              $(this).parents(".col-xs-12").find(".f-open").slideDown();
              $(this).addClass("active");
            }
            $(this).parents(".col-xs-12").siblings(".col-xs-12").find(".f-open").slideUp();
            $(this).parents(".col-xs-12").siblings(".col-xs-12").find(".f-click").removeClass("active");
          });
        }

        $('.closepopup').click(function() {
            $("#contactmodal").modal('hide');
        });

        var pathname = window.location.href;
    console.log(pathname);
    var curr_link = $(".nav a[href='" + pathname + "']");
    if (curr_link.length > 0) {
        $("a[href='" + pathname + "']").parents(".menu-item").addClass('active-nav');
    } else {
        if (pathname.indexOf("category") >= 0 || pathname.indexOf("product") >= 0) {
            $('.products-nav').addClass('active-nav');
        }
    }

    // mobile Menu
    $(".menu-icon").click(function() {
        $(".c-mask").addClass("open active");
        $(".nav").addClass("push-left");
    });

    // Mobile Sub Menu     
    $(".fa-caret-down").on("click", function() {
        if ($(this).parents('li').hasClass("active")) {
            $(this).parents('li').removeClass("active");
            $(this).parents('li').find(".sub-menu").slideUp();
        } else {
            $(this).parents('li').find(".sub-menu").slideDown();
            $(this).parents('li').addClass("active");
        }
        $(this).parents('li').siblings("li.menu-item").find(".sub-menu").slideUp();
        $(this).parents('li').siblings("li.menu-item").removeClass("active");
    });

    // $(".product_search").keyup(function(){
    //     var value = $(this).val();

    //     $.ajax({
    //         type: 'POST',
    //         url: baseUrl + 'home/searchproduct',
    //         data: {
    //             value: value,
    //         },
    //         success: function(result) {
    //             // var data = jQuery.parseJSON(result);
    //             // $('#').html(data);
    //         }
    //     });
    // });

    $(document).delegate(".txtsearch", "keyup", function(event) {
        var value = $(this).val();

        if(value.length != 0 &&  value.length != ''){
            $.ajax({
                type: 'POST',
                url: baseUrl + 'home/searchproduct',
                data: {
                    value: value,
                },
                success: function(result) {
                    var data = jQuery.parseJSON(result);
                    $('.search_data').html(data);
                }
            });
        }else{
            $('.search_data').html('');
        }
     
    });

	$('.magnifi-image-popup').magnificPopup({
		type: 'image',
		closeOnContentClick: true,
		mainClass: 'mfp-img-mobile',
		  gallery: {
                enabled: true,
                navigateByImgClick: true,
                preload: [0,1] 
            }
	});

    $(document).delegate(".gallery_filter", "change", function (event) {
        var id = $(this).val();
        
        $.ajax({
            type: 'POST',
            url: baseUrl + 'home/gallery_filter',
            data: {
                id: id,
            },
            success: function(result) {
                var data = jQuery.parseJSON(result);
                console.log(data);
                $('.g_img_box_wrap').html(data);
            }
        });
    });


    // Mobile Search
    $('.m-search').on('click', function() {
        if ($(this).hasClass("active")) {
            $(this).removeClass("active");
            $('.header .float-right').hide();
        } else {
            $(this).addClass("active");
            $('.header .float-right').show();
            $(".c-mask").addClass("open");
        }
    });
    $('.search-back').on('click', function() {
        $(this).removeClass("active");
        $('.m-search').removeClass("active");
        $(".c-mask").removeClass("open active");
        $('.header .float-right').hide();
    });

    //  Header Search
    $(".search").autocomplete({
        minLength: 3,
        source: 'https://wellonapharma.com/product-search.php?time=1',
        focus: function(event, ui) {
            $(".search").val(ui.item.name);
            event.preventDefault();
        },
        select: function(event, ui) {
            $(".search").val(ui.item.name);
            if (event.which == 13) {
                window.location.replace('https://wellonapharma.com/product/' + $.trim(ui.item.type) + '/' + ui.item.url);
            }
        }
    }).autocomplete("instance")._renderItemData = function(ul, item) {
        var url = 'https://wellonapharma.com/product/' + $.trim(item.type) + '/' + item.url;
        return $("<li class='search-item'>").data("ui-autocomplete-item", item).append("<a href='" + url + "'>" + item.name + ' - ' + item.type + "</a>").appendTo(ul);
    };

    /*$(".search").keydown(function(e) {
     if (e.keyCode === 13) 
     {
     console.log($('.search-item').filter(':focus').text());
     }
     });*/

    $('.request-callback').on('click', function() {
        $("#contactmodal").modal('show');
    });

    $('.get-quote').on('click', function() {
        $("#quote").modal('show');
    });

    
    if ($(window).width() >= 844) {
        var $this = $('html[current_page="product"] .category ul');
        if ($this.find('li').length > 2) {
          $('html[current_page="product"] .category ul').append('<div><a class="showMore" href="javascript:void(0)"></a></div>');
        }
        $('html[current_page="product"] .category ul li').slice(0, 12).addClass('shown');
        $('html[current_page="product"] .category ul li').not('.shown').hide();
        $('html[current_page="product"] .category ul .showMore').on('click', function () {
          $('html[current_page="product"] .category ul li').not('.shown').toggle(800);
          $(this).toggleClass('showLess');
        });
      }

    });
})(jQuery, window, document);


var exit_popup = $.cookie('exit_popup');
if (exit_popup == "" || exit_popup == null || exit_popup == undefined) {

    var _ouibounce = ouibounce(document.getElementById('ouibounce-modal'), {
        aggressive: true,
        timer: 0,
        callback: function() {
            $("#ouibounce-modal").modal('show');
            $.cookie('exit_popup', 1, {
                expires: 1
            });
        }
    });
}


// $('.btn-submit').on('click', function() {
//     var frm = $(this).parents('form');
//     frm.find('.form-control').removeClass('error-field');
//     var txtname = frm.find('.txtname').val();
//     var txtemail = frm.find('.txtemail').val();
//     var txtphone = frm.find('.txtphone').val();
//     var txtcountry = frm.find('.txtcountry').val();
//     var txtmessage = frm.find('.txtmessage').val();
//     var form_type = frm.find('.form_type').val();
//     var email_regex = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
//     var phone_regex = /^[0-9-+]+$/;
//     var error = [];
//     if (txtname == '') {
//         error.push('txtname');
//     }
//     if (txtemail == '') {
//         error.push('txtemail');
//     } else if (!email_regex.test(txtemail)) {
//         error.push('txtemail');
//     }
//     if (txtcountry == '') {
//         error.push('txtcountry');
//     }
//     if (txtmessage == '') {
//         error.push('txtmessage');
//     }
//     if (error.length) {
//         $.each(error, function(i, value) {
//             $('.' + value).addClass('error-field');
//         });

//         frm.find('.form-control').change(function() {
//             if ($(this).hasClass('error-field')) {
//                 $(this).removeClass('error-field');
//             }
//         });

//         frm.find('.' + error[0]).focus();
//         return false;
//     }
//     var btn = $(this);
//     $.ajax({
//         url: 'https://wellonapharma.com/formdata.php',
//         type: 'POST',
//         dataType: 'json',
//         data: {
//             action: 'add',
//             name: txtname,
//             title: '',
//             email: txtemail,
//             phone: txtphone,
//             country: txtcountry,
//             message: txtmessage,
//             form_type: form_type,
//             type: '',
//             product_id: ''
//         },
//         beforeSend: function() {
//             btn.addClass('disabled');
//         },
//         success: function(data) {

//             if (data['success'] == 'success') {
//                 btn.parent('.inquiry-form')[0].reset();
//                 $('.alert-success').removeClass('hide');
//                 setTimeout(function() {
//                     $('.alert-success').addClass('hide');
//                     $('#contactmodal').modal("hide");
//                 }, 2000);
//             } else {
//                 frm.find('.form-error').text(data['error']);
//             }
//             btn.removeClass('disabled');
//         }
//     });
// });

 
$(window).load(function() {
    /* var contactpopup = $.cookie('WL_contactpopup');
     var width = $(window).width(); console.log(width);
        if(contactpopup == null && width > 767){
            setTimeout(function () {
             $("#contactmodal").modal('show');   
             $.cookie('WL_contactpopup', 1, { expires: 30 });   
            }, 3000);                                                
        }else{
           $("#contactmodal").modal('hide');                  
        }*/

   
})

function closeNav() {
    $(".c-mask").removeClass("open active");
    $(".nav").removeClass("push-left");
    if ($('.m-search').hasClass("active")) {
        $('.m-search').removeClass("active");
        $('.header .float-right').hide();
    }
}