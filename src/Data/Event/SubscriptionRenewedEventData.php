<?php

namespace MBS\LaravelAdapty\Data\Event;

/**
 * @property-read string $store
 * @property-read string $currency
 * @property-read float $price_usd
 * @property-read string $environment
 * @property-read string $price_local
 * @property-read float $proceeds_usd
 * @property-read string $purchase_date
 * @property-read string $store_country
 * @property-read string $event_datetime
 * @property-read float $proceeds_local
 * @property-read string $transaction_id
 * @property-read string $profile_country
 * @property-read string $profile_event_id
 * @property-read string $vendor_product_id
 * @property-read int $consecutive_payments
 * @property-read boolean $rate_after_first_year
 * @property-read string $original_purchase_date
 * @property-read string $original_transaction_id
 * @property-read string $subscription_expires_at
 * @property-read float $profile_total_revenue_usd
 */
class SubscriptionRenewedEventData extends AbstractEventData
{

}
