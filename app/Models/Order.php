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
        'status',
        'created_at',
        'updated_at'
    ];

    public function Production()
    {
        return $this->hasMany(Production::class);
    }

    public function Finishing()
    {
        return $this->hasMany(Finishing::class);
    }
}
