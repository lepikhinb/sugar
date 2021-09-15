<?php

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Verified;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\URL;

use function Pest\Laravel\actingAs;
use function PHPUnit\Framework\assertFalse;
use function PHPUnit\Framework\assertTrue;

test('email verification screen can be rendered', function () {
    /** @var \App\Models\User */
    $user = User::factory()->create([
        'email_verified_at' => null,
    ]);

    actingAs($user)
        ->get('/verify-email')
        ->assertStatus(200);
});

test('email can be verified', function () {
    /** @var \App\Models\User */
    $user = User::factory()->create([
        'email_verified_at' => null,
    ]);

    Event::fake();

    $verificationUrl = URL::temporarySignedRoute(
        'verification.verify',
        now()->addMinutes(60),
        ['id' => $user->id, 'hash' => sha1($user->email)]
    );

    actingAs($user)
        ->get($verificationUrl)
        ->assertRedirect(RouteServiceProvider::HOME . '?verified=1');

    Event::assertDispatched(Verified::class);
    assertTrue($user->fresh()->hasVerifiedEmail());
});

test('email is not verified with invalid hash', function () {
    /** @var \App\Models\User */
    $user = User::factory()->create([
        'email_verified_at' => null,
    ]);

    $verificationUrl = URL::temporarySignedRoute(
        'verification.verify',
        now()->addMinutes(60),
        ['id' => $user->id, 'hash' => sha1('wrong-email')]
    );

    actingAs($user)
        ->get($verificationUrl);

    assertFalse($user->fresh()->hasVerifiedEmail());
});
