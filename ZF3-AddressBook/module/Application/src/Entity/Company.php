<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Company
 * @package Application\Entity
 * @ORM\Entity
 * @ORM\Table(name="company")
 */
class Company
{
    /**
     * @var int
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue
     */
    protected $id;

    /**
     * @var string
     * @ORM\Column(name="name", length=40)
     */
    protected $name;

    /**
     * @var string
     * @ORM\Column(name="city", length=40, nullable=true)
     */
    protected $city;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Company
     */
    public function setId(int $id): Company
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Company
     */
    public function setName(string $name): Company
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getCity(): string
    {
        return $this->city;
    }

    /**
     * @param string $city
     * @return Company
     */
    public function setCity(string $city): Company
    {
        $this->city = $city;
        return $this;
    }


}