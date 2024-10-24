<?php
$cur_tab = $this->uri->segment(1) == '' ? '' : $this->uri->segment(1);
$curr_tab = $this->uri->segment(2) == '' ? '' : $this->uri->segment(2);
$currr_tab = $this->uri->segment(3) == '' ? '' : $this->uri->segment(3);
?>
<div class="breadcrumbs float-100">
    <div class="container">
        <ul>
            <li><a href="<?= base_url(''); ?>"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
            <li><a href="<?= base_url('category/finished-product') ?>">Finished Products</a></li>
            <li><?= $menu ?></li>
        </ul>
    </div>
</div>

<div class="detail-page m-t-60 float-100 inner-height">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 proSticky">
                <div class="category b-gray">
                    <h3 class="t-blue fonarto text-center m-0">Category</h3>
                    <ul>
                        <li class="<?php echo ($curr_tab == 'finished-product') ? 'active' : '' ?>"><a
                                href="<?= base_url('category/finished-product') ?>">All</a></li>
                        <?php
                        if (!empty($category)) {
                            foreach ($category as $row) {
                        ?>
                                <li class="<?php echo ($currr_tab ==  $row['slug']) ? 'active' : '' ?>"><a
                                        href="<?= base_url('category/finished/' . $row['slug']) ?>"><?= $row['name'] ?></a></li>
                        <?php }
                        } ?>
                    </ul>
                </div>
            </div>


            <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">
                <div class="row">

                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="p-images">
                            <div class="cell">
                                <?php if(!empty($pro_images)){
                                    foreach($pro_images as $img){ ?>
                                    <div class="main_image">
                                        <img src="<?= isset($img['file']) ? base_url(PRODUCT.$img['file']):''; ?>"
                                            alt="Chlorhexidine Mouthwash" class="product_img" />
                                    </div>
                                <?php } }else{ ?>
                                    <div class="main_image">
                                        <img src="<?= ASSETS_PATH . 'img/plaseholderimg.jpg'; ?>"
                                            alt="Chlorhexidine Mouthwash" class="product_img" />
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                        <section class="vertical slider">
                            <?php if(!empty($pro_images)){
                                foreach($pro_images as $img){ ?>
                                    <div>
                                        <img src="<?= isset($img['file']) ? base_url(PRODUCT.$img['file']):''; ?>"
                                            class="thumb_img" style="cursor: pointer;">
                                    </div>
                            <?php } }else{ ?> 
                                <div>
                                    <img src="<?= ASSETS_PATH . 'img/plaseholderimg.jpg'; ?>"
                                        class="thumb_img" style="cursor: pointer;">
                                </div>
                            <?php } ?>
                        </section>
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 m-m-t-25">
                        <div class="alert alert-success hide">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            Inquiry Submitted Successfully
                        </div>
                        <h1 class="t-blue fonarto m-0 heding-3 p-main-heading h1_head"><?= !empty($product['product_name']) ? $product['product_name'] : ''; ?> <span class="t-blue"></span></h1>
                        <ul class="p-list">
                            <li><strong>Product Name :</strong> <?= !empty($product['product_name']) ? $product['product_name'] : ''; ?></li>
                            <?php if(!empty($product['trade_name'])){ ?>
                                <li><strong>Trade Name:</strong> <?= !empty($product['trade_name']) ? $product['trade_name'] : ''; ?></li>
                            <?php } ?>
                            <?php if(!empty($product['available_strength'])){ ?>
                                <li><strong>Available Strength :</strong> <?= !empty($product['available_strength']) ? $product['available_strength'] : ''; ?></li>
                            <?php } ?>
                            <?php if(!empty($product['packing'])){ ?>
                                <li><strong>Packing :</strong> <?= !empty($product['packing']) ? $product['packing'] : ''; ?></li>
                            <?php } ?>
                            <?php if(!empty($product['Insert_Leaflet'])){ ?>
                                <li><strong>Pack Insert/Leaflet :</strong> <?= !empty($product['Insert_Leaflet']) ? $product['Insert_Leaflet'] : ''; ?></li>
                            <?php } ?>
                            <?php if(!empty($product['therapeutic'])){ ?>
                                <li><strong>Therapeutic use :</strong> <?= !empty($product['therapeutic']) ? $product['therapeutic'] : ''; ?></li>
                            <?php } ?>
                            <?php if(!empty($product['production_capacity'])){ ?>
                                <li><strong>Production Capacity :</strong> <?= !empty($product['production_capacity']) ? $product['production_capacity'] : ''; ?> </li>
                            <?php } ?>
                        </ul>

                        <button type="button" class="btn btn-lg f-w-600 m-t-30" data-toggle="modal" data-target="#myModal">Inquire about <?= !empty($product['product_name']) ? $product['product_name'] : ''; ?></button>

                        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title fonarto" id="myModalLabel">Inquire about <?= !empty($product['product_name']) ? $product['product_name'] : ''; ?></h4>
                                    </div>
                                    <div class="modal-body">
                                        <form method="post" class="inquiry-form">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Title</label>
                                                <input type="text" class="form-control txttitle" id="exampleInputEmail1" placeholder="Title" value="<?= !empty($product['product_name']) ? $product['product_name'] : ''; ?>" disabled="disabled">
                                                <input type="hidden" name="product_id" value="<?= !empty($product['id']) ? $product['id'] : ''; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Email<span
                                                        class="t-red">*</span></label>
                                                <input type="email" class="form-control txtemail" id="exampleInputEmail1" name="email" placeholder="Email">
                                                <span class="form-error email-error"></span>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Phone no</label>
                                                <input type="text" class="form-control txtphone" name="phone_no" id="exampleInputEmail1" placeholder="Phone no">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Country<span class="t-red">*</span></label>
                                                <input type="text" class="form-control txtcountry" id="exampleInputEmail1" name="country" placeholder="Country">
                                                <span class="form-error country-error"></span>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Leave Message<span class="t-red">*</span></label>
                                                <textarea class="form-control txtmessage" name="message" placeholder="Leave Message"></textarea>
                                                <span class="form-error msg-error"></span>
                                            </div>
                                            <input type="hidden" class="type" value="finished">
                                            <input type="hidden" class="product_id" value="506">
                                            <input type="hidden" name="form_type" class="form_type" value="Product Inquiry" />
                                            <div>
                                                <button type="submit" name="inquiresubmit" value="submit" class="btn f-w-600">Submit</button>
                                                <button type="button" class="btn f-w-600" data-dismiss="modal">Close</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="inline-block-100 m-t-40">
                    <h4 class="t-blue fonarto m-0 heding-3 desc">Description</h4>
                    <div class="m-t-20 text-justify p-detail description-p">
                        <?= !empty($product['description']) ? $product['description'] : ''; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="<?= ASSETS_PATH; ?>js/slick.js"></script>
<script src="<?= ASSETS_PATH; ?>js/lightbox.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        if (screen.width <= 767) {
            $(".category h3").click(function () {
            $(this).toggleClass("active");
            $(".category ul").toggle();
            });
        }
    });
    $(document).ready(function () {
      $('.cell').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        infinite: false,
      });

      $('.slider').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        infinite: false,
      });

      $('.cell').mBox();

      $('.slider').on('click', '.slick-slide', function (e) {
        var $currTarget = $(e.currentTarget),
          index = $currTarget.data('slick-index'),
          slickObj = $('.cell').slick('getSlick');
        slickObj.slickGoTo(index);
      });

      $(".p-images").on("contextmenu", function (e) {
        return false;
      });

      $(".product_img").on("click", function () {
        $('body').addClass('mbox-hide');
      });



    });
  </script>