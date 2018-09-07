<?php

namespace Application\Service;


use Application\Entity\Contact;
use Application\Form\ContactForm;
use Application\InputFilter\ContactInputFilter;
use Application\Repository\ContactRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;
use DoctrineModule\Stdlib\Hydrator\DoctrineObject;

class ContactService
{
    /** @var EntityManager */
    protected $manager;

    /** @var ContactRepository */
    protected $repository;

    /** @var ContactForm */
    protected $form;


    /** @var DoctrineObject */
    protected $hydrator;

    /**
     * ContactService constructor.
     * @param EntityManager $manager
     */
    public function __construct(EntityManager $manager, ContactForm $form, ContactInputFilter $inputFilter, DoctrineObject $hydrator)
    {
        $this->manager = $manager;
        $this->repository = $manager->getRepository(Contact::class);
        $this->form = $form;
        $this->form->setInputFilter($inputFilter);
        $this->hydrator = $hydrator;
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
        return $this->repository->findWithCompany($id);
    }

    public function insert($data): Contact
    {
        $this->form->setData($data);

        if (!$this->form->isValid()) {
            return false;
        }

        $entity = new Contact();
        $this->hydrator->hydrate($data->toArray(), $entity);

        $this->manager->persist($entity);
        $this->manager->flush();

        return $entity;
    }

    public function count()
    {
        $sql = "SELECT COUNT(id) FROM contact";
        $connection = $this->manager->getConnection(); // Même API que PDO
        $resultSet = $connection->query($sql);

        // ... $resultSet->fetch()
    }

    /**
     * @return ContactForm
     */
    public function getForm(): ContactForm
    {
        return $this->form;
    }

}
