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
        'task', // 0 = montir, 1 = operator, 2 = obras, 3 = finishing
        'phone',
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
