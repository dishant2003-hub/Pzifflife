-- Adminer 4.2.5 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `tbllanguage`;
CREATE TABLE `tbllanguage` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text,
  `key` varchar(10) DEFAULT NULL,
  `is_active` tinyint(2) NOT NULL DEFAULT '1' COMMENT '0=>Inactive, 1=>Active',
  `is_delete` tinyint(2) NOT NULL DEFAULT '0' COMMENT '0=>No, 1=>Yes',
  `created_time` datetime DEFAULT NULL,
  `updated_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `tbllanguage` (`id`, `title`, `key`, `is_active`, `is_delete`, `created_time`, `updated_time`) VALUES
(1,	'English',	'en',	1,	0,	'2022-09-02 11:46:56',	'2022-09-02 11:46:56'),
(2,	'Turkey',	'tr',	1,	0,	'2022-09-02 11:46:56',	'2022-09-02 11:46:56'),
(3,	'Arabic',	'ar',	1,	1,	'2022-09-06 14:40:57',	'2022-09-06 14:41:07');

DROP TABLE IF EXISTS `tbllanguage_key`;
CREATE TABLE `tbllanguage_key` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `key` varchar(255) DEFAULT NULL,
  `value_en` text,
  `value_tr` text,
  `is_active` tinyint(2) NOT NULL DEFAULT '1' COMMENT '0=>Inactive, 1=>Active',
  `is_delete` tinyint(2) NOT NULL DEFAULT '0' COMMENT '0=>No, 1=>Yes',
  `created_time` datetime DEFAULT NULL,
  `updated_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `tbllanguage_key` (`id`, `key`, `value_en`, `value_tr`, `is_active`, `is_delete`, `created_time`, `updated_time`) VALUES
