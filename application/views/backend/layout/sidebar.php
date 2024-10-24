<?php
$cur_tab = $this->uri->segment(2) == '' ? '' : $this->uri->segment(2);
$curr_action = $this->uri->segment(3) == '' ? '' : $this->uri->segment(3);
$curr_id = $this->uri->segment(4) == '' ? '' : $this->uri->segment(4);
$site_logo = (isset($this->setting_data['site_logo']) && !empty($this->setting_data['site_logo'])) ?  base_url() . UPLOAD . $this->setting_data['site_logo'] : ADMIN_ASSETS_PATH . "img/logo.png";
$dashboardUrl = base_url('backend');

$loginUserdata = $this->login_user_data;
$profile_logo = (!empty($loginUserdata['picture'])) ? base_url(PICTURE . '/' . $loginUserdata['picture']) : $site_logo;

if (!empty($this->user_permission)) {
  $getUserPermission = $this->user_permission;
} else {
  $getUserPermission = $this->Service->getUserPermission($loginUserdata['user_role']);
}
$today = date('Y-m-d');
?>

<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
  <div class="app-brand pt-3">
    <a href="<?= $dashboardUrl; ?>" class="app-brand-link">
      <span class="app-brand-logo">
        <img class="round" src="<?php echo $site_logo ?>" alt="<?= SITE_TITLE ?> Logo" />
      </span>
    </a>
  </div>

  <ul class="menu-inner py-1">
    <li class="menu-header small text-uppercase"><span class="menu-header-text">MENU</span></li>
    <li class="<?php echo ($cur_tab == 'dashboard') ? 'active' : '' ?> menu-item <?= (check_permission('dashboard', 'can_view', $getUserPermission)) ? '' : 'd-none' ?> "> <a href="<?= base_url('backend/dashboard'); ?>" class="menu-link"> <i class="menu-icon tf-icons bx bx-home-circle"></i> <span class="menu-title">Dashboard</span> </a></li>
    <li class="<?php echo ($cur_tab == 'users') ? 'active' : '' ?> menu-item <?= (check_permission('users', 'can_view', $getUserPermission)) ? '' : 'd-none' ?> ">
      <a href="<?= base_url('backend/users'); ?>" class="menu-link"> <i class="menu-icon tf-icons fa fa-users"></i> <span class="menu-title">Users</span> </a>
    </li>

    <li class="menu-header small text-uppercase"><span class="menu-header-text">SETTING</span></li>
    <li class="menu-item <?php echo ($cur_tab == 'user_role') ? 'active' : '' ?> <?= (check_permission('user_role', 'can_view', $getUserPermission)) ? '' : 'd-none' ?>">
      <a href="<?php echo base_url('backend/user_role'); ?>" class="menu-link"> <i class="menu-icon tf-icons fa fa-user-tie"></i><span class="menu-title"> User Role </span> </a>
    </li>
    <?php
    if ($loginUserdata['user_role'] == 1) { ?>
      <li class="<?php echo ($cur_tab == 'system-setting') ? 'active' : '' ?> menu-item"><a href="<?= base_url('backend/system-setting'); ?>" class="menu-link"><i class="menu-icon fa-solid fa-gear"></i><span class="menu-title">Settings</span></a></li>
    <?php } ?>
    <li class="menu-item"><a href="<?= base_url('backend/logout'); ?>" class="menu-link"><i class="menu-icon bx bxs-log-out"></i><span class="menu-title">Logout</span></a></li>
  </ul>
</aside>