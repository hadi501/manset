<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Production extends Model
{
    protected $table = 'productions';
    protected $primaryKey = 'id';
    protected $fillable = [
        'order_id',
        'operator',
        'shift',
        'machine_no',
        'amount',
        'date',
        'time',
        'created_at',
        'updated_at'
    ];

    public function Order()
    {
        return $this->belongsTo(Order::class);
    }
}
