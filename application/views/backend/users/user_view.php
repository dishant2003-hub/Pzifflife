<?php
$user_id=encrypt_String($user_id);
// pr($rowData);
$userPic = (!empty($rowData['picture']))? base_url(PICTURE.'/'.$rowData['picture']): ADMIN_ASSETS_PATH."img/avatars/9.png";
$username = (isset($rowData['user_fullname']))? $rowData['user_fullname']:"";
$curr_tab = (isset($_GET['tab']))? $this->input->get('tab'):"workorders";
if($curr_tab=='statistics'){ ?>
    <link rel="stylesheet" href="<?php echo $this->config->item('admin_assets'); ?>vendor/libs/bootstrap-daterangepicker/bootstrap-daterangepicker.css" />
    <link rel="stylesheet" href="<?php echo $this->config->item('admin_assets'); ?>vendor/libs/pickr/pickr-themes.css" />
    <script src="<?php echo $this->config->item('admin_assets'); ?>vendor/libs/moment/moment.js"></script>
    <script src="<?php echo $this->config->item('admin_assets'); ?>vendor/libs/bootstrap-daterangepicker/bootstrap-daterangepicker.js"></script>
    <script src="<?php echo $this->config->item('admin_assets'); ?>vendor/libs/pickr/pickr.js"></script>
<?php } ?>

