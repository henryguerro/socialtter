<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UsersModuleTest extends TestCase
{
    use DatabaseMigrations, DatabaseTransactions;

    public function test_create_new_user()
    {

        // Arrange
        $avatar = [
            'avatar' => "http://lorempixel.com/300/300/people/1"
        ];

        // Act
        $response = $this->get('/register');


        // Assert
        $response->assertSee('Register');
    }
}
