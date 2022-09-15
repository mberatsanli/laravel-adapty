<?php

namespace MBS\LaravelAdapty\Data\Event;

/**
 * @property-read string $store
 * @property-read bool $is_active
 * @property-read bool $is_refund
 * @property-read string|null $starts_at
 * @property-read string $expires_at
 * @property-read string|null $renewed_at
 * @property-read bool $will_renew
 * @property-read string $environment
 * @property-read bool $is_lifetime
 * @property-read string $activated_at
 * @property-read string $purchase_date
 * @property-read string $store_country
 * @property-read string $event_datetime
 * @property-read string|int $transaction_id
 * @property-read string $access_level_id
 * @property-read string $profile_country
 * @property-read string|null $unsubscribed_at
 * @property-read string $profile_event_id
 * @property-read string $vendor_product_id
 * @property-read bool $is_in_grace_period
 * @property-read string $cancellation_reason
 * @property-read string $original_purchase_date
 * @property-read string|int $original_transaction_id
 * @property-read string|null $billing_issue_detected_at
 * @property-read float $profile_total_revenue_usd
 * @property-read string|int|null $active_promotional_offer_id
 * @property-read string|null $active_promotional_offer_type
 * @property-read string|null $active_introductory_offer_type
 */
class AccessLevelUpdatedEventData extends AbstractEventData
{

}
