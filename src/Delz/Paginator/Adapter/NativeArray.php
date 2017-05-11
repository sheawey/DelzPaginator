<?php

namespace Delz\Paginator\Adapter;

use Delz\Paginator\Contract\IPagerAdapter;

/**
 * 分页数据适配器 － 数组
 *
 * @package Delz\Paginator\Adapter
 */
class NativeArray implements IPagerAdapter
{
    /**
     * 数据集数组
     *
     * @var array
     */
    protected $array = [];

    /**
     * 构造方法
     *
     * @param array $array
     */
    public function __construct(array $array = [])
    {
        $this->array = $array;
    }

    /**
     * 获取数组
     *
     * @return array
     */
    public function getArray()
    {
        return $this->array;
    }

    /**
     * {@inheritdoc}
     */
    public function getResults($offset, $limit)
    {
        return array_slice($this->array, $offset, $limit);
    }

    /**
     * {@inheritdoc}
     */
    public function count()
    {
        return count($this->array);
    }
}