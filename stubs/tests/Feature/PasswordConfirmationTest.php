<?php

use App\Models\User;
use App\Providers\RouteServiceProvider;

use function Pest\Laravel\actingAs;

test('confirm password screen can be rendered', function () {
    /** @var \App\Models\User */
    $user = User::factory()->create();

    actingAs($user)
        ->get('/confirm-password')
        ->assertStatus(200);
});

test('password can be confirmed', function () {
    /** @var \App\Models\User */
    $user = User::factory()->create();

    actingAs($user)
        ->post('/confirm-password', [
            'password' => 'password',
        ])
        ->assertRedirect(RouteServiceProvider::HOME)
        ->assertSessionHasNoErrors();
});

test('password is not confirmed with invalid password', function () {
    /** @var \App\Models\User */
    $user = User::factory()->create();

    actingAs($user)
        ->post('/confirm-password', [
            'password' => 'wrong-password',
        ])
        ->assertSessionHasErrors();
});
