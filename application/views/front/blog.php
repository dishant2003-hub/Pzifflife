<div class="container blog_container">
    <div class="row">
    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
            <?php 
            if(!empty($blog)){
                foreach($blog as $row){
            ?>
            <div class="m_t_20">
                <a href="<?= base_url('blog/'. $row['slug']) ?>">
                    <h1 class="t-blue fonarto heding-3 m-0 h1_head"><span class="word1"><?= $row['title'] ?></span> </h1>
                </a>
                <a href="<?= base_url('blog/'. $row['slug']) ?>" class='blog_link'>
                    <img width="478" height="600" src="<?= ASSETS_PATH ?>img/blog.jpg" class="attachment-twentyseventeen-featured-image size-twentyseventeen-featured-image wp-post-image" alt="blog" decoding="async" srcset="<?= ASSETS_PATH ?>img/blog.jpg 478w, <?= ASSETS_PATH ?>img/blog.jpg 239w" sizes="(max-width: 767px) 89vw, (max-width: 1000px) 54vw, (max-width: 1071px) 543px, 580px" /> </a>
                <div class="m-t-20"><?= $row['short_desc'] ?>&hellip;<a href="<?= base_url('blog/'. $row['slug']) ?>"> read more</a> </div>
            </div>
            <?php } } ?>
           
            <div class="row" style="margin-top: 25px;">
                <div class="col-xs-6 col-6">
                    <?php 
                    $search = isset($_GET['search']) ? '&search='.$_GET['search'] :'';
                    if(empty($page == 1)){
                        $num = $page - 1;
                    ?>
                    <a href="?page=<?= $num . $search ?>"  aria-label="Previous" data-page="<?= $num ?>">
                    <i class="fa fa-angle-double-left"></i> Previous Page</a>
                <?php } ?>
                </div>
                <div class="col-xs-6 col-6" style="display: flex; justify-content: end;">
                    <?php 
                    if(empty($page == $total_page)){
                        $num = $page + 1;
                    ?>
                    <a href="?page=<?= $num . $search ?>"  aria-label="Previous" data-page="<?= $num ?>">
                    Next Page <i class="fa fa-angle-double-right"></i></a>
                    <?php } ?>
                </div>
            </div>
        </div>


        <div id="secondary" class="col-lg-4 col-md-4 col-sm-4 col-xs-hidden" role="complementary" aria-label="Blog Sidebar">
            <div id="search-2" class="widget widget_search">
                <h3 class="t-blue fonarto heding-3 m-0 h1_head m_t_20">Search Blogs</h3>
                <form role="search" method="get" class="search-form" action="<?= base_url('blog') ?>">
                    <input type="hidden" name="page" value="<?= $page; ?>">
                    <input type="search" id="search-form-66d97f4f19523" class="search-field form-control" placeholder="Search &hellip;" value="<?= isset($_GET['search']) ? $_GET['search'] : '';; ?>" name="search" />
                    <button type="submit" class="search-submit btn"><span class="screen-reader-text">Search</span></button>
                </form>
            </div>
            <div id="recent-posts-2" class="widget widget_recent_entries">
                <h3 class="t-blue fonarto heding-3 m-0 h1_head m_t_20">Top Blogs</h3>
                <ul>
                    <?php
                    if (!empty($topblog)) {
                        foreach ($topblog as $row) {
                    ?>
                            <li>
                                <a href="<?= base_url(BLOG . $row['slug']) ?>"><?= $row['title'] ?></a>
                            </li>
                    <?php }
                    } ?>
                </ul>

            </div>
        </div><!-- #secondary -->
    </div><!-- .wrap -->
</div>