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

    public function favoriteChart(Request $request)
    {
        $input = $request->all();
        $user = \Auth::user();
        if(!empty($input['chart_id'])){
            $chart = VfaDshChart::find($input['chart_id']);
            $user->favorite($chart);
            return response()->json([
                'status'=> 'success',
                'message'=>'operation saved successfully']);
        }
        else{
            return response()->json(['error'=>"an error happened"]);
        }
    }

    public function unFavoriteChart(Request $request)
    {
        $input = $request->all();
        $user = \Auth::user();
        if(!empty($input['chart_id'])){
            $chart = VfaDshChart::find($input['chart_id']);
            $user->unfavorite($chart);
            return response()->json([
                'status'=> 'success',
                'message'=>'operation saved successfully']);
        }
        else{
            return response()->json(['error'=>"an error happened"]);
        }
    }
    public function page4()
    {
        $user = \Auth::user();
        $charts = $user->favorites(\Hni\vfaDashboard\Models\VfaDshChart::class)->get();
        return view('front-office.page4',['charts'=>$charts]);
        return view('front-office.home');
    }
}
