<?php

namespace Application\Service;


use Application\Entity\Contact;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;
use DoctrineModule\Stdlib\Hydrator\DoctrineObject;

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

    public function insert(array $data)
    {
        // TODO utiliser l'hydrateur via le service manager
        $hydrator = new DoctrineObject($this->manager);
        $contact = new Contact();

        $hydrator->hydrate($data, $contact);

        $this->manager->persist($contact);
        $this->manager->flush();
    }

    public function count()
    {
        $sql = "SELECT COUNT(id) FROM contact";
        $connection = $this->manager->getConnection(); // Même API que PDO
        $resultSet = $connection->query($sql);

        // ... $resultSet->fetch()
    }
}
