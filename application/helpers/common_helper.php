<?php
/* -------DATABASE RELATED FUNCTION [START] ------- */

// PRINT ARRAY WITH FORMATTING
function pr($arr)
{
    echo '<pre>';
    print_r($arr);
    echo '</pre>';
}
function oldhumanTiming($time)
{
    $time = time() - $time; // to get the time since that moment    
    //echo '1. '.date('Y-m-d H:i:s', time() ) .'---';
    //echo '2. ' .date('Y-m-d H:i:s', $time)  .'---';
    $time = ($time < 1) ? 1 : $time;
    $tokens = array(
        31536000 => 'year',
        2592000 => 'month',
        604800 => 'week',
        86400 => 'day',
        3600 => 'hour',
        60 => 'minute',
        1 => 'second'
    );
    foreach ($tokens as $unit => $text) {
        if ($time < $unit)
            continue;
        $numberOfUnits = floor($time / $unit);
        return $numberOfUnits . ' ' . $text . (($numberOfUnits > 1) ? 's' : '') . ' ago';
    }
}
function newhumanTiming($time)
{
    $CI = &get_instance();
    $tt = $CI->session->userdata('currentTime');
    //echo '1. '.date('Y-m-d H:i:s', $time ) .'---';
    //echo '2. ' .date('Y-m-d H:i:s', $tt)  .'---';
    //die;
    if ($tt == '') {
        $tt = time();
    }
    $time = $tt - $time; // to get the time since that moment    
    //echo '1. '.date('Y-m-d H:i:s', time() ) .'---';
    //echo '2. ' .date('Y-m-d H:i:s', $time)  .'---';
    $time = ($time < 1) ? 1 : $time;
    $tokens = array(
        31536000 => 'year',
        2592000 => 'month',
        604800 => 'week',
        86400 => 'day',
        3600 => 'hour',
        60 => 'minute',
        1 => 'second'
    );
    foreach ($tokens as $unit => $text) {
        if ($time < $unit)
            continue;
        $numberOfUnits = floor($time / $unit);
        return $numberOfUnits . ' ' . $text . (($numberOfUnits > 1) ? 's' : '') . ' ago';
    }
}
function humanTiming($time)
{
    $yourDate = strtotime(date('Y-m-d', $time));
    $todayDate = strtotime(date('Y-m-d'));
    if ($yourDate == $todayDate) {
        return 'Today';
    } elseif (strtotime("-1 day", $todayDate) == $yourDate) {
        return 'Yesterday';
    } else {
        return date('M d', $yourDate);
    }
}

