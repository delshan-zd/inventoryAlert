<?php

use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});


/*
Broadcast::channel('test-channel', function ($user) {
    // This allows any logged-in user to listen to the channel
    return true;
});
*/
