<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    protected $fillable = ['guest_name','guest_lastname','guest_email','guest_address', 'guest_phone_number', 'total_price'];

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class);
    }

}
