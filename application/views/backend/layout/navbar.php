<?php
$site_logo = (isset($this->setting_data['site_logo']) && !empty($this->setting_data['site_logo'])) ?  base_url() . UPLOAD . $this->setting_data['site_logo'] : ADMIN_ASSETS_PATH . "img/navbarLogo.png";
$favicon_logo = (isset($this->setting_data['favicon']) && !empty($this->setting_data['favicon'])) ?  base_url() . UPLOAD . $this->setting_data['favicon'] : ADMIN_ASSETS_PATH . "img/favicon.png";

$profileUrl = base_url();
$loginUsername = $this->session->userdata('name');
if ($this->session->has_userdata('is_user_login')) {
  $profileUrl = base_url('profile');
  $loginUsername = $this->session->userdata('login_username');
}
$cur_tab = $this->uri->segment(2) == '' ? '' : $this->uri->segment(2);
$curr_action = $this->uri->segment(3) == '' ? '' : $this->uri->segment(3);
$curr_id = $this->uri->segment(4) == '' ? '' : $this->uri->segment(4);
$user_type = ($this->session->has_userdata('user_type')) ? $this->session->userdata('user_type') : "";
?>
<style>
  .bg-menu-theme.menu-horizontal .menu-sub>.menu-item.active>.menu-link:not(.menu-toggle) {
    background-color: #d6272b !important;
  }

  .bg-menu-theme.menu-horizontal .menu-inner>.menu-item.active>.menu-link {
    background-color: #d6272b !important;
    color: #fff;
  }

  /* .bg-menu-theme .menu-inner .menu-item.open>.menu-link:hover, .bg-menu-theme .menu-inner .menu-item:not(.active) .menu-link:hover { 
    color: #fff !important;
  } */
  .menu-sub>.menu-item:not(.active)>.menu-link:hover {
    color: #fff !important;
  }

  .menu-sub>.menu-item:not(.active)>.menu-link {
    color: #000000 !important;
  }
</style>
<nav class="layout-navbar navbar navbar-expand-xl align-items-center bg-navbar-theme" id="layout-navbar">
  <div class="container-xxl">

    <div class="navbar-brand app-brand demo d-none d-xl-flex py-0 me-4">
      <!-- <a href="<?php echo base_url() ?>" class="app-brand-link gap-2">
        <span class="app-brand-logo demo">
          <img class="round" src="<?php echo $site_logo ?>" alt="<?= SITE_TITLE ?> Logo" />
        </span>
      </a> -->
      <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-xl-none">
        <i class="bx bx-x bx-sm align-middle"></i>
      </a>
    </div>

    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0  d-xl-none ">
      <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
        <i class="bx bx-menu bx-sm"></i>
      </a>
    </div>
    <div class="">
      <a href="<?php echo base_url() ?>" class="app-brand-link gap-2">
        <span class="app-brand-logo demo">
          <img class="round" src="<?php echo $site_logo ?>" alt="<?= SITE_TITLE ?> Logo" />
        </span>
      </a>
      <?php
      $get_broadcast = isset($this->broadcast_data['message']) ? $this->broadcast_data['message'] : '';
      if (!empty($get_broadcast)) {
      ?>
        <div class="loopdiv">
          <marquee class="marq"
            direction="left" loop="">
            <div class="looping-text"> <?= $get_broadcast; ?> </div>
          </marquee>
        </div>
      <?php } ?>
    </div>

    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">

      <ul class="navbar-nav flex-row align-items-center ms-auto">
        <li> <strong class="user-name">admin</strong></li>
        <li class="nav-item navbar-dropdown dropdown-user dropdown">
          <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
            <div class="avatar avatar-online">
              <img src="<?= $favicon_logo ?>" alt class="rounded-circle">
            </div>
          </a>
          <ul class="dropdown-menu dropdown-menu-end">
            <li>
              <a class="dropdown-item" href="#">
                <div class="d-flex">
                  <div class="flex-shrink-0 me-3">
                    <div class="avatar avatar-online">
                      <img src="<?= $favicon_logo ?>" alt class="rounded-circle">
                    </div>
                  </div>
                  <div class="flex-grow-1">
                    <span class="fw-semibold d-block lh-1">admin</span>
                  </div>
                </div>
              </a>
            </li>
              <li>
                <a class="dropdown-item" href="<?php echo base_url('user/change_login_password'); ?>">
                  <i class="bx bx-user me-2"></i>
                  <span class="align-middle">Change Password</span>
                </a>
              </li>
              <li>
                <div class="dropdown-divider"></div>
              </li>
              <li>
                <a class="dropdown-item" href="<?php echo base_url('logout'); ?>">
                  <i class="bx bx-power-off me-2"></i>
                  <span class="align-middle">Log Out</span>
                </a>
              </li>
          </ul>
        </li>
        <!--/ User -->
      </ul>

    </div>
  </div>
</nav>

