<?php
$favicon = (isset($this->setting_data['favicon']) && !empty($this->setting_data['favicon']))?  base_url().UPLOAD.$this->setting_data['favicon']:ADMIN_ASSETS_PATH."img/favicon.ico";
$site_logo = (isset($this->setting_data['site_logo']) && !empty($this->setting_data['site_logo']))?  base_url().UPLOAD.$this->setting_data['site_logo']:ADMIN_ASSETS_PATH."img/logo.png";
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
  <link rel="stylesheet" href="<?php echo ADMIN_ASSETS_PATH; ?>vendor/css/pages/page-auth.css">
  <link rel="stylesheet" type="text/css" href="<?php echo ADMIN_ASSETS_PATH; ?>css/custom-theme.css?v=<?= date("YmdH"); ?>">
  <!-- Helpers -->
  <script src="<?php echo ADMIN_ASSETS_PATH; ?>vendor/js/helpers.js"></script>
  <script src="<?php echo ADMIN_ASSETS_PATH; ?>js/config.js"></script>
  <!-- Custom notification for demo -->
</head>

<body>
<?php
$bg_imag_arr = array('logo.png','bg-img.svg', 'bg-img-2.svg');
?>
  <div class="authentication-wrapper authentication-cover">
    <div class="authentication-inner row m-0">
      <!-- /Left Text -->
      <div class="d-none d-lg-flex col-lg-7 col-xl-8 align-items-center">
        <div class="flex-row text-center mx-auto">
          <img src="<?php echo ADMIN_ASSETS_PATH; ?>img/<?= $bg_imag_arr[array_rand($bg_imag_arr)] ?>" alt="Login Bg image" width="100%" class="img-fluid authentication-cover-img" />
          <div class="mx-auto">
            <h3><?= SITE_TITLE ?></h3>
          </div>
        </div>
      </div>
      <!-- /Left Text -->

      <!-- Login -->
      <div class="d-flex col-12 col-lg-5 col-xl-4 align-items-center authentication-bg p-sm-5 p-4">
        <div class="w-px-400 mx-auto">
          <!-- Logo -->
          <div class="app-brand mb-4">
            <a href="<?= base_url('backend'); ?>" class="app-brand-link gap-2 mb-2">
              <span class="app-brand-logo">
                <img src="<?= $site_logo; ?>" width="100" />
              </span>
              <!-- <span class="app-brand-text demo h3 mb-0 fw-bold"><?= SITE_TITLE ?></span> -->
            </a>
          </div>
          <!-- /Logo -->
          <p class="mb-4">Please sign-in to your account and start the adventure</p>

          <?php echo form_open(base_url('backend/auth/login'), 'id="formAuthentication" class="mb-3"'); ?>
            <?php if (isset($msg) || validation_errors() !== '') : ?>
              <div class="alert alert-danger alert-dismissible">
                <!-- <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button> -->
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"> </button>
                <?= validation_errors(); ?>
                <?= isset($msg) ? $msg : ''; ?>
              </div>
            <?php endif; ?>
            <div class="mb-3">
              <label for="email" class="form-label">Email or Username</label>
              <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" autofocus required>
            </div>
            <div class="mb-3 form-password-toggle">
              <div class="d-flex justify-content-between">
                <label class="form-label" for="password">Password</label>
              </div>
              <div class="input-group input-group-merge">
                <input type="password" id="password" class="form-control" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" required />
                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
              </div>
            </div>
            <div class="mb-3">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="remember-me">
                <label class="form-check-label" for="remember-me">
                  Remember Me
                </label>
              </div>
            </div>
            <button class="btn btn-dark d-grid w-100" type="submit" name="btnsubmit" value="Sign in"> Sign in </button>
          <?php echo form_close(); ?>

        </div>
      </div>
      <!-- /Login -->
    </div>
  </div>
  <!-- / Content -->

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