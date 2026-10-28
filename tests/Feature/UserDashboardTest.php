<?php

use App\Models\User;

test('user dashboard renders when the user has no subscription', function () {
    $user = User::factory()->create();

    $response = $this->actingAs($user)->get(route('user.dashboard'));

    $response->assertOk()
        ->assertSee('No Active Package');
});
