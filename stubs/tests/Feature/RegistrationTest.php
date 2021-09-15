<?php

use App\Providers\RouteServiceProvider;

use function Pest\Laravel\assertAuthenticated;
use function Pest\Laravel\get;
use function Pest\Laravel\post;

test('registration screen can be rendered', function () {
    get('/register')
        ->assertStatus(200);
});

test('new users can register', function () {
    post('/register', [
        'name' => 'Test User',
        'email' => 'test@example.com',
        'password' => 'password',
        'password_confirmation' => 'password',
    ])
        ->assertValid()
        ->assertRedirect(RouteServiceProvider::HOME);

    assertAuthenticated();
});
