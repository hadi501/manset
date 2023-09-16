<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    protected $table = 'histories';
    protected $primaryKey = 'id';
    protected $fillable = [
        'customer',
        'sock',
        'color',
        'size',
        'amount',
        'date',
        'price',
        'created_at',
        'updated_at'
    ];
}
