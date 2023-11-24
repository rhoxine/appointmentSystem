<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Footer extends Model
{
    protected $primaryKey = 'footer_id';
    protected $fillable = [
        'contact_number',
        'email_address',
        'location',
        'work_hours',
        'copyright'
    ];
    use HasFactory;
}
