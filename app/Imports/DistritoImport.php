<?php

namespace App\Imports;

use App\Models\Distritosalud;
use Maatwebsite\Excel\Concerns\ToModel;


use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class DistritoImport implements ToModel,WithHeadingRow, WithBatchInserts, WithChunkReading,WithValidation
{


    private $cargos;

    public function __construct()
    {



       // $this->etnias = Etnia::pluck('id', 'name');


    }

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Distritosalud([
            //

            'name' => $row['name'],
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
            'name' => 'required|string|unique:distritosaluds',


        ];
}
}
