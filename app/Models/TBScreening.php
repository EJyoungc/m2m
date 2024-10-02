<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TBScreening extends Model
{
    protected $fillable = ['appointment_id','result'];
    use HasFactory;

    public function appointment(){
        return $this->belongsTo(Appointment::class,'appointment_id');
       }
}
