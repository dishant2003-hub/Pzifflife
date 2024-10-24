<div class="row ">
    <div class="col-lg-12">
        <div class="card ">
            <div class="card-body bg-dark mb-0">
                <h4 class="text-white card-title mb-0"> <?php echo isset($userData['name']) ? $userData['name'] . '(' . $userData['username'] . ')' : '' ?> </h4>
            </div>
            <div class="card-body">
                <!-- <h4 class="card-title">User  info form </h4> -->
                <span id="msg"></span>
                <form id="profileForm" method="POST" class="needs-validation" novalidate>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group row mb-2">
                                <label for="fullname" class="control-label">Name*</label>
                                <div class="input-group">
                                    <input type="text" name="name" class="form-control" id="fullname" placeholder="Enter Name"  value="<?=isset($userData['name']) ? $userData['name'] : '';?>" required>
                                    <div class="invalid-feedback"> Please enter your name. </div>
                                </div>
                            </div>

                            <div class="form-group row mb-2">
                                <label for="email" class="control-label">Email</label>
                                <div class="input-group">
                                    <input type="email" class="form-control " name="email" id="email" placeholder="Enter email"  value="<?=isset($userData['email']) ? $userData['email'] : '';?>" required>
                                    <div class="invalid-feedback"> Please enter a valid email </div>
                                </div>
                            </div>

                            <!-- <div class="form-group row mb-2">
                                <label for="password" class="control-label">Password</label>
                                <div class="input-group">
                                    <input type="password" class="form-control " name="password" id="password" placeholder="Enter password" />
                                </div>
                            </div> -->

                            <div class="form-group row mb-2">
                                <label for="mobile" class="control-label">Mobile*</label>
                                <div class="input-group">
                                    <input type="number" class="form-control  ctsNumber " name="mobile" id="mobile" maxlength="12"  placeholder="Enter Mobile" value="<?=isset($userData['mobile']) ? $userData['mobile'] : '';?>" required>
                                    <div class="invalid-feedback"> Please enter your Mobile. </div>
                                </div>
                            </div>

                            <div class="form-group row mb-2">
                                <label for="address" class="control-label">Address</label>
                                <div class="input-group">
                                    <textarea class="form-control" name="address" id="address" placeholder="Enter Address" required><?=isset($userData['address']) ? $userData['address'] : '';?></textarea>
                                    <div class="invalid-feedback"> Please enter your address. </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="d-flex">
                                    <button type="submit" name="submit" value="Submit" class="btn btn-dark waves-effect waves-light">Update Profile </button>&nbsp;
                                    <div class=" col-sm-3">
                                        <a href="<?php echo base_url('backend/dashboard'); ?>"><button type="button" class="btn btn-danger waves-effect waves-light"> Cancel</button></a>
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
