<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Services extends Model
{
  protected $primaryKey = 'service_id';

    protected $fillable = [
      'service_id',
      'service',
      'category_name',
      'service_fee',
      

    ];
    use HasFactory;
}