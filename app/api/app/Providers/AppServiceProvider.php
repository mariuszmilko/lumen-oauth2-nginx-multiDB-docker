<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Contract;
use App\Entities\Contract as ContractEntity;
use App\Services\Application\IContractService; 
use App\Services\Application\ContractService;
use App\Repositories\Contract\DoctrineContractRepository;
use App\Repositories\Contract\IContractRepository;

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

        $this->app->bind(\SoapBox\Formatter\Formatter::class, function ($app, $array) {

            return \SoapBox\Formatter\Formatter::make($array, \SoapBox\Formatter\Formatter::ARR);
        });

        $this->app->bind(IContractRepository::class, function($app) {

            return new DoctrineContractRepository(
                $this->app['em']->getManagerForClass(ContractEntity::class),
                $this->app['em']->getClassMetaData(ContractEntity::class)
            );
        });

        $this->app->bind(IContractService::class, function($app) {

            return new ContractService(
                $this->app[IContractRepository::class]
            );
        });
       //Multiple implementations for one interfaces 
       // $this->app->when('App\Handlers\Commands\CreateOrderHandler')
       //    ->needs('App\Contracts\EventPusher')
       //    ->give('App\Services\PubNubEventPusher');

    }
}
