<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Services extends Model
{
  protected $primaryKey = 'service_id';

    protected $fillable = [
      'service_id',
      'category_id',
      'service',
      'service_fee',
      

    ];
    use HasFactory;
}
