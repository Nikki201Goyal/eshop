<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrderDeatils extends Model
{
    use HasFactory;

    public function prod(){
        // dd('uhguh');
        return $this->belongsTo(products::class,'product_id');
    }
}
