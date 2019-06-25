<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setting;

class SettingContoller extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('checkrole');
    }

    public function index()
    {
        $setting = Setting::first();
        return view('setting', compact('setting'));
    }

    public function update(Request $request)
    {
        $setting = Setting::first();
        if(isset($setting)){
          $setting->ftp_url = $request['ftp_url'];
          $setting->ftp_username = $request['ftp_username'];
          $setting->ftp_password = $request['ftp_password'];
          $setting->ftp_path = $request['ftp_path'];
          $setting->save();
        } else {
          $setting = new Setting;
          $setting->ftp_url = $request['ftp_url'];
          $setting->ftp_username = $request['ftp_username'];
          $setting->ftp_password = $request['ftp_password'];
          $setting->ftp_path = $request['ftp_path'];
          $setting->save();
        }


        \Session::put('success', 'Update success');

        return view('setting', compact('setting'));
    }
}
