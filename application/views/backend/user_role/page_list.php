<style>
div.dataTables_wrapper .table.dataTable thead th:nth-last-child(4){
    width: 70px;
    text-align: center;
}
</style>
<div class="row">
    <div class="col-12">
        <div class="card ">
            <div class="card-body pb-0">
                <?php  if(check_permission('user_role', 'can_create', $this->user_permission)){ ?>
                    <h5 class="header-title">
                        <div class="">
                            <a class="btn btn-dark" href="<?php echo base_url('backend/user_role/add'); ?>" ><i class="fa fa-plus"></i> Add</a>
                        </div>
                    </h5>
                <?php   }?>
                
            </div>
            <div class="card-body pt-0">
                <div class="table-responsive ">
                    <?php
                    $table_data = array(
                        '#',
                        'Name',
                        'Type',
                        'Permission',
                        'Date',
                        'Status',
                        'Action',
                    );
                    render_datatable($table_data, 'user_role');
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
