<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Nuwave\Lighthouse\Testing\MakesGraphQLRequests;

class UpdateProductTest extends TestCase
{
    use RefreshDatabase;
    use MakesGraphQLRequests;

    public function test_can_update_product()
    {
        $category = Category::create(['name' => 'Electrónica']);
        $product = Product::create([
            'name' => 'Laptop',
            'description' => 'Vieja',
            'price' => 500,
            'category_id' => $category->id
        ]);

        $mutation = '
            mutation {
                updateProduct(input: {
                    id: '.$product->id.',
                    name: "Laptop Nueva",
                    description: "Actualizada",
                    price: 1100.50,
                    category_id: '.$category->id.'
                }) {
                    id
                    name
                    price
                }
            }
        ';

        $response = $this->graphQL($mutation);

        $response->assertJson([
            'data' => [
                'updateProduct' => [
                    'name' => 'Laptop Nueva',
                    'price' => 1100.50
                ]
            ]
        ]);
    }
}