<div class="row gy-4">
    <!-- User Sidebar -->
    <div class="col-xl-4 col-lg-5 col-md-5 order-1 order-md-0">
        <!-- User Card -->
        <div class="card mb-4">
            <div class="card-body">
                <div class="user-avatar-section">
                    <div class=" d-flex align-items-center flex-column">
                        <img class="img-fluid rounded my-4" src="<?php echo $userPic; ?>" onerror="imgError(this);" height="110" width="110" alt="<?= $username ?>" />
                        <div class="user-info text-center">
                            <h5 class="mb-2"><?= $username ?></h5>
                            <span class="badge bg-label-secondary"><?= (isset($rowData['user_role_name'])) ? $rowData['user_role_name']:"" ?></span>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-around flex-wrap my-4 py-3">
                    <div class="text-center">
                        <a href="<?= (!empty($rowData['email'])) ? 'mailto:'.$rowData['email']:'javascript:;' ?>" class="btn btn-primary mb-2" >Email</a>
                        <a href="<?= (!empty($rowData['mobile'])) ? 'https://wa.me/32'.$rowData['mobile'].'?text=Hi':'javascript:;' ?>" class="btn btn-dark mb-2" >Whatsapp</a>
                        <a href="javascript:;" class="btn btn-warning mb-2" >Notification</a>
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
                            <span><?= (isset($rowData['email'])) ? $rowData['email']:"" ?></span>
                        </li>
                        <li class="mb-3">
                            <span class="fw-bold me-2">Status:</span>
                            <?php
                            if(isset($rowData['is_active']) && $rowData['is_active']==1){ ?>
                                <span class="badge bg-label-success">ACTIVE</span>
                            <?php }else{ ?>
                                <span class="badge bg-label-danger">INACTIVE</span>
                            <?php } ?>
                        </li>
                        <li class="mb-3">
                            <span class="fw-bold me-2">Role:</span>
                            <span><?= (isset($rowData['user_role_name'])) ? $rowData['user_role_name']:"" ?></span>
                        </li>
                        <!-- <li class="mb-3">
                            <span class="fw-bold me-2">Contractor:</span>
                            <span><?= (isset($rowData['contractor_name'])) ? $rowData['contractor_name']:"" ?></span>
                        </li> -->
                        <li class="mb-3">
                            <span class="fw-bold me-2">Technician:</span>
                            <span><?= (isset($rowData['technician_name'])) ? $rowData['technician_name']:"" ?></span>
                        </li>
                        <li class="mb-3">
                            <span class="fw-bold me-2">License plate:</span>
                            <span><?= (isset($rowData['license_plate'])) ? $rowData['license_plate']:"" ?></span>
                        </li>
                        <li class="mb-3">
                            <span class="fw-bold me-2">DOB:</span>
                            <span><?= (isset($rowData['dob'])) ? $rowData['dob']:"" ?></span>
                        </li>
                        <li class="mb-3">
                            <span class="fw-bold me-2">Contact:</span>
                            <span><?= (isset($rowData['mobile'])) ? DEFAULT_COUNTY_CODE.' '.$rowData['mobile']:"" ?></span>
                        </li>
                        <li class="mb-3">
                            <span class="fw-bold me-2">Zipcode:</span>
                            <span><?= (isset($rowData['pincode'])) ? $rowData['pincode']:"" ?></span>
                        </li>
                        <li class="mb-3">
                            <span class="fw-bold me-2">City:</span>
                            <span><?= (isset($rowData['city'])) ? $rowData['city']:"" ?></span>
                        </li>
                        <li class="mb-3">
                            <span class="fw-bold me-2">Address:</span>
                            <span><?= (isset($rowData['address'])) ? $rowData['address']:"" ?></span>
                        </li>
                        <li class="mb-3">
                            <span class="fw-bold me-2">Alocation:</span>
                            <span><?= (isset($rowData['alocation'])) ? $rowData['alocation']:"" ?></span>
                        </li>
                    </ul>
                    <div class="d-flex justify-content-center pt-3">
                        <a href="<?= base_url('backend/users/edit/'.$user_id) ?>" class="btn btn-primary me-3">Edit</a>
                        <?php
                        if(isset($rowData['is_active']) && $rowData['is_active']==1){ ?>
                            <a href="javascript:;" class="btn btn-label-danger suspend-user change_user_status" data-id="<?= $user_id ?>" data-status="0">Set Inactive</a>
                        <?php }else{ ?>
                            <a href="javascript:;" class="btn btn-label-success suspend-user change_user_status" data-id="<?= $user_id ?>" data-status="1">Set Active</a>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- /User Card -->
    </div>
    <!--/ User Sidebar -->


    <!-- User Content -->
    <div class="col-xl-8 col-lg-7 col-md-7 order-0 order-md-1">
        <?php /*
        <!-- User Pills -->
        <ul class="nav nav-pills flex-column flex-md-row mb-3">
            <li class="nav-item"><a class="nav-link <?= ($curr_tab=='workorders') ? 'active':'' ?>" href="<?= base_url('backend/users/view/'.$user_id.'?tab=workorders') ?>">Workorders</a></li>
            <li class="nav-item"><a class="nav-link <?= ($curr_tab=='materials') ? 'active':'' ?>" href="<?= base_url('backend/users/view/'.$user_id.'?tab=materials') ?>">Materials</a></li>
            <li class="nav-item"><a class="nav-link <?= ($curr_tab=='statistics') ? 'active':'' ?>" href="<?= base_url('backend/users/view/'.$user_id.'?tab=statistics') ?>">Statistics</a></li>
            <li class="nav-item"><a class="nav-link <?= ($curr_tab=='communication') ? 'active':'' ?>" href="<?= base_url('backend/users/view/'.$user_id.'?tab=communication') ?>">Communication</a></li>
            <li class="nav-item"><a class="nav-link <?= ($curr_tab=='meldingen') ? 'active':'' ?>" href="<?= base_url('backend/users/view/'.$user_id.'?tab=meldingen') ?>">Meldingen</a></li>
            <li class="nav-item"><a class="nav-link <?= ($curr_tab=='tickets') ? 'active':'' ?>" href="<?= base_url('backend/users/view/'.$user_id.'?tab=tickets') ?>">Tickets</a></li>
            <li class="nav-item"><a class="nav-link <?= ($curr_tab=='webshop') ? 'active':'' ?>" href="<?= base_url('backend/users/view/'.$user_id.'?tab=webshop') ?>">Webshop</a></li>
        </ul>
        <!--/ User Pills -->

        <?php
        /*if($curr_tab=='workorders'){ ?>
            <div class="card mb-4">
                <h5 class="card-header">Workorders</h5>
                <div class="card-body">
                    <div class="table-responsive mb-3">
                        <?php
                        $table_data = array(
                            // '#',
                            'Workordercode',
                            'Datum',
                            'Extra info',
                            'Inputs',
                            'Regie',
                            // '1/1',
                            // 'Technieker 1/1',
                            'Action',
                        );
                        render_datatable($table_data, 'user_technician_input');
                        ?>
                    </div>
                </div>
            </div>
        <?php }
        */ ?>

    </div>
    <!--/ User Content -->
</div>

<?php
if($curr_tab=='statistics'){ ?>
<script>
    ! function() {

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

        // for input bonus chart date
        /*$("#bonus_filter_date").daterangepicker({
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
                $('#bonus_filter_date').val(start.format('YYYY-MM-DD') + '/' + end.format('YYYY-MM-DD'));
                $('#frmBonusFilterChart').submit();
            });
        <?php
        if (isset($bonus_filter_start_date) && !empty($bonus_filter_start_date)) { ?>
            $('#bonus_filter_date').data('daterangepicker').setStartDate('<?= date('m/d/Y', strtotime($bonus_filter_start_date)) ?>');
            $('#bonus_filter_date').data('daterangepicker').setEndDate('<?= date('m/d/Y', strtotime($bonus_filter_end_date)) ?>');
        <?php } ?>
        */
    }();
</script>
<?php } ?>