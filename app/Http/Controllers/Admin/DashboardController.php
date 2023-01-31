<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Outage;

class DashboardController extends Controller
{
    public function index(){
        //$outages = DB::table('outages')->get();
        $outages = Outage::orderBy('created_at', 'DESC')->get();

        return view('index', ['outages' => $outages]);
        
    }
}
