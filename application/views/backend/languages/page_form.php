<div class="row ">
    <div class="col-lg-12">
        <div class="card ">
            <div class="card-body bg-dark mb-0">
                <h4 class="text-white card-title mb-0"> Language Form </h4>
            </div>
            <div class="card-body">
                <span id="msg"></span>
                <form id="language_form" method="POST" class="needs-validation" novalidate>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group row mb-2">
                                <label for="title" class="control-label">Title*</label>
                                <div class="input-group">
                                    <input type="text" name="title" class="form-control" id="title" placeholder="Enter Title"  value="<?=isset($rowData['title']) ? $rowData['title'] : '';?>" required>
                                    <div class="invalid-feedback"> Please enter name. </div>
                                </div>
                            </div>

                            <div class="form-group row mb-2">
                                <label for="key" class="control-label">Key*</label>
                                <div class="input-group">
                                    <input type="text" name="key" class="form-control" id="key" placeholder="Enter key"  value="<?=isset($rowData['key']) ? $rowData['key'] : '';?>" required>
                                    <div class="invalid-feedback"> Please enter key. </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="d-flex">
                                    <button type="submit" name="submit" value="Submit" class="btn btn-dark waves-effect waves-light"> Submit </button> &nbsp;
                                    <div class=" col-sm-3">
                                        <a href="<?php echo base_url('backend/languages'); ?>"><button type="button" class="btn btn-danger waves-effect waves-light"> Cancel </button></a>
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


