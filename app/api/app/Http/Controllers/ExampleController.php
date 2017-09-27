<?php

namespace App\Http\Controllers;

use Doctrine\ORM\EntityManagerInterface;

class ExampleController extends Controller
{
    protected $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

     /**
     * Retrieve the user for the given ID.
     *
     * @param 
     * @return int Response
     */
    public function show()
    {
        return response()->json(['response'=> 1]);
    }
}