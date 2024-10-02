<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;
    protected $fillable = [
        'firstname',
        'lastname',
        'hiv_status',
        'client_type',
        'dob',
        'sex',
        'm2m_enrol_date',
        'art_number',
        'art_init_date',
        'partner',
        'partner_status',
        'acfu',
        'acfu_type',
        'art_pick_up',
        'viral_load',
        'adherance',
        'tb_screening'

    ];


    public function appointments(){
        return $this->hasMany(Appointment::class);
    }
    

}
