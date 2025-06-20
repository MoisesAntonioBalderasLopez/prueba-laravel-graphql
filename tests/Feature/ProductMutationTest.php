<?php

namespace Tests\Feature;
use Nuwave\Lighthouse\Testing\MakesGraphQLRequests;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductMutationTest extends TestCase
{
    use RefreshDatabase;
    use MakesGraphQLRequests;

    public function test_create_product_mutation(): void
    {
        $this->artisan('migrate');

        $category = \App\Models\Category::create(['name' => 'Test Category']);

        $query = '
            mutation {
                createProduct(input: {
                    name: "Producto Test",
                    description: "Descripción de prueba",
                    price: 99.99,
                    category_id: ' . $category->id . '
                }) {
                    id
                    name
                    price
                }
            }
        ';

        $response = $this->graphQL($query);

        $response->assertJson([
            'data' => [
                'createProduct' => [
                    'name' => 'Producto Test',
                    'price' => 99.99
                ]
            ]
        ]);
    }
}
