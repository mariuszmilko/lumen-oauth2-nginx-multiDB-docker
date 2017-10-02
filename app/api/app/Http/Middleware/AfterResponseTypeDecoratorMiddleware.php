<?php

namespace App\Http\Middleware;

use Closure;
use GuzzleHttp\Exception\RequestException;
use SoapBox\Formatter\Formatter;

class AfterResponseTypeDecoratorMiddleware
{
    private $strategy;
    
    /**
    * Set startegy instance by container
    *
    * @param  \App\Services\Http\ResponseStrategy $strategy
    */
    public function __construct(\App\Services\Http\ResponseStrategy $strategy)
    {
        $this->strategy = $strategy;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $response = $next($request);

        try {

            $response = $this->strategy->setFormatter($response)
                                 ->getContent($request->header('content-type'));
                                 
        } catch (\Exception $e) {

            $error = $e->getMessage();
        }

        return $response;
    }
}
