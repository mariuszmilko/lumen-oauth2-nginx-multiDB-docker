<?php

namespace App\Services\Application;

use App\Services\Application\IPolicyService;
use Doctrine\ORM\EntityManagerInterface;
use App\Repositories\Policy\IPolicyRepository;


class PolicyService implements IPolicyService
{		
   protected $repository;
	
   public function __construct(IPolicyRepository $repository)
   {
      $this->repository = $repository;
   }	

   public function makePolicy($data)
   {

   }
   
   public function cancelPolicy($data)
   {

   }

   public function getDetailPolicy($data)
   {

   }

   public function getListPolicy($data)
   {
      return $this->repository->findAll();
   }

   public function changeDetailsPolicy($data)
   {

   }
}