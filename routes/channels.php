<?php

use Illuminate\Support\Facades\Broadcast;
use Illuminate\Support\Facades\Auth;

Broadcast::channel('chatwithowner', function ($user) {
    return Auth::check();
});
