<div class="row">
    <div class="col-12">
        <div class="card ">
            <div class="card-body pb-0">
                <h5 class="header-title">
                    <div class="">
                        <a class="btn btn-info" href="<?php echo base_url('backend/product/add'); ?>" ><i class="fa fa-plus"></i> Add</a>
                    </div>
                </h5>
            </div>
            <div class="card-body pt-0">
                <div class="table-responsive ">
                    <?php
                    $table_data = array(
                        '#',
                        'name',
                        'product type',  
                        'category',                        
                        // 'created date',                        
                        'statu',
                        'Action',
                    );
                    render_datatable($table_data, 'product'); //class name
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="modalCenter" tabindex="-1" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content ">
            <form action="" method="POST" class="" id="upload_form" enctype="multipart/form-data">
                
                <div class="modal-header">
                    <h5 class="modal-title" id="modalCenterTitle">Upload Image</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

