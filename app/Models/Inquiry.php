<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inquiry extends Model
{
    protected $primaryKey = 'inquiry_id';
    protected $fillable = [
        'inquiry_id',
        'name',
        'message',
      ];
    use HasFactory;
}
