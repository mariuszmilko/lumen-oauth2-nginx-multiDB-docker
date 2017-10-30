<?php 
namespace App\Services\Application\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\Aggregates\Policy\Policy;

class PolicyTransformer extends TransformerAbstract
{
    /**
     * List of resources possible to include
     *
     * @var array
     */
    // protected $availableIncludes = [
    //     'author'
    // ];

    /**
     * Turn this item object into a generic array
     *
     * @return array
     */
    public function transform(Policy $policy)
    {
        return [
            'id'    => (int) $policy->getId(),
            'title' => $policy->getName(),
            'year'    => (int) 2017,
            'links'   => [
                [
                    'rel' => 'self',
                    'uri' => '/policies/'.$policy->getId(),
                ]
            ],
        ];
    }

    // /**
    //  * Include Author
    //  *
    //  * @return League\Fractal\ItemResource
    //  */
    // public function includeAuthor(Policy $policy)
    // {
    //     $name = $policy->getName();

    //     return $this->item($policy, new PolicyTransformer);
    // }
}