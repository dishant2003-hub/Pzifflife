<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| Display Debug backtrace
|--------------------------------------------------------------------------
|
| If set to TRUE, a backtrace will be displayed along with php errors. If
| error_reporting is disabled, the backtrace will not display, regardless
| of this setting
|
*/
defined('SHOW_DEBUG_BACKTRACE') OR define('SHOW_DEBUG_BACKTRACE', TRUE);

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
defined('FILE_READ_MODE')  OR define('FILE_READ_MODE', 0644);
defined('FILE_WRITE_MODE') OR define('FILE_WRITE_MODE', 0666);
defined('DIR_READ_MODE')   OR define('DIR_READ_MODE', 0755);
defined('DIR_WRITE_MODE')  OR define('DIR_WRITE_MODE', 0755);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/
defined('FOPEN_READ')                           OR define('FOPEN_READ', 'rb');
defined('FOPEN_READ_WRITE')                     OR define('FOPEN_READ_WRITE', 'r+b');
defined('FOPEN_WRITE_CREATE_DESTRUCTIVE')       OR define('FOPEN_WRITE_CREATE_DESTRUCTIVE', 'wb'); // truncates existing file data, use with care
defined('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE')  OR define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE', 'w+b'); // truncates existing file data, use with care
defined('FOPEN_WRITE_CREATE')                   OR define('FOPEN_WRITE_CREATE', 'ab');
defined('FOPEN_READ_WRITE_CREATE')              OR define('FOPEN_READ_WRITE_CREATE', 'a+b');
defined('FOPEN_WRITE_CREATE_STRICT')            OR define('FOPEN_WRITE_CREATE_STRICT', 'xb');
defined('FOPEN_READ_WRITE_CREATE_STRICT')       OR define('FOPEN_READ_WRITE_CREATE_STRICT', 'x+b');

/*
|--------------------------------------------------------------------------
| Exit Status Codes
|--------------------------------------------------------------------------
|
| Used to indicate the conditions under which the script is exit()ing.
| While there is no universal standard for error codes, there are some
| broad conventions.  Three such conventions are mentioned below, for
| those who wish to make use of them.  The CodeIgniter defaults were
| chosen for the least overlap with these conventions, while still
| leaving room for others to be defined in future versions and user
| applications.
|
| The three main conventions used for determining exit status codes
| are as follows:
|
|    Standard C/C++ Library (stdlibc):
|       http://www.gnu.org/software/libc/manual/html_node/Exit-Status.html
|       (This link also contains other GNU-specific conventions)
|    BSD sysexits.h:
|       http://www.gsp.com/cgi-bin/man.cgi?section=3&topic=sysexits
|    Bash scripting:
|       http://tldp.org/LDP/abs/html/exitcodes.html
|
*/
defined('EXIT_SUCCESS')        OR define('EXIT_SUCCESS', 0); // no errors
defined('EXIT_ERROR')          OR define('EXIT_ERROR', 1); // generic error
defined('EXIT_CONFIG')         OR define('EXIT_CONFIG', 3); // configuration error
defined('EXIT_UNKNOWN_FILE')   OR define('EXIT_UNKNOWN_FILE', 4); // file not found
defined('EXIT_UNKNOWN_CLASS')  OR define('EXIT_UNKNOWN_CLASS', 5); // unknown class
defined('EXIT_UNKNOWN_METHOD') OR define('EXIT_UNKNOWN_METHOD', 6); // unknown class member
defined('EXIT_USER_INPUT')     OR define('EXIT_USER_INPUT', 7); // invalid user input
defined('EXIT_DATABASE')       OR define('EXIT_DATABASE', 8); // database error
defined('EXIT__AUTO_MIN')      OR define('EXIT__AUTO_MIN', 9); // lowest automatically-assigned error code
defined('EXIT__AUTO_MAX')      OR define('EXIT__AUTO_MAX', 125); // highest automatically-assigned error code


//define table name
$base_url = ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == "on") ? "https" : "http");
$base_url .= "://". @$_SERVER['HTTP_HOST'];
$base_url .= str_replace(basename($_SERVER['SCRIPT_NAME']),"",$_SERVER['SCRIPT_NAME']);
define('BASE_URL' , $base_url);

// $CI = & get_instance();
// $site_title = (isset($CI->setting_data['site_name']) && !empty($CI->setting_data['site_name']))?  $CI->setting_data['site_name']:"Surveys";
$site_title = "Pziff life care";

define('SITE_TITLE' , $site_title);
define('ASSETS_PATH' , BASE_URL.'public/front/');
define('ADMIN_ASSETS_PATH' , BASE_URL.'public/admin_assets/');
define('API_URL' , BASE_URL.'api/');
define('DB_PREFIX' , 'tbl');

define('TBL_LANGUAGE' , DB_PREFIX . 'language');
define('TBL_LANGUAGE_KEY' , DB_PREFIX . 'language_key');
define('TBL_SETTING' , DB_PREFIX . 'setting');
define('TBL_USERS' , DB_PREFIX . 'user');
define('TBL_USER_ROLE' , DB_PREFIX . 'user_role');
define('TBL_USER_PERMISSION' , DB_PREFIX . 'user_permissions');
define('TBL_PERMISSION' , DB_PREFIX . 'permissions');
define('TBL_CATEGORY' , DB_PREFIX . 'category');
define('TBL_PRODUCT' , DB_PREFIX . 'product_new');
define('TBL_PRODUCT_TYPE' , DB_PREFIX . 'product_type');
define('TBL_BLOG' , DB_PREFIX . 'blog');
define('TBL_GALLERY' , DB_PREFIX . 'gallery');
define('TBL_ENQUIRY' , DB_PREFIX . 'enquiry');
define('TBL_PRODUCT_IMG' , DB_PREFIX . 'product_img');
define('TBL_CONTACT_US' , DB_PREFIX . 'contact_us');
define('TBL_VISITOR' , DB_PREFIX . 'visitors');







//define folder name
define('UPLOAD', 'upload/');
define('PROFILE', UPLOAD . 'profile/');
define('PICTURE', UPLOAD . 'picture/');
define('BLOG', UPLOAD . 'blog/');
define('GALLERY', UPLOAD . 'gallery/');
define('PRODUCT', UPLOAD . 'product/');



define('DEFAULT_COUNTY_CODE', '+91');
define('DROPBOX_TOKEN', '');
define('DROPBOX_FOLDER_PATH', '');
