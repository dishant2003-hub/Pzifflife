<?php 
    $cur_tab = $this->uri->segment(1) == '' ? '' : $this->uri->segment(1);
    $curr_tab = $this->uri->segment(2) == '' ? '' : $this->uri->segment(2);
    $currr_tab = $this->uri->segment(3) == '' ? '' : $this->uri->segment(3);
?>

<div class="breadcrumbs float-100">
    <div class="container">
        <ul>
            <li><a href="<?= base_url(''); ?>"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
            <li><h1 class="b_h1"><?= $menu ?></h1></li>
        </ul>
    </div>
</div>

<div class="list-page m-t-60 float-100 inner-height ">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 proSticky">
                <div class="category b-gray">
                    <h3 class="t-blue fonarto text-center m-0">Category</h3>
                    <ul>
                        <li class="<?php echo ($curr_tab == 'finished-product') ? 'active' : '' ?>"><a href="<?= base_url('category/finished-product') ?>">All</a></li>
                        <?php 
                            if(!empty($category)){
                                foreach($category as $row){
                        ?>
                            <li class="<?php echo ($currr_tab ==  $row['slug']) ? 'active' : '' ?>" ><a href="<?= base_url('category/finished/' . $row['slug']) ?>"><?= $row['name'] ?></a></li>
                        <?php } } ?>
                    </ul>
                </div>
            </div>

            <script type="text/javascript">
            $(document).ready(function(){
                if (screen.width <= 767) {
                $(".category h3").click(function(){
                    $(this).toggleClass("active");
                    $(".category ul").toggle();
                });
                }
            });
            </script>            
            <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">
                <div class="inline-block-100">
                    <ul class="services">
                        <?php 
                        if(!empty($product_type)){
                            foreach($product_type as $row){
                        ?>
                            <li class="<?= isset($row['color']) ? $row['color'] : ''; ?> service" data-id="<?= isset($row['slug']) ? $row['slug'] : ''; ?>">
                                <a href="<?=  base_url('category/' . $row['slug'])  ?>">
                                    <img src="<?= ASSETS_PATH; ?>images/<?= $row['image']; ?>" alt="Tablet" />
                                    <span><?= isset($row['name']) ? $row['name'] : ''; ?></span>
                                </a>
                            </li>
                        <?php } } ?>
                    </ul> 
                </div>
                
                <?php if(!empty($product_type2)){
                    foreach($product_type2 as $row2){ 
                        $productvals = $this->Service->get_all(TBL_PRODUCT, '*', array('product_type'=>$row2['id'], 'is_active' => 1));
                        if(!empty($productvals)){
                        ?>
                        <div class="inline-block-100 float-100" id="<?= isset($row2['slug']) ? $row2['slug'] : ''; ?>">
                            <h4 class="t-blue fonarto m-0 heding-3" style="margin-top:20px"><?= isset($row2['name']) ? $row2['name'] : ''; ?></h4>
                            <ul class="list">
                                <?php if(!empty($productvals)){
                                    foreach($productvals as $provals){ ?>
                                        <li>
                                            <div class="text"><a href="<?= base_url('product/finished/'.$provals['slug']); ?>"><?= $provals['product_name']; ?></a></div>
                                        </li>
                                <?php } } ?>
                            </ul>
                        </div>
                <?php } } } ?>

            </div>
        </div>
    </div>
</div>

<style>
    .default_hide_content{ height: 200px; overflow: hidden; }
    .default_show_content{ height: auto; }
    .read_more_link{ cursor: pointer; }
</style>

<script>
    $(".read_more_link").click( function(){
        if($(".content_box_main").hasClass("default_hide_content")){
            $(this).text("Read Less");
            $(".content_box_main").removeClass("default_hide_content");
            $(".content_box_main").addClass("default_show_content");
        } else {
            $(this).text("Read More");
            $(".content_box_main").removeClass("default_show_content");
            $(".content_box_main").addClass("default_hide_content");
        }
    });
</script>