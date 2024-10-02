<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Viralload extends Model
{
    use HasFactory;


    protected $fillable = ['viral_copy','result' ,'appointment_id'];


   public function appointment(){
    return $this->belongsTo(Appointment::class,'appointment_id');
   }
}
