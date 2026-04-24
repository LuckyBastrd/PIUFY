<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;

class ExampleTest extends TestCase
{
    public function test_the_application_returns_a_successful_response(): void
    {
        $user = User::factory()->create([
            'email_verified_at' => now(), // 🔥 wajib karena pakai 'verified'
        ]);

        $response = $this->actingAs($user)->get('/');

        $response->assertStatus(200);
    }
}
