<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class products extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function ratings(){
        return $this->hasMany(Rating::class, 'product_Id');
    }
    public function avgRating(){
        return $this->ratings()->avg('rating');
    }
}
