<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Outage;

class DeleteController extends Controller
{
    public function delete(Request $request){
        
        $outage = Outage::where('id',$request->deleteId)->delete();
        return redirect('/');
    }
}
