<?php

namespace App\Imports;

use App\Models\Alumno;
use App\Models\Asignacione;
use App\Models\Curso;
use Maatwebsite\Excel\Concerns\ToModel;

use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class AsignacionImport implements ToModel,WithHeadingRow, WithBatchInserts, WithChunkReading,WithValidation
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    private $alumnos;
    private $curso;

    public function __construct()
    {
       // $this->etnias = Etnia::pluck('id', 'name');


        $this->alumnos = Alumno::pluck('id', 'cui');
        $this->cursos = Curso::pluck('id', 'name');


    }
    public function model(array $row)
    {
        return new Asignacione([
            //


            'curso_id' => $this->cursos[$row['curso']],
            'alumno_id' => $this->alumnos[$row['cui']],
            'mes' => $row['mes'],
            'anio' =>  $row['anios'],
        ]);
    }

    public function batchSize(): int
    {
        return 4000;
    }

    public function chunkSize(): int
    {
        return 4000;
    }

    public function rules(): array
    {
        return [
            'curso' => 'required|string',
            'cui' => 'required|integer',
             'mes' => 'required|numeric',
           'anio' => 'required|numeric',

        ];
    }
}
