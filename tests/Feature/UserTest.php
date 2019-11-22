<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Passport\Passport;
use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * Тестування реєстрації користувача API
     *
     * @return void
     */
    public function testRegister()
    {
        $user = [
            'email' => 'email@email23.ua',
            'name' => 'TestApi',
            'password' => '123456789',
            'confirmed_password' => '123456789'
        ];
        $response = $this->post('/api/register', $user);

        $response->assertStatus(200);
    }

    public function testLogin()
    {
        $user = [
            'email' => 'email@emai.ua',
            'password' => '123456789',
        ];
        $response = $this->post('/api/login', $user);

        $response->assertStatus(200);
    }

}
