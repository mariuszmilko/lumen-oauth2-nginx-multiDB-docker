<?php

namespace App\Http\Controllers;

use App\Services\Application\IContractService;

class ContractController extends Controller
{
    protected $contractService;

    public function __construct(IContractService $cs)
    {
        $this->contractService = $cs;
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
     *   @SWG\Response(response="200", description="successful operation")
     * )
     */
     /**
     * Retrieve all contracts
     *
     * @param 
     * @return array Response
     */
    public function index(Request $request)
    {
        $this->contractService->getListContracts($data);

        return response(['response'=> $repository->findAll()]);
    }


     /**
     * @SWG\Post(path="/contracts",
     *   tags={"contracts"},
     *   summary="Store new Contract",
     *   description="This can only be done by the logged in user.",
     *   operationId="getContract",
     *   produces={"application/xml", "application/json"},
     *   security={{
     *     "Bearer":{}
     *   }},   
     * @SWG\Parameter(type="string", name="Content-Type", in="header", required=false),
     * @SWG\Parameter(
     *   name="contract",
     *   in="body",
     *   required=true,
     *     @SWG\Schema(
     *       required={"name"},
     *       @SWG\Property(property="name",  type="string",  ),
     *         @SWG\Property(
     *           property="products",
     *           type="array",
     *            @SWG\Items(
     *              type="object",
     *              @SWG\Property(property="id", type="integer", )
     *              ),
     *           ),
     *           @SWG\Property(
     *             property="user_summary",
     *             title="UserSummary",
     *             @SWG\Property(property="user_id", type="integer",)
     *            ),
     *      ),
     *   ),
     *  @SWG\Response(response="201", description="successful create")
     * )
     */
    /**
     * Store new Contract
     *
     * @param  int $id
     * @return string Response
     */
    public function store(Request $request)
    {
        $this->contractService->makeContract($data);

        return response(['response'=> 1]);
    }

    /**
     * @SWG\Get(path="/contracts/{id}",
     *   tags={"contracts"},
     *   summary="Show Specified Contract",
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
    public function show(Request $request, $id)
    {
        $this->contractService->getDetailContract($data);
       
        return response(['response'=> $name]);
    }

    /**
     * @SWG\Delete(path="/contracts",
     *   tags={"contracts"},
     *   summary="Delete Specified Contract",
     *   description="This can only be done by the logged in user.",
     *   operationId="getContract",
     *   produces={"application/xml", "application/json"},
     *   security={{
     *     "Bearer":{}
     *   }},   
     *   @SWG\Parameter(type="string", name="Content-Type", in="header", required=false),
     *   @SWG\Parameter(type="string",name="ids", in="path", required=true),
     *   @SWG\Response(response="default", description="successful operation")
     * )
     */
    /**
     * Retrieve Contract by Id
     *
     * @param string $ids
     * @return string Response
     */
    public function destroy(Request $request, $ids)
    {
        $this->contractService->cancelContract($data);

        return response(['response'=> 1]);
    }
    
    /**
     * @SWG\Put(path="/contracts/{id}",
     *   tags={"contracts"},
     *   summary="Delete Specified Contract",
     *   description="This can only be done by the logged in user.",
     *   operationId="getContract",
     *   produces={"application/xml", "application/json"},
     *   security={{
     *     "Bearer":{}
     *   }},   
     *   @SWG\Parameter(type="string", name="Content-Type", in="header", required=false),
     *   @SWG\Parameter(type="integer",name="id", in="path", required=true),
     *   @SWG\Parameter(
     *     name="contract",
     *     in="body",
     *     required=true,
     *     @SWG\Schema(
     *       required={"name"},
     *       @SWG\Property(property="name",  type="string",  ),
     *         @SWG\Property(
     *           property="products",
     *           type="array",
     *            @SWG\Items(
     *              type="object",
     *              @SWG\Property(property="id", type="integer", )
     *              ),
     *           ),
     *           @SWG\Property(
     *             property="user_summary",
     *             title="UserSummary",
     *             @SWG\Property(property="user_id", type="integer",)
     *            ),
     *      ),
     *   ),
     *   @SWG\Response(response="default", description="successful operation")
     * )
     */
    /**
     * Change Contract
     *
     * @param int $id
     * @return string Response
     */
    public function update(Request $request, $id)
    {
        $this->contractService->changeDetailsContract($data);

        return response(['response'=> 1]);
    }
}
