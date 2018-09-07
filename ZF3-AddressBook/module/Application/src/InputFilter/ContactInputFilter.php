<?php

namespace Application\InputFilter;


use Zend\Filter\StringTrim;
use Zend\InputFilter\Input;
use Zend\InputFilter\InputFilter;
use Zend\Validator\StringLength;

class ContactInputFilter extends InputFilter
{
    public function init()
    {
        // firstName
        $input = new Input('firstName');
        $input->setRequired(true);

        $filter = new StringTrim();
        $input->getFilterChain()->attach($filter);

        $validator = new StringLength();
        $validator->setMax(40)->setMessage('Le prénom ne doit pas dépasser %max% caractères', StringLength::TOO_LONG);
        $input->getValidatorChain()->attach($validator);

        $this->add($input);

        // lastName
        $input = new Input('lastName');
        $input->setRequired(true);

        $this->add($input);

        $input = new Input('email');
        $input->setRequired(false);

        $this->add($input);

        $input = new Input('telephone');
        $input->setRequired(false);

        $this->add($input);
    }

}