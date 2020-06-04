<?php

namespace App\Repository;

use App\Entity\Collection;
use App\Entity\CollectionSearch;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\ORM\QueryBuilder;
use Doctrine\ORM\Query;

/**
 * @method Collection|null find($id, $lockMode = null, $lockVersion = null)
 * @method Collection|null findOneBy(array $criteria, array $orderBy = null)
 * @method Collection[]    findAll()
 * @method Collection[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CollectionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Collection::class);
    }

    /**
     * @return Query
     */
    public function findAllNonAcquiredQuery(CollectionSearch $search): Query {

        $query = $this->findAllNotPossessed();

        if($search->getMaxPrice()) {

            $query = $query
                ->andWhere('c.price <= :maxPrice')
                ->setParameter('maxPrice', $search->getMaxPrice());

        }

        if($search->getDimension()) {

            $query = $query
                ->andWhere('c.dimensions >= :dimension')
                ->setParameter('dimension', $search->getDimension());

        }

        if($search->getOptions()->count() > 0) {
            $k = 0;
            foreach ($search->getOptions() as $option) {
                $k ++;
                $query = $query
                    ->andWhere(":option$k MEMBER OF c.options")
                    ->setParameter("option$k", $option);
            }

        }

        return $query->getQuery();

    }

    /**
     * @return Collection[]
     */
    public function findLatest(): array {
        return $this->findAllNotPossessed()
            ->orderBy('c.created_at', 'DESC')
            ->setMaxResults(9)
            ->getQuery()
            ->getResult();
    }

    /**
     * @return QueryBuilder
     */
    private function findAllNotPossessed(): QueryBuilder {
        return $this->createQueryBuilder('c')
            ->where('c.possession = 0');
    }
    // /**
    //  * @return Collection[] Returns an array of Collection objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Collection
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
