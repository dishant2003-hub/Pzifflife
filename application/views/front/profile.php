

 
<style>
  table.dataTable td:nth-child(1) td{
        width: 60px;
    }
    table.dataTable td:nth-child(2) td{
        width: 20px;
    }
</style>
<?php
$userPic = (!empty($rowData['picture'])) ? base_url(PICTURE . '/' . $rowData['picture']) : ADMIN_ASSETS_PATH . "img/avatars/9.png";
$username = (isset($rowData['user_fullname'])) ? $rowData['user_fullname'] : "";
$curr_tab = (isset($_GET['tab'])) ? $this->input->get('tab') : "";
if($curr_tab=='statistics'){ ?>
    <link rel="stylesheet" href="<?php echo $this->config->item('admin_assets'); ?>vendor/libs/bootstrap-daterangepicker/bootstrap-daterangepicker.css" />
    <link rel="stylesheet" href="<?php echo $this->config->item('admin_assets'); ?>vendor/libs/pickr/pickr-themes.css" />
    <script src="<?php echo $this->config->item('admin_assets'); ?>vendor/libs/moment/moment.js"></script>
    <script src="<?php echo $this->config->item('admin_assets'); ?>vendor/libs/bootstrap-daterangepicker/bootstrap-daterangepicker.js"></script>
    <script src="<?php echo $this->config->item('admin_assets'); ?>vendor/libs/pickr/pickr.js"></script>
<?php } ?>

<?php
if(isset($_GET['msg']) && $_GET['msg']=='new_user'){
    $error_msg = 'Please update your profile picture, password & birthday!'; ?>
    <div class="alert alert-danger alert-dismissible">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        <strong><?= $error_msg; ?></strong>
    </div>
<?php } ?>

