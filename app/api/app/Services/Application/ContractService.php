<?php

namespace App\Services\Application;

use App\Services\Application\IContractService;
use Doctrine\ORM\EntityManagerInterface;


class ContractService implements  IContractService
{
	protected $repository;
	
    public function __construct(IContractRepository $repository)
    {
    	$this->repository = $repository;
    }

    public function  makeContract($data)
    {

    }

   public function  cancelContract($data)
   {
       //$this->repository->getEntityManagerSession()->beginTransaction();
   }
   
   public function  getDetailContract($data)
   {

   }

   public function getListContracts($data)
   {

   }

   public function changeDetailsContract($data)
   {

   }
	
}