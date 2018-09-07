<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Contact
 * @package Application\Entity
 * @ORM\Entity
 * @ORM\Table(name="contact")
 */
class Contact
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
     * @ORM\Column(name="first_name", length=40)
     */
    protected $firstName;

    /**
     * @var string
     * @ORM\Column(name="last_name", length=40)
     */
    protected $lastName;

    /**
     * @var string|null
     * @ORM\Column(length=80, nullable=true)
     */
    protected $email;

    /**
     * @var string|null
     * @ORM\Column(length=20, nullable=true)
     */
    protected $telephone;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Contact
     */
    public function setId(int $id): Contact
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     * @return Contact
     */
    public function setFirstName(string $firstName): Contact
    {
        $this->firstName = $firstName;
        return $this;
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     * @return Contact
     */
    public function setLastName(string $lastName): Contact
    {
        $this->lastName = $lastName;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @param null|string $email
     * @return Contact
     */
    public function setEmail(?string $email): Contact
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    /**
     * @param null|string $telephone
     * @return Contact
     */
    public function setTelephone(?string $telephone): Contact
    {
        $this->telephone = $telephone;
        return $this;
    }


}