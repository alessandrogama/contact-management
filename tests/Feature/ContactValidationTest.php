<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ContactValidationTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_validation_errors_on_invalid_input()
    {
        $user = \App\Models\User::factory()->create();
        $this->actingAs($user)
            ->post(route('contacts.store'), [
                'name' => 'abc',
                'contact' => '1234',
                'email' => 'invalid-email',
            ])
            ->assertSessionHasErrors(['name', 'contact', 'email']);
    }

}
