<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;

class Users extends Model implements Authenticatable
{
    use AuthenticatableTrait, HasFactory;

    protected $primaryKey = 'user_id';

    protected $fillable = [
        'user_id',
        'firstname',
        'lastname',
        'username',
        'password',
        'confirm_password',
        'user_type',
        'profile'
    ];
    use HasFactory;

    public function replyMessages()
    {
        return $this->hasMany(Inquiry::class, 'user_id');
    }
}
