<?php 
$mobile = isset($this->setting_data['mobile']) ? $this->setting_data['mobile'] : '';
$phone = isset($this->setting_data['phone']) ? $this->setting_data['phone'] : '';
$email = isset($this->setting_data['email']) ? $this->setting_data['email'] : '';
$sterile = isset($this->sterile) ? $this->sterile : '';
$non_sterile = isset($this->non_sterile) ? $this->non_sterile : '';
?>

<div class="zoom-img">
  <img src="admincms/gallery_img/gallery_resize_img/enoxawell-60-injection_1529155735.html" alt="WELLONA" />
</div>
<script src="<?= ASSETS_PATH; ?>js/slick.js" defer></script>
<script type="text/javascript">
  $(document).ready(function() {

   
  });
</script>

<div class="index_footer">

  <div class="footer m-t-60 float-100" p_self="/index.php">
    <div class="container">
      <div class="row">
        <div class="col-12 col-sm-4 col-md-4 col-lg-4 foot-top-box">
          <a href="https://g.page/wellonapharma?share">
            <div class="foot-top">
              <div class="foot-top-txt">
                <p>Address</p>
                <h4>Find Us On Map</h4>
              </div>
              <div class="foot-top-img"><img src="<?= ASSETS_PATH; ?>images/well_foot_add.png"></div>
            </div>
          </a>
        </div>
        <div class="col-12 col-sm-4 col-md-4 col-lg-4 foot-top-box">
          <div class="foot-top">
            <div class="foot-top-txt">
              <p>Phone</p>
              <h4>+ 91-<?= $phone ?></h4>
            </div>
            <div class="foot-top-img"><img src="<?= ASSETS_PATH; ?>images/well_foot_phone.png"></div>
          </div>
        </div>
        <div class="col-12 col-sm-4 col-md-4 col-lg-4 foot-top-box">
          <a href="mailto:info@wellonapharma.com">
            <div class="foot-top">
              <div class="foot-top-txt">
                <p>Email</p>
                <h4><?= $email ?></h4>
              </div>
              <div class="foot-top-img"><img src="<?= ASSETS_PATH; ?>images/well_foot_email.png"></div>
            </div>
          </a>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12  footer-div">
          <h5 class="t-green fonarto m-t-0 f-click relative"><span class="t-blue">Get </span> in touch</h5>
          <ul class="contact-info f-open">
            <li>
              <i class="fa fa-map-marker b-blue img-circle text-center"></i>
              <span>
                <span class="fonarto t-green cont_add">Corporate Address</span><br />Pziff Life Care<br>
                243, Leonard Square, Yogi Chowk<br>
                Nana Varachha, Surat, Gujarat<br>
                India - 395006
              </span>
            </li>
            <li>
              <i class="fa fa-mobile-phone b-blue img-circle text-center"></i>
              <span>
                Mobile: +91-<?= $mobile ?> </span>
            </li>
            <li>
              <i class="fa fa-phone b-blue img-circle text-center"></i>
              <span>
                Phone: +91-<?= $phone ?> </span>
            </li>
            <li>
              <i class="fa fa-envelope-o b-blue img-circle text-center"></i>
              <span>
                Email: <a href="mailto:<?= $email ?>" class="t-black"><?= $email ?></a>
              </span>
            </li>
          </ul>
        </div>
        <div class="col-lg-5 col-md-5 col-sm-6 col-xs-12 footer-div">
          <h5 class="t-green fonarto m-t-0 f-click relative"><span class="t-blue">Additional </span> Links</h5>
          <ul class="list links_ul f-open">
            <p class="fonarto t-green">Sterile</p>
            <?php 
              if(!empty($sterile)){
                foreach($sterile as $row){
            ?>
            <li><a href="<?= base_url('category/' . $row['slug'])  ?>"><?= $row['name'] ?></a></li>
            <?php } } ?>
          </ul>
          <ul class="list links_ul f-open">
            <p class="fonarto t-green">Non-Sterile</p>
            <?php 
              if(!empty($non_sterile)){
                foreach($non_sterile as $row){
            ?>
            <li><a href="<?= base_url('category/' . $row['slug'])  ?>"><?= $row['name'] ?></a></li>
            <?php } } ?>
          </ul>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 certificate_logo footer-div">
          <h5 class="t-green fonarto m-t-0 f-click relative"><span class="t-blue">Global </span> Certifications</h5>
          <ul class="list newbadge f-open">
            <li><a href="<?= base_url('certificate') ?>"><img src="<?= ASSETS_PATH; ?>images/badge_01.png" alt="who gmp" /></a></li>
            <li><a href="<?= base_url('certificate') ?>"><img src="<?= ASSETS_PATH; ?>images/badge_02.png" alt="iso-certificated" /></a></li>
            <li><a href="<?= base_url('certificate') ?>"><img src="<?= ASSETS_PATH; ?>images/badge_03.png" alt="export-house" /></a></li>
            <li><a href="<?= base_url('certificate') ?>"><img src="<?= ASSETS_PATH; ?>images/badge_04.png" alt="nafdac" /></a></li>
            <li><a href="<?= base_url('certificate') ?>"><img src="<?= ASSETS_PATH; ?>images/badge_05.png" alt="fda" /></a></li>
            <li><a href="<?= base_url('certificate') ?>"><img src="<?= ASSETS_PATH; ?>images/badge_06.png" alt="pharmexcil" /></a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>


