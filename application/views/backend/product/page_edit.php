<div class="row ">
    <div class="col-lg-12">
        <div class="card ">
            <div class="card-body bg-dark mb-0">
                <h4 class="text-white card-title mb-0"> <?= isset($title) ? $title :'';  ?></h4>
            </div>
            <div class="card-body">
                <span id="msg"></span>
                <form  method="POST" class="needs-validation" enctype="multipart/form-data">
                    <input type="hidden"  name="pageno" value="<?= isset($_GET['pageno']) ? $_GET['pageno']:''; ?>" >
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group row mb-2">
                                <label for="fullname" class="col-sm-3 control-label">Product Type*</label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <select class="form-control select2"  name="product_type">
                                            <?php if(!empty($product_type)){ 
                                                foreach($product_type as $type){
                                                    $selected = (isset($productData['product_type']) && $productData['product_type'] == $type['id'])? 'selected':'';
                                                     ?>
                                                <option value="<?= isset($type['id']) ? $type['id']:'';?>" <?= $selected; ?> ><?= isset($type['name']) ? $type['name']:'';?></option>
                                            <?php }} ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-group row mb-2">
                                <label for="fullname" class="col-sm-3 control-label">Product Name*</label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <input type="text"  name="name" class="form-control "  placeholder="Enter Name"  value="<?=isset($productData['product_name']) ? $productData['product_name'] : '';?>" required>
                                        <div class="valid-feedback"> Looks good! </div>
                                        <div class="invalid-feedback"> Please enter your name. </div>
                                    </div>
                                </div>
                            </div>
                           
                            <div class="form-group row mb-2">
                                <label for="fullname" class="col-sm-3 control-label">Trade Name*</label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <input type="text"  name="trade" class="form-control "  placeholder="Enter trade Name"  value="<?=isset($productData['trade_name']) ? $productData['trade_name'] : '';?>" required>
                                        <div class="valid-feedback"> Looks good! </div>
                                        <div class="invalid-feedback"> Please enter your trade name. </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mb-2">
                                <label for="sku" class="col-sm-3 control-label">Available Strength*</label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <input type="text"  name="avg_strength" class="form-control "  placeholder="Enter Available Strength"  value="<?=isset($productData['available_strength']) ? $productData['available_strength'] : '';?>" required>
                                        <div class="valid-feedback"> Looks good! </div>
                                        <div class="invalid-feedback"> Please enter your Strength. </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row mb-2">
                                <label for="manufacturer" class="col-sm-3 control-label">Packing*</label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <input type="text"  name="packing" class="form-control "  placeholder="Enter Packing"  value="<?=isset($productData['packing']) ? $productData['packing'] : '';?>" required>
                                        <div class="valid-feedback"> Looks good! </div>
                                        <div class="invalid-feedback"> Please enter your packing. </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row mb-2">
                                <label for="packaging" class="col-sm-3 control-label">Pack Insert/Leaflet*</label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <input type="text"  name="Pack" class="form-control "  placeholder="Enter Pack"  value="<?=isset($productData['Insert_Leaflet']) ? $productData['Insert_Leaflet'] : '';?>" required>
                                        <div class="valid-feedback"> Looks good! </div>
                                        <div class="invalid-feedback"> Please enter your name. </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row mb-2">
                                <label for="tag" class="col-sm-3 control-label">Therapeutic use*</label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <input type="text"  name="therapeutic" class="form-control "  placeholder="Enter Therapeutic"  value="<?=isset($productData['therapeutic']) ? $productData['therapeutic'] : '';?>" required>
                                        <div class="valid-feedback"> Looks good! </div>
                                        <div class="invalid-feedback"> Please enter your Therapeutic. </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row mb-2">
                                <label for="tag" class="col-sm-3 control-label">Production Capacity*</label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <input type="text"  name="Pro_capacity" class="form-control "  placeholder="Enter Production Capacity"  value="<?=isset($productData['production_capacity']) ? $productData['production_capacity'] : '';?>" required>
                                        <div class="valid-feedback"> Looks good! </div>
                                        <div class="invalid-feedback"> Please enter your Production Capacity. </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group row mb-2">
                                <label for="fullname" class="col-sm-3 control-label"> Category*</label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <select class="form-control category" name="category"  id="category">
                                            <option value="">Select</option>
                                            <?php if(!empty($category)){
                                                foreach($category as $row){ 
                                                    $selected = (isset($productData['category']) && $productData['category'] == $row['id'])? 'selected':''; ?>
                                                <option value="<?= isset($row['id']) ? $row['id']:''; ?>" <?= $selected; ?>><?= isset($row['name']) ? $row['name']:''; ?></option>
                                            <?php } } ?>
                                        </select>
                                        <div class="valid-feedback"> Looks good! </div>
                                        <div class="invalid-feedback"> Please Select Category. </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row mb-2">
                                <label for="meta_title" class="col-sm-3 control-label">Meta Title</label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <input type="text"  name="meta_title" class="form-control "  placeholder="Enter  title"  value="<?=isset($productData['meta_title']) ? $productData['meta_title'] : '';?>"  >
                                        <div class="valid-feedback"> Looks good! </div>
                                        <div class="invalid-feedback"> Please enter your name. </div>
                                    </div>
                                </div>
                            </div> 
                            <div class="form-group row mb-2">
                                <label for="meta_desc" class="col-sm-3 control-label"> Meta Description</label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <textarea class="form-control" name="meta_desc" id="meta_desc" placeholder="Enter description"  ><?=isset($productData['meta_desc']) ? $productData['meta_desc'] : '';?></textarea>
                                             <div class="valid-feedback"> Looks good! </div>
                                            <div class="invalid-feedback"> Please enter your desc. </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row mb-2">
                                <label for="meta_tags" class="col-sm-3 control-label">Meta Tags</label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <input type="text"  name="meta_tags" class="form-control "  placeholder="Enter tags"  value="<?=isset($productData['meta_tags']) ? $productData['meta_tags'] : '';?>"  >
                                        <div class="valid-feedback"> Looks good! </div>
                                        <div class="invalid-feedback"> Please enter your name. </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row mb-2">
                                <label for="og_meta_title" class="col-sm-3 control-label">OG Meta Title</label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <input type="text"  name="og_meta_title" class="form-control "  placeholder="Enter  title"  value="<?=isset($productData['og_meta_title']) ? $productData['og_meta_title'] : '';?>"  >
                                        <div class="valid-feedback"> Looks good! </div>
                                        <div class="invalid-feedback"> Please enter your name. </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row mb-2">
                                <label for="og_meta_desc" class="col-sm-3 control-label">OG Meta Description</label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <textarea class="form-control" name="og_meta_desc" id="og_meta_desc" placeholder="Enter description"  ><?=isset($productData['og_meta_desc']) ? $productData['og_meta_desc'] : '';?></textarea>
                                             <div class="valid-feedback"> Looks good! </div>
                                            <div class="invalid-feedback"> Please enter your desc. </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>

                        <div class="row  mb-2">
                            <div class="form-group row mb-2">
                                <div class="col-sm-12 col-12">
                                    <label for="description" class="control-label">Description</label>
                                    <textarea class="textarea_editor form-control custom_text_editors" id="description" name="description" rows="15" placeholder="Enter Description..." required><?= isset($productData['description']) ? $productData['description'] : ''; ?></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group row">
                                <div class="d-flex">
                                    <button type="submit" name="submit" value="Submit" class="btn btn-info waves-effect waves-light">Submit</button>
                                    <div class=" col-sm-3">
                                        <a href="<?= base_url('backend/product'); ?>"><button type="button" class="btn btn-danger waves-effect waves-light" >Cancel</button></a>
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


<script>
    $(document).ready(function() {
        $('.custom_text_editors').each(function() {
            CKEDITOR.replace($(this).prop('id'), {
                removeButtons: 'PasteFromWord'
            });
        });
    });
</script>
