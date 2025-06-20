<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Nuwave\Lighthouse\Testing\MakesGraphQLRequests;

class CreateProductValidationTest extends TestCase
{
    use RefreshDatabase;
    use MakesGraphQLRequests;

    public function test_create_product_validation_error()
    {
        $category = Category::create(['name' => 'Electrónica']);

        $mutation = '
            mutation {
                createProduct(input: {
                    description: "Sin nombre",
                    price: 123.45,
                    category_id: '.$category->id.'
                }) {
                    id
                    name
                }
            }
        ';

        $response = $this->graphQL($mutation);

        $response->assertGraphQLErrorMessage('Field "createProduct" argument "input.name" of type "String!" is required, but it was not provided.');
    }
}
