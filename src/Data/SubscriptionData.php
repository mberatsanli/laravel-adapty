<?php

namespace MBS\LaravelAdapty\Data;

use Carbon\Carbon;
use MBS\LaravelAdapty\Traits\HasAttributes;

/**
 * @see https://docs.adapty.io/docs/server-side-api-objects#subscription
 *
 * @property-read bool $is_active
 * @property-read string|null $expires_at
 * @property-read string|null $starts_at
 * @property-read bool $is_lifetime
 * @property-read string|null $vendor_product_id
 * @property-read string|null $vendor_transaction_id
 * @property-read string|null $vendor_original_transaction_id
 * @property-read string|null $store
 * @property-read string $activated_at
 * @property-read string|null $renewed_at
 * @property-read bool $will_renew
 * @property-read bool $is_in_grace_period
 * @property-read string|null $unsubscribed_at
 * @property-read string|null $billing_issue_detected_at
 * @property-read string|null $active_introductory_offer_type
 * @property-read string|null $active_promotional_offer_type
 * @property-read bool $is_sandbox
 */
class SubscriptionData
{

    use HasAttributes;

    public function getExpiresAtAttribute($value): ?Carbon
    {
        return $value ? Carbon::parse($value) : null;
    }

    public function getStartsAtAttribute($value): ?Carbon
    {
        return $value ? Carbon::parse($value) : null;
    }

    public function getActivatedAtAttribute($value): Carbon
    {
        return Carbon::parse($value);
    }

    public function getRenewedAtAttribute($value): ?Carbon
    {
        return $value ? Carbon::parse($value) : null;
    }

    public function getUnsubscribedAtAttribute($value): ?Carbon
    {
        return $value ? Carbon::parse($value) : null;
    }

    public function getBillingIssueDetectedAtAttribute($value): ?Carbon
    {
        return $value ? Carbon::parse($value) : null;
    }

    public function hasBillingIssue(): bool
    {
        return (bool)$this->getAttribute('billing_issue_detected_at');
    }
}
