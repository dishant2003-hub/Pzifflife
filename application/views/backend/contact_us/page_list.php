<div class="row">
    <div class="col-12">
        <div class="card ">
            <div class="card-body pb-0">
           
            </div>
            <div class="card-body pt-0">
                <div class="table-responsive ">
                    <?php
                    $table_data = array(
                        '#',
                        'name',                        
                        'email',  
                        'phone',    
                        'country',                        
                        'message',
                        'Action',
                    );
                    render_datatable($table_data, 'contact'); //class name
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>