<div class="row">
    <div class="col-12">
        <div class="card"> 
            <div class="card-body row"> 
                <div class="col-12 col-sm-3">
                    <div class="card">
                    <div class="card-body">
                        <form action="" class="dropzone needsclick" id="dropzone-basic">
                            <div class= needsclick" style="text-align: center; padding: 72px 0; font-weight: 500; font-size: 27px; color: #516377;">
                                click to upload
                            </div>
                            <div class="fallback">
                                <input id="dropzone" name="files[]" type="file" multiple/>
                            </div>
                        </form>
                    </div>
                    </div>
                </div>

                <?php 
                if(!empty($savedata)){
                    foreach($savedata as $row){
                ?>        
                <div class="col-sm-3">
                    <div class="card">
                        <a class="tip_trigger" style="height: 280px;">
                            <img class="images" src="<?= base_url(GALLERY . $row['image']) ?>" alt="image" />
                            <a href="javascript:void(0);" id="<?= $row['id'] ?>" class="cancel deletegallery"><i class='fas fa-times-circle'></i></a>
                        </a> 
                    </div> 
                </div>                  
                <?php
                    } }
                ?>
                 <!-- <div class="ps-pagination">
                    <ul class="pagination">
                        <li class=""> <?= $links; ?></li>
                    </ul>
                </div> -->
                <?= $links; ?> 
            </div>
        </div>
    </div>
</div>


<style>
    
.ps-pagination {
  padding: 30px;
}

.ps-pagination .pagination {
  margin-bottom: 0;
  justify-content: center;
}

.ps-pagination .pagination a {
  width: 34px;
  height: 34px;
  margin: 0 4px;
  font-size: 14px;
  color: #103178;
  font-weight: bold;
  display: inline-flex;
  justify-content: center;
  align-items: center;
}

.ps-pagination .pagination a i {
  font-weight: bold;
}

.ps-pagination .pagination .active a {
  background-color: #103178;
  color: white;
  border-radius: 50%;
}

.ps-breadcrumb {
  list-style: none;
  padding: 20px 0 !important;
  margin: 0;
}

.ps-breadcrumb__item {
  position: relative;
  display: inline-block;
  color: #103178;
  font-size: 14px;
}

.ps-breadcrumb__item:before {
  content: '\203A';
  display: inline-block;
  border-radius: 50%;
  margin: 0 10px;
  color: #103178;
}

.ps-breadcrumb__item a {
  color: #103178;
  font-size: 14px;
}

.ps-breadcrumb__item a:hover {
  color: #FD8D27;
}
</style>

