<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Services_List extends Model
{

    protected $primaryKey = 'services_id';
    protected $fillable = [
        'service_name',
        'fee',
        'service_img',
    ];
    use HasFactory;
}
