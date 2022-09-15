<?php

namespace MBS\LaravelAdapty\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Log;
use MBS\LaravelAdapty\Events\AbstractEvent;

class AdaptyWebhookController extends BaseController
{

    use DispatchesJobs, ValidatesRequests;

    public function webhook(Request $request)
    {
        Log::info('New hook arrived! ::: ', $request->all());

        if ($request->has('adapty_check')) {
            Log::info('Webhook check requested! :: ' . $request->get('adapty_check'));

            return response()->json([
                'adapty_check_response' => $request->get('adapty_check'),
            ]);
        }

        if ($request->has('event_type')) {
            if (config('adapty.webhook.reject_if_customer_user_id_is_null') && $request->get('customer_user_id') === null) {
                throw new \Exception('Customer user id cannot be null!');
            }

            $events = config('adapty.webhook.events');
            $eventType = $request->get('event_type');

            if (!array_key_exists($eventType, $events)) {
                throw new \Exception('Undefined event! ::: ' . $eventType); // TODO change exception
            }

            /** @var AbstractEvent $event */
            $event = $events[$eventType];
            event($event::fromArray($request->all()));

            return response()->json([]);
        }

        throw new \Exception('Malformed webhook request'); // TODO change exception
    }

}
