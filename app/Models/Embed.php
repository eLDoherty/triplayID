<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Embed extends Model
{
    use HasFactory;
    public $table = 'table_embed';
    public $timestamps = false;

    protected $fillable = [
        'url'
    ];

}
