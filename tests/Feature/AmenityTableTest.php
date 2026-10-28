<?php

use Illuminate\Support\Facades\Schema;

it('creates the amenities table with the expected columns', function () {
    expect(Schema::hasTable('amenities'))->toBeTrue()
        ->and(Schema::hasColumn('amenities', 'title'))->toBeTrue()
        ->and(Schema::hasColumn('amenities', 'slug'))->toBeTrue()
        ->and(Schema::hasColumn('amenities', 'icon'))->toBeTrue()
        ->and(Schema::hasColumn('amenities', 'status'))->toBeTrue();
});
