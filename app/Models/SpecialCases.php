<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpecialCases extends Model
{
    protected $primaryKey = 'special_case_id';

    protected $fillable = [
      'special_case_id',
      'service_id',
      'owner_name',
      'pet_name',
      'age',
      'pet_type',
      
    ];
    use HasFactory;
}
