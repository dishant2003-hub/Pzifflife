<div class="breadcrumbs float-100">
  <div class="container">
    <ul>
      <li><a href="<?= base_url('') ?>"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
      <li>Gallery</li>
    </ul>
  </div>
</div>

<div class="inner-height i-page m-t-60 float-100 galler_page">
    <div class="container">
        <h1 class="t-blue fonarto m-0 heding-3 h1_head">GALLERY of WELLONA PHARMA</h1>
        <div class="filterbox">
            <label>Filter </label>
            <select class="sel_gp_type gallery_filter">
                <option value="0">Select All</option>
                <?php 
                    if(!empty($producttype)){
                        foreach($producttype as $row){ ?>
                            <option value="<?= $row['id'] ?>"><?= $row['name'] ?></option>

                <?php   }
                    }
                ?>
            </select>
        </div>


        <div class="m-t-30 g_img_box_wrap">
            <?php
            if (!empty($gallery)) {
                foreach ($gallery as $proname => $productimg) {
            ?>
                    <div class="g_img_box gp_type_suspensions_syrups">
                        <div class="g_img_box_inner">
                            <a href="<?= base_url(PRODUCT . $productimg['file']) ?>" class="tip_trigger magnifi-image-popup" style="cursor: pointer;">
                                <img class="marker" src="<?= base_url(PRODUCT . $productimg['file']) ?>" alt="image" />
                            </a>
                        </div>
                        <div class="g_img_box_content" link_path="<?= base_url('product/finished/' . $productimg['product_slug']); ?>">
                            <h4><a href="<?= base_url('product/finished/' . $productimg['product_slug']); ?>"><?= $proname; ?></a></h4>
                        </div>
                    </div>
            <?php }
            } ?>
        </div>
    </div>
</div>

