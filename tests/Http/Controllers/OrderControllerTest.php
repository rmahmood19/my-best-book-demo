<?php

namespace Tests\Http\Controllers;

use App\Http\Controllers\OrderController;
use Tests\TestCase;

class OrderControllerTest extends TestCase
{

    public function test_it_shows_order_form_on_homepage()
    {
        $response = $this->get('/');

        $response->assertStatus(200);

        $response->assertViewIs('order-form');

    }

    public function test_order_form_validation_success()
    {
        $response = $this->post(route('order.submit'),
            [
                'name' => 'Anderson Smith',
                'gender' => 'male'
            ]
        );

        $response->assertStatus(200);

        $response->assertViewHas('name', 'Anderson Smith');
        $response->assertViewHas('gender', 'Boy');
    }


    public function test_order_form_validation_for_empty_string()
    {
        $response = $this->post(route('order.submit'),
            ['name' => '']
        );

        $response->assertRedirect();

        $response->assertSessionHasErrors([
            'name' => 'The name field is required.',
        ]);

    }

    public function test_order_form_validation_for_number()
    {
        $response = $this->post(route('order.submit'),
            ['name' => 'Reaz 123']
        );

        $response->assertRedirect();

        $response->assertSessionHasErrors([
            'name' => 'The name can only contain letters.',
        ]);

    }

    public function test_order_form_validation_for_and_word()
    {
        $response = $this->post(route('order.submit'),
            ['name' => 'Reaz and Rob']
        );

        $response->assertRedirect();

        $response->assertSessionHasErrors([
            'name' => 'The name can not contain word "and".',
        ]);
    }
}
