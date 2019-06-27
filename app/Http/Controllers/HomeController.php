<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Setting;
use App\Video;
use App\User;
use Config;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('checkrole');
        $this->middleware('approve');
        $settings = Setting::first();
        Config::set('filesystems.disks.custom-ftp.host',$settings->ftp_url);
        Config::set('filesystems.disks.custom-ftp.username',$settings->ftp_username);
        Config::set('filesystems.disks.custom-ftp.password',$settings->ftp_password);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $videos = Video::orderBy('created_at', 'DESC')->get();
        return view('dashboard', compact('videos'));
    }

    public function upload()
    {
        return view('upload');
    }

    public function delete($id)
    {
      // dump($id);
        $vdieo = Video::find($id);

        $settings = Setting::first();

        $target_url = $settings->ftp_path."/playlistm3u8/".$vdieo->title;

        Storage::disk('custom-ftp')->delete($target_url);

        $vdieo->delete();
        \Session::put('success', 'Update success');
        $videos = Video::all();
        return view('dashboard', compact('videos'));
    }
}