<div class="row gy-4">
    <!-- User Sidebar -->
    <div class="col-xl-4 col-lg-5 col-md-5 order-1 order-md-0">
        <!-- User Card -->
        <div class="card mb-4">
            <div class="card-body">
                <div class="user-avatar-section">
                    <div class=" d-flex align-items-center flex-column">
                        <img class="img-fluid rounded my-4" src="<?php echo $userPic; ?>" height="110" width="110" alt="<?= $username ?>" />
                        <div class="user-info text-center">
                            <h5 class="mb-2"><?= $username ?></h5>
                            <span class="badge bg-label-secondary"><?= (isset($rowData['user_role_name'])) ? $rowData['user_role_name'] : "" ?></span>
                        </div>
                    </div>
                </div>
                <h5 class="pb-2 border-bottom mb-4">Details</h5>
                <div class="info-container">
                    <ul class="list-unstyled">
                        <li class="mb-3">
                            <span class="fw-bold me-2">Name:</span>
                            <span><?= $username ?></span>
                        </li>
                        <li class="mb-3">
                            <span class="fw-bold me-2">Email:</span>
                            <span><?= (isset($rowData['email'])) ? $rowData['email'] : "" ?></span>
                        </li>
                        <li class="mb-3">
                            <span class="fw-bold me-2">Status:</span>
                            <?php
                            if (isset($rowData['is_active']) && $rowData['is_active'] == 1) { ?>
                                <span class="badge bg-label-success">ACTIVE</span>
                            <?php } else { ?>
                                <span class="badge bg-label-danger">INACTIVE</span>
                            <?php } ?>
                        </li>
                        <li class="mb-3">
                            <span class="fw-bold me-2">Role:</span>
                            <span><?= (isset($rowData['user_role_name'])) ? $rowData['user_role_name'] : "" ?></span>
                        </li>
                        <li class="mb-3">
                            <span class="fw-bold me-2">DOB:</span>
                            <span><?= (isset($rowData['dob'])) ? $rowData['dob'] : "" ?></span>
                        </li>
                        <li class="mb-3">
                            <span class="fw-bold me-2">Contact:</span>
                            <span><?= (isset($rowData['mobile'])) ? DEFAULT_COUNTY_CODE.' ' . $rowData['mobile'] : "" ?></span>
                        </li>
                        <li class="mb-3">
                            <span class="fw-bold me-2">Zipcode:</span>
                            <span><?= (isset($rowData['pincode'])) ? $rowData['pincode'] : "" ?></span>
                        </li>
                        <li class="mb-3">
                            <span class="fw-bold me-2">City:</span>
                            <span><?= (isset($rowData['city'])) ? $rowData['city'] : "" ?></span>
                        </li>
                        <li class="mb-3">
                            <span class="fw-bold me-2">Address:</span>
                            <span><?= (isset($rowData['address'])) ? $rowData['address'] : "" ?></span>
                        </li>
                    </ul>
                    <div class="d-flex justify-content-center pt-3">
                        <a href="<?= base_url('profile?tab=edit') ?>" class="btn btn-danger me-3">Edit</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- /User Card -->
    </div>
    <!--/ User Sidebar -->

    <!-- User Content -->
    <div class="col-xl-8 col-lg-7 col-md-7 order-0 order-md-1">
        <!-- User Pills -->
        <?php /*
        <ul class="nav nav-pills flex-column flex-md-row mb-3">
            <li class="nav-item"><a class="nav-link <?= ($curr_tab == 'statistics') ? 'active bg-dark' : '' ?>" href="<?= base_url('profile?tab=statistics') ?>">Statistics</a></li>
        </ul>
        */ ?>
        <!--/ User Pills -->

        <?php
        if ($curr_tab == 'edit') { ?>
            <div class="card">
                <div class="card-body">
                    <span id="msg"></span>
                    <form id="userForm" method="POST" class="needs-validation" novalidate enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-lg-12">
                                <h5>User Detail </h5>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group row mb-2">
                                            <label for="password" class="control-label">Password</label>
                                            <div class="form-group">
                                                <input type="password" class="form-control " name="password" id="password" placeholder="Enter password" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group row mb-2">
                                            <label for="dob" class="control-label">DOB</label>
                                            <div class="form-group">
                                                <input type="date" class="form-control" name="dob" id="dob" value="<?=isset($rowData['dob']) ? $rowData['dob'] : '';?>" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group row mb-2">
                                            <label for="pincode" class="control-label">Zipcode</label>
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="pincode" id="pincode" placeholder="Enter Zipcode" value="<?=isset($rowData['pincode']) ? $rowData['pincode'] : '';?>" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group row mb-2">
                                            <label for="city" class="control-label">City</label>
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="city" id="city" placeholder="Enter City" value="<?=isset($rowData['city']) ? $rowData['city'] : '';?>" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group row mb-2">
                                            <label for="address" class="control-label">Address</label>
                                            <div class="form-group">
                                                <textarea type="text" class="form-control" name="address" id="address" placeholder="Enter Address" ><?= isset($rowData['address']) ? $rowData['address'] : ''; ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <?php /*
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group row mb-2">
                                            <label for="name" class="control-label">Name</label>
                                            <div class="form-group">
                                                <input type="text" name="name" class="form-control" id="name" placeholder="Enter Name"  value="<?=isset($rowData['name']) ? $rowData['name'] : '';?>" required>
                                                <div class="invalid-feedback"> Please enter your name. </div>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-2">
                                            <label for="name" class="control-label">Last Name</label>
                                            <div class="form-group">
                                                <input type="text" name="last_name" class="form-control" id="last_name" placeholder="Enter Last Name"  value="<?=isset($rowData['last_name']) ? $rowData['last_name'] : '';?>" required>
                                                <div class="invalid-feedback"> Please enter your Last name. </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group pb-2">
                                            <label for="picture" class="control-label">Picture</label>
                                            <input type="file" id="picture" name="picture" class="form-control dropify" data-default-file="" />
                                            <img class="p-2" src="<?= !empty($rowData['picture']) ? base_url(PICTURE . $rowData['picture']):''; ?>" width="150" />
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group row mb-2">
                                            <label for="email" class="control-label">Email</label>
                                            <div class="form-group">
                                                <input type="email" class="form-control " name="email" id="email" placeholder="Enter email"  value="<?=isset($rowData['email']) ? $rowData['email'] : '';?>" required>
                                                <div class="invalid-feedback"> Please enter a valid email </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group row mb-2">
                                            <label for="password" class="control-label">Password</label>
                                            <div class="form-group">
                                                <input type="password" class="form-control " name="password" id="password" placeholder="Enter password" />
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group row mb-2">
                                            <label for="mobile" class="control-label">Mobile</label>
                                            <div class="input-group input-group-merge">
                                                <span class="input-group-text"><?= DEFAULT_COUNTY_CODE ?></span>
                                                <input type="text" class="form-control ctsNumber" name="mobile" id="mobile" maxlength="12" placeholder="Enter Mobile" value="<?=isset($rowData['mobile']) ? $rowData['mobile'] : '';?>" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group row mb-2">
                                            <label for="password" class="control-label">Password</label>
                                            <div class="form-group">
                                                <input type="password" class="form-control " name="password" id="password" placeholder="Enter password" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group row mb-2">
                                            <label for="dob" class="control-label">DOB</label>
                                            <div class="form-group">
                                                <input type="date" class="form-control" name="dob" id="dob" value="<?=isset($rowData['dob']) ? $rowData['dob'] : '';?>" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                */ ?>
                            </div>

                            <div class="col-lg-12 pt-2">
                                <div class="form-group row"><hr>
                                    <div class="d-flex">
                                        <button type="submit" name="ProfileSubmitBtn" value="Submit" class="btn btn-dark waves-effect waves-light">Submit </button>&nbsp;
                                        <div class=" col-sm-3">
                                            <a href="<?php echo base_url('profile'); ?>"><button type="button" class="btn btn-danger waves-effect waves-light"> Cancel</button></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        <?php }
        
        /*
        if ($curr_tab == 'statistics') { ?>
            <div class="mb-4">
                <div class="row">
                    <div class="col-md-12 col-12 mb-4">
                        <div class="card h-100">
                            <div class="card-header header-elements">
                                <div class="d-flex flex-column">
                                    <p class="card-subtitle text-muted mb-1">Total Inputs</p>
                                    <h5 class="card-title fw-bold mb-0"><?= (isset($inputChart['total_count'])) ? $inputChart['total_count'] : '0' ?></h5>
                                </div>
                                <div class="card-action-element ms-auto py-0">
                                    <form id="frmInputFilterChart">
                                        <input type="hidden" name="tab" value="statistics" />
                                        <label for="input_filter_date" class="form-label">Filter</label>
                                        <input type="text" id="input_filter_date" name="input_filter_date" class="form-control" value="<?= isset($_GET['input_filter_date']) ? $_GET['input_filter_date'] : '' ?>" />
                                    </form>
                                </div>
                            </div>
                            <div class="card-body">
                                <span class="d-block mb-2">Current Inputs</span>
                                <div class="progress progress-stacked mb-3 mb-xl-5" style="height:8px;">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                                    <div class="progress-bar bg-danger" role="progressbar" style="width: 15%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                                    <div class="progress-bar bg-info" role="progressbar" style="width: 10%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                                    <div class="progress-bar bg-primary" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                                    <div class="progress-bar bg-warning" role="progressbar" style="width: 15%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <ul class="p-0 m-0">
                                    <?php
                                    $color_arr = array('success', 'info', 'warning', 'danger', 'primary');
                                    if (!empty($inputChart['data'])) {
                                        foreach ($inputChart['data'] as $type) {
                                            if ($type['total'] > 0) { ?>
                                                <li class="mb-3 d-flex justify-content-between">
                                                    <div class="d-flex align-items-center lh-1 me-3">
                                                        <span class="badge badge-dot bg-<?= $color_arr[array_rand($color_arr)] ?> me-2"></span> <?= $type['title'] ?>
                                                    </div>
                                                    <div class="d-flex gap-3">
                                                        <span><?= $type['total'] ?></span>
                                                    </div>
                                                </li>
                                            <?php }
                                        }
                                    } ?>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 col-12 mb-4">
                        <div class="card h-100">
                            <div class="card-header header-elements">
                                <div class="d-flex flex-column">
                                    <p class="card-subtitle text-muted mb-1">Total Input Bonus</p>
                                    <h5 class="card-title fw-bold mb-0"><?= (isset($inputBonusChart['total_count'])) ? $inputBonusChart['total_count'] : '0' ?></h5>
                                </div>
                                <div class="card-action-element ms-auto py-0">
                                    <form id="frmBonusFilterChart">
                                        <input type="hidden" name="tab" value="statistics" />
                                        <label for="bonus_filter_date" class="form-label">Filter</label>
                                        <input type="text" id="bonus_filter_date" name="bonus_filter_date" class="form-control" value="<?= isset($_GET['bonus_filter_date']) ? $_GET['bonus_filter_date'] : '' ?>" />
                                    </form>
                                </div>
                            </div>
                            <div class="card-body">
                                <span class="d-block mb-2">Technicians Bonus</span>
                                <div class="progress progress-stacked mb-3 mb-xl-5" style="height:8px;">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                                    <div class="progress-bar bg-danger" role="progressbar" style="width: 15%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                                    <div class="progress-bar bg-info" role="progressbar" style="width: 10%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                                    <div class="progress-bar bg-primary" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                                    <div class="progress-bar bg-warning" role="progressbar" style="width: 15%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <ul class="p-0 m-0">
                                    <?php
                                    $color_arr = array('success', 'info', 'warning', 'danger', 'primary');
                                    if (!empty($inputBonusChart['data'])) {
                                        foreach ($inputBonusChart['data'] as $type) {
                                            if ($type['total'] > 0) { ?>
                                                <li class="mb-3 d-flex justify-content-between">
                                                    <div class="d-flex align-items-center lh-1 me-3">
                                                        <span class="badge badge-dot bg-<?= $color_arr[array_rand($color_arr)] ?> me-2"></span> <?= $type['username'] ?>
                                                    </div>
                                                    <div class="d-flex gap-3">
                                                        <span><?= $type['total'] ?></span>
                                                    </div>
                                                </li>
                                            <?php }
                                        }
                                    } ?>
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        <?php }*/ ?>

    </div>
    <!--/ User Content -->
