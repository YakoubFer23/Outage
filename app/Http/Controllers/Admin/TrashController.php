<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Outage;

class TrashController extends Controller
{
    public function index(){
        $outages = Outage::onlyTrashed()->get();

        return view('trash', ['outages' => $outages]);
    }

    public function hardDelete(Request $request){
        
        $outage = Outage::where('id',$request->deleteId)->forceDelete();
        return redirect('/trash');
    }
}
