<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $fillable = [
        'quantity',
        'payed',
        'user_id',
        'product_id',
    ];
    public function customer(){
        return $this->belongsTo(User::class, 'user_id');
    }
    public function product(){
        return $this->belongsTo(Product::class, 'product_id');
    }
}
