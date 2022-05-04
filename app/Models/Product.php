<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    const CREATED_AT = 'date_added';
    const UPDATED_AT = 'date_updated';

    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'barcode',
        'brand',
        'price',
        'image_url'
    ];


    function brand()
    {
        return $this->belongsTo(Brand::class);
    }
}