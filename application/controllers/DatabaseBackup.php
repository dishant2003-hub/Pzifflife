<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

// set_time_limit(0);
ini_set('memory_limit', '-1'); 
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);

class DatabaseBackup extends MY_Controller
{
    
    public function __construct()
    {
        parent::__construct();
        $this->load->dbutil();
        $this->load->helper('file');
    }

    public function index()
    {
        $database = SITE_TITLE;
        $directoryName = date('Y-m-d');
        $directory_path = $_SERVER['DOCUMENT_ROOT'].'backup/'.$directoryName;
        $directory_path = FCPATH.'backup/'.$directoryName;
        if(!file_exists($directory_path)) {
            mkdir($directory_path, 0777, true);
        }
        
        $prefs = array(
            'tables'        => array(),
            'ignore'        => array(),
            'format'        => 'gzip',       // gzip, zip, txt
            'filename'      => $database.'.sql',
            'add_drop'      => TRUE,
            'add_insert'    => TRUE,
            'newline'       => "\n",
            'foreign_key_checks'    => FALSE
        );
        $backup = $this->dbutil->backup($prefs);
        
        $sqlFileName = "{$database}.sql.gz";
        $zipPath = "$directory_path/$sqlFileName";
        
        write_file($zipPath, $backup);
        // $dropbox = $this->dropbox_upload($zipPath);
        
        // remove backup after upload success
        /*if(isset($dropbox['name']) && $dropbox['name']!=""){
            if(file_exists($directory_path)) {
                rmdir($directory_path);
                $this->rmdir_recursive($directory_path);
            }
        }*/
        echo "Backup ".$sqlFileName." Upload Success!"; exit();
    }

    function rmdir_recursive($dir) {
        foreach(scandir($dir) as $file) {
            if ('.' === $file || '..' === $file) continue;
            if (is_dir("$dir/$file")) $this->rmdir_recursive("$dir/$file");
            else unlink("$dir/$file");
        }
        rmdir($dir);
    }

    public function dropbox_upload($path)
    {
        $token = DROPBOX_TOKEN;
        $append_url = 'https://content.dropboxapi.com/2/files/upload_session/append_v2';
        $start_url = 'https://content.dropboxapi.com/2/files/upload_session/start';
        $finish_url = 'https://content.dropboxapi.com/2/files/upload_session/finish';

        $info_array=array();
        $info_array["close"]=false;

        $headers = array('Authorization: Bearer ' . $token,
        'Content-Type: application/octet-stream',
        'Dropbox-API-Arg: '.json_encode($info_array));

        $chunk_size = 50000000;
        $fp = fopen($path, 'rb');
        $fileSize = filesize($path);
        $tosend = $fileSize;
        $first = $tosend > $chunk_size ? $chunk_size : $tosend;

        $ch = curl_init($start_url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, fread($fp, $first));
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
        $response = curl_exec($ch);

        $tosend -= $first;
        $resp = explode('"',$response);
        $sesion=$resp[3];
        $posicion=$first;

        $info_array["cursor"] = array();
        $info_array["cursor"]["session_id"] = $sesion;
        while ($tosend > $chunk_size)
        {
            $info_array["cursor"]["offset"]=$posicion;
            $headers[2] = 'Dropbox-API-Arg: '.json_encode($info_array);

            curl_setopt($ch, CURLOPT_URL, $append_url); 
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_POSTFIELDS, fread($fp, $chunk_size));
            $response=curl_exec($ch);

            $tosend -= $chunk_size;
            $posicion+=$chunk_size;
            if ($response=="null")
            {
                // echo "Written ".$posicion." of ".$fileSize. PHP_EOL;
            }
            else
            {
                echo $response. PHP_EOL;
                exit(-1);
            }
        }
        unset($info_array["close"]);
        $info_array["cursor"]["offset"]=$posicion;
        $info_array["commit"]=array();
        $info_array["commit"]["path"] = DROPBOX_FOLDER_PATH.date('Y-m-d').'/'.basename($path);
        $info_array["commit"]["mode"]=array();
        $info_array["commit"]["mode"][".tag"]="overwrite";
        $info_array["commit"]["autorename"]=true;
        $info_array["commit"]["mute"]=false;
        $info_array["commit"]["strict_conflict"]=false;
        $headers[2] = 'Dropbox-API-Arg: '.json_encode($info_array);

        curl_setopt($ch, CURLOPT_URL, $finish_url); 
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $tosend>0?fread($fp, $tosend):null);

        $response = curl_exec($ch);
        return $response. PHP_EOL;
        curl_close($ch);
        fclose($fp);
    }

    // for remove old date zip files
    public function removeOldBackup(){
        $directoryName = date('Y-m-d',strtotime("-7 days"));
        // $directory_path = $_SERVER['DOCUMENT_ROOT'].'backup/'.$directoryName;
        $directory_path = FCPATH.'backup/'.$directoryName;
        if(file_exists($directory_path)) {
            $this->rmdir_recursive($directory_path);
        }
        echo "backup remove successfully"; exit();
    }

}