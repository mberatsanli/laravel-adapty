<?php

namespace MBS\LaravelAdapty\Responses;

use Illuminate\Support\Collection;
use MBS\LaravelAdapty\Data\SubscriptionData;
use MBS\LaravelAdapty\Traits\HasAttributes;

/**
 * @property-read string $profile_id
 * @property-read string|null $customer_user_id
 * @property-read Collection $paid_access_levels
 * @property-read Collection $subscriptions
 * @property-read Collection $non_subscriptions
 * @property-read bool $promotional_offer_eligibility
 * @property-read bool $introductory_offer_eligibility
 * @property-read Collection $custom_attributes
 * @property-read float $total_revenue_usd
 */
class AdaptyResponse
{

    use HasAttributes;

    public function getSubscriptionsAttribute($value): Collection
    {
        return collect($value)->map(fn ($data) => SubscriptionData::fromArray($data))->values();
    }

}
