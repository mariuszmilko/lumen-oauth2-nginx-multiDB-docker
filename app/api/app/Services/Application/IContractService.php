<?php

namespace App\Services\Application;

interface IContractService
{
   public function  makeContract($data);

   public function  cancelContract($data);
   
   public function  getDetailContract($data);

   public function getListContracts($data);

   public function changeDetailsContract($data);
}