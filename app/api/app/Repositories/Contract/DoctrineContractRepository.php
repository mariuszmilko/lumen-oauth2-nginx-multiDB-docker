<?php

namespace App\Repositories\Contract;

use Doctrine\ORM\EntityRepository;

class DoctrineContractRepository  extends EntityRepository implements IContractRepository
{
    /**
     * Create a new middleware instance.
     *
     * @param  \Illuminate\Contracts\Auth\Factory  $auth
     * @return void
    */
    public function findAll($hydrates = null)
    {
	   //$query = $em->createQuery("SELECT u FROM MyProject\User u");
	   // $query->setFetchMode("MyProject\User", "address", \Doctrine\ORM\Mapping\ClassMetadata::FETCH_EAGER);
	   // $query->execute();
       $this->findAll();
    }
    
    /**
     * Create a new middleware instance.
     *
     * @param  \Illuminate\Contracts\Auth\Factory  $auth
     * @return void
    */
    public function findOne($id, $hydrates = null)
    {
    	$query = $this->createQueryBuilder($alias = null, $index = null);
        $entity = $this->find(['id' => $id]);

        return $entity;
    }
    
    /**
     * Create a new middleware instance.
     *
     * @param  \Illuminate\Contracts\Auth\Factory  $auth
     * @return void
    */
    public function update($data, $id = null)
    {

    }
    
    /**
     * Create a new middleware instance.
     *
     * @param  \Illuminate\Contracts\Auth\Factory  $auth
     * @return void
    */ 
    public function remove($data, $id = null)
    {
        $repository = $this->createQueryBuilder($alias, $index);
        $idsArr = explode(',', $ids);

        foreach ($ids as $id) {
            $entity = $repository->find(['id' => $id]);
            $this->remove($entity);
        }
    }
    
    /**
     * Create a new middleware instance.
     *
     * @param  \Illuminate\Contracts\Auth\Factory  $auth
     * @return void
    */
    public function removeAll($data, $id = null)
    {
        $repository = $this->createQueryBuilder($alias, $index);
        $idsArr = explode(',', $ids);

        foreach ($ids as $id) {
            $entity = $repository->find(['id' => $id]);
            $this->remove($entity);
        }
    }
    
    /**
     * Create a new middleware instance.
     *
     * @param  \Illuminate\Contracts\Auth\Factory  $auth
     * @return void
    */
    public function add($data, $id = null)
    {

    }
    
    /**
     * Create a new middleware instance.
     *
     * @param  \Illuminate\Contracts\Auth\Factory  $auth
     * @return void
    */
    public function addAll($data, $id = null)
    {
    	
    }
    
    /**
     * Create a new middleware instance.
     *
     * @param  \Illuminate\Contracts\Auth\Factory  $auth
     * @return void
    */
    public function getEntityManagerSession()
    {
    	return $this->getEntityManager();
    }
}
