<?php

namespace App\Services\Auth;

use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Traits\Macroable;
use Illuminate\Contracts\Auth\UserProvider;
use Illuminate\Auth\GuardHelpers;
use GuzzleHttp\Exception\RequestException;

class Oauth2ProxyGuard implements Guard
{
    use GuardHelpers, Macroable;

    /**
     * The guard callback.
     *
     * @var callable
     */
    protected $callback;

    /**
     * The request instance.
     *
     * @var \Illuminate\Http\Request
     */
    protected $request;

    /**
     * Create a new authentication guard.
     *
     * @param  callable  $callback
     * @param  \Illuminate\Http\Request  $request
     * @param  \Illuminate\Contracts\Auth\UserProvider|null $provider
     * @return void
     */
    public function __construct(
        \GuzzleHttp\Client $proxy,
        \Closure $callback = null,
        UserProvider $provider = null,
        Request $request = null
    ) {
        $this->proxy = $proxy;
        $this->request = $request;
        $this->callback = $callback();
        $this->provider = $provider;
    }

    /**
     * Get the currently authenticated user.
     *
     * @return \Illuminate\Contracts\Auth\Authenticatable|null
     */
    public function user()
    {
        // If we've already retrieved the user for the current request we can just
        // return it back immediately. We do not want to fetch the user data on
        // every call to this method because that would be tremendously slow.
        //TODO: COOKIE Cache
        if (! is_null($this->user)) {
             return $this->user;
        }

        return $this->validate($this->callback) == true ? true : null;
         // return $this->user = call_user_func(
         //     $this->callback, $this->request, $this->getProvider()
         // );
    }

    /**
     * Validate a user's credentials.
     *
     * @param  array  $credentials
     * @return bool
     */
    public function validate(array $credentials = [])
    {
        try {

            $response = $this->proxy->request(
                $credentials['method'],
                $credentials['url'],
                ['headers' => $credentials['headers']]
            );

            return ($response->getStatusCode() == \Illuminate\Http\Response::HTTP_OK) ? true : false;

        } catch (RequestException $e) {

            return false;

        }
        // return ! is_null((new static(
        //     $this->callback, $credentials['request'], $this->getProvider()
        // ))->user());
    }

    /**
     * Set the current request instance.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return $this
     */
    public function setRequest(Request $request)
    {
        $this->request = $request;

        return $this;
    }
}
