<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Distritosalud extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',

    ];

    public function distrito()
    {
        return $this->belongsTo(Distritosalud::class);
    }
}
