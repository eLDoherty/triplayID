<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Variant extends Model
{
    use HasFactory;
    public $table = 'table_variant';
    public $timestamps = false;

    protected $fillable = [
        'name',
        'price',
        'product_id'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