<div class="layout-page">
  <div class="content-wrapper">
    <div class="modal-alert-message" style="z-index: 11;"></div>
    <div class="alert-message" style="z-index: 11;"></div>
    <aside id="layout-menu" class="layout-menu-horizontal menu-horizontal menu bg-menu-theme flex-grow-0">
      <div class="container-xxl d-flex h-100">


        <ul class="menu-inner py-1">
          <li class="<?php echo ($cur_tab == 'dashboard') ? 'active' : '' ?> menu-item"> <a href="<?= base_url('backend/dashboard'); ?>" class="menu-link"> <i class="menu-icon tf-icons bx bx-home-circle"></i> <span class="menu-title" data-i18n="Dashboard">Dashboard</span></a></li>
          <li class="<?php echo ($cur_tab == 'category' || $cur_tab == 'product' || $cur_tab == 'product_type') ? 'active' : '' ?> menu-item">
            <a href="javascript:void(0)" class="menu-link menu-toggle">
              <i class="menu-icon tf-icons fa fa-users"></i>
              <div data-i18n="Product">Product</div>
            </a>
            <ul class="menu-sub" style="background: #fff">
              <li class="<?php echo ($cur_tab == 'category') ? 'active' : '' ?> menu-item">
                <a href="<?= base_url('backend/category'); ?>" class="menu-link">
                  <div data-i18n="Category">Category</div>
                </a>
              </li>
              <li class="<?php echo ($cur_tab == 'product') ? 'active' : '' ?> menu-item">
                <a href="<?= base_url('backend/product_type'); ?>" class="menu-link">
                  <div data-i18n="Product Type">Product Type</div>
                </a>
              </li>
              <li class="<?php echo ($cur_tab == 'product_type') ? 'active' : '' ?> menu-item">
                <a href="<?= base_url('backend/product'); ?>" class="menu-link">
                  <div data-i18n="Product">Product</div>
                </a>
              </li>
            </ul>
          </li>

          <li class="<?php echo ($cur_tab == 'enquiry') ? 'active' : '' ?> menu-item"> <a href="<?= base_url('backend/enquiry'); ?>" class="menu-link"> <i class="menu-icon tf-icons fa-solid fa-e"></i> <span class="menu-title" data-i18n="Enquiry">Enquiry</span></a></li>
          <li class="<?php echo ($cur_tab == 'contact') ? 'active' : '' ?> menu-item"> <a href="<?= base_url('backend/contact'); ?>" class="menu-link"> <i class="menu-icon tf-icons fab fa-c"></i> <span class="menu-title" data-i18n="Contact-us">Contact-us</span></a></li>

          <li class="<?php echo ($cur_tab == 'blog') ? 'active' : '' ?> menu-item"> <a href="<?= base_url('backend/blog'); ?>" class="menu-link"> <i class="menu-icon tf-icons fas fa-blog"></i> <span class="menu-title" data-i18n="Blog">Blog</span></a></li>

          <li class="<?php echo ($cur_tab == 'users') ? 'active' : '' ?> menu-item"> <a href="<?= base_url('backend/users'); ?>" class="menu-link"> <i class="menu-icon tf-icons fa fa-users"></i> <span class="menu-title" data-i18n="Users">Users</span></a></li>
          <!-- <li class="<?php echo ($cur_tab == 'user_role') ? 'active' : '' ?> menu-item"> <a href="<?= base_url('backend/user_role'); ?>" class="menu-link"> <i class="menu-icon tf-icons fa fa-user-tie"></i> <span class="menu-title" data-i18n="User Role">User Role</span></a></li> -->
          <li class="<?php echo ($cur_tab == 'system-setting') ? 'active' : '' ?> menu-item"> <a href="<?= base_url('backend/system-setting'); ?>" class="menu-link"> <i class="menu-icon tf-icons fa-solid fa-gear"></i> <span class="menu-title" data-i18n="Settings">Settings</span></a></li>
          <li class="<?php echo ($cur_tab == 'logout') ? 'active' : '' ?> menu-item"> <a href="<?= base_url('backend/logout'); ?>" class="menu-link"> <i class="menu-icon tf-icons bx bxs-log-out"></i> <span class="menu-title" data-i18n="Logout">Logout</span></a></li>

          
        </ul>
      </div>
    </aside>

    <!-- <div class="container-xxl flex-grow-1 container-p-y position-relative">
      <?php if (!empty($user_type)) {  ?>
        <h5 class="py-3 breadcrumb-wrapper mb-3">
          <span class=" fw-light"> <a href="<?= base_url('dashboard'); ?>"> Home </a> | </span>
          <?php if (!empty($curr_action)) {  ?>
            <?php echo isset($navback) ? '<a href="' . base_url($navback) . '" class="text-info"> ' . $navbackName . ' </a> > ' : ''; ?>
            <?php if (isset($back_url) && !empty($back_url)) { ?>
              <a href="<?= base_url($back_url) ?>" class="text-info"><?= $back_title; ?></a> >
            <?php } ?>
            <?php if (isset($back_url2) && !empty($back_url2)) { ?>
              <a href="<?= base_url($back_url2) ?>" class="text-info"><?= $back_title2; ?></a> >
            <?php } ?>
            <?php echo isset($menu) ? $menu : 'Dashboard'; ?>
          <?php } else { ?>
            <?php echo isset($menu) ? $menu : 'Dashboard'; ?>
          <?php  } ?>
        </h5>
      <?php } else {
      } ?>
      <?php $this->load->view('flash_messages'); ?> -->

      <div class="container-xxl flex-grow-1 container-p-y position-relative">
        <h5 class="py-3 breadcrumb-wrapper mt-5 mb-2">
          <span class=" fw-light"> <a href="#"> Home </a> | </span> <?php echo isset($menu) ? $menu : ''; ?>
        </h5>