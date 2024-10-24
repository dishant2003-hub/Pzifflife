<?php
$favicon = (isset($this->setting_data['favicon']) && !empty($this->setting_data['favicon'])) ?  base_url() . UPLOAD . $this->setting_data['favicon'] : ADMIN_ASSETS_PATH . "img/favicon.ico";
$site_logo = (isset($this->setting_data['site_logo']) && !empty($this->setting_data['site_logo'])) ?  base_url() . UPLOAD . $this->setting_data['site_logo'] : ADMIN_ASSETS_PATH . "img/logo.png";
?>
<!DOCTYPE html>
<html lang="en" class="light-style  customizer-hide" dir="ltr" data-theme="theme-default" data-assets-path="<?php echo ADMIN_ASSETS_PATH; ?>" data-template="vertical-menu-template">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title><?= (isset($title)) ? $title . ' | ' . SITE_TITLE : SITE_TITLE; ?></title>
    <link rel="icon" type="image/x-icon" href="<?php echo $favicon; ?>" />
    <meta name="description" content="" />
    <meta name="keywords" content="">
    <!-- Canonical SEO -->
    <!-- <link rel="canonical" href="<?= base_url() ?>"> -->

    <!-- Favicon -->
    <!-- <link rel="icon" type="image/x-icon" href="" /> -->

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&amp;family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&amp;display=swap" rel="stylesheet">

    <link rel="stylesheet" href="<?php echo ADMIN_ASSETS_PATH; ?>vendor/fonts/boxicons.css" />
    <link rel="stylesheet" href="<?php echo ADMIN_ASSETS_PATH; ?>vendor/fonts/fontawesome.css" />
    <link rel="stylesheet" href="<?php echo ADMIN_ASSETS_PATH; ?>vendor/fonts/flag-icons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="<?php echo ADMIN_ASSETS_PATH; ?>vendor/css/rtl/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="<?php echo ADMIN_ASSETS_PATH; ?>vendor/css/rtl/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="<?php echo ADMIN_ASSETS_PATH; ?>css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="<?php echo ADMIN_ASSETS_PATH; ?>vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="<?php echo ADMIN_ASSETS_PATH; ?>vendor/libs/typeahead-js/typeahead.css" />
        <!-- Vendor -->
    <link rel="stylesheet" href="<?php echo ADMIN_ASSETS_PATH; ?>vendor/libs/bs-stepper/bs-stepper.css" />
    <link rel="stylesheet" href="<?php echo ADMIN_ASSETS_PATH; ?>vendor/libs/bootstrap-select/bootstrap-select.css" />
    <link rel="stylesheet" href="<?php echo ADMIN_ASSETS_PATH; ?>vendor/libs/select2/select2.css" />
    <link rel="stylesheet" href="<?php echo ADMIN_ASSETS_PATH; ?>vendor/libs/formvalidation/dist/css/formValidation.min.css" />
    
    <!-- Page -->
    <link rel="stylesheet" href="<?php echo ADMIN_ASSETS_PATH; ?>vendor/css/pages/page-auth.css">
    <link rel="stylesheet" type="text/css" href="<?php echo ADMIN_ASSETS_PATH; ?>css/custom-theme.css?v=<?= date("YmdH"); ?>">
</head>

