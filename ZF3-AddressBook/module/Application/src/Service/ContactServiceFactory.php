<?php

namespace Application\Service;


use Application\Form\ContactForm;
use Application\InputFilter\ContactInputFilter;
use Doctrine\ORM\EntityManager;
use DoctrineModule\Stdlib\Hydrator\DoctrineObject;
use Interop\Container\ContainerInterface;
use Interop\Container\Exception\ContainerException;
use Zend\ServiceManager\Exception\ServiceNotCreatedException;
use Zend\ServiceManager\Exception\ServiceNotFoundException;
use Zend\ServiceManager\Factory\FactoryInterface;

class ContactServiceFactory implements FactoryInterface
{

    /**
     * Create an object
     *
     * @param  ContainerInterface $container
     * @param  string $requestedName
     * @param  null|array $options
     * @return object
     * @throws ServiceNotFoundException if unable to resolve the service.
     * @throws ServiceNotCreatedException if an exception is raised when
     *     creating a service.
     * @throws ContainerException if any other error occurs
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $manager = $container->get(EntityManager::class);
        $form = $container->get('FormElementManager')->get(ContactForm::class);
        $inputFilter = $container->get('InputFilterManager')->get(ContactInputFilter::class);
        $hydrator = $container->get('HydratorManager')->get(DoctrineObject::class);
        return new ContactService($manager, $form, $inputFilter, $hydrator);
    }
}