function getIPAddress()
{
    // return (isset($_SERVER["HTTP_CF_CONNECTING_IP"]))?$_SERVER["HTTP_CF_CONNECTING_IP"]:$_SERVER['REMOTE_ADDR'];
    if (isset($_SERVER['HTTP_CF_CONNECTING_IP']) && !empty($_SERVER['HTTP_CF_CONNECTING_IP'])) {
        $ip = $_SERVER['HTTP_CF_CONNECTING_IP'];
    } elseif (!empty($_SERVER['HTTP_CLIENT_IP'])) {   //check ip from share internet
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {   //to check ip is pass from proxy
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}

function getCurrentCountryCode()
{
    $result = "";
    /*if(isset($_SESSION['countryCode']) && $_SESSION['countryCode']!=""){
        $result = $_SESSION['countryCode'];
    }else{
        $ip = getIPAddress(); //$_SERVER['REMOTE_ADDR'];
        $dataArray = json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=".$ip));
        $result = (isset($dataArray->geoplugin_countryCode))?$dataArray->geoplugin_countryCode:"IN";
        $_SESSION['countryCode'] = $result;
    }*/
    return $result;
}

function currency()
{
    $country = getCurrentCountryCode();
    if ($country == 'IN') {
        return '$';
    } else {
        return '€';
    }
}

function priceFormat($price)
{
    $country = getCurrentCountryCode();
    if ($country == 'IN') {
        return currency() . $price;
    } else {
        return currency() . $price;
    }
}

function numberTowords($num)
{
    if ($num) {
        $ones = array(
            0 => "ZERO",
            1 => "ONE",
            2 => "TWO",
            3 => "THREE",
            4 => "FOUR",
            5 => "FIVE",
            6 => "SIX",
            7 => "SEVEN",
            8 => "EIGHT",
            9 => "NINE",
            10 => "TEN",
            11 => "ELEVEN",
            12 => "TWELVE",
            13 => "THIRTEEN",
            14 => "FOURTEEN",
            15 => "FIFTEEN",
            16 => "SIXTEEN",
            17 => "SEVENTEEN",
            18 => "EIGHTEEN",
            19 => "NINETEEN"
        );
        $tens = array(
            0 => "ZERO",
            1 => "TEN",
            2 => "TWENTY",
            3 => "THIRTY",
            4 => "FORTY",
            5 => "FIFTY",
            6 => "SIXTY",
            7 => "SEVENTY",
            8 => "EIGHTY",
            9 => "NINETY"
        );
        $hundreds = array(
            "HUNDRED",
            "THOUSAND",
            "MILLION",
            "BILLION",
            "TRILLION",
            "QUARDRILLION"
        );
        $num = str_replace(',', '', $num);
        $num = number_format($num, 2, ".", ",");
        $num_arr = explode(".", $num);
        $wholenum = $num_arr[0];
        $decnum = $num_arr[1];
        $whole_arr = array_reverse(explode(",", $wholenum));
        krsort($whole_arr, 1);
        $rettxt = "";
        foreach ($whole_arr as $key => $i) {
            while (substr($i, 0, 1) == "0")
                $i = substr($i, 1, 5);
            if ($i < 20) {
                $rettxt .= $ones[$i];
            } elseif ($i < 100) {
                if (substr($i, 0, 1) != "0")  $rettxt .= $tens[substr($i, 0, 1)];
                if (substr($i, 1, 1) != "0") $rettxt .= " " . $ones[substr($i, 1, 1)];
            } else {
                if (substr($i, 0, 1) != "0") $rettxt .= $ones[substr($i, 0, 1)] . " " . $hundreds[0];
                if (substr($i, 1, 1) != "0") $rettxt .= " " . $tens[substr($i, 1, 1)];
                if (substr($i, 2, 1) != "0") $rettxt .= " " . $ones[substr($i, 2, 1)];
            }
            if ($key > 0) {
                $rettxt .= " " . $hundreds[$key] . " ";
            }
        }
        if ($decnum > 0) {
            $rettxt .= " and ";
            if ($decnum < 20) {
                $rettxt .= $ones[$decnum];
            } elseif ($decnum < 100) {
                $rettxt .= $tens[substr($decnum, 0, 1)];
                $rettxt .= " " . $ones[substr($decnum, 1, 1)];
            }
        }
        return $rettxt;
    }
}

function array_sort_by_column(&$arr, $col, $dir = SORT_ASC)
{
    $sort_col = array();
    foreach ($arr as $key => $row) {
        $sort_col[$key] = $row[$col];
    }
    array_multisort($sort_col, $dir, $arr);
}

function merge_same_key_array_and_sum($arr, $arr_key, $sum_column)
{
    $result = array();
    if (!empty($arr)) {
        $temp = [];
        foreach ($arr as $value) {
            if (!array_key_exists($value[$arr_key], $temp)) {
                $temp[$value[$arr_key]] = 0;
            }
            $temp[$value[$arr_key]] += $value[$sum_column];
        }
        // for re-create array
        $result = array();
        foreach ($temp as $key => $value) {
            $result[] = array($arr_key =>  $key, $sum_column => $value);
        }
    }
    return $result;
}

function format_date($date)
{
    return date('Y-m-d H:i:s', strtotime($date));
}

function encrypt_String($string)
{
    return base64_encode($string);
}

function decrypt_String($string)
{
    return base64_decode($string);
}

function find_role_permission_columns($myarray, $field, $value)
{
    foreach ($myarray as $key => $row) {
        if ($row['url'] == $field) {
            return (isset($row[$value])) ? $row[$value] : '';
        }
    }
    return false;
}

function check_permission($key, $permision, $permission_data = array())
{
    $result = false;
    $CI = &get_instance();
    $user_role = $CI->session->userdata('user_type');
    if ($user_role == 1) {
        $result = true;
    } else {
        if (!empty($permission_data)) {
            $result = find_role_permission_columns($permission_data, $key, $permision);
        } else {
            $sQuery = "SELECT ps.*, rp.name as permission_name FROM " . TBL_PERMISSION . " rp
            JOIN " . TBL_USER_PERMISSION . " ps ON ps.permission_id = rp.permissionid AND rp.url = '" . $key . "' AND ps.is_active =1 AND ps.is_delete=0
            WHERE ps.role_id='" . $user_role . "' AND rp.is_active =1 AND rp.is_delete=0 ";
            $_query = $CI->db->query($sQuery)->row_array();

            if (!empty($_query)) {
                $result = $_query[$permision];
            }
        }
    }
    return $result;
}

function check_timeline_permission($permision)
{
    $result = false;
    $CI = &get_instance();
    $user_role = $CI->session->userdata('user_type');
    if ($user_role == 1) {
        $result = true;
    } else {
        $sQuery = "SELECT tp.* FROM " . TBL_TIMELINE_PERMISSIONS . " tp
        WHERE tp.role_id='" . $user_role . "' AND tp.is_active = 1 AND tp.is_delete=0 ";
        $_query = $CI->db->query($sQuery)->row_array();
        if (!empty($_query)) {
            $result = (isset($_query[$permision])) ? $_query[$permision] : false;
        }
    }
    return $result;
}

function getLatlongFromPincode($pincode)
{
    $result = array();
    $CI = &get_instance();
    $setting_data = $CI->setting_data;
    $geonames_username = (!empty($setting_data['geonames_username'])) ? $setting_data['geonames_username'] : "";

    $apiUrl = "http://api.geonames.org/postalCodeLookupJSON?formatted=true&postalcode=" . $pincode . "&country=BE&username=" . $geonames_username;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $apiUrl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $output = curl_exec($ch);
    curl_close($ch);
    if (!empty($output)) {
        $output_arr = json_decode($output, true);
        $result = array(
            'lng' => (isset($output_arr['postalcodes'][0]['lng'])) ? $output_arr['postalcodes'][0]['lng'] : "",
            'lat' => (isset($output_arr['postalcodes'][0]['lat'])) ? $output_arr['postalcodes'][0]['lat'] : "",
        );
    }
    return $result;
}

function search_multiarray($search_data, $search_key, $search_column, $return_column = '')
{
    $result = "";
    $key = array_search($search_key, array_column($search_data, $search_column));
    if ($key != "" || $key == 0) {
        if (!empty($return_column)) {
            $result = (isset($search_data[$key][$return_column])) ? $search_data[$key][$return_column] : "";
        } else {
            $result = $key;
        }
    }
    return $result;
}

function get_user_madaform_answer($search_data, $search_key)
{
    return search_multiarray($search_data, $search_key, 'question_id', 'answer');
}

function time_elapsed_string($datetime, $full = false)
{
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $string = array(
        'y' => 'year',
        'm' => 'month',
        'w' => 'week',
        'd' => 'day',
        'h' => 'hour',
        'i' => 'minute',
        's' => 'second',
    );
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
        } else {
            unset($string[$k]);
        }
    }

    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' ago' : 'just now';
}


