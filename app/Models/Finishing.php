<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Finishing extends Model
{
    protected $table = 'finishing';
    protected $primaryKey = 'id';
    protected $fillable = [
        'order_id',
        'employe_id',
        'amount',
        'date',
        'created_at',
        'updated_at'
    ];

    public function Employe()
    {
        return $this->belongsTo(Employe::class);
    }
}
