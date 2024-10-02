<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable =[ 'log_userid', 'client_id', 'appointment', 'desc','viralload','art','adherance','tbtest'];

    // public function patient(){
    //     return $this->belongsTo(Patient::class,'patient_id');
    // }

    public function timedif(){
    //    $time = Carbon::createdfromTimeStamp(strtotime($this->appointment))->diffForHumans();
      $time = Carbon::createFromTimestamp(strtotime($this->appointment))->diffForHumans();

       return $time;
    }

    public function client(){
        return $this->belongsTo(Patient::class,'client_id');
    }
    public function artcheck(){
        return $this->hasMany(ART::class,'appointment_id');
    }
    public function viralloadcheck(){
        return $this->hasMany(Viralload::class,'appointment_id');
    }
    public function adherencecheck(){
        return $this->hasMany(Adherence::class,'appointment_id');
    }
    
    public function tbcheck(){
        return $this->hasMany(TBScreening::class,'appointment_id');
    }
    public function nextrefill(){
             $date = strtotime($this->appointment);
             $appointment = date('y-m-d',$date);
            $date_next = Carbon::createFromFormat('y-m-d',$appointment)->addDays(30)->format('y-m-d');
            return $date_next;
    }

}
