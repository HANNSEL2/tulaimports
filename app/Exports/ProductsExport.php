<?php

namespace App\Exports;

use App\Models\Product;
use DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ProductsExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
       
        $users = DB::table('Products')->select('name', 'description','price','quantity_left','category_id')->get();
        return $users;
    }

    public function headings(): array
    {
        return [
            'name',
            'description',
            'price',
            'quantity_left',
            'category_id',
        ];
    }
   
}
