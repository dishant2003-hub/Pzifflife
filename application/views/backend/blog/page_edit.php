<div class="row ">
    <div class="col-lg-12">
        <div class="card ">
            <div class="card-body bg-dark mb-0">
                <h4 class="text-white card-title mb-0"><?= isset($title) ? $title:'';  ?></h4>
            </div>
            <div class="card-body">
                <!-- <h4 class="card-title">User  info form </h4> -->
                <span id="msg"></span>
                <form  method="POST" class="needs-validation" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-lg-6">
                             <div class="form-group row mb-2">
                                <label for="fullname" class="col-sm-3 control-label">Category*</label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <select class="form-control" name="category" required>
                                            <option value="">Select option</option>
                                            <?php if(!empty($categorylist)){
                                                foreach($categorylist as  $key=> $value){
                                                    $selected = (isset($BlogData['category']) && $BlogData['category'] == $value['slug'] ) ? 'selected':'';
                                                     ?>
                                                <option value="<?= isset($value['slug']) ? $value['slug']:''; ?>" <?= $selected; ?>><?= isset($value['name']) ? $value['name']:''; ?></option>
                                            <?php } } ?>
                                        </select>                                       
                                        <div class="valid-feedback"> Looks good! </div>
                                        <div class="invalid-feedback"> Please enter your name. </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mb-2">
                                <label for="price" class="col-sm-3 control-label">Title</label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <input type="text" class="form-control " name="title"  placeholder="Enter title"  value="<?=isset($BlogData['title']) ? $BlogData['title'] : '';?>" required>
                                        <div class="valid-feedback"> Looks good! </div>
                                        <div class="invalid-feedback"> Please enter</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group row mb-2">
                                <label for="fullname" class="col-sm-3 control-label">Type*</label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <select class="form-control" name="type" >
                                            <option value="0" <?= (isset($BlogData['type']) && $BlogData['type'] == 0) ? 'selected':'';  ?>>Blogs</option>
                                            <option value="1" <?= (isset($BlogData['type']) && $BlogData['type'] == 1) ? 'selected':'';  ?>>News</option>
                                        </select>                                       
                                        <div class="valid-feedback"> Looks good! </div>
                                        <div class="invalid-feedback"> Please enter your name. </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mb-2">
                                <label for="desc" class="col-sm-3 control-label">image</label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <input type="file"  name="image" class="form-control" multiple > 
                                    </div>
                                    <?php if(!empty($BlogData['image'])){ ?>
                                       <img src=<?php echo base_url(BLOG.$BlogData['image']) ?> width="80px" height="80px" alt="">
                                    <?php }  ?> 
                                </div>
                            </div>
                            

                        </div>
                        <div class="col-lg-12">
                            <div class="form-group  mb-2">
                                <label for="desc" class=" control-label">Short Description</label>
                                <div class="">
                                    <div class="input-group">
                                        <textarea class=" form-control  w-100" id="short_desc" name="short_desc" rows="3" placeholder="Enter text ..." required><?= isset($BlogData['short_desc']) ? $BlogData['short_desc'] : ''; ?></textarea>
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
                                        <textarea class="textarea_editor form-control custom_text_editors" id="desc" name="desc" rows="15" placeholder="Enter text ..." required><?= isset($BlogData['desc']) ? $BlogData['desc'] : ''; ?></textarea>
                                        <div class="valid-feedback"> Looks good! </div>
                                        <div class="invalid-feedback"> Please enter your desc. </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group  mb-2">
                                <label for="meta_title" class=" control-label">Meta title</label>
                                <div class="">
                                    <input type="text" class="form-control " name="meta_title"  placeholder="Enter title"  value="<?=isset($BlogData['meta_title']) ? $BlogData['meta_title'] : '';?>"  >
                                    <div class="valid-feedback"> Looks good! </div>
                                    <div class="invalid-feedback"> Please enter. </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group  mb-2">
                                <label for="og_title" class=" control-label">OG title</label>
                                <div class="">
                                    <input type="text" class="form-control " name="og_title"  placeholder="Enter title"  value="<?=isset($BlogData['og_title']) ? $BlogData['og_title'] : '';?>"  >
                                    <div class="valid-feedback"> Looks good! </div>
                                    <div class="invalid-feedback"> Please enter. </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group  mb-2">
                                <label for="meta_keyword" class=" control-label">Meta tag</label>
                                <div class="">
                                    <div class="input-group">
                                        <input type="text" class="form-control " name="meta_keyword"  placeholder="Enter keyword"  value="<?=isset($BlogData['meta_keyword']) ? $BlogData['meta_keyword'] : '';?>"  >
                                        <div class="valid-feedback"> Looks good! </div>
                                        <div class="invalid-feedback"> Please enter. </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group  mb-2">
                                <label for="meta_desc" class=" control-label">Meta Description</label>
                                <div class="">
                                    <div class="input-group">
                                        <textarea class="  form-control  " id="meta_desc" name="meta_desc" rows="5" placeholder="Enter text ..." required><?= isset($BlogData['meta_desc']) ? $BlogData['meta_desc'] : ''; ?></textarea>
                                        <div class="valid-feedback"> Looks good! </div>
                                        <div class="invalid-feedback"> Please enter. </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group  mb-2">
                                <label for="og_desc" class=" control-label">OG Description</label>
                                <div class="">
                                    <div class="input-group">
                                        <textarea class="  form-control  " id="og_desc" name="og_desc" rows="5" placeholder="Enter text ..." required><?= isset($BlogData['og_desc']) ? $BlogData['og_desc'] : ''; ?></textarea>
                                        <div class="valid-feedback"> Looks good! </div>
                                        <div class="invalid-feedback"> Please enter. </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group row">
                                <div class=" d-flex">
                                    <button type="submit" name="submit" value="Submit" class="btn btn-info waves-effect waves-light">Submit</button>
                                    <div class=" col-sm-3">
                                        <a href="<?= base_url('backend/blog'); ?>"><button type="button" class="btn btn-danger waves-effect waves-light" >Cancel</button></a>
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

