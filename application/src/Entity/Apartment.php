<?php

namespace App\Entity;

use App\Entity\Traits\DateTimeTrait;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ApartmentRepository")
 * @ORM\Table(name="apartment")
 * @ORM\HasLifecycleCallbacks()
 */
class Apartment
{
    use DateTimeTrait;

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $placement;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $buildYear;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $size;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Address", inversedBy="apartments", cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $address;


    /**
     * Get id
     *
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set street
     *
     * @return mixed
     */
    public function getPlacement()
    {
        return $this->placement;
    }

    /**
     * Set street
     *
     * @param mixed $placement
     * @return Apartment
     */
    public function setPlacement($placement)
    {
        $this->placement = $placement;
        return $this;
    }

    /**
     * Set buildYear
     *
     * @return mixed
     */
    public function getBuildYear()
    {
        return $this->buildYear;
    }

    /**
     * Set buildYear
     *
     * @param mixed $buildYear
     * @return Apartment
     */
    public function setBuildYear($buildYear)
    {
        $this->buildYear = $buildYear;
        return $this;
    }

    /**
     * Set size
     *
     * @return mixed
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * Set size
     *
     * @param mixed $size
     * @return Apartment
     */
    public function setSize($size)
    {
        $this->size = $size;
        return $this;
    }

    /**
     * Get address
     *
     * @return Address
     */
    public function getAddress(): Address
    {
        return $this->address;
    }

    /**
     * Set address
     *
     * @param Address $address
     * @return Apartment
     */
    public function setAddress(Address $address): self
    {
        $this->address = $address;

        return $this;
    }
}
