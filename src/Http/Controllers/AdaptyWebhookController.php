<?php

namespace MBS\LaravelAdapty\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Log;
use MBS\LaravelAdapty\Events\AbstractEvent;
use MBS\LaravelAdapty\Exceptions\MalformedWebhookRequestException;
use MBS\LaravelAdapty\Exceptions\NullCustomerUserIdException;
use MBS\LaravelAdapty\Exceptions\UndefinedAdaptyEventTypeException;

class AdaptyWebhookController extends BaseController
{

    use DispatchesJobs, ValidatesRequests;

    /**
     * @throws MalformedWebhookRequestException
     * @throws NullCustomerUserIdException
     * @throws UndefinedAdaptyEventTypeException
     */
    public function webhook(Request $request)
    {
        Log::info('New hook arrived! :: ', $request->all());

        if ($request->has('adapty_check')) {
            Log::info('Webhook check requested! :: ' . $request->get('adapty_check'));

            return response()->json([
                'adapty_check_response' => $request->get('adapty_check'),
            ]);
        }

        if ($request->has('event_type')) {
            Log::info('Adapty Webhook :: Event Type :: ', $request->get('event_type'));

            if (config('adapty.webhook.reject_if_customer_user_id_is_null') && $request->get('customer_user_id') === null) {
                Log::error('Adapty Webhook :: customer user id is NULL');

                throw new NullCustomerUserIdException('Customer user id cannot be null!');
            }

            $events = config('adapty.webhook.events');
            $eventType = $request->get('event_type');

            if (!array_key_exists($eventType, $events)) {
                Log::error('Adapty Webhook :: undefined adapty event type :: ', $eventType);

                throw new UndefinedAdaptyEventTypeException($eventType);
            }

            /** @var AbstractEvent $event */
            $event = $events[$eventType];
            event($event::fromArray($request->all()));
            Log::info('Adapty Webhook :: event dispatched ', $eventType);

            return response()->json([]);
        }

        throw new MalformedWebhookRequestException('Malformed webhook request');
    }

}
