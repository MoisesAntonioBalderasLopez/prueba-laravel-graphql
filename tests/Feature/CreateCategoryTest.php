<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Nuwave\Lighthouse\Testing\MakesGraphQLRequests;

class CreateCategoryTest extends TestCase
{
    use RefreshDatabase;
    use MakesGraphQLRequests;

    public function test_can_create_category()
    {
        $mutation = '
            mutation {
                createCategory(input: {
                    name: "Ropa"
                }) {
                    id
                    name
                }
            }
        ';

        $response = $this->graphQL($mutation);

        $response->assertJson([
            'data' => [
                'createCategory' => [
                    'name' => 'Ropa'
                ]
            ]
        ]);
    }
}
