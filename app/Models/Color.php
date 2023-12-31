<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    protected $table = 'colors';
    protected $primaryKey = 'id';
    protected $fillable = [
        'color',
        'created_at',
        'updated_at'
    ];
}
