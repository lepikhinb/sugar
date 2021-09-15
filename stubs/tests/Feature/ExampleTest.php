<?php

use function Pest\Laravel\get;

test('example', function () {
    get('/')->assertStatus(200);
});
