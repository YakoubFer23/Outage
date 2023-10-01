<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Outage;
use Illuminate\Support\Facades\DB;


class UpdateController extends Controller
{
    public function update(Request $request){
        
        $outage = Outage::where('id',$request->updateId)->first();
        if($outage->status == '0'){
            $outage->status = '1';
        }else if($outage->status == '1'){
            $outage->status = '0';

        }
        $outage->save();
        return redirect('/');
    }
}
