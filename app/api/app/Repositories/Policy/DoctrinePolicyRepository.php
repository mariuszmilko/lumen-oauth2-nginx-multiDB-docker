<?php

namespace App\Repositories\Policy;

use Doctrine\ORM\EntityRepository;

class DoctrinePolicyRepository  extends EntityRepository implements IPolicyRepository
{

	public function findAll($hydrates = null)
	{
	   //$this->findAll();	
	   $entity = $this->find(['id' => 1]);

       return new \Doctrine\Common\Collections\ArrayCollection([$entity]);
	}

    public function findOne($id, $hydrates = null)
    {

      return $this->find(['id' => 1]);
    }

    public function remove($data, $id = null)
    {

    }

    public function removeAll($data, $id = null)
    {

    }

    public function add($data)
    {

    }

    public function addAll($data)
    {

    }

     /**
     * Create a new middleware instance.
     *
     * @return EntityManager
    */
    public function getEntityManagerSession()
    {
    	return $this->getEntityManager();
    }
}
