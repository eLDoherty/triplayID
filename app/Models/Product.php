<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public $table = 'table_products';
    public $timestamps = false;

    protected $fillable = [
        'name',
        'description',
        'thumbnail',
        'type',
        'hasServer',
        'banner'
    ];

    public function variant()
    {
        return $this->hasMany(Variant::class);
    }

}