</div>

<!--START MODAL COMPOENETS -->
<div class="modal fade" id="addNewAddress" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-simple modal-add-new-address">
    <div class="modal-content pb-0">
      <div class="modal-body">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="text-center mb-4">
                <h3 class="address-title">INPUT FORM</h3>
             </div>
            <?php $this->load->view('front/form'); ?>
       </div>
    </div>
  </div>
</div>

<script>
    ! function() {
        <?php
        if ($curr_tab == 'statistics') { ?>

            // for input chart date
            $("#input_filter_date").daterangepicker({
                    ranges: {
                        Today: [moment(), moment()],
                        Yesterday: [moment().subtract(1, "days"), moment().subtract(1, "days")],
                        "Last 7 Days": [moment().subtract(6, "days"), moment()],
                        "Last 30 Days": [moment().subtract(29, "days"), moment()],
                        "This Month": [moment().startOf("month"), moment().endOf("month")],
                        "Last Month": [moment().subtract(1, "month").startOf("month"), moment().subtract(1, "month").endOf("month")]
                    },
                },
                function(start, end) {
                    $('#input_filter_date').val(start.format('YYYY-MM-DD') + '/' + end.format('YYYY-MM-DD'));
                    $('#frmInputFilterChart').submit();
                });
            <?php
            if (isset($input_filter_start_date) && !empty($input_filter_start_date)) { ?>
                $('#input_filter_date').data('daterangepicker').setStartDate('<?= date('m/d/Y', strtotime($input_filter_start_date)) ?>');
                $('#input_filter_date').data('daterangepicker').setEndDate('<?= date('m/d/Y', strtotime($input_filter_end_date)) ?>');
            <?php } ?>
        <?php } ?>
    }();
</script>
