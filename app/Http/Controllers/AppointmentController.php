<?php

namespace App\Http\Controllers;

use App\Models\Adherence;
use App\Models\Appointment;
use App\Models\ART;
use App\Models\Drug;
use App\Models\TBScreening;
use App\Models\Viralload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AppointmentController extends Controller
{
    //
    public function store(Request $request,$id){
        //  dd($request->adherance);
        $validatedData = $request->validate([
            'appointment'=>'required',
        ]);

        if (!empty($request->desc)) {
            
            Appointment::create([
                'client_id'=>$id,
                'log_userid'=>Auth::user()->id,
                'appointment'=>$request->appointment,
                'desc'=>$request->desc,
                'art'=>$request->art,
                'viralload'=>$request->viralload,
                'adherance'=>$request->adherance,
                'tbtest'=>$request->tbtest,
            ]);

        }else{
            
            Appointment::create([
                'client_id'=>$id,
                'log_userid'=>Auth::user()->id,
                'name'=>$request->name,
                'appointment'=>$request->appointment,
                'desc'=>'N/A',
                'art'=>$request->art,
                'viralload'=>$request->viralload,
                'adherance'=>$request->adherance,
                'tbtest'=>$request->tbtest,
                
            ]);

        }

        Session::flash('notify', 'Successfully Appointment Set');
        return redirect()->back();

    }

    public function destroy($id){

        $ap = Appointment::find($id);
        $ap->delete();
        Session::flash('notify', 'Successfully Deleted Appointment');
        return redirect()->back();

    }

    public function show($id){

        $ap = Appointment::find($id);
        
         $art =  ART::where('appointment_id',$ap->id)->get();
         $viralload =  Viralload::where('appointment_id',$ap->id)->get();
         $adherence = Adherence::where('appointment_id',$ap->id)->get();
         $tbtest = TBScreening::where('appointment_id',$ap->id)->get();

        return view('user.patient.menu.appointment.index')
        ->with('ap',$ap)
        ->with('drugs',Drug::all())
        ->with('arts',$art)
        ->with('viralload',$viralload)
        ->with('adherence',$adherence)
        ->with('tbtest',$tbtest);
    }

    public function update(Request $request, $id){
        $desc ="";
        if($request->desc =""){
            $desc = "N/A";
        }else{
            $desc = $request->desc;
        }
        $ap = Appointment::find($id);
        if($ap->appointment == $request->appointment){
            $ap->appointment = $request->appointment;
            $ap->desc = $desc;
            $ap->save();
            Session::flash('notify', ' is the same Appointment');
            return redirect()->back();
        } else{

            $ap->appointment = $request->appointment;
            $ap->desc = $desc;
            $ap->status = 'rescheduled';

            $ap->save();
            Session::flash('notify', 'Successfully Rescheduled Appointment');
            return redirect()->back();
        }

    }
}
