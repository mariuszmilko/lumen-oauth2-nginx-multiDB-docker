<?php

namespace App\Services\Application;

use App\Services\Application\IContractService;
use Doctrine\ORM\EntityManagerInterface;


class ContractService implements  IContractService
{
	protected $em;
	
    public function __construct(EntityManagerInterface $em)
    {
    	$this->em = $em;
    }

    public function  makeContract($data)
    {

    }

   public function  cancelContract($data)
   {

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