<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employe extends Model
{
    protected $table = 'employes';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'task',
        'phone',
        'created_at',
        'updated_at'
    ];

    public function Finishing()
    {
        return $this->hasMany(Finishing::class);
    }
}
