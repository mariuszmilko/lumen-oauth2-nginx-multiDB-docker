<?php

namespace App\Providers;

use App\User;
use Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use App\Services\Auth\Oauth2ProxyGuard;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Boot the authentication services for the application.
     *
     * @return void
     */
    public function boot()
    {
        $this->app['auth']->viaRequest('api', function ($request) {
            if ($request->input('api_token')) {
                return User::where('api_token', $request->input('api_token'))->first();
            }
        });

        Auth::extend('oauth2proxy', function($app, $name, array $config){

            return new Oauth2ProxyGuard(
                new \GuzzleHttp\Client(), 
                function() use ($app, $config){

                    return ['method'=>'POST','url'=>$config['oauth2_host'].$config['oauth2_path'], 'headers' => [
                            'Authorization' => $app->request->header('Authorization'), 'App'=>env('APP_KEY')
                           ]];
                }, 
                Auth::createUserProvider($config['provider']),
                $app['request']
            );
        });


    }
}
