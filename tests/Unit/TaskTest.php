<?php

namespace Tests\Unit;

use App\Models\Task;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

use function PHPUnit\Framework\assertEquals;

class TaskTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testGetAllTaskSuccess()
    {
        $user = User::factory()->create([
            'name' => 'pablo moto',
            'email' => 'pablo.moto@gmail.com',
            'password' => Hash::make('5Dejulio.'),
        ]);

        Task::factory()->create([
            'name' => 'test 1',
            'description' => 'descripción de prueba',
            'user_id' => $user->id,
            'completed' => false,
        ]);

        Task::factory()->create([
            'name' => 'test 2',
            'description' => 'descripción de prueba 2',
            'user_id' => $user->id,
            'completed' => false,
        ]);

        $response = $this->actingAs($user)->get('/api/tasks');
        $response->assertStatus(200);
        $res = $response->json();
        var_dump($res);
        assertEquals(2, count($res));
    }
}