function nl2listview($str, $tag = 'ul', $class = '')
{
    $bits = explode("\n", $str);
    $class_string = $class ? ' class="' . $class . '"' : false;
    $newstring = '<' . $tag . $class_string . '>';
    if (!empty($bits)) {
        foreach ($bits as $bit) {
            $newstring .= "<li>" . $bit . "</li>";
        }
    }
    return $newstring . '</' . $tag . '>';
}

function createZipAndDownload($files, $filesPath, $zipFileName)
{
    // Create instance of ZipArchive. and open the zip folder.
    $zip = new \ZipArchive();
    if ($zip->open(MELDING_ZIP . $zipFileName, \ZipArchive::CREATE) !== TRUE) {
        exit("cannot open <$zipFileName>\n");
    }

    // Adding every attachments files into the ZIP.
    foreach ($files as $file) {
        $zip->addFile($filesPath . $file, $file);
    }
    $zip->close();

    // Download the created zip file
    header("Content-type: application/zip");
    header("Content-Disposition: attachment; filename = $zipFileName");
    header("Pragma: no-cache");
    header("Expires: 0");
    readfile(MELDING_ZIP . "$zipFileName");
    exit;
}

// for get house and bus from address
function getHouseandBusFromAddress($address = '')
{
    $result = array('address' => $address, 'house_number' => '', 'bus_number' => '');
    if (!empty($address)) {
        $address_data = explode(', ', $address);
        $house_data = (!empty($address_data[1])) ? explode(' ', $address_data[1]) : array();
        $house_number = (isset($house_data[0])) ? $house_data[0] : "";
        $bus_number = (isset($house_data[1])) ? $house_data[1] : "";
        $alpha = (isset($house_data[0])) ? preg_replace("/[^A-Z]+/", "", $house_data[0]) : "";
        if (!empty($alpha)) {
            $house_number = str_replace($alpha, '', $house_number);
            if (!empty($bus_number)) {
                $bus_number = $alpha . $bus_number;
            } else {
                $bus_number = $alpha;
            }
        }
        $result['house_number'] = $house_number;
        $result['bus_number'] = $bus_number;
        $result['address'] = (!empty($address_data[0])) ? $address_data[0] : $address;
    }
    return $result;
}

function removeQuotes($string)
{
    $string = trim($string, '"');
    $string = trim($string, '\'"');
    return $string;
}

