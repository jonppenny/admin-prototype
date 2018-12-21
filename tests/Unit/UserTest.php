<?php

namespace Tests\Unit;

use App\User;
use function factory;
use function route;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class UserTest extends TestCase
{
    public function test_create_user()
    {
        $data = [
            'name'        => $this->faker->name,
            'email'       => $this->faker->email,
            'password'    => $this->faker->password,
            'role'        => 'user',
            'user_avatar' => '',
        ];

        $response = $this->post(route('user.store'), $data);

        $response->assertStatus(302);
    }

    public function test_view_users()
    {
        $response = $this->get(route('users.show'));

        $response->assertStatus(302);
    }

    public function test_update_user()
    {
        $user = factory(User::class)->create();

        $data = [
            'name'        => $this->faker->name,
            'email'       => $this->faker->email,
            'password'    => $this->faker->password,
            'role'        => 'user',
            'user_avatar' => '',
        ];

        $response = $this->patch(route('user.update', $user->id), $data);

        $response->assertStatus(302);
    }

    public function test_delete_user()
    {
        $user = factory(User::class)->create();

        $response = $this->delete(route('user.delete', $user->id));

        $response->assertStatus(302);
    }
}
