<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    protected $primaryKey = 'id';
    protected $fillable = [
        'customer',
        'sock',
        'color',
        'size',
        'amount',
        'date',
        'deadline',
        'price',
        'created_at',
        'updated_at'
    ];

    public function Production()
    {
        return $this->hasMany(Production::class);
    }
}
