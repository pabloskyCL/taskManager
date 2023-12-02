<?php

namespace Tests\Unit;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

use function PHPUnit\Framework\assertArrayHasKey;
use function PHPUnit\Framework\assertEquals;

class AuthenticationTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testObteinTokenForAnUserSuccess()
    {
        $user = User::factory()->create([
            'name' => 'pablo moto',
            'email' => 'pablo.moto@gmail.com',
            'password' => Hash::make('password'),
        ]);
        $response = $this->actingAs($user)->post('/api/login', ['email' => 'pablo.moto@gmail.com', 'password' => 'password']);
        $response->assertStatus(200);
        $data = json_decode($response->decodeResponseJson()->json, true);
        assertArrayHasKey('token', $data['authorization']);
    }

    public function testObteinTokenForAnUserUnauthorized()
    {
        $user = User::factory()->create([
            'name' => 'pablo moto',
            'email' => 'pablo.moto@gmail.com',
            'password' => Hash::make('password'),
        ]);
        $response = $this->actingAs($user)->post('/api/login', ['email' => 'pablo.moto@gmail.com', 'password' => 'passworddd']);
        $response->assertStatus(200);
        $data = json_decode($response->decodeResponseJson()->json, true);
        assertEquals('Invalid credentials', $data['message']);
    }
}
