<?php

namespace Delz\Paginator\Adapter;

use Delz\Paginator\Contract\IPagerAdapter;
use Doctrine\ORM\QueryBuilder;
use Doctrine\ORM\Query;
use Doctrine\ORM\Tools\Pagination\Paginator;

/**
 * 分页数据适配器 － Doctrine ORM
 *
 * @package Delz\Paginator\Adapter
 */
class DoctrineORM implements IPagerAdapter
{
    /**
     * Doctrine ORM分页工具对象,由Doctrine提供
     *
     * @var Paginator
     */
    protected $paginator;

    /**
     * @param QueryBuilder|Query $query
     * @param bool|true $fetchJoinCollection
     * @param bool|null $useOutputWalkers
     */
    public function __construct($query, $fetchJoinCollection = true, $useOutputWalkers = null)
    {
        if (!$query instanceof QueryBuilder && !$query instanceof Query) {
            throw new \InvalidArgumentException(
                sprintf('"query" must be instance of "%s" or "%s"', QueryBuilder::class, Query::class)
            );
        }
        $this->paginator = new Paginator($query, $fetchJoinCollection);
        $this->paginator->setUseOutputWalkers($useOutputWalkers);
    }

    /**
     * {@inheritdoc}
     */
    public function getResults($offset, $limit)
    {
        $this->paginator->getQuery()->setFirstResult($offset)->setMaxResults($limit);

        return $this->paginator->getIterator();
    }

    /**
     * {@inheritdoc}
     */
    public function count()
    {
        return $this->paginator->count();
    }
}