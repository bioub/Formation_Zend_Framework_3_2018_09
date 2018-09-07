<?php

namespace Application\Form;


use Zend\Form\Element\Email;
use Zend\Form\Element\Tel;
use Zend\Form\Element\Text;
use Zend\Form\Form;

class ContactForm extends Form
{
    public function __construct()
    {
        parent::__construct('contactForm');

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
    }

    public function init()
    {

    }

}