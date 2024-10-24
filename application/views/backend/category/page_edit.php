<div class="row ">
    <div class="col-lg-12">
        <div class="card ">
            <div class="card-body bg-dark mb-0">
                <h4 class="text-white card-title mb-0"><?= isset($title) ? $title :'';  ?></h4>
            </div>
            <div class="card-body">
                <span id="msg"></span>
                <form  method="POST" class="needs-validation" novalidate enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group row mb-2">
                                        <label for="fullname" class="col-sm-3 control-label">Category*</label>
                                        <div class="col-sm-8">
                                            <div class="input-group">
                                                <select class="form-control main_category" name="category_id" >
                                                    <option value="">Select</option>
                                                    <?php if(!empty($main_category)){
                                                        foreach($main_category as $category){
                                                            $selected = (isset($CategoryData['parent_id']) && $CategoryData['parent_id'] == $category['id'])? 'selected':''; ?>
                                                        <option value="<?= isset($category['id']) ? $category['id']:''; ?>" <?= $selected; ?>><?= isset($category['name']) ? $category['name']:''; ?></option>
                                                    <?php } } ?>
                                                </select>
                                                <div class="valid-feedback"> Looks good! </div>
                                                <div class="invalid-feedback"> Please Select Category. </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group row mb-2">
                                        <label for="fullname" class="col-sm-3 control-label">Name*</label>
                                        <div class="col-sm-8">
                                            <div class="input-group">
                                                <input type="text"  name="category_name" class="form-control "  placeholder="Enter Name"  value="<?=isset($CategoryData['name']) ? $CategoryData['name'] : '';?>" required>
                                                <div class="valid-feedback"> Looks good! </div>
                                                <div class="invalid-feedback"> Please enter your name. </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group row mb-2">
                                        <label for="fullname" class="col-sm-3 control-label">Category Type*</label>
                                        <div class="col-sm-8">
                                            <div class="input-group">
                                                <select class="form-control  "name="cate_type" >
                                                    <option value="0"  <?= (isset($CategoryData['cate_type']) && $CategoryData['cate_type'] == 0) ? 'selected':'';  ?>> Product category </option>
                                                    <option value="1"  <?= (isset($CategoryData['cate_type']) && $CategoryData['cate_type'] == 1) ? 'selected':'';  ?>> Blog </option>
                                                    <option value="2"  <?= (isset($CategoryData['cate_type']) && $CategoryData['cate_type'] == 2) ? 'selected':'';  ?>> News </option>
                                                </select>
                                                <div class="valid-feedback"> Looks good! </div>
                                                <div class="invalid-feedback"> Please Select Category. </div>
                                            </div>
                                        </div>
                                    </div>                     
                                </div>
                            </div>
                        </div>
                         <div class="col-lg-12">
                            <div class="row  mb-2">
                                <div class="form-group row mb-2">
                                    <div class="col-sm-12 col-12">
                                        <label for="description" class="control-label">Description</label>
                                        <textarea class="textarea_editor form-control custom_text_editors" id="description" name="description" rows="15" placeholder="Enter Description..." required><?= isset($CategoryData['desc']) ? $CategoryData['desc'] : ''; ?></textarea>
                                    </div>
                                </div>
                            </div>
                        </div> 
                        <div class="col-lg-12">
                            <div class="form-group row">
                                <div class="d-flex">
                                    <button type="submit" name="submit" value="Submit" class="btn btn-info waves-effect waves-light">Submit</button>
                                    <div class=" col-sm-3">
                                        <a href="<?= base_url('backend/category'); ?>"><button type="button" class="btn btn-danger waves-effect waves-light" >Cancel</button></a>
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


