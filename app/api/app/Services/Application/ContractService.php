<?php

namespace App\Services\Application;

use App\Services\Application\IContractService;
use Doctrine\ORM\EntityManagerInterface;
use App\Repositories\Contract\IContractRepository;


class ContractService implements IContractService
{
	protected $repository;
	
    public function __construct(IContractRepository $repository)
    {
    	$this->repository = $repository;
    }
    
    /**
     * Create a new middleware instance.
     *
     * @param  \Illuminate\Contracts\Auth\Factory  $auth
     * @return void
    */
    public function  makeContract($data)
    {

    }

   /**
    * Create a new middleware instance.
    *
    * @param  \Illuminate\Contracts\Auth\Factory  $auth
    * @return void
   */
   public function  cancelContract($data)
   {
       $this->repository->getEntityManagerSession()->beginTransaction();
       $this->repository->getEntityManagerSession()->commitTransaction();
   }
   
   /**
    * Create a new middleware instance.
    *
    * @param  \Illuminate\Contracts\Auth\Factory  $auth
    * @return void
   */
   public function  getDetailContract($data)
   {
   	  $entity = $this->repository->findOne($data);
      $name = $entity->getName() ?: 'brak';

      return 'detailContract '.$name;
   }
   
   /**
    * Create a new middleware instance.
    *
    * @param  \Illuminate\Contracts\Auth\Factory  $auth
    * @return void
   */
   public function getListContracts($data)
   {

   }
   
   /**
    * Create a new middleware instance.
    *
    * @param  \Illuminate\Contracts\Auth\Factory  $auth
    * @return void
   */
   public function changeDetailsContract($data)
   {

   }	
}