<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cargos extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',

    ];

    public function cargo()
    {
        return $this->belongsTo(Cargos::class);
    }
}
