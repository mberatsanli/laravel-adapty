<?php

namespace MBS\LaravelAdapty\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Log;
use MBS\LaravelAdapty\Data\Webhook\AbstractWebhookData;
use MBS\LaravelAdapty\Data\Webhook\AccessLevelUpdatedWebhookData;
use MBS\LaravelAdapty\Data\Webhook\BillingIssueDetectedWebhookData;
use MBS\LaravelAdapty\Data\Webhook\EnteredGracePeriodWebhookData;
use MBS\LaravelAdapty\Data\Webhook\NonSubscriptionPurchaseRefundedWebhookData;
use MBS\LaravelAdapty\Data\Webhook\NonSubscriptionPurchaseWebhookData;
use MBS\LaravelAdapty\Data\Webhook\SubscriptionExpiredWebhookData;
use MBS\LaravelAdapty\Data\Webhook\SubscriptionPausedWebhookData;
use MBS\LaravelAdapty\Data\Webhook\SubscriptionRefundedWebhookData;
use MBS\LaravelAdapty\Data\Webhook\SubscriptionRenewalCancelledWebhookData;
use MBS\LaravelAdapty\Data\Webhook\SubscriptionRenewalReactivatedWebhookData;
use MBS\LaravelAdapty\Data\Webhook\SubscriptionRenewedWebhookData;
use MBS\LaravelAdapty\Data\Webhook\SubscriptionStartedWebhookData;
use MBS\LaravelAdapty\Data\Webhook\TrialConvertedWebhookData;
use MBS\LaravelAdapty\Data\Webhook\TrialExpiredWebhookData;
use MBS\LaravelAdapty\Data\Webhook\TrialRenewalCancelledWebhookData;
use MBS\LaravelAdapty\Data\Webhook\TrialRenewalReactivatedWebhookData;
use MBS\LaravelAdapty\Data\Webhook\TrialStartedWebhookData;
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
        'subscription_started' => [
            'event' => SubscriptionStarted::class,
            'data' => SubscriptionStartedWebhookData::class,
        ],
        'subscription_renewed' => [
            'event' => SubscriptionRenewed::class,
            'data' => SubscriptionRenewedWebhookData::class,
        ],
        'subscription_renewal_cancelled' => [
            'event' => SubscriptionRenewalCancelled::class,
            'data' => SubscriptionRenewalCancelledWebhookData::class,
        ],
        'subscription_renewal_reactivated' => [
            'event' => SubscriptionRenewalReactivated::class,
            'data' => SubscriptionRenewalReactivatedWebhookData::class,
        ],
        'subscription_expired' => [
            'event' => SubscriptionExpired::class,
            'data' => SubscriptionExpiredWebhookData::class,
        ],
        'subscription_paused' => [
            'event' => SubscriptionPaused::class,
            'data' => SubscriptionPausedWebhookData::class,
        ],
        'non_subscription_purchase' => [
            'event' => NonSubscriptionPurchase::class,
            'data' => NonSubscriptionPurchaseWebhookData::class,
        ],
        // Trials
        'trial_started' => [
            'event' => TrialStarted::class,
            'data' => TrialStartedWebhookData::class,
        ],
        'trial_converted' => [
            'event' => TrialConverted::class,
            'data' => TrialConvertedWebhookData::class,
        ],
        'trial_renewal_cancelled' => [
            'event' => TrialRenewalCancelled::class,
            'data' => TrialRenewalCancelledWebhookData::class,
        ],
        'trial_renewal_reactivated' => [
            'event' => TrialRenewalReactivated::class,
            'data' => TrialRenewalReactivatedWebhookData::class,
        ],
        'trial_expired' => [
            'event' => TrialExpired::class,
            'data' => TrialExpiredWebhookData::class,
        ],
        // Issues
        'entered_grace_period' => [
            'event' => EnteredGracePeriod::class,
            'data' => EnteredGracePeriodWebhookData::class,
        ],
        'billing_issue_detected' => [
            'event' => BillingIssueDetected::class,
            'data' => BillingIssueDetectedWebhookData::class,
        ],
        'subscription_refunded' => [
            'event' => SubscriptionRefunded::class,
            'data' => SubscriptionRefundedWebhookData::class,
        ],
        'non_subscription_purchase_refunded' => [
            'event' => NonSubscriptionPurchaseRefunded::class,
            'data' => NonSubscriptionPurchaseRefundedWebhookData::class,
        ],
        // System
        'access_level_updated' => [
            'event' => AccessLevelUpdated::class,
            'data' => AccessLevelUpdatedWebhookData::class,
        ],
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
            $event = $request->get('event_type');

            if (!array_key_exists($event, $this->eventMap)) {
                throw new \Exception('Undefined event!'); // TODO change exception
            }

            $eventMap = $this->eventMap[$event];
            /** @var AbstractWebhookData $data */
            $data = $eventMap['data']::fromArray($request->all());

            $event = $eventMap['event'];
            $event::dispatch($data);

            return response()->json([]);
        }

        throw new \Exception('Malformed webhook request'); // TODO change exception
    }

}