function generateUniqueCode($str = "", $table, $column)
{
    $str = strtolower(trim($str));
    $str = preg_replace('/[^a-z0-9-]/', '', $str);
    $str = preg_replace('/-+/', "", $str);
    $str = rtrim($str, '');

    $uniqueCode = $str . rand(1000000, 9999999);
    $uniqueCode = strtolower($uniqueCode);

    $ci = &get_instance();
    $checkExists = $ci->Service->get_row($table, $column, [$column => $uniqueCode]);
    if (!empty($checkExists)) {
        $uniqueCode = generateUniqueCode($str, $table, $column);
    }
    return $uniqueCode;
}

function get_random_string($length = 8)
{
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    return substr(str_shuffle($chars), 0, $length);
}

function get_random_code($length = 4)
{
    $chars = "0123456789";
    return substr(str_shuffle($chars), 0, $length);
}

function correctImageOrientation($filename)
{
    if (function_exists('exif_read_data')) {
        $exif = @exif_read_data($filename);
        if ($exif && isset($exif['Orientation'])) {
            $orientation = $exif['Orientation'];
            if ($orientation != 1) {
                $img = imagecreatefromjpeg($filename);
                $deg = 0;
                switch ($orientation) {
                    case 3:
                        $deg = 180;
                        break;
                    case 6:
                        $deg = 270;
                        break;
                    case 8:
                        $deg = 90;
                        break;
                }
                if ($deg) {
                    $img = imagerotate($img, $deg, 0);
                }
                // then rewrite the rotated image back to the disk as $filename 
                imagejpeg($img, $filename, 95);
            } // if there is some rotation necessary
        } // if have the exif orientation info
    } // if function exists
}

function array_value_recursive($key, array $arr){
    $val = array();
    array_walk_recursive($arr, function($v, $k) use($key, &$val){
        if($k == $key) array_push($val, $v);
    });
    return count($val) > 1 ? $val : array_pop($val);
}

function get_drawing_status_name($status){
    $statusname = "Drawing";
    if($status == 1){
        $statusname = "Finish";
    }elseif($status == 2){
        $statusname = "Return";
    }elseif($status == 3){
        $statusname = "Drawing Return";
    }elseif($status == 4){
        $statusname = "Checkup";
    }elseif($status == 5){
        $statusname = "Confirmed";
    }
    return $statusname;
}

function generatePagination($currentPage, $totalPages, $pageLinks = 5,$url ='')
{
    if ($totalPages <= 1)
    {
        return NULL;
    }
    if($url ==''){
        $url = base_url().'blog';
    }else{
        $url = base_url().$url;
    }

    $html = ' <div class="ps-pagination"><ul class="pagination justify-content-center">';

    $leeway = floor($pageLinks / 2);

    $firstPage = $currentPage - $leeway;
    $lastPage = $currentPage + $leeway;

    if ($firstPage < 1)
    {
        $lastPage += 1 - $firstPage;
        $firstPage = 1;
    }
    if ($lastPage > $totalPages)
    {
        $firstPage -= $lastPage - $totalPages;
        $lastPage = $totalPages;
    }
    if ($firstPage < 1)
    {
        $firstPage = 1;
    }

    if ($firstPage != 1)
    {
        $html .= '<li class="">
                    <a class=" " href="'.$url.'?page='.($currentPage - 1).'"  aria-label="Previous" data-page="'.($currentPage - 1).'">
                    <i class="fa fa-angle-double-left"></i></a>
                </li>';
        $html .= '<li class=""><a class=" " href="'.$url.'?page=1" data-page="1">1</a></li>';
        $html .= '<li class=" align-self-end"><span>...</span></li>';
    }

    for ($i = $firstPage; $i <= $lastPage; $i++)
    {
        if ($i == $currentPage)
        {
            $html .= '<li class=" active">
                        <a class=" " href="'.$url.'?page='.$i.'"  data-page="'.$i.'">'.$i.'</a>
                    </li>';
        }
        else
        {
            $html .= '<li class=""><a class=" " href="'.$url.'?page='.$i.'" data-page="'. $i .'">' . $i . '</a></li>';
        }
    }

    if ($lastPage != $totalPages)
    {
        $html .= '<li class=" align-self-end"><span>...</span></li>';
        $html .= '<li class=""><a class=" " href="'.$url.'?page='.$totalPages.'" data-page="'. $totalPages .'">' . $totalPages . '</a></li>';
        $html .= '<li class="">
                    <a class=" " href="'.$url.'?page='.($currentPage + 1).'"  aria-label="Next" data-page="'.($currentPage + 1).'"><i class="fa fa-angle-double-right"></i></a>
                </li>';
    }

    $html .= '</ul></div>';

    return $html;
}