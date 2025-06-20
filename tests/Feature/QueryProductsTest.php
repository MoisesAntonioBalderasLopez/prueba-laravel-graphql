<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Nuwave\Lighthouse\Testing\MakesGraphQLRequests;

class QueryProductsTest extends TestCase
{
    use RefreshDatabase;
    use MakesGraphQLRequests;

    public function test_can_query_products()
    {
        $category = Category::create(['name' => 'Libros']);
        Product::create([
            'name' => 'Libro Laravel',
            'description' => 'Muy bueno',
            'price' => 45,
            'category_id' => $category->id
        ]);

        $query = '
            query {
                products {
                    name
                    price
                    category { name }
                }
            }
        ';

        $response = $this->graphQL($query);

        $response->assertJsonStructure([
            'data' => [
                'products' => [
                    [
                        'name',
                        'price',
                        'category' => ['name']
                    ]
                ]
            ]
        ]);
    }
}
