<?php

use App\Models\User;

test('guests are redirected to the login page', function () {
    $this->get('/dashboard/admin')->assertRedirect('/login');
});

test('authenticated users can visit the dashboard', function () {
    $this->actingAs($user = User::factory()->create());

    $this->get('/dashboard/admin')->assertStatus(200);
});