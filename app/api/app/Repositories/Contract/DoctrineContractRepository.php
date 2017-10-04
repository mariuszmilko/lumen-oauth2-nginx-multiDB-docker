<?php

namespace App\Repositories\Contract;

use Doctrine\ORM\EntityRepository;

class DoctrineContractRepository  extends EntityRepository implements IContractRepository
{
    
    public function findAll($hydrates = null)
    {
       $this->findAll();
    }

    public function findOne($id, $hydrates = null)
    {
    	$query = $this->createQueryBuilder($alias, $index);

        $entity = $repository->find(['id' => $id]);
        $name = $entity->getName() ?: 'brak';

        return $name;
    }

    public function update($data, $id = null)
    {

    }

    public function remove()
    {
        $repository = $this->createQueryBuilder($alias, $index);
        $idsArr = explode(',', $ids);

        foreach ($ids as $id) {
            $entity = $repository->find(['id' => $id]);
            $this->remove($entity);
        }
    }

    public function getEntintyManagerSession()
    {
    	return $this->getEntinyManager();
    }
}
