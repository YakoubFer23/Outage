<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Outage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class DeleteController extends Controller
{
    public function delete(Request $request){
        $outage = Outage::findOrFail($request->deleteId);
         //$outage = Outage::where('id',$request->deleteId);
        $file = DB::table('outages')->where('id' ,$request->deleteId)->value('image');
        File::delete($file);
        $outage->delete();
        return redirect('/'); 
    }
}
