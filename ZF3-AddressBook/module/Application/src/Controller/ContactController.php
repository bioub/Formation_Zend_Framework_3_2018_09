<?php

namespace Application\Controller;

use Zend\Http\PhpEnvironment\Response;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\JsonModel;
use Zend\View\Model\ViewModel;

class ContactController extends AbstractActionController
{
    public function listAction()
    {
        /*
        $response = new Response();
        $response->setStatusCode(200);
        $response->setContent('Hello List Response');
        */

        // return $this->redirect()->toUrl('https://www.google.fr/');
        // return $this->notFoundAction();

        // $now = new \DateTime();
        // return new ViewModel(compact($now));

        return new ViewModel([
            'now' => new \DateTime(),
        ]);
    }

    public function showAction()
    {
        return new ViewModel();
    }

    public function addAction()
    {
        return new ViewModel();
    }

    public function updateAction()
    {
        return new ViewModel();
    }

    public function deleteAction()
    {
        return new ViewModel();
    }

    public function showWithCompanyAction()
    {
        return new ViewModel();
    }
}
