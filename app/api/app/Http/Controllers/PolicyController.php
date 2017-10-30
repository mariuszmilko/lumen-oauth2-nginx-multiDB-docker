<?php

namespace App\Http\Controllers;

use App\Services\Application\IPolicyService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\Factory;
use Illuminate\Support\Collection;
use Nord\Lumen\Fractal\FractalService;
use App\Services\Application\Transformers\PolicyTransformer;

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
    public function index(Request $request, FractalService $fractal, PolicyTransformer $policy)
    {
        //$policies = $this->policyServiceTransformer($this->policyService)->getListPolicy([]);
        $policies = $this->policyService->getListPolicy([]);
        $response = $fractal->collection($policies, $policy)->toArray();

        return response(['response' => $response], Response::HTTP_OK);
    }
}
