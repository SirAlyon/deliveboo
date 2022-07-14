<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class);
    }

}
