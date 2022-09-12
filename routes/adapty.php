<?php

use Illuminate\Support\Facades\Route;
use MBS\LaravelAdapty\Http\Controllers\AdaptyWebhookController;

Route::middleware(config('adapty.webhook.middleware'))
    ->post(config('adapty.webhook.path'), [AdaptyWebhookController::class, 'webhook']);
