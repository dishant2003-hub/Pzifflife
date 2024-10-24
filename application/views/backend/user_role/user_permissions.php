<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body bg-dark">
                <h4 class="text-white card-title mb-0"> Role Permissions </h4>
            </div>
            <div class="card-body">
                <span id="msg"></span>

                <form id="rolePermitionForm" method="POST" class=" form-horizontal p-t-20" novalidate="novalidate" enctype="multipart/form-data">
                    <div class="row m-1">
                        <div class="col-12 text-center text-capitalize">
                            <h4 class="header-title">
                                <div class="text-capitalize">
                                    <? // echo= isset($userName) ? $userName :''; ?>
                                </div>
                            </h4>
                        </div>
                        <div class="col-lg-12">
                            <?php
                            if (!empty($permissions)) {
                                foreach ($permissions as $key => $rowData) {
                                    $update_data = $this->Service->get_row(TBL_USER_PERMISSION, '*', array('permission_id'=> $rowData['permissionid'], 'role_id' => $role_id), 'permission_id','asc');

                                    $AllChecked = '';
                                    if (!empty($update_data)) {
                                        $total = array_sum(array_slice($update_data, 3, -2));
                                        if ($total == 5) {
                                            $AllChecked = 'checked';
                                        }
                                    } ?>
                                    <div class="form-group row">
                                        <label class="col-sm-3 control-label"><?= isset($rowData['name']) ? $rowData['name'] : '' ?></label>
                                        <input type="hidden" value="<?= isset($rowData['permissionid']) ? $rowData['permissionid'] : '' ?>" name="permission_id[]">

                                        <div class="col-sm-9 d-flex">
                                            <input type='hidden' value='0' name='can_view<?= $rowData['permissionid']; ?>'>
                                            <div class="custom-control custom-checkbox mr_ight mb-3">
                                                <input type="checkbox" class="custom-control-input chkRowclick chkAll<?= $key; ?>" id="checkt1<?= $key; ?>" data-key="<?= $key; ?>" <?= $AllChecked; ?>>
                                                <label class="custom-control-label side_bar" for="checkt1<?= $key; ?>">All</label>
                                            </div>

                                            <div class="custom-control custom-checkbox mr_ight mb-3">
                                                <input type="checkbox" class="custom-control-input chka chkRow<?= $key; ?>" id="check1<?= $key; ?>" data-key="<?= $key; ?>" name="can_view<?= $rowData['permissionid']; ?>" value="1" <?= (isset($update_data['can_view']) && $update_data['can_view'] == 1) ? 'checked' : ''; ?>>
                                                <label class="custom-control-label side_bar" for="check1<?= $key; ?>">View</label>
                                            </div>

                                            <input type='hidden' value='0' name='can_edit<?= $rowData['permissionid']; ?>'>
                                            <div class="custom-control custom-checkbox mr_ight mb-3">
                                                <input type="checkbox" class="custom-control-input chka chkRow<?= $key; ?>" id="check2<?= $key; ?>" data-key="<?= $key; ?>" name="can_edit<?= $rowData['permissionid']; ?>" value="1" <?= (isset($update_data['can_edit']) && $update_data['can_edit'] == 1) ? 'checked' : ''; ?>>
                                                <label class="custom-control-label side_bar" for="check2<?= $key; ?>">Edit</label>
                                            </div>

                                            <input type='hidden' value='0' name='can_create<?= $rowData['permissionid']; ?>'>
                                            <div class="custom-control custom-checkbox mr_ight mb-3">
                                                <input type="checkbox" class="custom-control-input chka chkRow<?= $key; ?>" id="check3<?= $key; ?>" data-key="<?= $key; ?>" name="can_create<?= $rowData['permissionid']; ?>" value="1" <?= (isset($update_data['can_create']) && $update_data['can_create'] == 1) ? 'checked' : ''; ?>>
                                                <label class="custom-control-label side_bar" for="check3<?= $key; ?>">Create</label>
                                            </div>

                                            <input type='hidden' value='0' name='can_delete<?= $rowData['permissionid']; ?>'>
                                            <div class="custom-control custom-checkbox mr_ight mb-3">
                                                <input type="checkbox" class="custom-control-input chka chkRow<?= $key; ?>" id="check4<?= $key; ?>" data-key="<?= $key; ?>" name="can_delete<?= $rowData['permissionid']; ?>" value="1" <?= (isset($update_data['can_delete']) && $update_data['can_delete'] == 1) ? 'checked' : ''; ?>>
                                                <label class="custom-control-label side_bar" for="check4<?= $key; ?>">Delete</label>
                                            </div>

                                            <!-- <input type='hidden' value='0' name='can_detail<?= $rowData['permissionid']; ?>'>
                                                <div class="custom-control custom-checkbox mar_ight mb-3">
                                                <input type="checkbox" class="custom-control-input chka chkRow<?= $key; ?>" id="check5<?= $key; ?>" data-key="<?= $key; ?>" name="can_detail<?= $rowData['permissionid']; ?>" value="1" <?= (isset($update_data['can_detail']) && $update_data['can_detail'] == 1) ? 'checked' : ''; ?> >
                                                <label class="custom-control-label" for="check5<?= $key; ?>">Detail</label>
                                            </div> -->
                                        </div>
                                    </div>
                                <?php }
                            } ?>
                        </div>

                    </div>
                    <div class="row m-1" id="addbankdetail"></div>
                    <div class="form-group col-12">
                        <button type="submit" name="submit" value="Submit" class="btn btn-info waves-effect waves-light">Submit</button>
                        <a href="<?= base_url('backend/user_role') ?>" class="btn btn-danger waves-effect waves-light Cancel ">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
