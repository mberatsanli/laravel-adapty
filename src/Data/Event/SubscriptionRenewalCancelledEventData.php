<?php

namespace MBS\LaravelAdapty\Data\Event;

/**
 * @property-read string $store
 * @property-read string $environment
 * @property-read string $purchase_date
 * @property-read string $store_country
 * @property-read string $event_datetime
 * @property-read string $transaction_id
 * @property-read string $profile_country
 * @property-read string $profile_event_id
 * @property-read string $vendor_product_id
 * @property-read string $original_purchase_date
 * @property-read int $original_transaction_id
 * @property-read float $profile_total_revenue_usd
 */
class SubscriptionRenewalCancelledEventData extends AbstractEventData
{

}
