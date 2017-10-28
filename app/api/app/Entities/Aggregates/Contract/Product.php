<?php

namespace App\Entities\Aggregates\Contract;

use Doctrine\ORM\Mapping as ORM;

/**
 * App\Entities\Aggregates\Contract\Product
 *
 *
 * @ORM\Entity
 * @ORM\Table(name="products")
 */
class Product
{
    /**
     * @var Id
     *
     * @ORM\Id
     * @ORM\Column(type="integer", nullable=false)
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     */
    private $id;

       /**
     * @var Name
     *
     * @ORM\Column(type="string", length=140)
     */
    private $name;

    /**
     * @var Contract
     *
     * @ORM\ManyToOne(targetEntity="Contract", inversedBy="products")
     * @ORM\JoinColumn(name="contract_id", referencedColumnName="id")
     */
    private $contract;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getContract()
    {
        return $this->contract;
    }

    public function setContract($contract)
    {
        $this->contract = $contract;
    }
}
