<?php
$mobile = isset($this->setting_data['mobile']) ? $this->setting_data['mobile'] : '';
$phone = isset($this->setting_data['phone']) ? $this->setting_data['phone'] : '';
$email = isset($this->setting_data['email']) ? $this->setting_data['email'] : '';
$fax = isset($this->setting_data['fax']) ? $this->setting_data['fax'] : '';
?>

<div class="breadcrumbs float-100">
  <div class="container">
    <ul>
      <li><a href="<?= base_url('') ?>"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
      <li>Contact Us</li>

    </ul>
  </div>
</div>

<div class="contact-page inner-height m-t-60 float-100">
  <div class="container">
    <h1 class="t-blue fonarto m-0 heding-3 h1_head"><span class="word1">Contact</span> Us</h1>
    <div class="row">
      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 m-t-30">
        <ul class="list">
          <li>
            <div class="icon-box">
              <i class="fa fa-map-marker"></i>
            </div>
            <div class="content">
              CORPORATE ADDRESS<br>
              Wellona Pharma<br>
              243, Leonard Square, Yogi Chowk<br>
              Nana Varachha, Surat, Gujarat<br>
              India - 395006
            </div>
          </li>
          <li>
            <div class="icon-box">
              <i class="fa fa-mobile-phone"></i>
            </div>
            <div class="content">
              Mobile: +91-<?= $mobile ?><br>Phone: +91-<?= $phone ?></div>
          </li>
          <li>
            <div class="icon-box">
              <i class="fa fa-fax"></i>
            </div>
            <div class="content">
              Fax: +91-<?= $fax ?></div>
          </li>
          <li>
            <div class="icon-box">
              <i class="fa fa-envelope"></i>
            </div>
            <div class="content">
              Email:<a href="mailto:info@wellonapharma.com" class="t-black"><?= $email ?></a>
            </div>
          </li>
        </ul>        
      </div>
      <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 m-t-40">
        <div class="alert alert-success hide">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          Form successfully Submitted
        </div>
        <div class='form-error'></div>
        <form action="#" method="POST" class="inquiry-form">
          <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 form-group">
              <label>Name<span class="t-red">*</span></label>
              <input type="text" name="name" class="form-control txtname" />
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 form-group">
              <label>Email<span class="t-red">*</span></label>
              <input type="text" name="email" class="form-control txtemail" placeholder="Email" />
            </div>             
          </div>
          <div class="row">           
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 form-group">
              <label>Phone no</label>
              <input type="text" name="phone" class="form-control txtphone" />
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 form-group">            
              <label>Country<span class="t-red">*</span></label>
              <input type="text" name="country" class="form-control txtcountry" />
            </div>
          </div>          
          <div class="form-group">            
            <label>Leave Message</label>
            <textarea name="message" class="form-control txtmessage"></textarea>
          </div>
          <input type="submit" value="submit" name="submit" class="btn btn-submit f-w-600" />
        </form>
      </div>
    </div>
  </div>
</div>