<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterProduct extends Model
{
    use HasFactory;

    protected $table = "master_products";

    protected $fillable = [
        'product_code',
        'product_name',
        'expired_date',
        'price',
        'size',
        'category'
    ];
}
