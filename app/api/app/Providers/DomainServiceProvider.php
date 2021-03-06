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

class DomainServiceProvider extends ServiceProvider
{
	/**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(IContractRepository::class, function($app) {
           
           //$em = $app[ManagerRegistry::class]->getManagerForClass(ContractEntity::class);
            $em = $app[ManagerRegistry::class]->getManager(env('DB_API_CONTRACT_MANAGERNAME'));

            return new DoctrineContractRepository(
                $em,
                $em->getClassMetaData(ContractEntity::class)
            );
        });

        $this->app->bind(IContractService::class, function($app) {

            return new ContractService(
                $app[IContractRepository::class]
            );
        });

        $this->app->bind(IPolicyRepository::class, function($app) {

            $em = $app[ManagerRegistry::class]->getManager(env('DB_API_POLICIES_MANAGERNAME'));
            //getManagerForClass(PolicyEntity::class);

            return new DoctrinePolicyRepository(
                $em,
                $em->getClassMetaData(PolicyEntity::class)
            );
        });

        $this->app->bind(IPolicyService::class, function($app) {

            return new PolicyService(
                $app[IPolicyRepository::class]
            );
        });
         
       //Multiple implementations for one interfaces 
       // $this->app->when('App\Handlers\Commands\CreateOrderHandler')
       //    ->needs('App\Contracts\EventPusher')
       //    ->give('App\Services\PubNubEventPusher');

    }
}