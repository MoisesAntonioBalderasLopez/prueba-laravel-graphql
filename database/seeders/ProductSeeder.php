<?php

namespace Database\Seeders;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $category1 = Category::where('name', 'Electrónica')->first();
        $category2 = Category::where('name', 'Ropa')->first();
        $category3 = Category::where('name', 'Libros')->first();

        Product::create([
            'name' => 'Laptop HP',
            'description' => 'Laptop para oficina',
            'price' => 1200,
            'category_id' => $category1->id
        ]);

        Product::create([
            'name' => 'Camisa Polo',
            'description' => 'Camisa casual',
            'price' => 35,
            'category_id' => $category2->id
        ]);

        Product::create([
            'name' => 'Libro Laravel',
            'description' => 'Aprende Laravel desde cero',
            'price' => 45,
            'category_id' => $category3->id
        ]);
    }
}
