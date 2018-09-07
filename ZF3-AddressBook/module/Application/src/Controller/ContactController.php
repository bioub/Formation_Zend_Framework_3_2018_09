<?php

namespace Application\Controller;

use Application\Service\ContactService;
use Zend\Http\PhpEnvironment\Request;
use Zend\Mvc\Controller\AbstractActionController;
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
        return new ViewModel([
            'contacts' => $this->contactService->getAll(),
        ]);
    }

    public function addAction()
    {
        $form = $this->contactService->getForm();

        if ($this->request->isPost()) {
            $contact = $this->contactService->insert($this->request->getPost());

            if ($contact) {
                $this->flashMessenger()->addSuccessMessage("{$contact->getFirstName()} a bien été créé");
                return $this->redirect()->toRoute('contact/show', ['id' => $contact->getId()]);
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
