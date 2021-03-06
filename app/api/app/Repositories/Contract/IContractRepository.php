<?php

namespace App\Repositories\Contract;

use App\Repositories\IEntityManager;

interface IContractRepository extends IEntityManager
{
    public function findAll($hydrates = null);
    public function findOne($id, $hydrates = null);
    public function remove($data, $id = null);
    public function removeAll($data, $id = null);
    public function add($data);
    public function addAll($data);
}
