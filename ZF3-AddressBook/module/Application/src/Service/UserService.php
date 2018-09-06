<?php
/**
 * Created by PhpStorm.
 * User: Administrateur
 * Date: 06/09/2018
 * Time: 16:09
 */

namespace Application\Service;


use Doctrine\ORM\EntityManager;

class UserService
{
    /** @var EntityManager */
    protected $manager;

    /**
     * UserService constructor.
     * @param EntityManager $manager
     */
    public function __construct(EntityManager $manager)
    {
        $this->manager = $manager;
    }


}