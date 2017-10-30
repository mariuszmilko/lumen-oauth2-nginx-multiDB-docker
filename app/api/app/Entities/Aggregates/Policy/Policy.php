<?php

namespace App\Entities\Aggregates\Policy;

use Doctrine\ORM\Mapping as ORM;

/**
 * App\Entities\Aggregates\Policy\Policy
 *
 *
 * @ORM\Entity
 * @ORM\Table(name="policies")
 */
class Policy
{

   /**
     * @var Id
     *
     * @ORM\Id
     * @ORM\Column(type="integer", nullable=false)
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var Name
     *
     * @ORM\Column(type="string", length=30)
     */
    private $name;

     /**
     * @var dateStart
     *
     * @ORM\Column(type="string", length=30)
     */
    private $dateStart;

    /**
     * @var dateEnd
     *
     * @ORM\Column(type="string", length=30)
     */
    private $dateEnd;

    /**
     * @var status
     *
     * @ORM\Column(type="integer", nullable=false)
     */
    private $status;

    public function getId()
    {
		return $this->id;
	}

	public function getName()
	{
		return $this->name;
	}
}
