<?php

namespace Application\Controller;

use Application\Service\CompanyService;
use Zend\Http\PhpEnvironment\Request;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class CompanyController extends AbstractActionController
{
    /** @var Request */
    protected $request;

    /** @var Request */
    protected $response;

    /** @var CompanyService */
    protected $companyService;

    /**
     * ContactController constructor.
     * @param CompanyService $companyService
     */
    public function __construct(CompanyService $companyService)
    {
        $this->companyService = $companyService;
    }


    public function listAction()
    {
        return new ViewModel([
            'companies' => $this->companyService->getAll(),
        ]);
    }

    public function showAction()
    {
        $id = $this->params()->fromRoute('id');

        $company = $this->companyService->getById($id);

        if (!$company) {
            // Erreur 404
            return $this->createHttpNotFoundModel($this->response);
        }

        return new ViewModel([
            'company' => $company,
        ]);
    }
}
