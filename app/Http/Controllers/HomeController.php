<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models;
use DB;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $total = $this->getTotalSavings();
        return view('home', compact('total'));
    }

    private function getTotalSavings() {
        $builder = Models\Saving::select(DB::raw("IFNULL(sum(savings), 0) as savings"))->where("del_flg","=","0");

        return $builder->get()->toArray();
    }
}
