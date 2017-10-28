<?php

namespace App\Entities\Aggregates\Contract;

use Doctrine\ORM\Mapping as ORM;

/**
 * App\Entities\Aggregates\Contract\Contract
 *
 *
 * @ORM\Entity
 * @ORM\Table(name="contracts")
 */
class Contract
{
    /**
     * @var Id
     *
     * @ORM\Id
     * @ORM\Column(type="integer", nullable=false)
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="contracts_id_seq", initialValue=1)
     */
    private $id;

    /**
     * @var Name
     *
     * @ORM\Column(type="string", length=140)
     */
    private $name;

    /**
     * @var Products
     *
     * @ORM\OneToMany(targetEntity="Product", mappedBy="contract")
     */
    private $products;


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

	public function getProducts()
    {
		return $this->products;
	}

	public function setProducts($products)
    {
		$this->products = $products;
	}

	public function getDetailsContract()
	{
	    $products = [];
        foreach ($this->getProducts() as $p) {
           $products[] = ['name' => $p->getName()];
        }

        $data = ['name' => $this->getName(),
        		 'products' => $products];

        return $data;
	}
}
