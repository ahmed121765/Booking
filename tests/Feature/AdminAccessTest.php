<?php

use App\Models\User;

test('ajax requests to admin routes return a 403 instead of a redirect', function () {
    $user = User::factory()->create([
        'user_type' => 'user',
    ]);

    $response = $this
        ->actingAs($user)
        ->withHeader('X-Requested-With', 'XMLHttpRequest')
        ->get('/admin/categories');

    $response->assertStatus(403)
        ->assertJson([
            'message' => 'You are not allowed to access this page.',
        ]);
});

test('admin category datatable ajax requests return json data', function () {
    $user = User::factory()->create([
        'user_type' => 'admin',
    ]);

    $response = $this
        ->actingAs($user)
        ->withHeader('X-Requested-With', 'XMLHttpRequest')
        ->get('/admin/categories?draw=1&columns[0][data]=id&columns[0][name]=&columns[0][searchable]=true&columns[0][orderable]=true&columns[0][search][value]=&columns[0][search][regex]=false&columns[1][data]=icon&columns[1][name]=&columns[1][searchable]=true&columns[1][orderable]=true&columns[1][search][value]=&columns[1][search][regex]=false&columns[2][data]=bg_image&columns[2][name]=&columns[2][searchable]=true&columns[2][orderable]=true&columns[2][search][value]=&columns[2][search][regex]=false&columns[3][data]=title&columns[3][name]=&columns[3][searchable]=true&columns[3][orderable]=true&columns[3][search][value]=&columns[3][search][regex]=false&columns[4][data]=status&columns[4][name]=&columns[4][searchable]=true&columns[4][orderable]=true&columns[4][search][value]=&columns[4][search][regex]=false&columns[5][data]=show_at_home&columns[5][name]=&columns[5][searchable]=true&columns[5][orderable]=true&columns[5][search][value]=&columns[5][search][regex]=false&columns[6][data]=action&columns[6][name]=&columns[6][searchable]=false&columns[6][orderable]=false&columns[6][search][value]=&columns[6][search][regex]=false&order[0][column]=1&order[0][dir]=asc&start=0&length=10&search[value]=&search[regex]=false');

    $response->assertOk()
        ->assertJsonStructure([
            'draw',
            'recordsTotal',
            'recordsFiltered',
            'data',
        ]);
});
