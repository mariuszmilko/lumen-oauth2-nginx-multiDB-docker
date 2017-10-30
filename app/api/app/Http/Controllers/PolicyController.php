<?php

namespace App\Http\Controllers;

use App\Services\Application\IPolicyService;
use Illuminate\Http\Request;
use Illuminate\Validation\Factory;
use Illuminate\Support\Collection;

class PolicyController extends Controller
{
    protected $policyService;

    public function __construct(IPolicyService $ps)
    {
        $this->policyService = $ps;
    }

      /**
     * @SWG\Get(path="/policies",
     *   tags={"policies"},
     *   summary="List Policies",
     *   description="This can only be done by the logged in user.",
     *   operationId="listPolicies",
     *   produces={"application/xml", "application/json"},
     *   security={{
     *     "Bearer":{}
     *   }},   
     *   @SWG\Parameter(type="string", name="Content-Type", in="header", required=false),
     *   @SWG\Response(response="200", description="successful operation")
     * )
     */
     /**
     * Retrieve all Policies
     *
     * @param 
     * @return array Response
     */
    public function index(Request $request)
    {
        $policies = $this->policyService->getListPolicy([]);

        return response(['response' => $policies]);
    }
}
