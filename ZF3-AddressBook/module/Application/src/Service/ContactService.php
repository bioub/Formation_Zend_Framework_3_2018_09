<?php

namespace Application\Service;


use Application\Entity\Contact;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;

class ContactService
{
    /** @var EntityManager */
    protected $manager;

    /** @var EntityRepository */
    protected $repository;

    /**
     * ContactService constructor.
     * @param EntityManager $manager
     */
    public function __construct(EntityManager $manager)
    {
        $this->manager = $manager;
        $this->repository = $manager->getRepository(Contact::class);
    }

    /**
     * @return Contact[]
     */
    public function getAll()
    {
        return $this->repository->findAll();
    }

    /**
     * @return Contact
     */
    public function getById($id)
    {
        return $this->repository->find($id);
    }
}