<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Validation\Factory;
use Illuminate\Http\Response;
use App\Repositories\Contract;
use App\Entities\Aggregates\Contract\Contract as ContractEntity;
use App\Services\Application\IContractService; 
use App\Services\Application\ContractService;
use App\Repositories\Contract\DoctrineContractRepository;
use App\Repositories\Contract\IContractRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

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

        $this->app->bind(IContractRepository::class, function($app) {

            return new DoctrineContractRepository(
                $app[ManagerRegistry::class]->getManagerForClass(ContractEntity::class),
                $app['em']->getClassMetaData(ContractEntity::class)
            );
        });

        $this->app->bind(IContractService::class, function($app) {

            return new ContractService(
                $app[IContractRepository::class]
            );
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
        
       //Multiple implementations for one interfaces 
       // $this->app->when('App\Handlers\Commands\CreateOrderHandler')
       //    ->needs('App\Contracts\EventPusher')
       //    ->give('App\Services\PubNubEventPusher');

    }
}
