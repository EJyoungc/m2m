<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adherence extends Model
{
    use HasFactory;
    protected $fillable =['appointment_id', 'adherence_result','pills_missed'];

    public function appointment(){
        return $this->belongsTo(Appointment::class,'appointment_id');
       }

    

}
