<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded=[];

    protected function casts()
    {
        return [
            'price'=> 'decimal:2',
        ];
    }

    protected function price(): Attribute
    {
        return Attribute::make(
            get: fn(mixed $value) => '$'.$value,
            set: fn (mixed $value) => (float) $value,
        );

    }
    protected function sku(): Attribute
    {
        return Attribute::make(
            set: fn (mixed $value) => strtoupper(trim($value)),
        );

    }

    protected function createdAt(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => \Carbon\Carbon::parse($value)->format('Y-m-d'),
        );
    }

    protected function updatedAt(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => \Carbon\Carbon::parse($value)->format('Y-m-d'),
        );
    }
    // low stock
    public function hasLowStock()
    {
        return ($this->stock <= $this->alert_threshold) ;
    }

    public function transActions()
    {
        return $this->hasMany(StockTransaction::class);
    }

}
