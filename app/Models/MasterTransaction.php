<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterTransaction extends Model
{
    use HasFactory;

    protected $table = "master_transactions";

    protected $fillable = [
        'product_id',
        'order_number',
        'transaction_name',
        'order_date',
        'amount',
    ];

    public function product() {
        return $this->hasOne(MasterProduct::class, 'id', 'product_id');
    }
}
