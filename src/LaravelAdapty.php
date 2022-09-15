<?php

namespace MBS\LaravelAdapty;

use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Http;
use MBS\LaravelAdapty\Http\Requests\GrantSubscriptionRequest;
use MBS\LaravelAdapty\Responses\AdaptyResponse;

class LaravelAdapty
{

    /**
     * @param string|null $userId
     * @return AdaptyResponse
     */
    public static function createUser(?string $userId): AdaptyResponse
    {
        $requestData = [];
        if ($userId) {
            $requestData['customer_user_id'] = $userId;
        }

        $response = static::client()->post('/profiles/', $requestData);

        return AdaptyResponse::fromArray($response->json('data'));
    }

    /**
     * @param string $profileId
     * @return AdaptyResponse
     */
    public static function userInformation(string $profileId): AdaptyResponse
    {
        $response = static::client()->get("/profiles/$profileId/");

        return AdaptyResponse::fromArray($response->json('data'));
    }

    /**
     * @param string $profileId
     * @param array $attributes https://docs.adapty.io/docs/server-side-api-specs#get-info-about-a-user
     * @return AdaptyResponse
     */
    public static function setUserAttributes(string $profileId, array $attributes = []): AdaptyResponse
    {
        $response = static::client()->patch("/profiles/$profileId/", $attributes);

        return AdaptyResponse::fromArray($response->json('data'));
    }

    public static function grantSubscription(string $profileId, GrantSubscriptionRequest $request): AdaptyResponse
    {
        $accessLevel = $request->accessLevel;
        $response = static::client()->post(
            "/profiles/$profileId/paid-access-levels/$accessLevel/grant/",
            $request->toRequestData()
        );

        return AdaptyResponse::fromArray($response->json('data'));
    }

    /**
     * @param string $profileId
     * @param string $accessLevel
     * @param boolean $isRefund
     *
     * @return AdaptyResponse
     */
    public static function revokeSubscription(string $profileId, string $accessLevel = 'premium', bool $isRefund = false): AdaptyResponse
    {
        $response = static::client()->post(
            "/profiles/$profileId/paid-access-levels/$accessLevel/revoke/",
            [
                'is_refund' => $isRefund
            ]
        );

        return AdaptyResponse::fromArray($response->json('data'));
    }

    protected static function client(): PendingRequest
    {
        return Http::acceptJson()
            ->throw()
            ->baseUrl(config('adapty.base_url'))
            ->withToken(config('adapty.secret_token'), 'Api-Key');
    }

}
