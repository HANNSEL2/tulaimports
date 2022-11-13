<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    use HasFactory;

    protected $fillable = [
        'cui',
        'nombres',
        'apellidos',
        'sexo_id',
        'etnia_id',
        'telefono',
        'area_id',
        'distrito_id',
        'profesion_id',
        'cargo_id',
    ];

    public function etnia()
    {
        return $this->belongsTo(Etnia::class);
    }

    public function sexo()
    {
        return $this->belongsTo(Sexo::class);
    }

    public function area()
    {
        return $this->belongsTo(Areasalud::class);
    }

    public function distrito()
    {
        return $this->belongsTo(Distritosalud::class);
    }

    public function profesion()
    {
        return $this->belongsTo(Profesiones::class);
    }

    public function cargo()
    {
        return $this->belongsTo(Cargos::class);
    }
}
