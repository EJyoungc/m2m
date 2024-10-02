<?php

namespace App\Http\Controllers;

use App\Models\Acfutype;
use App\Models\Appointment;
use App\Models\Infant;
use App\Models\Patient;
use App\Models\Viralload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;




class ClientController extends Controller
{
    //
    public function index(Request $request)
    {
        $request->session()->forget('client');
        // Session::flash('notify', 'Successfully Completed Step 1');
        return view('user.patient.index')->with('patients', Patient::all());
    }
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'hiv_status' => 'required',
            'client_type' => 'required',
            'dob' => 'required',
            'sex' => 'required',
            'm2m_enrol_date' => 'required',
            'art_number' => 'required',
            'art_init_date' => 'required',
            //  'client_partner'=>'required',
            //  'partner_status'=>'required_unless:client_partner,no',
            //  'acfu'=>'required',
            //  'acfu_type'=>'required_if:acfu,yes',
            //  'acfu_method'=>'required_if:acfu_type,yes',
            //  'number'=> 'required_if:acfu_method,sms|required_if:acfu_method,phone'

        ]);
        if (empty($request->session()->get('client'))) {
            $client = new \App\Models\Patient();
            $client->fill($validatedData);
            $request->session()->put('client', $client);
        } else {
            $client = $request->session()->get('client');
            $client->fill($validatedData);
            $request->session()->put('client', $client);
        }


        // Patient::create([
        //     'firstname' => $request->firstname,
        //     'lastname' => $request->lastname,
        //     'hiv_status' => $request->hiv_status,
        //     'client_type' => $request->client_type,
        //     'dob' => $request->dob,
        //     'sex' => $request->gender,
        //     'm2m_enrol_date' => $request->MED,
        //     'art_number' => $request->art_number,
        //     'art_init_date' => $request->art_initiation_date,

        // ]);

        Session::flash('notify', 'Successfully Completed Step 1');
        return redirect()->route('client.create.page2');
    }


    public function show($id)
    {
        $p = Patient::find($id);
        $ap = Appointment::where('client_id', $id)->get();


        // dd($p);
        return view('user.patient.show')->with('client', $p)->with('patient_id', $id)->with('acfutypes', Acfutype::all())->with('appointments', $ap);
    }
    public function update_extra(Request $request, $id)
    {
        $client = $request->session()->get('client');
        $tel = '+' . Str::of($request->tel)->replaceMatches('/[^A-Za-z0-9]++/', '');
        // $pt = Patient::find($id);
        // $validatedData = Validator::make($request->all(), [
        //     'client_partner' => 'required',
        //     'partner_status' => 'required_unless:client_partner,no',
        //     'acfu' => 'required',
        //     'acfu_method' => 'required_if:acfu,yes',
        //     'number' => [
        //         Rule::requiredIf(function () use ($request) {
        //             if ($request->acfu_method == 'sms') {
        //                 return true;
        //             }
        //         }), Rule::requiredIf(function () use ($request) {
        //             if ($request->acfu_method == 'Home Visit') {
        //                 return true;
        //             }
        //         }), Rule::requiredIf(function () use ($request) {
        //             if ($request->acfu_method == 'phone') {
        //                 return true;
        //             }
        //         })

        //     ],
        //     'address' => Rule::requiredIf(function () use ($request) {
        //         if ($request->acfu_method == 'Home Visit') {
        //             return true;
        //         }
        //     })
        // ]);

        $validatedData = $request->validate([
            'client_partner' => 'required',
            'partner_status' => 'required_unless:client_partner,no',
            'acfu' => 'required',
            'acfu_method' => 'required_if:acfu,yes',
            'number' => [
                Rule::requiredIf(function () use ($request) {
                    if ($request->acfu_method == 'sms') {
                        return true;
                    }
                }), Rule::requiredIf(function () use ($request) {
                    if ($request->acfu_method == 'Home Visit') {
                        return true;
                    }
                }), Rule::requiredIf(function () use ($request) {
                    if ($request->acfu_method == 'phone') {
                        return true;
                    }
                })

            ],
            'address' => Rule::requiredIf(function () use ($request) {
                if ($request->acfu_method == 'Home Visit') {
                    return true;
                }
            })

        ]);

        if (empty($request->session()->get('client'))) {
            $client = new \App\Models\Patient();
            $client->fill($validatedData);
            $request->session()->put('client', $client);
        } else {
            $client = $request->session()->get('client');
            $client->fill($validatedData);
            $request->session()->put('client', $client);
        }

        // if (!empty($request->client_partner)) {
        //   $client->partner =  $request->client_partner;
        // } else {
        //   $client->partner = 'n/a';
        // }
        // if (!empty($request->partner_status)) {
        //   $client->partner_status =  $request->partner_status;
        // } else {
        //   $client->partner_status = 'n/a';
        // }
        // if (!empty($request->acfu)) {
        //   $client->acfu =  $request->acfu;
        // } else {
        //   $client->acfu = 'n/a';
        // }
        // if (!empty($request->acfu_method)) {
        //   $client->acfu_method =  $request->acfu_method;
        // } else {
        //   $client->acfu_method = 'n/a';
        // }
        // if (!empty($request->tel)) {
        //   $client->tel =  $tel;
        // } else {
        //   $client->tel = 'n/a';
        // }
        // if (!empty($request->address)) {
        //   $client->address =  $request->address;
        // } else {
        //   $client->address = 'n/a';
        // }

        // if (!empty($request->adherance)) {
        //   $client->adherance =  $request->adherance;
        // } else {
        //   $client->adherance = 'n/a';
        // }

        // if (!empty($request->tb_screening)) {
        //   $client->tb_screening =  $request->tb_screening;
        // } else {
        //   $client->tb_screening = 'n/a';
        // }

        // if (!empty($request->viral_load)) {
        //   $client->viral_load =  $request->viral_load;
        // } else {
        //   $client->viral_load = 'n/a';
        // }

        // if (!empty($request->art_pick_up)) {
        //   $client->art_pick_up =  $request->art_pick_up;
        // } else {
        //   $client->art_pick_up = 'n/a';
        // }
        // $pt->form_status = 'complete';
        // $pt->save();

        Session::flash('notify', 'Successfully Client Added');

        return redirect(route('patient.show', $id));
    }
    public function page1(Request $request)
    {

        $client = $request->session()->get('client');
        if(empty($request->session()->get('client'))){
            $request->session()->get('client');
        }else{
            return view('user.patient.create.page1');
        }
        return view('user.patient.create.page1');
    }

    public function page2(Request $request)
    {
        //dd($request->session()->pull('client',));
        $client = $request->session()->get('client');

        if (empty($request->session()->get('client'))) {
            Session::flash('notify', 'Error Start again');
            return redirect(route('client.create.page1'));
        } else {

            return view('user.patient.create.page2')->with('acfutypes', Acfutype::all());
        }
    }

    public function save(Request $request)
    {


        $client = $request->session()->get('client');
        $tel = '+' . Str::of($request->tel)->replaceMatches('/[^A-Za-z0-9]++/', '');
        $validatedData = $request->validate([
            'client_partner' => 'required',
            'partner_status' => 'required_unless:client_partner,no',
            'acfu' => 'required',
            'acfu_method' => 'required_if:acfu,yes',
            'tel' => [
                Rule::requiredIf(function () use ($request) {
                    if ($request->acfu_method == 'sms') {
                        return true;
                    }
                }), Rule::requiredIf(function () use ($request) {
                    if ($request->acfu_method == 'Home Visit') {
                        return true;
                    }
                }), Rule::requiredIf(function () use ($request) {
                    if ($request->acfu_method == 'phone') {
                        return true;
                    }
                })

            ],
            'address' => Rule::requiredIf(function () use ($request) {
                if ($request->acfu_method == 'Home Visit') {
                    return true;
                }
            })

        ]);
        // dd($request, $validatedData);

        if (empty($request->session()->get('client'))) {
            $client = new \App\Models\Patient();
            $client->fill($validatedData);
            $request->session()->put('client', $client);
        } else {
            $client = $request->session()->get('client');
            $client->fill($validatedData);
            $request->session()->put('client', $client);
        }

        // dd($request);
        if (!empty($request->client_partner)) {
          $client->partner =  $request->client_partner;
        } else {
          $client->partner = 'n/a';
        }
        if (!empty($request->partner_status)) {
          $client->partner_status =  $request->partner_status;
        } else {
          $client->partner_status = 'n/a';
        }
        if (!empty($request->acfu)) {
          $client->acfu =  $request->acfu;
        } else {
          $client->acfu = 'n/a';
        }
        if (!empty($request->acfu_method)) {
          $client->acfu_method =  $request->acfu_method;
        } else {
          $client->acfu_method = 'n/a';
        }
        if (!empty($request->tel)) {
          $client->tel =  $tel;
        } else {
          $client->tel = 'n/a';
        }
        if (!empty($request->address)) {
          $client->address =  $request->address;
        } else {
          $client->address = 'n/a';
        }

        if (!empty($request->adherance)) {
          $client->adherance =  $request->adherance;
        } else {
          $client->adherance = 'n/a';
        }

        if (!empty($request->tb_screening)) {
          $client->tb_screening =  $request->tb_screening;
        } else {
          $client->tb_screening = 'n/a';
        }

        if (!empty($request->viral_load)) {
          $client->viral_load =  $request->viral_load;
        } else {
          $client->viral_load = 'n/a';
        }

        if (!empty($request->art_pick_up)) {
          $client->art_pick_up =  $request->art_pick_up;
        } else {
          $client->art_pick_up = 'n/a';
        }
        $client->form_status = 'complete';
        $client->save();
        
        Session::flash('notify', 'Successfully Client Added');

        return redirect(route('client.index'));
    }

    //client menu

    public function menu(Request $request,$id){
      $p = Patient::find($id);
      $ap = Appointment::where('client_id', $id)->get();
       $viral = DB::select('SELECT appointments.appointment , viralloads.viral_copy FROM appointments, viralloads WHERE client_id = '.$id.'  AND viralloads.appointment_id = appointments.id');
      
      return view('user.patient.menu.index')->with('client', $p)->with('client_id', $id)->with('acfutypes', Acfutype::all())->with('appointments', $ap)->with('viralchart',$viral);
    }

    public function diary($id){
      $p = Patient::find($id);
      $a = Appointment::all();
      //dd($a);
      return view('user.patient.menu.diary')->with('client', $p)->with('appointments',$a);
    }

    public function pn($id){
      $p = Patient::find($id);
      $a = Appointment::all();
      
      $infant = Infant::where('client_id',$id)->get();
      
      return view('user.patient.menu.pn')->with('client', $p)->with('appointments',$a)->with('infants',$infant);
    }
}
