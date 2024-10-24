<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

<div class="row">
    <div class="col-lg-12">
        <div class="card ">
            <div class="card-body">

                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('backend/system-setting'); ?>">
                        <i class="bx bx-home align-middle"></i>
                        <span class="align-middle">General</span>
                        </a>
                    </li>
                    <li class="nav-item  current">
                        <a class="nav-link active"  href="<?= base_url('backend/terms-setting'); ?>" >
                        <i class="bx bx-user align-middle"></i>
                        <span class="align-middle">Terms of Use</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('backend/privacy-setting'); ?>" >
                            <i class="bx bx-message-square align-middle"></i>
                            <span class="align-middle">Privacy Policy</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('backend/return-setting'); ?>" >
                            <i class="bx bx-undo align-middle"></i>
                            <span class="align-middle">Returns & Exchanges</span>
                        </a>
                    </li>
                </ul>

                <form action="" id="" method="POST" class="form-horizontal p-t-20" enctype="">
                    <div class="row">
                        <div class="col-lg-12">

                            <div class="form-group row">
                                <label for="header" class="col-sm-3 control-label">Terms & Condition*</label>
                                <div class="col-sm-12">
                                    <div class="input-group">
                                        <textarea class="textarea_editor form-control" name="terms" rows="15" placeholder="Enter text ..." required><?= isset($rowData['terms']) ? $rowData['terms'] : ''; ?></textarea>
                                        <!-- <input type="text" class="form-control" value="<?= isset($rowData['header']) ? $rowData['header'] : '' ?>" name="header" id="header" placeholder="header" > -->
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-lg-12">
                            <div class="form-group row m-b-0">
                                <div class="text-right col-sm-12">
                                    <button type="submit" name="termssubmit" value="Submit" class="btn btn-dark waves-effect waves-light">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>