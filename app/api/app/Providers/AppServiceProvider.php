<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Validation\Factory;
use Illuminate\Http\Response;
use App\Repositories\Contract;
use App\Entities\Aggregates\Contract\Contract as ContractEntity;
use App\Entities\Aggregates\Policy\Policy as PolicyEntity;
use App\Services\Application\IContractService; 
use App\Services\Application\ContractService;
use App\Services\Application\IPolicyService;
use App\Services\Application\PolicyService;
use App\Repositories\Contract\DoctrineContractRepository;
use App\Repositories\Contract\IContractRepository;
use App\Repositories\Policy\DoctrinePolicyRepository;
use App\Repositories\Policy\IPolicyRepository;
use Doctrine\Common\Persistence\ManagerRegistry;
use App\Services\Application\Transformers\PolicyTransformer;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->environment() == 'local') {

        	$this->app->register('Wn\Generators\CommandsServiceProvider');          
    	}

        $this->app->bind(\SoapBox\Formatter\Formatter::class, function ($app, $params) {

            return \SoapBox\Formatter\Formatter::make($params, \SoapBox\Formatter\Formatter::ARR);
        });

        $this->app->bind(Factory::class, function($app) {

            return new Factory(
                $app['translator'], $app 
            );
        });

        $this->app->bind(Response::class, function($app, $params) {

            return new Response(
                $params['type'], $params['status']
            );
        });

        $this->app->bind(PolicyTransformer::class, function($app) {

            return new PolicyTransformer();
        });
    }
}
