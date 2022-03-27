<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class products extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded=[];
    protected $dates=['deleted_at'];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function ratings(){
        return $this->hasMany(Rating::class, 'product_Id');
    }
    public function avgRating(){
        return $this->ratings()->avg('rating');
    }

    public function orders(){
        return $this->hasMany(OrderDeatils::class, 'product_id');
    }
}
