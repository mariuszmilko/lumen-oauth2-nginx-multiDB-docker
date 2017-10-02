<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Contract;
use App\Entities\Contract as ContractEntity;

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

        $this->app->bind('SoapBox\Formatter\Formatter', function ($app, $array) {

            return \SoapBox\Formatter\Formatter::make($array, \SoapBox\Formatter\Formatter::ARR);
        });

        $this->app->bind(IContractRepository::class, function($app) {
            // This is what Doctrine's EntityRepository needs in its constructor.
            return new DoctrineContractRepository(
                $this->app['em'],
                $this->app['em']->getClassMetaData(ContractEntity::class)
            );
        });

 
    }
}
