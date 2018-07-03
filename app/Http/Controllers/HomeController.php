<?php

namespace App\Http\Controllers;

use Hni\vfaDashboard\Models\VfaDshChart;
use Illuminate\Http\Request;

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
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('front-office.home');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function page2()
    {
        return view('front-office.page2');
    }

    public function page3()
    {
        $charts = VfaDshChart::all();
        return view('front-office.page3',['charts'=>$charts]);
    }

    public function page4()
    {
        $user = \Auth::user();
        $charts = $user->favorites(\Hni\vfaDashboard\Models\VfaDshChart::class)->get();
        return view('front-office.page4',['charts'=>$charts]);
        return view('front-office.home');
    }
}
