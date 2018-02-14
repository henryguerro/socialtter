<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;

class UserModuleTest extends DuskTestCase
{
    use DatabaseMigrations;

    public function test_register_a_new_user()
    {
        $userAttributes = [
            'name' => 'Juan Bimba',
            'username' => 'bimbero',
            'email' => 'bimbero@gmail.com',
            'password' => 'bimbero',
            'avatar' => "http://lorempixel.com/300/300/people/1"
        ];
        $user = $this->createUser($userAttributes, 'make');


        $this->browse(function (Browser $browser) use ($user) {

            $browser->visitRoute('register')
                ->type('name', $user->name)
                ->type('email', $user->email)
                ->type('password', $user->password)
                ->type('password_confirmation', $user->password)
                ->type('username', $user->username)
                ->press('Register');
        });


        $this->assertDatabaseHas('users', [
            "name" => $user->name,
            "username" => $user->username,
            "email" => $user->email
        ]);

    }
}
