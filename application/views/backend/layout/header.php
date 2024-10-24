<!DOCTYPE html>
<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed " dir="ltr" data-theme="theme-default"   data-template="vertical-menu-template">
<?php
    $favicon = (isset($this->setting_data['favicon']) && !empty($this->setting_data['favicon']))?  base_url().UPLOAD.$this->setting_data['favicon']:ADMIN_ASSETS_PATH."img/favicon.png";
?>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <title><?=(isset($title)) ? $title . ' | ' . SITE_TITLE : SITE_TITLE;?></title>
    <!-- Canonical SEO -->
    <link rel="canonical" href="<?= base_url() ?>" >

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="<?php echo $favicon; ?>" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&amp;family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&amp;display=swap" rel="stylesheet">
    <!-- Icons -->
    <script src="<?php echo ADMIN_ASSETS_PATH; ?>vendor/libs/jquery/jquery.js"></script>

    <link rel="stylesheet" href="<?php echo ADMIN_ASSETS_PATH; ?>vendor/fonts/boxicons.css" />
    <link rel="stylesheet" href="<?php echo ADMIN_ASSETS_PATH; ?>vendor/fonts/fontawesome.css" />
    <link rel="stylesheet" href="<?php echo ADMIN_ASSETS_PATH; ?>vendor/fonts/flag-icons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="<?php echo ADMIN_ASSETS_PATH; ?>vendor/css/rtl/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="<?php echo ADMIN_ASSETS_PATH; ?>vendor/css/rtl/theme-semi-dark.css" class="template-customizer-theme-css" type="text/css" >
    <link rel="stylesheet" href="<?php echo ADMIN_ASSETS_PATH; ?>css/demo.css" />

    <link rel="stylesheet" type="text/css" href="<?php echo ADMIN_ASSETS_PATH ?>vendors/css/pickers/pickadate/pickadate.css">
    <link rel="stylesheet" type="text/css" href="<?php echo ADMIN_ASSETS_PATH ?>vendors/css/pickers/daterange/daterangepicker.css">
    <link rel="stylesheet" href="<?php echo ADMIN_ASSETS_PATH ?>vendor/libs/bootstrap-datepicker/bootstrap-datepicker.css" />
    
    <!-- responsive datatable -->
    <link rel="stylesheet" href="<?php echo ADMIN_ASSETS_PATH; ?>vendor/libs/datatables-bs5/datatables.bootstrap5.css">
    <link rel="stylesheet" href="<?php echo ADMIN_ASSETS_PATH; ?>vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css">
    <!--end  responsive datatable -->

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="<?php echo ADMIN_ASSETS_PATH; ?>vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="<?php echo ADMIN_ASSETS_PATH; ?>vendor/libs/typeahead-js/typeahead.css" />
    <link rel="stylesheet" href="<?php echo ADMIN_ASSETS_PATH; ?>vendor/libs/select2/select2.css" />

    <link rel="stylesheet" href="<?php echo ADMIN_ASSETS_PATH; ?>vendor/libs/formvalidation/dist/css/formValidation.min.css" />

    <link rel="stylesheet" href="<?php echo ADMIN_ASSETS_PATH ?>plugins/html5-editor/bootstrap-wysihtml5.css" />

    <link rel="stylesheet" href="<?php echo ADMIN_ASSETS_PATH ?>vendor/dropzone/dropzone.css" />


    <!-- Helpers -->
    <script src="<?php echo ADMIN_ASSETS_PATH; ?>vendor/js/helpers.js"></script>
    <script src="<?php echo ADMIN_ASSETS_PATH; ?>js/config.js"></script>
    

    <link rel="stylesheet" type="text/css" href="<?php echo ADMIN_ASSETS_PATH; ?>css/custom-theme.css?v=<?= date("YmdH"); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo ADMIN_ASSETS_PATH; ?>css/custom.css?v=<?= date("YmdH"); ?>">
</head>

<body>
<input type="hidden" id="base" value="<?=base_url(); ?>" />
<!-- Layout wrapper -->
<div class="layout-wrapper layout-navbar-full layout-horizontal layout-without-menu  ">
<div class="layout-container">
<div class="pageloading" style="display: none;">Loading&#8230;</div>
<div class="main-loader" id="loader" style="display: none;">
    <div class="lds-roller"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>
</div>