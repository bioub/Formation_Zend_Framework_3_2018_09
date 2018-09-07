<?php

namespace Application\Service;


use Application\Entity\Company;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;

class CompanyService
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
        $this->repository = $manager->getRepository(Company::class);
    }

    /**
     * @return Company[]
     */
    public function getAll()
    {
        return $this->repository->findAll();
    }

    /**
     * @return Company
     */
    public function getById($id)
    {
        return $this->repository->find($id);
    }
}