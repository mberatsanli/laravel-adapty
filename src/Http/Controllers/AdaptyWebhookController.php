<?php

namespace MBS\LaravelAdapty\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class AdaptyWebhookController extends BaseController
{

    use DispatchesJobs, ValidatesRequests;

    public function webhook(Request $request)
    {}

}
