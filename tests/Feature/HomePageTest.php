<?php

use App\Models\heroes;

test('homepage renders when no hero section has been configured', function () {
    heroes::query()->delete();

    $this->get(route('home'))->assertOk();
});
