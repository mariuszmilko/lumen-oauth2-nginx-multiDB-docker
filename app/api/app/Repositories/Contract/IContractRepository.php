<?php

namespace App\Repositories\Contract;

interface IContractRepository
{
    public function findAll($hydrates = null);

    public function findOne($id, $hydrates = null);

    public function createOrUpdate($data, $id = null);
}
