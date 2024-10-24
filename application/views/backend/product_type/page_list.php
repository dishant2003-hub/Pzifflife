<div class="row">
    <div class="col-12">
        <div class="card ">
            <div class="card-body pb-0">
                <h5 class="header-title">
                    <div class="">
                        <a class="btn btn-info" href="<?php echo base_url('backend/product_type/add'); ?>" ><i class="fa fa-plus"></i> Add</a>
                    </div>
                </h5>
            </div>
            <div class="card-body pt-0">
                <div class="table-responsive ">
                    <?php
                    $table_data = array(
                        '#',
                        'name',
                        'slug',                        
                        'image',  
                        'color',    
                        // 'status',
                        'Action',
                    );
                    render_datatable($table_data, 'product_type'); //class name
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>