<body>
    <?php
    $bg_imag_arr = array('illustrations/create-account-light.png');
    ?>
    <div class="authentication-wrapper authentication-cover">
        <div class="authentication-inner row m-0">
            <!-- /Left Text -->
            <div class="d-none d-lg-flex col-lg-4 align-items-center justify-content-end p-5 pe-0">
                <div class="w-px-400">
                    <img src="<?php echo ADMIN_ASSETS_PATH; ?>img/<?= $bg_imag_arr[array_rand($bg_imag_arr)] ?>" alt="Login Bg image" width="100%" class="img-fluid authentication-cover-img" />
                    <!-- <div class="mx-auto">
                        <h3><?= SITE_TITLE ?></h3>
                    </div> -->
                </div>
            </div>
            <!-- /Left Text -->

            <!-- Login -->
            <div class="d-flex col-lg-8 authentication-bg p-sm-5 p-3">
                <div class="d-flex flex-column w-px-700 mx-auto">
                    <!-- Logo -->
                    <div class="app-brand border-bottom mx-3 mb-4">
                        <a href="<?= base_url(); ?>" class="app-brand-link gap-2 mb-2">
                            <span class="app-brand-logo">
                                <img src="<?= $site_logo; ?>" width="150" />
                            </span>
                        </a>
                    </div>
                    <!-- /Logo -->

                    <?php if (isset($msg) || validation_errors() !== '') : ?>
                        <div class="alert alert-danger alert-dismissible">
                            <!-- <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button> -->
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"> </button>
                            <?= validation_errors(); ?>
                            <?= isset($msg) ? $msg : ''; ?>
                        </div>
                    <?php endif; ?>

                    <div class="my-auto">
                        <div id="multiStepsValidation" class="bs-stepper shadow-none">
                            <div class="bs-stepper-header">
                                <div class="step" data-target="#accountDetailsValidation">
                                    <button type="button" class="step-trigger">
                                        <span class="bs-stepper-circle">
                                            <i class="bx bx-home"></i>
                                        </span>
                                        <span class="bs-stepper-label">
                                            <span class="bs-stepper-title">Account</span>
                                            <span class="bs-stepper-subtitle">Account Details</span>
                                        </span>
                                    </button>
                                </div>
                                <div class="line"></div>
                                <div class="step" data-target="#personalInfoValidation">
                                    <button type="button" class="step-trigger">
                                        <span class="bs-stepper-circle">
                                            <i class="bx bx-user"></i>
                                        </span>
                                        <span class="bs-stepper-label">
                                            <span class="bs-stepper-title">Personal</span>
                                            <span class="bs-stepper-subtitle">Enter Information</span>
                                        </span>
                                    </button>
                                </div>
                            </div>
                            <div class="bs-stepper-content pt-4">
                                <!-- <form id="multiStepsForm" onSubmit="return false" enctype="multipart/form-data"> -->
                                <?php echo form_open('', 'id="multiStepsForm" enctype="multipart/form-data"'); ?>
                                    <!-- Account Details -->
                                    <div id="accountDetailsValidation" class="content">
                                        <div class="content-header mb-3">
                                            <h4>Account Information</h4>
                                            <span>Enter Your Account Details</span>
                                        </div>
                                        <div class="row g-3">
                                            <div class="col-sm-6">
                                                <label class="form-label" for="user_fullname">Name</label>
                                                <input type="text" name="user_fullname" id="user_fullname" class="form-control" placeholder="john" />
                                            </div>
                                            <div class="col-sm-6">
                                                <label class="form-label" for="user_last_name">Surname</label>
                                                <input type="text" name="user_last_name" id="user_last_name" class="form-control" placeholder="Doe" />
                                            </div>
                                            <div class="col-sm-6">
                                                <label class="form-label" for="user_email">Email</label>
                                                <input type="email" name="user_email" id="user_email" class="form-control" placeholder="john.doe@email.com" aria-label="john.doe" />
                                            </div>
                                            <!-- <div class="col-sm-6">
                                                <label class="form-label" for="register_role">Account Type</label>
                                                <select name="register_role" id="register_role" class="form-control">
                                                <option value="0">Select Type</option>
                                                <?php  /*
                                                if(!empty($user_role_list)){
                                                    foreach($user_role_list as $row){ ?>
                                                        <option value="<?= $row['id'] ?>" <?=(isset($rowData['user_role']) && $rowData['user_role'] == $row['id']) ? 'selected' : '';?>><?= $row['name'] ?></option>
                                                    <?php }
                                                } */  ?>
                                                </select>
                                            </div> -->
                                            <input type="hidden" name="register_role" class="form-control" value="3">

                                            <div class="col-sm-6 form-password-toggle">
                                                <label class="form-label" for="user_password">Password</label>
                                                <div class="input-group input-group-merge">
                                                    <input type="password" id="user_password" name="user_password" class="form-control" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="multiStepsPass2" />
                                                    <span class="input-group-text cursor-pointer" id="multiStepsPass2"><i class="bx bx-hide"></i></span>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 form-password-toggle">
                                                <label class="form-label" for="multiStepsConfirmPass">Confirm Password</label>
                                                <div class="input-group input-group-merge">
                                                    <input type="password" id="multiStepsConfirmPass" name="multiStepsConfirmPass" class="form-control" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="multiStepsConfirmPass2" />
                                                    <span class="input-group-text cursor-pointer" id="multiStepsConfirmPass2"><i class="bx bx-hide"></i></span>
                                                </div>
                                            </div>
                                            <?php /*
                                            <div class="col-sm-6 d-none divTechnicianInput">
                                                <label class="form-label" for="license_plate">License Plate</label>
                                                <input type="text" name="license_plate" id="license_plate" class="form-control" placeholder="" />
                                            </div>
                                            */ ?>
                                            <div class="col-12 d-flex justify-content-between mt-4">
                                                <button class="btn btn-label-secondary btn-prev" disabled> <i class="bx bx-chevron-left bx-sm ms-sm-n2"></i>
                                                    <span class="d-sm-inline-block d-none">Previous</span>
                                                </button>
                                                <button class="btn btn-dark btn-next"> <span class="d-sm-inline-block d-none me-sm-1 me-0">Next</span> <i class="bx bx-chevron-right bx-sm me-sm-n2"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Personal Info -->
                                    <div id="personalInfoValidation" class="content">
                                        <div class="content-header mb-3">
                                            <h4>Personal Information</h4>
                                            <span>Enter Your Personal Information</span>
                                        </div>
                                        <div class="row g-3">
                                            <div class="col-sm-12">
                                                <label class="form-label" for="picture">Picture</label>
                                                <input type="file" id="picture" name="picture" class="form-control" required />
                                            </div>
                                            <div class="col-sm-6">
                                                <label class="form-label" for="user_mobile">Mobile</label>
                                                <div class="input-group input-group-merge">
                                                    <span class="input-group-text">(<?= DEFAULT_COUNTY_CODE ?>)</span>
                                                    <input type="text" id="user_mobile" name="user_mobile" class="form-control multi-steps-mobile" placeholder="202 555 0111" />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label" for="dob">Birthday</label>
                                                <input type="date" id="dob" name="dob" class="form-control" placeholder="Area/Landmark" />
                                            </div>
                                            <div class="col-md-12">
                                                <label class="form-label" for="user_address">Address</label>
                                                <input type="text" id="user_address" name="user_address" class="form-control" placeholder="Address" />
                                            </div>
                                            <div class="col-sm-6">
                                                <label class="form-label" for="user_pincode">Zipcode</label>
                                                <input type="text" id="user_pincode" name="user_pincode" class="form-control multi-steps-pincode" placeholder="Postal Code" maxlength="6" />
                                            </div>
                                            <div class="col-sm-6">
                                                <label class="form-label" for="user_city">City</label>
                                                <input type="text" id="user_city" name="user_city" class="form-control" placeholder="City" />
                                            </div>
                                            <!-- <div class="col-sm-6">
                                                <label class="form-label" for="multiStepsState">State</label>
                                                <select id="multiStepsState" class="select2 form-select" data-allow-clear="true">
                                                    <option value="">Select</option>
                                                    <option value="AL">Alabama</option>
                                                    <option value="AK">Alaska</option>
                                                    <option value="AZ">Arizona</option>
                                                    <option value="AR">Arkansas</option>
                                                    <option value="CA">California</option>
                                                    <option value="CO">Colorado</option>
                                                    <option value="CT">Connecticut</option>
                                                    <option value="DE">Delaware</option>
                                                    <option value="DC">District Of Columbia</option>
                                                    <option value="FL">Florida</option>
                                                    <option value="GA">Georgia</option>
                                                    <option value="HI">Hawaii</option>
                                                    <option value="ID">Idaho</option>
                                                    <option value="IL">Illinois</option>
                                                    <option value="IN">Indiana</option>
                                                    <option value="IA">Iowa</option>
                                                    <option value="KS">Kansas</option>
                                                    <option value="KY">Kentucky</option>
                                                    <option value="LA">Louisiana</option>
                                                    <option value="ME">Maine</option>
                                                    <option value="MD">Maryland</option>
                                                    <option value="MA">Massachusetts</option>
                                                    <option value="MI">Michigan</option>
                                                    <option value="MN">Minnesota</option>
                                                    <option value="MS">Mississippi</option>
                                                    <option value="MO">Missouri</option>
                                                    <option value="MT">Montana</option>
                                                    <option value="NE">Nebraska</option>
                                                    <option value="NV">Nevada</option>
                                                    <option value="NH">New Hampshire</option>
                                                    <option value="NJ">New Jersey</option>
                                                    <option value="NM">New Mexico</option>
                                                    <option value="NY">New York</option>
                                                    <option value="NC">North Carolina</option>
                                                    <option value="ND">North Dakota</option>
                                                    <option value="OH">Ohio</option>
                                                    <option value="OK">Oklahoma</option>
                                                    <option value="OR">Oregon</option>
                                                    <option value="PA">Pennsylvania</option>
                                                    <option value="RI">Rhode Island</option>
                                                    <option value="SC">South Carolina</option>
                                                    <option value="SD">South Dakota</option>
                                                    <option value="TN">Tennessee</option>
                                                    <option value="TX">Texas</option>
                                                    <option value="UT">Utah</option>
                                                    <option value="VT">Vermont</option>
                                                    <option value="VA">Virginia</option>
                                                    <option value="WA">Washington</option>
                                                    <option value="WV">West Virginia</option>
                                                    <option value="WI">Wisconsin</option>
                                                    <option value="WY">Wyoming</option>
                                                </select>
                                            </div> -->
                                            <div class="col-12 d-flex justify-content-between mt-4">
                                                <button class="btn btn-dark btn-prev"> <i class="bx bx-chevron-left bx-sm ms-sm-n2"></i>
                                                    <span class="d-sm-inline-block d-none">Previous</span>
                                                </button>
                                                <button type="submit" name="SubmitRegister" value="Submit" class="btn btn-success btn-next btn-submit">Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                <?php echo form_close(); ?>

                                <p class="text-center pt-2">
                                    <span>Already have an account?</span>
                                    <a href="<?= base_url('login') ?>"> <span>Sign in instead</span> </a>
                                </p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!-- /Login -->
        </div>
    </div>
    <!-- / Content -->

    
    <script>
    // Check selected custom option
    window.Helpers.initCustomOptionCheck();
    </script>
    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="<?php echo ADMIN_ASSETS_PATH; ?>vendor/libs/jquery/jquery.js"></script>
    <script src="<?php echo ADMIN_ASSETS_PATH; ?>vendor/libs/popper/popper.js"></script>
    <script src="<?php echo ADMIN_ASSETS_PATH; ?>vendor/js/bootstrap.js"></script>
    <script src="<?php echo ADMIN_ASSETS_PATH; ?>vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    
    <script src="<?php echo ADMIN_ASSETS_PATH; ?>vendor/libs/hammer/hammer.js"></script>
    

    <script src="<?php echo ADMIN_ASSETS_PATH; ?>vendor/libs/i18n/i18n.js"></script>
    <script src="<?php echo ADMIN_ASSETS_PATH; ?>vendor/libs/typeahead-js/typeahead.js"></script>
    
    <script src="<?php echo ADMIN_ASSETS_PATH; ?>vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="<?php echo ADMIN_ASSETS_PATH; ?>vendor/libs/cleavejs/cleave.js"></script>
    <script src="<?php echo ADMIN_ASSETS_PATH; ?>vendor/libs/cleavejs/cleave-phone.js"></script>
    <script src="<?php echo ADMIN_ASSETS_PATH; ?>vendor/libs/bs-stepper/bs-stepper.js"></script>
    <script src="<?php echo ADMIN_ASSETS_PATH; ?>vendor/libs/select2/select2.js"></script>
    <script src="<?php echo ADMIN_ASSETS_PATH; ?>vendor/libs/formvalidation/dist/js/FormValidation.min.js"></script>
    <script src="<?php echo ADMIN_ASSETS_PATH; ?>vendor/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js"></script>
    <script src="<?php echo ADMIN_ASSETS_PATH; ?>vendor/libs/formvalidation/dist/js/plugins/AutoFocus.min.js"></script>

    <!-- Main JS -->
    <script src="<?php echo ADMIN_ASSETS_PATH; ?>js/main.js"></script>

    <!-- Page JS -->
    <script src="<?php echo ADMIN_ASSETS_PATH; ?>js/pages-auth-multisteps.js"></script>

    <script>
    $(document).ready(function () {
        /*$(document).delegate("#register_role", "change", function (event) {
            if($(this).val()==7){
                $('.divTechnicianInput').removeClass('d-none');
            }else{
                $('.divTechnicianInput').addClass('d-none');
            }
        });*/
    });
    </script>
</body>

</html>