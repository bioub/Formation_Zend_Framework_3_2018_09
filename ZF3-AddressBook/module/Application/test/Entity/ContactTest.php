<?php

namespace ApplicationTest\Entity;


use Application\Entity\Contact;
use PHPUnit\Framework\TestCase;

class ContactTest extends TestCase
{
    protected $contact;

    protected function setUp()
    {
        $this->contact = new Contact();
    }

    public function testGetSetFirstName()
    {
        $this->contact->setFirstName('Jean');

        $this->assertEquals('Jean', $this->contact->getFirstName());
    }
}