<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{

    protected $primaryKey = 'client_id';
    protected $fillable= [
        'client_id',
        'user_id',
        'appointment_date',
        'owner_name',
        'pet_type',
        'contact',
        'breed',
        'email_address',
        'age',
        'address',
        'service',
        'status'
    ];
    use HasFactory;
}
