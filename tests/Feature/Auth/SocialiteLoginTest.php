<?php

use App\Models\User;
use Laravel\Socialite\Contracts\Provider;
use Laravel\Socialite\Contracts\User as SocialiteUser;
use Laravel\Socialite\Facades\Socialite;

test('new users can log in using Google', function () {
    $socialiteUser = Mockery::mock(SocialiteUser::class);
    $socialiteUser->shouldReceive('getId')->andReturn('google-user-123');
    $socialiteUser->shouldReceive('getName')->andReturn('Google User');
    $socialiteUser->shouldReceive('getEmail')->andReturn('google-user@example.com');

    $provider = Mockery::mock(Provider::class);
    $provider->shouldReceive('user')->once()->andReturn($socialiteUser);

    Socialite::shouldReceive('driver')
        ->once()
        ->with('google')
        ->andReturn($provider);

    $response = $this->get(route('socialite.social-login-callback', ['provider' => 'google']));

    $response->assertRedirect(route('user.dashboard'));
    $this->assertAuthenticated();

    $user = User::where('email', 'google-user@example.com')->firstOrFail();
    expect($user->password)->not->toBeNull();
    expect($user->provider_id)->toBe('google-user-123');
});

test('new users without a GitHub email can log in', function () {
    $socialiteUser = Mockery::mock(SocialiteUser::class);
    $socialiteUser->shouldReceive('getId')->andReturn('github-user-456');
    $socialiteUser->shouldReceive('getName')->andReturn('GitHub User');
    $socialiteUser->shouldReceive('getEmail')->andReturn(null);

    $provider = Mockery::mock(Provider::class);
    $provider->shouldReceive('user')->once()->andReturn($socialiteUser);

    Socialite::shouldReceive('driver')
        ->once()
        ->with('github')
        ->andReturn($provider);

    $response = $this->get(route('socialite.social-login-callback', ['provider' => 'github']));

    $response->assertRedirect(route('user.dashboard'));
    $this->assertAuthenticated();

    $user = User::where('provider_id', 'github-user-456')
        ->where('provider_name', 'github')
        ->firstOrFail();

    expect($user->email)->toBeNull();
    expect($user->password)->not->toBeNull();
});
