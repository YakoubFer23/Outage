<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Outage;

class RestoreController extends Controller
{
    public function restore(Request $request){
        
        $outage = Outage::withTrashed()->where('id',$request->deleteId)->restore();
        return redirect('/trash');
    }
}
