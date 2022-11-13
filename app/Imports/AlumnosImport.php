<?php

namespace App\Imports;

use App\Models\Alumno;
use App\Models\Areasalud;
use App\Models\Cargos;
use App\Models\Category;
use App\Models\Distritosalud;
use App\Models\Etnia;
use App\Models\Profesiones;
use App\Models\Sexo;
use App\Models\User;


use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class AlumnosImport implements ToModel,WithHeadingRow, WithBatchInserts, WithChunkReading,WithValidation
{


    private $etnias;
    private $users;
    private $categories;
    private $sexos;
    private $areasaluds;
    private $profesiones;
    private $cargos;

    public function __construct()
    {
       // $this->etnias = Etnia::pluck('id', 'name');


        $this->etnias = Etnia::pluck('id', 'name');

        $this->sexos = Sexo::pluck('id', 'name');
        $this->areasaluds = Areasalud::pluck('id', 'name');
        $this->distritosaluds = Distritosalud::pluck('id', 'name');
        $this->profesiones = Profesiones::pluck('id', 'name');
        $this->cargos = Cargos::pluck('id', 'name');
    }

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Alumno([
            //



                'cui' => $row['cui'],
                'nombres' => $row['nombres'],
                'apellidos' => $row['apellidos'],

                'sexo_id' =>  $this->sexos[$row['sexo_id']],

                'etnia_id' => $this->etnias[$row['etnia_id']],

                'telefono' => $row['telefono'],

                'area_id' => $this->areasaluds[$row['area_id']],

                'distrito_id' => $this->distritosaluds[$row['distrito_id']],

                'profesion_id' =>  $this->profesiones[$row['profesion_id']],

                'cargo_id' => $this->cargos[$row['cargo_id']],



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
            'cui' => 'required|integer|unique:alumnos',
            'nombres' => 'required|string',
            'apellidos' => 'required|string',
            'sexo_id' => 'required|string',
            'etnia_id' => 'required|string',
            'telefonos' => 'numeric',
            'area_id' => 'required|string',
            'distrito_id' => 'required|string',
            'profesion_id' => 'required|string',
            'cargo_id' => 'required|string',



        ];
    }

}
