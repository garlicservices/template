<?php

namespace App\Service\GraphQL;

use Garlic\GraphQL\Service\Abstracts\AbstractCrudService;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use App\Entity\Apartment;

class ApartmentService extends AbstractCrudService
{
    /**
     * Return Apartment list
     *
     * @param array $arguments
     * @param array $orderBy
     * @param int $limit
     * @param int $offset
     * @return object[]
     */
    public function find(array $arguments, $orderBy = null, $limit = null, $offset = null)
    {
        if (empty($limit)) {
            $limit = getenv('DEFAULT_RESULT_LIMIT');
        }
        
        $result = $this->em
            ->getRepository('App\Entity\Apartment')
            ->findBy($arguments, $orderBy, $limit, $offset);
        
        return $result;
    }
    
    /**
     * Create new Apartment    * Necessary to return listable result (array)
     *
     * @param array $arguments
     * @return array
     * @throws \Doctrine\ORM\Mapping\MappingException
     */
    public function create(array $arguments)
    {
        $entity = $this->hydrate(new Apartment(), $arguments);
        
        $this->em->persist($entity);
        $this->em->flush();
        
        return [$entity];
    }
    
    /**
     * Update Apartment object
     * Must return listable result (array)
     *
     * @param int $id
     * @param array $arguments
     * @return array
     * @throws \Doctrine\ORM\Mapping\MappingException
     */
    public function update(int $id, array $arguments)
    {
        /** @var Apartment $entity */
        $entity = $this->em->getRepository('App\Entity\Apartment')->find($id);
        if (empty($entity)) {
            throw new NotFoundHttpException("Apartment with ID $id not found.");
        }
        
        $entity = $this->hydrate($entity, $arguments);
        
        $this->em->persist($entity);
        $this->em->flush();
        
        return [$entity];
    }
    
    /**
     * Delete found Apartment entities
     *
     * @param array $arguments
     * @param null $limit
     * @param null $offset
     * @return array
     */
    public function delete(array $arguments, $limit = null, $offset = null)
    {
        if (empty($limit)) {
            $limit = getenv('DEFAULT_RESULT_LIMIT');
        }
        
        /** @var Apartment $apartment */
        $entities = $this->em->getRepository('App\Entity\Apartment')
            ->findBy($arguments, [], $limit, $offset);
        
        if (count($entities) <= 0) {
            throw new NotFoundHttpException("Apartment list with input arguments is not found.");
        }
        
        foreach ($entities as $entity) {
            $this->em->remove($entity);
        }
        
        $this->em->flush();
        
        return $entities;
    }
}
