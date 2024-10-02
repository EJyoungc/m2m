<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class UserController extends Controller
{
    //
    public function index(){
        return view('user.user.index')->with('users',User::where('role', '2')->orWhere('role','3')->get());
    }

    public function create(){
        return view('user.user.create');
    }

    public function store(Request $request){
        $validateData = $request->validate([
            'name'=>'required',
            'email'=>'required|email',
            'role'=>'required'
        ]);
        function random_password(){
            $alphabet ='abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
            $pass = array();
            $alphalength = strlen($alphabet) -1;
            for ($i=0; $i < 8; $i++) { 
                $n = rand(0,$alphalength);
                $pass[] =$alphabet[$n];
            }
            return implode($pass);
        }

        $pwd = random_password();
        $encryp_pass  = Crypt::encrypt($pwd);
       
       
                
        User::create([
            'name' => $request->name,
            'email'=> $request->email,
            'ac_status'=>$request->ac_status,
            'role'=> $request->role,
            'encpwd' => $encryp_pass,
            'password'=>Hash::make($pwd)

        ]);
        Session::flash('notify', 'Successfully Created new User');
        
        return redirect(route('user.index'));
    }

    public function decrypt($id){
        try {
            $test = Crypt::decryptString($id);
            $string = Str::of($test)->replaceMatches('/[^A-Za-z0-9]++/', '');
            $decrypted = Str::of($string)->replaceFirst('s8', '');
            
            
            $data = $decrypted;
            header('Content-Type: application/json');
            print json_encode($data);
        } catch (DecryptException $e) {
            //
            $data ="error";
            print json_encode($data);
        }
      
    }

    
}
