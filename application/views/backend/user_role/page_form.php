<div class="row ">
    <div class="col-lg-6">
        <div class="card ">
            <div class="card-body bg-dark mb-0">
                <h4 class="text-white card-title mb-0"> Role Form </h4>
            </div>
            <div class="card-body">
                <span id="msg"></span>
                <form id="role_form" method="POST" class="needs-validation" novalidate>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group row mb-2">
                                <label for="fullname" class="control-label"> Name* </label>
                                <div class="form-group">
                                    <input type="text" name="name" class="form-control" id="name" placeholder="Enter Name"  value="<?=isset($rowData['name']) ? $rowData['name'] : '';?>" required>
                                    <div class="invalid-feedback"> Please enter name. </div>
                                </div>
                            </div>
                            <div class="form-group row mb-2">
                                <label for="role_type" class="control-label"> Type </label>
                                <div class="form-group">
                                    <select class="form-control" id="role_type" name="role_type" required>
                                        <option value="0" <?=(isset($rowData['role_type']) && $rowData['role_type'] == 0) ? 'selected' : '';?> > Front </option>
                                        <option value="1" <?=(isset($rowData['role_type']) && $rowData['role_type'] == 1) ? 'selected' : '';?> > Backend </option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="d-flex">
                                    <button type="submit" name="submit" value="Submit" class="btn btn-dark waves-effect waves-light"> Submit </button> &nbsp;
                                    <div class=" col-sm-3">
                                        <a href="<?php echo base_url('backend/user_role'); ?>"><button type="button" class="btn btn-danger waves-effect waves-light"> Cancel </button></a>
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


