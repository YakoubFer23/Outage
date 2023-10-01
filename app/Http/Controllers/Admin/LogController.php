<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;
use Illuminate\Support\Facades\DB;

class LogController extends Controller
{
    public function index(){
        $activities = Activity::orderBy('created_at','DESC')->get();
        return view('log', ['activities' => $activities]);
    }
}
