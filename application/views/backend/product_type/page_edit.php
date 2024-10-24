<div class="row ">
    <div class="col-lg-12">
        <div class="card ">
            <div class="card-body bg-dark mb-0">
                <h4 class="text-white card-title mb-0"><?= isset($title) ? $title:'';  ?></h4>
            </div>
            <div class="card-body">
                <span id="msg"></span>
                <form  method="POST" class="needs-validation" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group row mb-2">
                                <label for="fullname" class="col-sm-3 control-label">Dosage</label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <select class="form-control dosage" name="dosage"  id="dosage" required>
                                            <option value="">Select</option>
                                            <option value="Sterile" <?= isset($savedata['type']) && $savedata['type'] == 'Sterile' ? "selected" : '';?>>Sterile</option>
                                            <option value="Non-Sterile" <?= isset($savedata['type']) && $savedata['type'] == 'Non-Sterile' ? "selected" : '';?>>Non-Sterile</option>
                                        </select>
                                        <div class="valid-feedback"> Looks good! </div>
                                        <div class="invalid-feedback"> Please Select Dosage. </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group row mb-2">
                                <label for="price" class="col-sm-3 control-label">Name</label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <input type="text" class="form-control " name="name"  placeholder="Enter Name"  value="<?=isset($savedata['name']) ? $savedata['name'] : '';?>" required>
                                        <div class="valid-feedback"> Looks good! </div>
                                        <div class="invalid-feedback"> Please enter name</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group row mb-2">
                                <label for="price" class="col-sm-3 control-label">Slug</label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <input type="text" class="form-control " name="slug"  placeholder="Enter slug"  value="<?=isset($savedata['slug']) ? $savedata['slug'] : '';?>" required>
                                        <div class="valid-feedback"> Looks good! </div>
                                        <div class="invalid-feedback"> Please enter slug.</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group row mb-2">
                                <label for="price" class="col-sm-3 control-label">image</label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <input type="text" class="form-control " name="image"  placeholder="Enter image"  value="<?=isset($savedata['image']) ? $savedata['image'] : '';?>">
                                        <div class="valid-feedback"> Looks good! </div>
                                        <div class="invalid-feedback"> Please enter image</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group row mb-2">
                                <label for="price" class="col-sm-3 control-label">color</label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <input type="text" class="form-control " name="color"  placeholder="Enter color"  value="<?=isset($savedata['color']) ? $savedata['color'] : '';?>">
                                        <div class="valid-feedback"> Looks good! </div>
                                        <div class="invalid-feedback"> Please enter color</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group  mb-2">
                                <label for="desc" class=" control-label">Title</label>
                                <div class="">
                                    <div class="input-group">
                                        <textarea class=" form-control  w-100" id="title" name="title" rows="3" placeholder="Enter text ..."><?= isset($savedata['title']) ? $savedata['title'] : ''; ?></textarea>
                                        <div class="valid-feedback"> Looks good! </div>
                                        <div class="invalid-feedback"> Please enter your desc. </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group  mb-2">
                                <label for="desc" class=" control-label">Description</label>
                                <div class="">
                                    <div class="input-group">
                                        <textarea class="textarea_editor form-control custom_text_editors" id="desc" name="desc" rows="15" placeholder="Enter text ..."><?= isset($savedata['desc']) ? $savedata['desc'] : ''; ?></textarea>
                                        <div class="valid-feedback"> Looks good! </div>
                                        <div class="invalid-feedback"> Please enter your desc. </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-lg-12">
                            <div class="form-group row">
                                <div class=" d-flex">
                                    <button type="submit" name="submit" value="Submit" class="btn btn-info waves-effect waves-light">Submit</button>
                                    <div class=" col-sm-3">
                                        <a href="<?= base_url('backend/product_type'); ?>"><button type="button" class="btn btn-danger waves-effect waves-light" >Cancel</button></a>
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
<style type="text/css">
    #cke_desc{
        width: 100%;
    }
</style>

