<?php

namespace Application\Controller;

use Application\Entity\Contact;
use Application\Form\ContactForm;
use Application\InputFilter\ContactInputFilter;
use Application\Service\ContactService;
use DoctrineModule\Stdlib\Hydrator\DoctrineObject;
use Zend\Form\Form;
use Zend\Http\PhpEnvironment\Request;
use Zend\Http\PhpEnvironment\Response;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\JsonModel;
use Zend\View\Model\ViewModel;

class ContactController extends AbstractActionController
{
    /** @var Request */
    protected $request;

    /** @var Request */
    protected $response;

    /** @var ContactService */
    protected $contactService;

    /**
     * ContactController constructor.
     * @param ContactService $contactService
     */
    public function __construct(ContactService $contactService)
    {
        $this->contactService = $contactService;
    }


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
            'contacts' => $this->contactService->getAll(),
        ]);
    }

    public function addAction()
    {
        // TODO : idéalement récupérer le form depuis le service manager
        $form = new ContactForm(); // TODO déplacer dans le service

        if ($this->request->isPost()) {

            $data = $this->request->getPost();
            $form->setInputFilter(new ContactInputFilter()); // TODO déplacer dans le service

            $form->setData($data);

            if ($form->isValid()) {

                $this->contactService->insert($form->getData());
                $this->flashMessenger()->addSuccessMessage("$data[firstName] a bien été créé");
                return $this->redirect()->toRoute('contact');
            }
        }

        return new ViewModel([
            'contactForm' => $form,
        ]);
    }

    public function updateAction()
    {
        return new ViewModel();
    }

    public function deleteAction()
    {
        // Si form de confirmation oui/non
        // pas de Zend\Form
        return new ViewModel();
    }

    public function showWithCompanyAction()
    {
        $id = $this->params()->fromRoute('id');

        $contact = $this->contactService->getById($id);

        if (!$contact) {
            // Erreur 404
            return $this->createHttpNotFoundModel($this->response);
        }

        return new ViewModel([
            'contact' => $contact,
        ]);
    }
}
