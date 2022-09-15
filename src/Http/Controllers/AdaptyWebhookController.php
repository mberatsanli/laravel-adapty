<?php

namespace MBS\LaravelAdapty\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Log;
use MBS\LaravelAdapty\Events\AbstractEvent;
use MBS\LaravelAdapty\Events\AccessLevelUpdated;
use MBS\LaravelAdapty\Events\BillingIssueDetected;
use MBS\LaravelAdapty\Events\EnteredGracePeriod;
use MBS\LaravelAdapty\Events\NonSubscriptionPurchase;
use MBS\LaravelAdapty\Events\NonSubscriptionPurchaseRefunded;
use MBS\LaravelAdapty\Events\SubscriptionExpired;
use MBS\LaravelAdapty\Events\SubscriptionPaused;
use MBS\LaravelAdapty\Events\SubscriptionRefunded;
use MBS\LaravelAdapty\Events\SubscriptionRenewalCancelled;
use MBS\LaravelAdapty\Events\SubscriptionRenewalReactivated;
use MBS\LaravelAdapty\Events\SubscriptionRenewed;
use MBS\LaravelAdapty\Events\SubscriptionStarted;
use MBS\LaravelAdapty\Events\TrialConverted;
use MBS\LaravelAdapty\Events\TrialExpired;
use MBS\LaravelAdapty\Events\TrialRenewalCancelled;
use MBS\LaravelAdapty\Events\TrialRenewalReactivated;
use MBS\LaravelAdapty\Events\TrialStarted;

class AdaptyWebhookController extends BaseController
{

    use DispatchesJobs, ValidatesRequests;

    protected $eventMap = [
        // Subscriptions
        'subscription_started' => SubscriptionStarted::class,
        'subscription_renewed' => SubscriptionRenewed::class,
        'subscription_renewal_cancelled' => SubscriptionRenewalCancelled::class,
        'subscription_renewal_reactivated' => SubscriptionRenewalReactivated::class,
        'subscription_expired' => SubscriptionExpired::class,
        'subscription_paused' => SubscriptionPaused::class,
        'non_subscription_purchase' =>  NonSubscriptionPurchase::class,
        // Trials
        'trial_started' => TrialStarted::class,
        'trial_converted' => TrialConverted::class,
        'trial_renewal_cancelled' => TrialRenewalCancelled::class,
        'trial_renewal_reactivated' => TrialRenewalReactivated::class,
        'trial_expired' => TrialExpired::class,
        // Issues
        'entered_grace_period' => EnteredGracePeriod::class,
        'billing_issue_detected' => BillingIssueDetected::class,
        'subscription_refunded' => SubscriptionRefunded::class,
        'non_subscription_purchase_refunded' => NonSubscriptionPurchaseRefunded::class,
        // System
        'access_level_updated' => AccessLevelUpdated::class,
    ];

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

            $eventType = $request->get('event_type');

            if (!array_key_exists($eventType, $this->eventMap)) {
                throw new \Exception('Undefined event! ::: ' . $eventType); // TODO change exception
            }

            /** @var AbstractEvent $event */
            $event = $this->eventMap[$eventType];
            event($event::fromArray($request->all()));

            return response()->json([]);
        }

        throw new \Exception('Malformed webhook request'); // TODO change exception
    }

}
