<?php

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;

class ContactController extends AbstractActionController
{
    public function listAction()
    {
       echo 'Hello List';
       exit;
    }

    public function showAction()
    {
        echo 'Hello Show';
        exit;
    }

    public function addAction()
    {
        echo 'Hello Add';
        exit;
    }
}