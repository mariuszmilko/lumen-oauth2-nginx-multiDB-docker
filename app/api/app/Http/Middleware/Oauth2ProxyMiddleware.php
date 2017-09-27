<?php

namespace App\Http\Middleware;

use Closure;
use GuzzleHttp\Exception\RequestException;

class Oauth2ProxyMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        try
        {
            $client = new \GuzzleHttp\Client();
            $res = $client->request('GET', 'http://server.oauth2.mmilko.git/oauth/test');
            echo $res->getStatusCode();
            // 200
            echo $res->getHeaderLine('content-type');
             // 'application/json; charset=utf8'
            echo $res->getBody();

            return $next($request);
        }
        catch(RequestException $e)
        {
            exit($e);
        }
    }
}
