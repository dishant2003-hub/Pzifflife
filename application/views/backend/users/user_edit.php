<div class="row ">
    <div class="col-lg-12">
        <div class="card ">
            <div class="card-body bg-dark mb-0">
                <h4 class="text-white card-title mb-0"> User Form </h4>
            </div>
            <div class="card-body">
                <span id="msg"></span>
                <form id="userForm" method="POST" class="needs-validation" novalidate enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-lg-12">
                            <h5>User Detail </h5>
                        </div>
                        <div class="col-lg-6">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group row mb-2">
                                        <label for="address" class="control-label">User Role</label>
                                        <div class="form-group">
                                            <select class="form-control select2" id="user_role" name="user_role" required>
                                                <option value="">Select User Role</option>
                                                <?php
                                                if(!empty($user_role_list)){
                                                    foreach($user_role_list as $row){ ?>
                                                        <option value="<?= $row['id'] ?>" <?=(isset($rowData['user_role']) && $rowData['user_role'] == $row['id']) ? 'selected' : '';?>><?= $row['name'] ?></option>
                                                    <?php }
                                                } ?>
                                            </select>
                                        </div>
                                    </div>
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
                                            <input type="text" class="form-control ctsNumber" name="mobile" id="mobile" maxlength="12" placeholder="Enter Mobile" value="<?=isset($rowData['mobile']) ? $rowData['mobile'] : '';?>" />
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
                        </div>

                        <div class="col-lg-6">
                            <div class="row">
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
                            </div>
                            
                            <div class="form-group row mb-2">
                                <label for="address" class="control-label">Address</label>
                                <div class="form-group">
                                    <textarea class="form-control" name="address" id="address" placeholder="Enter Address" ><?=isset($rowData['address']) ? $rowData['address'] : '';?></textarea>
                                </div>
                            </div>

                            <div class="form-group row mb-2">
                                <label for="notes" class="control-label">Notes</label>
                                <div class="form-group">
                                    <textarea class="form-control" name="notes" id="notes" placeholder="Enter notes" ><?=isset($rowData['notes']) ? $rowData['notes'] : '';?></textarea>
                                </div>
                            </div>

                            <div class="row">
                                <!-- <div class="col-lg-6">
                                    <div class="form-group row mb-2">
                                        <label for="alocation" class="control-label">Alocation</label>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="alocation" id="alocation" placeholder="Enter" value="<?=isset($rowData['alocation']) ? $rowData['alocation'] : '';?>" />
                                        </div>
                                    </div>
                                </div> -->
                                <div class="col-lg-6">
                                    <div class="form-group row mb-2">
                                        <label for="is_active" class="control-label">Status</label>
                                        <div class="form-group">
                                            <select class="form-control" id="is_active" name="is_active" required>
                                                <option value="1" <?=(isset($rowData['is_active']) && $rowData['is_active'] == 1) ? 'selected' : '';?> > Active </option>
                                                <option value="0" <?=(isset($rowData['is_active']) && $rowData['is_active'] == 0) ? 'selected' : '';?> > Inactive </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- <div class="col-lg-6">
                            <div class="divTechnicianFields <?= (isset($rowData['user_role']) && $rowData['user_role'] == 7) ? '' : 'd-none'; ?> ">
                                <h5>Technician </h5>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group row mb-2">
                                            <label for="contractor_id" class="control-label">Contractor</label>
                                            <div class="form-group">
                                                <select class="form-control select2" id="contractor_id" name="contractor_id">
                                                    <option value="">Select Contractor</option>
                                                    <?php
                                                    if(!empty($contractor_list)){
                                                        foreach($contractor_list as $row){ ?>
                                                            <option value="<?= $row['user_id'] ?>" <?=(isset($rowData['contractor_id']) && $rowData['contractor_id'] == $row['user_id']) ? 'selected' : '';?>><?= $row['name'] ?></option>
                                                        <?php }
                                                    } ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group row mb-2">
                                            <label for="license_plate" class="control-label">License plate</label>
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="license_plate" id="license_plate" value="<?=isset($rowData['license_plate']) ? $rowData['license_plate'] : '';?>" />
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <h5 class="pt-2">Skills </h5>
                                <div class="row">
                                    <?php
                                    if(!empty($skill_name_list)){
                                        foreach($skill_name_list as $skill){ ?>
                                            <div class="col-sm-4">
                                                <div class="form-group row mb-2">
                                                    <label for="skill_<?= $skill['slug'] ?>" class="control-label"><?= $skill['title'] ?></label>
                                                    <div class="form-group">
                                                        <?php
                                                        if($skill['slug']=='vca'){ ?>
                                                            <input type="date" class="form-control" name="skill[vca]" id="vca" value="<?=isset($skillData['vca']) ? $skillData['vca'] : '';?>" />
                                                        <?php }
                                                        else{ ?>
                                                            <input type="checkbox" class="" name="skill[<?= $skill['slug'] ?>]" id="skill_<?= $skill['slug'] ?>" value="1" <?= (isset($skillData[$skill['slug']]) && $skillData[$skill['slug']]==1) ? 'checked':'';?> />
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php }
                                    } ?>
                                </div>
                            </div>
                        </div> -->

                        <div class="col-lg-12 pt-2">
                            <div class="form-group row"><hr>
                                <div class="d-flex">
                                    <button type="submit" name="submit" value="Submit" class="btn btn-dark waves-effect waves-light">Submit </button>&nbsp;
                                    <div class=" col-sm-3">
                                        <a href="<?php echo base_url('backend/users'); ?>"><button type="button" class="btn btn-danger waves-effect waves-light"> Cancel</button></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

<!--  -->

<script>
(function ($) {

    $("#user_role").on("change", function(e){
        var user_role = $(this).val();
        if(user_role == 7){
            $('.divTechnicianFields').removeClass('d-none');
        }else{
            $('.divTechnicianFields').addClass('d-none');
        }
    });

})(jQuery);
</script>