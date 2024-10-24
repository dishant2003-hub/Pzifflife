<?php if(validation_errors() !== '' || $this->session->flashdata('error_msg') != "" || $this->session->flashdata('success_msg') != ""): ?>
    <?php if($this->session->flashdata('success_msg') != ""){ ?>
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            <strong> <?php echo $this->session->flashdata('success_msg'); ?></strong>
            <?php
            if(isset($_SESSION['success_msg'])){
                unset($_SESSION['success_msg']);
            } ?>
        </div>
    <?php }else{ ?>
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            <strong><?= validation_errors(); ?>
            <?= $this->session->flashdata('error_msg'); ?></strong>
            <?php
            if(isset($_SESSION['error_msg'])){
                unset($_SESSION['error_msg']);
            } ?>
        </div>
    <?php } ?>
<?php endif; ?>