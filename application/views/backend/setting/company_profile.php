
<sectio>
    <div class="row justify-content-md-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <div class="text-center  com-bg"> 
                        <!-- <img src="" alt="img" class="img-responsive" > -->
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <!-- <div>
                    <hr>
                </div> -->
                <div class="card-body">
                    <small class="text-muted">Email address </small>
                    <h6><?= isset($rowData['email']) ? $rowData['email']:'Not found' ?></h6> 
                    <small class="text-muted p-t-10 db">Phone</small>
                    <h6>+91 <?= isset($rowData['phone']) ? $rowData['phone']:'Not found' ?></h6> 
                    <small class="text-muted p-t-10 db">Address</small>
                    <h6><?= isset($rowData['address']) ? $rowData['address']:'Not found' ?></h6>
                </div>
            </div>
        </div>
    </div>

</section>

<style>
    .com-bg{
        background-image: url(<?= !empty($rowData['site_logo ']) ? base_url(UPLOAD.$rowData['site_logo ']):''; ?>);
        height: 200px;
        width: 100%;
        background-size: contain;
        background-repeat: no-repeat;
        background-position-x: center;
    }
</style>