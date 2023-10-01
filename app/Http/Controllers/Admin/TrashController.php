<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Outage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class TrashController extends Controller
{
    public function index(){
        $outages = Outage::onlyTrashed()->get();

        return view('trash', ['outages' => $outages]);
    }

    public function hardDelete(Request $request){
        
        $outage = Outage::where('id',$request->deleteId);
        $file = DB::table('outages')->where('id' ,$request->deleteId)->value('image');
        File::delete($file);
        $outage->forceDelete();
        return redirect('/trash');
    }
}
