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
                                <label for="price" class="col-sm-3 control-label">image</label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <input type="file"  name="image" class="form-control" > 
                                    </div>
                                    <?php if(!empty($savedata['image'])){ ?>
                                       <img src=<?php echo base_url(GALLERY.$savedata['image']) ?> width="80px" height="80px" alt="">
                                    <?php }  ?> 
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 mt-2">
                            <div class="form-group row">
                                <div class=" d-flex">
                                    <button type="submit" name="submit" value="Submit" class="btn btn-info waves-effect waves-light">Submit</button>
                                    <div class=" col-sm-3">
                                        <a href="<?= base_url('backend/gallery'); ?>"><button type="button" class="btn btn-danger waves-effect waves-light" >Cancel</button></a>
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

