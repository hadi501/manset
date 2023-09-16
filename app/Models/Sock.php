<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sock extends Model
{
    protected $table = 'socks';
    protected $primaryKey = 'id';
    protected $fillable = [
        'sock',
        'dimension',
        'created_at',
        'updated_at'
    ];
}
