<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function transaction(){
        return $this->hasMany(Transaction::class);
    }

    public function scopeSearch($query, array $searchs){
        $query->when($searchs['search']??false, function($query, $search){
            return $query->where('name', 'like', '%' . $search . '%');
        });
        $query->when($searchs['category']??false, function($query,$category){
            return $query->where('category',$category);
        });
    }
}
