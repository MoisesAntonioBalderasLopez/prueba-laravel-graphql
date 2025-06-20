<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Nuwave\Lighthouse\Testing\MakesGraphQLRequests;

class DeleteProductTest extends TestCase
{
    use RefreshDatabase;
    use MakesGraphQLRequests;

    public function test_can_delete_product()
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
                deleteProduct(id: '.$product->id.') {
                    id
                    name
                }
            }
        ';

        $response = $this->graphQL($mutation);

        $response->assertJson([
            'data' => [
                'deleteProduct' => [
                    'id' => (string)$product->id,
                    'name' => 'Laptop'
                ]
            ]
        ]);
    }
}
