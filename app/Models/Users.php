<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    protected $primaryKey = 'user_id';

    protected $fillable= [
        'user_id',
        'firstname',
        'lastname',
        'username',
        'password',
        'user_type',
        'profile'
    ];
    use HasFactory;
}
