<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asignacione extends Model
{
    use HasFactory;

    protected $fillable = [
        'curso_id',
        'alumno_id',
        'mes',
        'anio',


    ];

    public function asignacion()
    {
        return $this->belongsTo(Asignacione::class);
    }
    public function alumno()
    {
        return $this->belongsTo(Alumno::class);
    }
    public function curso()
    {
        return $this->belongsTo(Curso::class);
    }
}
