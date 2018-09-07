<?php

namespace Application\Repository;


use Doctrine\ORM\EntityRepository;

class ContactRepository extends EntityRepository
{

    public function findByCompany($companyId)
    {

    }

    public function findWithCompany($contactId)
    {
        $dql = <<<MA_REQUETE_DQL
SELECT c, s FROM \Application\Entity\Contact c
LEFT JOIN c.company s
WHERE c.id = :contactId
MA_REQUETE_DQL;

        return $this->getEntityManager()
             ->createQuery($dql)
             ->setParameter('contactId', $contactId)
             ->getSingleResult();
    }
}