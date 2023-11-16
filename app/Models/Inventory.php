<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{

    protected $primaryKey = 'product_id';
    protected $fillable = [
        'product_id',
        'product_name',
        'description',
        'price',
        'quantity',
        'product_image'
        
  
      ];
    use HasFactory;
}
