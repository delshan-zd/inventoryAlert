<?php

namespace App\Models;

use App\TransactionReason;
use App\TransactionType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockTransaction extends Model
{
use HasFactory;

 protected $guarded = [];
    public function product()
    {
        return $this->belongsTo(Product::class);
    }


    public function casts(){
        return [
            'type' => TransactionType::class,
            'reason' => TransactionReason::class,
        ];
    }
}
