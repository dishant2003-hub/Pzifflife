<div class="row">
    <input class="" type="hidden" name="product_id"  id="product" value="<?= isset($product_id) ? $product_id:''; ?>">
    <div class="col-md-12 mb-3">
        <label for="nameWithTitle" class="form-label">Images</label>
        <input type="file" id="nameWithTitle" class="form-control" multiple name="images[]">
    </div>
<?php if(!empty($images)){
     foreach($images as $img){ ?>
        <div class="col-md-3 mb-3 text-center imgdiv">
            <div class="onboarding-media ">
                <img src="<?= isset($img['file']) ? base_url(PRODUCT.$img['file']):''; ?>" alt="boy-verify-email-light" width="273" class="img-fluid" data-app-light-img="illustrations/boy-verify-email-light.png" data-app-dark-img="illustrations/boy-verify-email-dark.png">
            </div>
            <a class="btn rounded-pill btn-warning" href="<?= isset($img['file']) ? base_url(PRODUCT.$img['file']):''; ?>" download> Download </a>
            <button type="button" data-id="<?= isset($img['id']) ? $img['id']:''; ?>" class="btn rounded-pill btn-danger delete_product_image">Delete</button>
        </div>
<?php } } ?>

</div>