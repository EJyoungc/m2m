<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Viralload;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ViralloadController extends Controller
{
    //
    public function store(Request $request,$id){
        $validatedData = $request->validate([
            'viralcopy'=>'required|numeric'
        ]);
        $results = 0;
        if ($request->viralcopy <=  75) {
            $results = "Normal";
        }elseif($request->viralcopy <= 200 ){
            $results = "Monitoring";
        }else{
            $results = "Critical Attention";
        }

        // dd($request);
        Viralload::create([
            'viral_copy' => $request->viralcopy,
            'result' => $results,
            'appointment_id'=>$id,
        ]);
        $ap = Appointment::find($id);
        $ap->status = 'attended';
        $ap->save();
        
     
        Session::flash('notify', 'Successfully Logged Viral Load');
        return redirect()->back();
    }
}
