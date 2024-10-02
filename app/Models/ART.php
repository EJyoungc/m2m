<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ART extends Model
{
    use HasFactory;

   protected $fillable =['client_id','appointment_id','next_refill' ,'refill_dose','drug_id','status'];

   public function appointment(){
    return $this->belongsTo(Appointment::class,'appointment_id');
   }

}

