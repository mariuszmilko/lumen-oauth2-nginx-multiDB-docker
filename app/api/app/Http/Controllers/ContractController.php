<?php

namespace App\Http\Controllers;

use Doctrine\ORM\EntityManagerInterface;

class ContractController extends Controller
{
    protected $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }
     
    /**
     * @SWG\Get(path="/contracts",
     *   tags={"contracts"},
     *   summary="List Contracts",
     *   description="This can only be done by the logged in user.",
     *   operationId="createUser",
     *   produces={"application/xml", "application/json"},
     *   security={{
     *     "Bearer":{}
     *   }},   
     *   @SWG\Parameter(type="string", name="Content-Type", in="header", required=false),
     *   @SWG\Response(response="default", description="successful operation")
     * )
     */
     /**
     * Retrieve all contracts
     *
     * @param 
     * @return array Response
     */
    public function index()
    {
        $repository = $this->em->getRepository(\App\Entities\Contract::class);

        return response(['response'=> $repository->findAll()]);
    }

    /**
     * Retrieve Contract by Id
     *
     * @param  int $id
     * @return string Response
     */
    public function store($id)
    {

        return response(['response'=> 1]);
    }

    /**
     * @SWG\Get(path="/contracts/{id}",
     *   tags={"contracts"},
     *   summary="Specified Contract",
     *   description="This can only be done by the logged in user.",
     *   operationId="getContract",
     *   produces={"application/xml", "application/json"},
     *   security={{
     *     "Bearer":{}
     *   }},   
     *   @SWG\Parameter(type="string", name="Content-Type", in="header", required=false),
     *   @SWG\Parameter(type="integer",name="id", in="path", required=true),
     *   @SWG\Response(response="default", description="successful operation")
     * )
     */
    /**
     * Retrieve Contract by Id
     *
     * @param  int $id
     * @return Object Response
     */
    public function show($id)
    {
        $repository = $this->em->getRepository(\App\Entities\Contract::class);

        $entity = $repository->find(['id' => $id]);
        $name = $entity->getName() ?: 'brak';

        return response(['response'=> $name]);
    }

       /**
     * Retrieve Contract by Id
     *
     * @param int $id
     * @return string Response
     */
    public function destroy($id)
    {

        return response(['response'=> 1]);
    }

    /**
     * Retrieve Contract by Id
     *
     * @param int $id
     * @return string Response
     */
    public function update($id)
    {

        return response(['response'=> 1]);
    }

}