<footer class="b-footer float-100">
  <ul class="float-100 text-center hidden-xs">
    <li><a href="<?= base_url('') ?>">Home</a></li>
    <li><a href="<?= base_url('about') ?>">About us</a></li>
    <li><a href="<?= base_url('about') ?>">Company Profile</a></li>
    <li><a href="<?= base_url('global-pressance') ?>">Global Presence</a></li>
    <li><a href="<?= base_url('manufacturing') ?>">Infrastructure</a></li>
    <li><a href="<?= base_url('category/finished-product') ?>">Products</a></li>
    <li><a href="<?= base_url('contract-manufacturing') ?>">Services</a></li>
    <li><a href="<?= base_url('marketing') ?>">Marketing</a></li>
    <li><a href="<?= base_url('research-development') ?>">R & D</a></li>
    <li><a href="<?= base_url('career') ?>">Career</a></li>
    <li><a href="<?= base_url('blog') ?>">Blog</a></li>
    <li><a href="<?= base_url('contact-us') ?>">Contact us</a></li>
  </ul>
  <p class="float-100 text-center">Copyright 2024 - Pziff Life Care - All Rights Reserved.</p>

  <div class="social hidden-lg">
    <ul class="m-0 p-0">
      <li><a href="https://www.facebook.com/Wellona-Pharma-737196699994394/" target="_blank"
          class="fa fa-facebook"></a></li>
      <li><a href="https://twitter.com/Wellona_Pharma" target="_blank" class="fa fa-twitter"></a></li>
      <li><a href="https://www.linkedin.com/company/wellona-pharma/" target="_blank" class="fa fa-linkedin"></a></li>
      <li><a href="https://plus.google.com/b/109289098610178185579/109289098610178185579" target="_blank"
          class="fa fa-google-plus"></a></li>
      <li><a href="https://www.youtube.com/channel/UChnsnHa7ZPYWPkXkl72qSsw/about" target="_blank"
          class="fa fa-youtube-play"></a></li>
    </ul>
  </div>
</footer>

<a href="https://api.whatsapp.com/send?phone=917490041245&amp;text=Hello!+I+would+like+more+information+about+wellona+pharma."
  class="wp_sticky" target="_blank">
  <i class="fa fa-whatsapp my-float"></i>
</a>

<p id="back-top">
  <a style="cursor: pointer;" class="fa fa-angle-up"></a>
</p>


<script type="text/javascript">
  $(document).ready(function() {
     
  });
</script>
<script src="<?= ASSETS_PATH; ?>js/lettering.js" defer></script>
<script src="<?= ASSETS_PATH; ?>js/general.js" defer></script>

  <!-- magnific -->
  <script src="<?= ASSETS_PATH; ?>js/jquery.magnific-popup.js"></script>
  <script src="<?= ASSETS_PATH; ?>js/jquery.magnific-popup.min.js"></script>


</body>


</html>