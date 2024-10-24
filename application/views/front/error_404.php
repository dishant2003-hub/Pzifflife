<?php
$favicon = (isset($this->setting_data['favicon']) && !empty($this->setting_data['favicon'])) ?  base_url() . UPLOAD . $this->setting_data['favicon'] : ADMIN_ASSETS_PATH . "img/favicon.ico";
$site_logo = (isset($this->setting_data['site_logo']) && !empty($this->setting_data['site_logo'])) ?  base_url() . UPLOAD . $this->setting_data['site_logo'] : ADMIN_ASSETS_PATH . "img/logo.png";
?>
<!DOCTYPE html>
<html lang="en" class="light-style  customizer-hide" dir="ltr" data-theme="theme-default" data-assets-path="../../assets/" data-template="vertical-menu-template">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

  <title><?= (isset($title)) ? $title . ' | ' . SITE_TITLE : SITE_TITLE; ?></title>
  <link rel="icon" type="image/x-icon" href="<?php echo $favicon; ?>" />
  <meta name="description" content="" />
  <meta name="keywords" content="">
  <!-- Canonical SEO -->
  <!-- <link rel="canonical" href="<?= base_url() ?>"> -->

  <!-- Favicon -->
  <!-- <link rel="icon" type="image/x-icon" href="" /> -->
  <link rel="manifest" href="manifest.json">

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com/">
  <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&amp;family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&amp;display=swap" rel="stylesheet">

  <!-- Icons -->
  <link rel="stylesheet" href="<?php echo ADMIN_ASSETS_PATH; ?>vendor/fonts/boxicons.css" />
  <link rel="stylesheet" href="<?php echo ADMIN_ASSETS_PATH; ?>vendor/fonts/fontawesome.css" />
  <link rel="stylesheet" href="<?php echo ADMIN_ASSETS_PATH; ?>vendor/fonts/flag-icons.css" />

  <!-- Core CSS -->
  <link rel="stylesheet" href="<?php echo ADMIN_ASSETS_PATH; ?>vendor/css/rtl/core.css" class="template-customizer-core-css" />
  <!-- <link rel="stylesheet" href="<?php echo ADMIN_ASSETS_PATH; ?>vendor/css/rtl/theme-default.css" class="template-customizer-theme-css" /> -->
  <link rel="stylesheet" href="<?php echo ADMIN_ASSETS_PATH; ?>vendor/css/rtl/theme-semi-dark.css" class="template-customizer-theme-css">

  <link rel="stylesheet" href="<?php echo ADMIN_ASSETS_PATH; ?>css/demo.css" />

  <!-- Vendors CSS -->
  <link rel="stylesheet" href="<?php echo ADMIN_ASSETS_PATH; ?>vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
  <link rel="stylesheet" href="<?php echo ADMIN_ASSETS_PATH; ?>vendor/libs/typeahead-js/typeahead.css" />
  <!-- Vendor -->
  <link rel="stylesheet" href="<?php echo ADMIN_ASSETS_PATH; ?>vendor/libs/formvalidation/dist/css/formValidation.min.css" />

  <!-- Page CSS -->
  <!-- Page -->
  <link rel="stylesheet" href="<?php echo ADMIN_ASSETS_PATH; ?>vendor/css/pages/page-misc.css">
  <link rel="stylesheet" type="text/css" href="<?php echo ADMIN_ASSETS_PATH; ?>css/custom-theme.css?v=<?= date("YmdH"); ?>">
  <!-- Helpers -->
  <script src="<?php echo ADMIN_ASSETS_PATH; ?>vendor/js/helpers.js"></script>
  <script src="<?php echo ADMIN_ASSETS_PATH; ?>js/config.js"></script>
  <!-- Custom notification for demo -->
</head>

<body>
  <div class="container-xxl container-p-y">
    <div class="misc-wrapper">
      <h1 class="mb-2 mx-2">Page Not Found :(</h1>
      <p class="mb-4 mx-2">We couldn't find the page you are looking for</p>
      <a href="<?= base_url() ?>" class="btn btn-danger">Back to home</a>
      <div class="mt-3">
        <img src="<?php echo ADMIN_ASSETS_PATH; ?>img/illustrations/page-misc-error-light.png" alt="page-misc-error-light" width="500" class="img-fluid" data-app-light-img="illustrations/page-misc-error-light.png" data-app-dark-img="illustrations/page-misc-error-dark.png">
      </div>
    </div>
  </div>

  <!-- Core JS -->
  <!-- build:js assets/vendor/js/core.js -->
  <script src="<?php echo ADMIN_ASSETS_PATH; ?>vendor/libs/jquery/jquery.js"></script>
  <script src="<?php echo ADMIN_ASSETS_PATH; ?>vendor/libs/popper/popper.js"></script>
  <script src="<?php echo ADMIN_ASSETS_PATH; ?>vendor/js/bootstrap.js"></script>
  <script src="<?php echo ADMIN_ASSETS_PATH; ?>vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
  <script src="<?php echo ADMIN_ASSETS_PATH; ?>vendor/libs/hammer/hammer.js"></script>
  <script src="<?php echo ADMIN_ASSETS_PATH; ?>vendor/libs/i18n/i18n.js"></script>
  <script src="<?php echo ADMIN_ASSETS_PATH; ?>vendor/libs/typeahead-js/typeahead.js"></script>
  <script src="<?php echo ADMIN_ASSETS_PATH; ?>vendor/js/menu.js"></script>
  <!-- endbuild -->

  <!-- Vendors JS -->
  <script src="<?php echo ADMIN_ASSETS_PATH; ?>vendor/libs/formvalidation/dist/js/FormValidation.min.js"></script>
  <script src="<?php echo ADMIN_ASSETS_PATH; ?>vendor/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js"></script>
  <script src="<?php echo ADMIN_ASSETS_PATH; ?>vendor/libs/formvalidation/dist/js/plugins/AutoFocus.min.js"></script>

  <!-- Main JS -->
  <script src="<?php echo ADMIN_ASSETS_PATH; ?>js/main.js"></script>

  <!-- Page JS -->
  <script src="<?php echo ADMIN_ASSETS_PATH; ?>js/pages-auth.js"></script>
</body>

</html>