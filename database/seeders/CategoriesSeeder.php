<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                'name' => 'Telefonos y accesorios'
            ],
            [
                'name' => 'Libros'
            ],
            [
                'name' => 'Ropa'
            ],
            [
                'name' => 'Computadoras'
            ],
            [
                'name' => 'Productos de Oficina'
            ],
            [
                'name' => 'Juegos'
            ],
            [
                'name' => 'Articulos de cocina'
            ],
            [
                'name' => 'Televisores'
            ],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
