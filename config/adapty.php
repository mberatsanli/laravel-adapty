<?php

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

return [

    'base_url' => env('ADAPTY_BASE_URL', 'https://api.adapty.io/api/v1/sdk'),

    'secret_token' => env('ADAPTY_SECRET_TOKEN'),

    'webhook' => [
        'path' => env('ADAPTY_WEBHOOK_PATH', '/adapty/webhook'),
        'middleware' => [],
        'reject_if_customer_user_id_is_null' => false,
        'events' => [
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
        ],
    ],

];