(1,	'invalidLogin',	'Invalid Email or Password!',	NULL,	1,	0,	'2022-09-02 11:46:34',	'2022-09-02 11:46:34'),
(2,	'pwdChangeSuc',	'Password has been changed successfully!',	NULL,	1,	0,	'2022-09-02 11:46:34',	'2022-09-02 11:46:34'),
(3,	'recAddSuc',	'Record is Added Successfully!',	NULL,	1,	0,	'2022-09-02 11:46:34',	'2022-09-02 11:46:34'),
(4,	'recUpSuc',	'Record is Updated Successfully!',	NULL,	1,	0,	'2022-09-02 11:46:34',	'2022-09-02 11:46:34'),
(5,	'recDelSuc',	'Record is Deleted Successfully!',	NULL,	1,	0,	'2022-09-02 11:46:34',	'2022-09-02 11:46:34'),
(6,	'recNotFound',	'Record not found',	NULL,	1,	0,	'2022-09-02 11:46:34',	'2022-09-02 11:46:34'),
(7,	'passMissingParam',	'Please enter Missing parameter.',	NULL,	1,	0,	'2022-09-02 11:46:34',	'2022-09-02 11:46:34'),
(8,	'passEmail',	'Please enter Email.',	NULL,	1,	0,	'2022-09-02 11:46:34',	'2022-09-02 11:46:34'),
(9,	'passFname',	'Please enter Name.',	NULL,	1,	0,	'2022-09-02 11:46:34',	'2022-09-02 11:46:34'),
(10,	'passFamilyName',	'Please enter Family Name.',	NULL,	1,	0,	'2022-09-02 11:46:34',	'2022-09-02 11:46:34'),
(12,	'passLangType',	'Please pass Language type.',	NULL,	1,	0,	'2022-09-02 11:46:34',	'2022-09-02 11:46:34'),
(13,	'passMobile',	'Please enter Mobile Number.',	NULL,	1,	0,	'2022-09-02 11:46:34',	'2022-09-02 11:46:34'),
(14,	'passPwd',	'Please enter password.',	NULL,	1,	0,	'2022-09-02 11:46:34',	'2022-09-02 11:46:34'),
(16,	'passDeviceType',	'Please pass device type.',	NULL,	1,	0,	'2022-09-02 11:46:34',	'2022-09-02 11:46:34'),
(17,	'passDeviceToken',	'Please pass device token.',	NULL,	1,	0,	'2022-09-02 11:46:34',	'2022-09-02 11:46:34'),
(19,	'emailExist',	'This Email Already Exist',	NULL,	1,	0,	'2022-09-02 11:46:34',	'2022-09-02 11:46:34'),
(20,	'regSuccess',	'User register Successfully.',	NULL,	1,	0,	'2022-09-02 11:46:34',	'2022-09-02 11:46:34'),
(22,	'regFail',	'Fail to register User.',	NULL,	1,	0,	'2022-09-02 11:46:34',	'2022-09-02 11:46:34'),
(23,	'userNotFound',	'User not found',	NULL,	1,	0,	'2022-09-02 11:46:34',	'2022-09-02 11:46:34'),
(24,	'loginSuccess',	'Member Login Successfully!',	NULL,	1,	0,	'2022-09-02 11:46:34',	'2022-09-02 11:46:34'),
(25,	'passUserId',	'Please pass User ID.',	NULL,	1,	0,	'2022-09-02 11:46:34',	'2022-09-02 11:46:34'),
(26,	'passToken',	'Please pass Access Token.',	NULL,	1,	0,	'2022-09-02 11:46:34',	'2022-09-02 11:46:34'),
(27,	'passUsername',	'Please enter Username.',	NULL,	1,	0,	'2022-09-02 11:46:34',	'2022-09-02 11:46:34'),
(28,	'usernameExist',	'Username already exist.',	NULL,	1,	0,	'2022-09-02 11:46:34',	'2022-09-02 11:46:34'),
(29,	'profileUpdateSuccess',	'Profile update Successfully.',	NULL,	1,	0,	'2022-09-02 11:46:34',	'2022-09-02 11:46:34'),
(30,	'profileUpdateFail',	'Fail to update Profile.',	NULL,	1,	0,	'2022-09-02 11:46:34',	'2022-09-02 11:46:34'),
(31,	'passwordNotMatch',	'Password not match, please enter Correct password.',	NULL,	1,	0,	'2022-09-02 11:46:34',	'2022-09-02 11:46:34'),
(32,	'passOldPwd',	'Please enter old password.',	NULL,	1,	0,	'2022-09-02 11:46:34',	'2022-09-02 11:46:34'),
(33,	'passNewPwd',	'Please enter new password.',	NULL,	1,	0,	'2022-09-02 11:46:34',	'2022-09-02 11:46:34'),
(34,	'pwdChangeSuccess',	'Change Password Successfully!',	NULL,	1,	0,	'2022-09-02 11:46:34',	'2022-09-02 11:46:34'),
(35,	'logoutSuccess',	'Logout Successfully!',	NULL,	1,	0,	'2022-09-02 11:46:34',	'2022-09-02 11:46:34'),
(39,	'fullname',	'Please Pass full name',	NULL,	1,	0,	'2022-09-02 11:46:34',	'2022-09-02 11:46:34'),
(40,	'address_1',	'Please Fill address line 1',	NULL,	1,	0,	'2022-09-02 11:46:34',	'2022-09-02 11:46:34'),
(42,	'city',	'Please fill city name',	NULL,	1,	0,	'2022-09-02 11:46:34',	'2022-09-02 11:46:34'),
(45,	'country',	'Select Country',	NULL,	1,	0,	'2022-09-02 11:46:34',	'2022-09-02 11:46:34'),
(46,	'mobileExist',	'Mobile already exist.',	NULL,	1,	0,	'2022-09-02 11:46:34',	'2022-09-02 11:46:34'),
(47,	'correctReferralCode',	'Please enter Correct Referral Code.',	NULL,	1,	0,	'2022-09-02 11:46:34',	'2022-09-02 11:46:34'),
(48,	'passVerifyCode',	'Please enter Verification Code.',	NULL,	1,	0,	'2022-09-02 11:46:34',	'2022-09-02 11:46:34'),
(49,	'passotp',	'Please enter OTP.',	NULL,	1,	0,	'2022-09-02 11:46:34',	'2022-09-02 11:46:34'),
(50,	'userVerifySuccess',	'User Verify Successfully.',	NULL,	1,	0,	'2022-09-02 11:46:34',	'2022-09-02 11:46:34'),
(51,	'codeNotMatch',	'Code not match, please enter Correct Code.',	NULL,	1,	0,	'2022-09-02 11:46:34',	'2022-09-02 11:46:34'),
(52,	'tokenExpire',	'token expired, Please login.',	NULL,	1,	0,	'2022-09-02 11:46:34',	'2022-09-02 11:46:34'),
(57,	'verifyAccount',	'Please verify Account.',	NULL,	1,	0,	'2022-09-02 11:46:34',	'2022-09-02 11:46:34'),
(60,	'codeVerifySuccess',	'Code Verify Successfully.',	NULL,	1,	0,	'2022-09-02 11:46:34',	'2022-09-02 11:46:34'),
(61,	'codeSendSuccess',	'Verification Code send Successfully. Please check.',	NULL,	1,	0,	'2022-09-02 11:46:34',	'2022-09-02 11:46:34'),
(62,	'somethingWrong',	'something went wrong!',	NULL,	1,	0,	'2022-09-02 11:46:34',	'2022-09-02 11:46:34'),
(63,	'loginFirst',	'Please login first!',	NULL,	1,	0,	'2022-09-02 11:46:34',	'2022-09-02 11:46:34'),
(64,	'passNick',	'Please enter Nick Name.',	NULL,	1,	0,	'2022-09-02 11:46:34',	'2022-09-02 11:46:34'),
(65,	'emailSendSuccess',	'Email send Successfully.',	NULL,	1,	0,	'2022-09-02 11:46:34',	'2022-09-02 11:46:34'),
(71,	'countryListSuccess',	'Country list successfully.',	NULL,	1,	0,	'2022-09-02 11:46:34',	'2022-09-02 11:46:34'),
(72,	'countryNotFound',	'Country not found',	NULL,	1,	0,	'2022-09-02 11:46:34',	'2022-09-02 11:46:34'),
(73,	'passGender',	'Please Select your gender.',	NULL,	1,	0,	'2022-09-02 11:46:34',	'2022-09-02 11:46:34'),
(74,	'passDob',	'Please enter Date of birth .',	NULL,	1,	0,	'2022-09-02 11:46:34',	'2022-09-02 11:46:34'),
(75,	'passIDtype',	'Select ID Type',	NULL,	1,	0,	'2022-09-02 11:46:34',	'2022-09-02 11:46:34'),
(76,	'passAmount',	'Please enter Amount.',	NULL,	1,	0,	'2022-09-02 11:46:34',	'2022-09-02 11:46:34'),
(77,	'passPageKey',	'Please enter Page Key.',	NULL,	1,	0,	'2022-09-02 11:46:34',	'2022-09-02 11:46:34'),
(78,	'recListSuc',	'Record List Successfully.',	NULL,	1,	0,	'2022-09-02 11:46:34',	'2022-09-02 11:46:34'),
(79,	'passFriendID',	'Please pass Friend User ID.',	NULL,	1,	0,	'2022-09-02 11:46:34',	'2022-09-02 11:46:34'),
(80,	'alreadyFriend',	'Already friend.',	NULL,	1,	0,	'2022-09-02 11:46:34',	'2022-09-02 11:46:34'),
(81,	'passKeyword',	'Please enter keyword.',	NULL,	1,	0,	'2022-09-02 11:46:34',	'2022-09-02 11:46:34'),
(82,	'selectPlatform',	'Please select Platform.',	NULL,	1,	0,	'2022-09-02 11:46:34',	'2022-09-02 11:46:34'),
(83,	'selectGame',	'Please select Game.',	NULL,	1,	0,	'2022-09-02 11:46:34',	'2022-09-02 11:46:34'),
(84,	'passBetID',	'Please pass Bet ID.',	NULL,	1,	0,	'2022-09-02 11:46:34',	'2022-09-02 11:46:34'),
(85,	'resultExist',	'Result already Declare.',	NULL,	1,	0,	'2022-09-02 11:46:34',	'2022-09-02 11:46:34'),
(86,	'recordExist',	'Record Already Exist.',	NULL,	1,	0,	'2022-09-02 11:46:34',	'2022-09-02 11:46:34'),
(87,	'betComplete',	'The bet already Completed.',	NULL,	1,	0,	'2022-09-02 11:46:34',	'2022-09-02 11:46:34'),
(88,	'betAccept',	'The bet already Accepted.',	NULL,	1,	0,	'2022-09-02 11:46:34',	'2022-09-02 11:46:34'),
(89,	'passResult',	'Please select Result.',	NULL,	1,	0,	'2022-09-02 11:46:34',	'2022-09-02 11:46:34'),
(90,	'passReqField',	'Please enter required fields.',	NULL,	1,	0,	'2022-09-02 11:46:34',	'2022-09-02 11:46:34'),
(91,	'lowBalance',	'You have insufficient balance, kindly recharge account.',	NULL,	1,	0,	'2022-09-02 11:46:34',	'2022-09-02 11:46:34'),
(92,	'makePay',	'Payment done Successfully.',	NULL,	1,	0,	'2022-09-02 11:46:34',	'2022-09-02 11:46:34'),
(93,	'Credited',	'Amount Credited successfully.',	NULL,	1,	0,	'2022-09-02 11:46:34',	'2022-09-02 11:46:34'),
(94,	'Debited',	'Amount Debited successfully.',	NULL,	1,	0,	'2022-09-02 11:46:34',	'2022-09-02 11:46:34'),
(95,	'emailNotSend',	'mail sending fail.',	NULL,	1,	0,	'2022-09-02 11:46:34',	'2022-09-02 11:46:34'),
(96,	'pwdNotChange',	'Password not Change.',	NULL,	1,	0,	'2022-09-02 11:46:34',	'2022-09-02 11:46:34'),
(97,	'otpVerifySuccess',	'OTP Verify Successfully.',	NULL,	1,	0,	'2022-09-02 11:46:34',	'2022-09-02 11:46:34'),
(98,	'passScheduleDate',	'Please Select Schedule Date.',	NULL,	1,	0,	'2022-09-02 11:46:34',	'2022-09-02 11:46:34'),
(99,	'passScheduleTime',	'Please Select Schedule Time.',	NULL,	1,	0,	'2022-09-02 11:46:34',	'2022-09-02 11:46:34'),
(100,	'passAddress',	'Please enter address.',	NULL,	1,	0,	'2022-09-02 11:46:34',	'2022-09-02 11:46:34'),
(101,	'appBookSuc',	'Appointment booked Successfully',	NULL,	1,	0,	'2022-09-02 11:46:34',	'2022-09-02 11:46:34'),
(102,	'passOrderID',	'Please pass Order ID.',	NULL,	1,	0,	'2022-09-02 11:46:34',	'2022-09-02 11:46:34'),
(103,	'passOrderSum',	'Please enter Order Summary.',	NULL,	1,	0,	'2022-09-02 11:46:34',	'2022-09-02 11:46:34'),
(104,	'passRating',	'Please select rating.',	NULL,	1,	0,	'2022-09-02 11:46:34',	'2022-09-02 11:46:34'),
(105,	'reviewSaveSuc',	'Review saved Successfully',	NULL,	1,	0,	'2022-09-02 11:46:34',	'2022-09-02 11:46:34'),
(106,	'passComment',	'Please enter comments.',	NULL,	1,	0,	'2022-09-02 11:46:34',	'2022-09-02 11:46:34'),
(107,	'passSubject',	'Please enter Subject.',	NULL,	1,	0,	'2022-09-02 11:46:34',	'2022-09-02 11:46:34'),
(109,	'passEmployeeID',	'Please pass employee ID.',	NULL,	1,	0,	'2022-09-02 11:46:34',	'2022-09-02 11:46:34'),
(110,	'passStatus',	'Please pass status.',	NULL,	1,	0,	'2022-09-02 11:46:34',	'2022-09-02 11:46:34'),
(111,	'pinTransferSuccess',	'Pin Transfer successfully.',	NULL,	1,	0,	'2022-09-02 11:46:34',	'2022-09-02 11:46:34'),
(112,	'fundTransSuccess',	'fund transfer successfully.',	NULL,	1,	0,	'2022-09-02 11:46:34',	'2022-09-02 11:46:34'),
(113,	'requestSuc',	'Withdraw request send Successfully!',	NULL,	1,	0,	'2022-09-02 11:46:34',	'2022-09-02 11:46:34');

