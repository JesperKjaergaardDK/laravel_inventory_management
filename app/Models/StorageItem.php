<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StorageItem extends Model
{
    //Used for mass assignment (when an array of values are sendt to the db)'
    protected $fillable = [
        'product_name',
        'price',
        'quantity',
    ];

    /** @use HasFactory<\Database\Factories\StorageItemFactory> */
    use HasFactory;
}
