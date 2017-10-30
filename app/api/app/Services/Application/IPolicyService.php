<?php

namespace App\Services\Application;

interface IPolicyService
{
   public function makePolicy($data);
   public function cancelPolicy($data);
   public function getDetailPolicy($data);
   public function getListPolicy($data);
   public function changeDetailsPolicy($data);
}