DROP TABLE IF EXISTS `tblpermissions`;
CREATE TABLE `tblpermissions` (
  `permissionid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) DEFAULT NULL,
  `url` varchar(250) DEFAULT NULL,
  `is_active` tinyint(2) NOT NULL DEFAULT '1',
  `is_delete` tinyint(2) NOT NULL DEFAULT '0',
  `created_time` datetime DEFAULT NULL,
  `updated_time` datetime DEFAULT NULL,
  PRIMARY KEY (`permissionid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `tblpermissions` (`permissionid`, `name`, `url`, `is_active`, `is_delete`, `created_time`, `updated_time`) VALUES
(1,	'Users',	'users',	1,	0,	'2022-09-16 14:21:37',	'2022-09-16 14:21:37'),
(2,	'User Role',	'user_role',	1,	0,	'2022-09-16 14:21:37',	'2022-09-16 14:21:37'),
(10,	'Workspace List',	'workspaces',	1,	0,	'2022-09-16 14:21:37',	'2022-09-16 14:21:37'),
(11,	'Import',	'import',	1,	1,	'2022-09-16 14:21:37',	'2022-09-16 14:21:37'),
(12,	'Dashboard',	'dashboard',	1,	0,	'2022-09-20 04:08:28',	'2022-09-20 04:08:28'),
(13,	'My Workspace',	'my-workspaces',	1,	0,	'2022-09-20 04:08:28',	'2022-09-20 04:08:28'),
(14,	'Phonebook',	'phonebook',	1,	0,	'2022-09-21 06:27:59',	'2022-09-21 06:27:59'),
(15,	'Timeline',	'timeline',	1,	1,	'2022-10-07 10:47:07',	'2022-10-07 10:47:07'),
(16,	'Timeline permission',	'timeline/permission',	1,	0,	'2022-10-07 10:47:07',	'2022-10-07 10:47:07');

DROP TABLE IF EXISTS `tblsetting`;
CREATE TABLE `tblsetting` (
  `setting_id` int(11) NOT NULL AUTO_INCREMENT,
  `site_name` varchar(250) DEFAULT NULL,
  `site_logo` varchar(250) DEFAULT NULL,
  `favicon` varchar(250) DEFAULT NULL,
  `header` varchar(255) DEFAULT NULL,
  `footer` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `wa_number` varchar(20) DEFAULT NULL,
  `fb_link` varchar(255) DEFAULT NULL,
  `twitter_link` varchar(255) DEFAULT NULL,
  `linkedin_link` varchar(255) DEFAULT NULL,
  `instagram_link` varchar(255) DEFAULT NULL,
  `youtube_link` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` text,
  `map_link` text,
  `from_email` text,
  `onesignal_app_id` varchar(100) DEFAULT NULL,
  `onesignal_auth_key` varchar(255) DEFAULT NULL,
  `geonames_username` varchar(255) DEFAULT NULL,
  `pushsafer_key` varchar(255) DEFAULT NULL,
  `sms_server_url` text,
  `sms_api_key` varchar(100) DEFAULT NULL,
  `default_lat` varchar(100) DEFAULT NULL,
  `default_long` varchar(100) DEFAULT NULL,
  `is_active` tinyint(2) NOT NULL DEFAULT '1' COMMENT '0=>Inactive, 1=>Active',
  `is_delete` tinyint(2) NOT NULL DEFAULT '0' COMMENT '0=>No, 1=>Yes',
  `created_time` datetime DEFAULT NULL,
  `updated_time` datetime DEFAULT NULL,
  PRIMARY KEY (`setting_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `tblsetting` (`setting_id`, `site_name`, `site_logo`, `favicon`, `header`, `footer`, `email`, `wa_number`, `fb_link`, `twitter_link`, `linkedin_link`, `instagram_link`, `youtube_link`, `phone`, `address`, `map_link`, `from_email`, `onesignal_app_id`, `onesignal_auth_key`, `geonames_username`, `pushsafer_key`, `sms_server_url`, `sms_api_key`, `default_lat`, `default_long`, `is_active`, `is_delete`, `created_time`, `updated_time`) VALUES
(1,	'Surveys',	'tray_img5474667831696231266.png',	'tray_img3826291071696231266.png',	'surveys',	'Footer',	'info@surveys.be',	' 1234567890',	'https://facebook.com',	'https://twitter.com',	'',	'https://www.instagram.com',	'https://facebook.com',	'+32 1234567890',	'Address',	'',	'info@surveys.me',	NULL,	NULL,	'aebify',	NULL,	NULL,	NULL,	'51.1301315',	'4.292526',	1,	0,	'2019-07-12 00:30:28',	'2019-07-12 00:30:28');

DROP TABLE IF EXISTS `tbluser`;
CREATE TABLE `tbluser` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `technician_id` int(11) DEFAULT NULL,
  `contractor_id` int(11) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `mobile` varchar(20) DEFAULT NULL,
  `gender` enum('Male','Female') DEFAULT NULL,
  `dob` varchar(255) DEFAULT NULL,
  `address` text,
  `pincode` varchar(50) DEFAULT NULL,
  `picture` text,
  `password` varchar(255) DEFAULT NULL,
  `visible_pass` varchar(255) DEFAULT NULL,
  `user_role` int(11) NOT NULL DEFAULT '2',
  `register_role` int(11) NOT NULL DEFAULT '2',
  `otp` varchar(10) DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `license_plate` varchar(255) DEFAULT NULL,
  `alocation` varchar(255) DEFAULT NULL,
  `access_token` varchar(255) DEFAULT NULL,
  `reset_slug` varchar(255) DEFAULT NULL,
  `device_type` tinyint(2) DEFAULT NULL COMMENT '1=>Android, 2=>IOS',
  `device_token` varchar(255) DEFAULT NULL,
  `is_active` tinyint(2) NOT NULL DEFAULT '1' COMMENT '0=>Inactive, 1=>Active',
  `is_delete` tinyint(2) NOT NULL DEFAULT '0' COMMENT '0=>No, 1=>Yes',
  `created_time` datetime DEFAULT NULL,
  `updated_time` datetime DEFAULT NULL,
  `web_device_id` text,
  `device_id` varchar(200) DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `notes` text,
  `is_image_assign` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0=>No, 1=>Yes',
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `tbluser` (`user_id`, `technician_id`, `contractor_id`, `username`, `name`, `last_name`, `email`, `mobile`, `gender`, `dob`, `address`, `pincode`, `picture`, `password`, `visible_pass`, `user_role`, `register_role`, `otp`, `country_id`, `city`, `license_plate`, `alocation`, `access_token`, `reset_slug`, `device_type`, `device_token`, `is_active`, `is_delete`, `created_time`, `updated_time`, `web_device_id`, `device_id`, `last_login`, `notes`, `is_image_assign`) VALUES
(1,	NULL,	NULL,	'admin',	'Admin',	NULL,	'admin@admin.com',	'1234567890',	'Male',	NULL,	'Address',	NULL,	'profile1653285287.png',	'e10adc3949ba59abbe56e057f20f883e',	NULL,	1,	2,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	1,	0,	'2022-10-13 13:16:55',	'2022-11-05 11:03:23',	'90154c75-d8d0-4580-b7b8-6a15355a51d9',	'gs4147',	'2023-10-23 12:54:50',	NULL,	0);

DROP TABLE IF EXISTS `tbluser_permissions`;
CREATE TABLE `tbluser_permissions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `permission_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `can_view` tinyint(2) NOT NULL DEFAULT '0' COMMENT '0=>No, 1=>Yes',
  `can_edit` tinyint(2) NOT NULL DEFAULT '0',
  `can_create` tinyint(2) NOT NULL DEFAULT '0',
  `can_delete` tinyint(2) NOT NULL DEFAULT '0',
  `is_active` tinyint(4) NOT NULL DEFAULT '1',
  `is_delete` tinyint(2) NOT NULL DEFAULT '0',
  `created_time` datetime DEFAULT NULL,
  `updated_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `tbluser_role`;
CREATE TABLE `tbluser_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) DEFAULT NULL,
  `role_type` tinyint(2) NOT NULL DEFAULT '0' COMMENT '0=>Frontend, 1=>Backend',
  `is_admin` tinyint(2) NOT NULL DEFAULT '0' COMMENT '0=>No, 1=>Yes',
  `is_active` tinyint(2) NOT NULL DEFAULT '1' COMMENT '0=>Inactive, 1=>Active',
  `is_delete` tinyint(2) NOT NULL DEFAULT '0' COMMENT '0=>No, 1=>Yes',
  `created_time` datetime DEFAULT NULL,
  `updated_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `tbluser_role` (`id`, `name`, `role_type`, `is_admin`, `is_active`, `is_delete`, `created_time`, `updated_time`) VALUES
(1,	'Admin',	1,	1,	1,	0,	'2022-08-29 19:45:36',	'2022-08-29 19:45:36');

-- 2023-10-23 11:47:39


20-09-2024
----------
CREATE TABLE `tblinquire` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL DEFAULT '0',
  `email` varchar(150) DEFAULT NULL,
  `phone_no` varchar(150) DEFAULT '',
  `country` varchar(150) DEFAULT NULL,
  `message` text,
  `is_active` tinyint(4) NOT NULL DEFAULT '1',
  `is_delete` tinyint(4) NOT NULL DEFAULT '0',
  `created_time` datetime DEFAULT NULL,
  `updated_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

CREATE TABLE `tblproduct_img` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL DEFAULT '0',
  `file` varchar(100) DEFAULT NULL,
  `is_active` tinyint(2) NOT NULL DEFAULT '1' COMMENT '0=>Inactive, 1=>Active',
  `is_delete` tinyint(2) NOT NULL DEFAULT '0' COMMENT '0=>No, 1=>Yes',
  `created_time` datetime DEFAULT NULL,
  `updated_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_idindex` (`product_id`) USING BTREE,
  KEY `fileindex` (`file`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8;