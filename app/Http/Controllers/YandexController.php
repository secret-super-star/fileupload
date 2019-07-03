<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Yandex;

class YandexController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('approve');
    }

    public function index()
    {
        $yans = Yandex::orderBy('created_at', 'DESC')->get();
        return view('yandex.dashboard', compact('yans'));
        // return view('yandex.dashboard');
    }

    public function generate()
    {
        return view('yandex.generate');
    }

    public function generate_link()
    {
        return redirect(route('yandex'));
    }
    
}
