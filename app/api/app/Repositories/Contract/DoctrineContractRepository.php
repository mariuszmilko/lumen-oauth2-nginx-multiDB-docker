<?php

namespace App\Repositories\Contract;

use Doctrine\ORM\EntityRepository;

class DoctrineContractRepository  extends EntityRepository implements IContractRepository
{
    
    public function findAll($hydrates = null)
    {

    }

    public function findOne($id, $hydrates = null)
    {
    	 $repository = $this->em->getRepository(\App\Entities\Contract::class);

        $entity = $repository->find(['id' => $id]);
        $name = $entity->getName() ?: 'brak';

    }

    public function update($data, $id = null)
    {

    }

    public function delete()
    {
    	$this->em->getConnection()->beginTransaction();
        $repository = $this->em->criteria();
        $idsArr = explode(',', $ids);

        try {
            foreach ($ids as $id) {
                $entity = $repository->find(['id' => $id]);
                $this->em->remove($entity);
            }
            $this->em->flush();
            $em->getConnection()->commit();
        } catch (\Exception $e) {

             $this->em->getConnection()->rollback();
        }

        $repository->clear();
    }
}
