<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Traits\DateTimeTrait;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AddressRepository")
 * @ORM\Table(name="addresses")
 * @ORM\HasLifecycleCallbacks()
 */
class Address
{
    use DateTimeTrait;

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $country;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $city;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $street;

    /**
     * @ORM\Column(type="string", length=8)
     */
    private $zipcode;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $house;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Apartment", mappedBy="address", cascade={"persist"})
     */
    private $apartments;

    /**
     * Address constructor.
     */
    public function __construct()
    {
        $this->apartments = new ArrayCollection();
    }


    /**
     * Get ID
     *
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set country
     *
     * @return mixed
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Set country
     *
     * @param mixed $country
     * @return Address
     */
    public function setCountry($country)
    {
        $this->country = $country;
        return $this;
    }

    /**
     * Set city
     *
     * @return mixed
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set city
     *
     * @param mixed $city
     * @return Address
     */
    public function setCity($city)
    {
        $this->city = $city;
        return $this;
    }

    /**
     * Set street
     *
     * @return mixed
     */
    public function getStreet()
    {
        return $this->street;
    }

    /**
     * Set street
     *
     * @param mixed $street
     * @return Address
     */
    public function setStreet($street)
    {
        $this->street = $street;
        return $this;
    }

    /**
     * Set zipcode
     *
     * @return mixed
     */
    public function getZipcode()
    {
        return $this->zipcode;
    }

    /**
     * Set zipcode
     *
     * @param mixed $zipcode
     * @return Address
     */
    public function setZipcode($zipcode)
    {
        $this->zipcode = $zipcode;
        return $this;
    }

    /**
     * Set house
     *
     * @return mixed
     */
    public function getHouse()
    {
        return $this->house;
    }

    /**
     * Set house
     *
     * @param mixed $house
     * @return Address
     */
    public function setHouse($house)
    {
        $this->house = $house;
        return $this;
    }


    /**
     * Return apartments
     *
     * @return Collection|Apartment[]
     */
    public function getApartments(): Collection
    {
        return $this->apartments;
    }

    /**
     * Add apartments
     *
     * @param Apartment $apartment
     * @return Address
     */
    public function addApartment(Apartment $apartment): self
    {
        if (!$this->apartments->contains($apartment)) {
            $this->apartments[] = $apartment;
            $apartment->setAddress($this);
        }

        return $this;
    }

    /**
     * Remove apartment
     *
     * @param Apartment $apartment
     * @return Address
     */
    public function removeApartment(Apartment $apartment): self
    {
        if ($this->apartments->contains($apartment)) {
            $this->apartments->removeElement($apartment);
            if ($apartment->getAddress() === $this) {
                $apartment->setAddress(null);
            }
        }

        return $this;
    }
}
