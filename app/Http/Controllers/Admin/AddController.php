<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Outage;
use App\Http\Requests\Admin\OutageFormRequest;

class AddController extends Controller
{
    public function index(){
        return view('add');
    }


    public function store(OutageFormRequest $request){
        
        $data = $request->validated();

        $outage = new Outage;
        $outage->name = $data['name'];
        $outage->wilaya = $data['wilaya'];
        $outage->status = '1';
        if($request->hasFile('image')){
            $file = $request->file('image');
            $filename = 'assets/outageImg/' . time() . '.' . $file->getClientOriginalExtension();
            $file->move('assets/outageImg', $filename);
            $outage->image = $filename;
        }
        $outage->save();

        return redirect('/add');
    }
}
