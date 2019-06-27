<?php

namespace App\Http\Controllers;

use Illuminate\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use App\Setting;
use App\Video;
use Response;
use Config;
use File;

class FileuploadController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $settings = Setting::first();
        Config::set('filesystems.disks.custom-ftp.host',$settings->ftp_url);
        Config::set('filesystems.disks.custom-ftp.username',$settings->ftp_username);
        Config::set('filesystems.disks.custom-ftp.password',$settings->ftp_password);

    }
    //
    public function fileupload(Request $request){
      $file = $request->file('file');


      $destinationPath = 'uploads';
      $current_timestamp = Carbon::now()->timestamp;
      $file_name = $current_timestamp.".".$file->getClientOriginalExtension();
      $file->move($destinationPath,$file_name);

      $file_url = $destinationPath."/".$file_name;

      $settings = Setting::first();

      $target_url = $settings->ftp_path."/".$file_name;
      $localFile = File::get($file_url);
      $upload_result = Storage::disk('custom-ftp')->put($target_url, $localFile);

      if($upload_result){
        $video = new Video;

        $video->title = $file_name;
        $video->real_title = $file->getClientOriginalName();
        $video->path = $settings->ftp_url.$target_url."/playlist.m3u8";

        $video->save();
        // $this->ftpupload();
        unlink($file_url);

        return Response::json(array(
                      'success' => true,
                  ));
      } else {
        unlink($file_url);
        return Response::json(array(
                      'success' => false,
                  ));
      }

    }

    // public function ftpupload(){
    //     $settings = Setting::first();
    //     dump($settings->ftp_url);
    //
    //     $fileName = $upload_data['file_name'];
    //     $fileext = $upload_data['file_ext'];
    //     $source = $upload_data['full_path'];
    //     $this->load->library('ftp');
    //
    //     $settings = $this->settings->getData();
    //     //FTP configuration
    //     $ftp_config['hostname'] = $settings['ftp_hostname'];
    //     $ftp_config['username'] = $settings['ftp_username'];
    //     $ftp_config['password'] = $settings['ftp_password'];
    //     $ftp_config['debug']    = TRUE;
    //
    //     //Connect to the remote server
    //     $this->ftp->connect($ftp_config);
    //
    //     //File upload path of remote server
    //     if (empty($this->ftp->list_files("./".$settings['upload_path']))) {
    //         $this->ftp->mkdir("./".$settings['upload_path']);
    //     }
    //     $time = time();
    //     $destination = "./".$settings['upload_path']."/".$time.$fileext;
    //
    //     $this->ftp->upload($source, $destination, 'ascii', 0775);
    //
    //     //Close FTP connection
    //     $this->ftp->close();
    //
    //     // save data in database
    //     $data = array(
    //         'origin' => $fileName,
    //         'upload' => $time.$fileext,
    //         'path' => $settings['upload_path'],
    //         // 'contents' => $upload_data['contents'],
    //         'uploader' => $this->session->userdata['user_id']
    //     );
    //     $this->videos->uploadVideo($data);
    // }
}
