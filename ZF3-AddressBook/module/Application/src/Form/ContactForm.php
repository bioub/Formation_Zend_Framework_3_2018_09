<?php

namespace Application\Form;


use Application\Entity\Company;
use Doctrine\ORM\EntityManager;
use DoctrineORMModule\Form\Element\EntitySelect;
use Zend\Form\Element\Email;
use Zend\Form\Element\Tel;
use Zend\Form\Element\Text;
use Zend\Form\Form;

class ContactForm extends Form
{
    /** @var EntityManager */
    protected $manager;

    public function __construct(EntityManager $manager)
    {
        parent::__construct('contactForm');
        $this->manager = $manager;
    }

    public function init()
    {
        $element = new Text('firstName');
        $element->setLabel('Prénom');
        $this->add($element);

        $element = new Text('lastName');
        $element->setLabel('Nom');
        $this->add($element);

        $element = new Email('email'); // Required par défaut
        $element->setLabel('Email');
        $this->add($element);

        $element = new Tel('telephone'); // Required par défaut
        $element->setLabel('Téléphone');
        $this->add($element);

        $element = new EntitySelect('company'); // Required par défaut
        $element->setOptions([
            'object_manager'     => $this->manager,
            'target_class'       => Company::class,
            'property'           => 'name',
            'display_empty_item' => true,
            'empty_item_label'   => '---',
        ]);
        $element->setLabel('Société');
        $this->add($element);
    }

}