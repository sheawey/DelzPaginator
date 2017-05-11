<?php

namespace Delz\Paginator\Contract;

/**
 * 分页接口类
 *
 * 1. 接口的数据来源依赖于IPagerAdapter
 * 2. IPagerAdapter须实现getResult()和count()方法
 * 3. IPagerAdapter的实现可根据不同的ORM或数据操作分别实现
 *
 * @package Delz\Paginator\Contract
 */
interface IPager
{
    /**
     * 获取当前页的索引
     *
     * @return int
     */
    public function getPage();

    /**
     * 设置当前页的索引
     *
     * @param int $page 当前页的索引
     */
    public function setPage($page);

    /**
     * 设置每页显示多少条记录
     *
     * @param int $pageSize
     */
    public function setPageSize($pageSize);

    /**
     * 获取每页显示多少条记录
     *
     * @return int
     */
    public function getPageSize();

    /**
     * 获取最多显示页码数
     *
     * @return int
     */
    public function getMaxPages();

    /**
     * 设置最多显示页码数
     *
     * @param int $maxPages
     */
    public function setMaxPages($maxPages);

    /**
     * 返回上一页页码
     *
     * @return int
     */
    public function getPrePage();

    /**
     * 返回下一页页码
     *
     * @return int
     */
    public function getNextPage();

    /**
     * 当前页是否第一页
     *
     * @return bool
     */
    public function isFirstPage();

    /**
     * 返回第一页页码
     *
     * @return int
     */
    public function getFirstPage();

    /**
     * 设置第一页页码
     *
     * @param int $firstPage
     */
    public function setFirstPage($firstPage);

    /**
     * 当前页是否最后一页
     *
     * @return bool
     */
    public function isLastPage();

    /**
     * 获取最后页页码
     *
     * @return int
     */
    public function getLastPage();

    /**
     * 是否需要分页（超过一页才需要分页）
     *
     * @return boolean
     */
    public function isPaginable();

    /**
     * 返回页码数组
     *
     * @return array
     */
    public function getPages();

    /**
     * 返回数据总条数
     *
     * @return int
     */
    public function getTotalCount();

    /**
     * 符合条件的记录页数
     *
     * @return int
     */
    public function getPageCount();

    /**
     * 是否有数据
     *
     * @return bool
     */
    public function hasResults();

    /**
     * 获取数据集
     *
     * @return mixed
     */
    public function getResults();

    /**
     * 返回数据对象
     *
     * @return IPagerAdapter
     */
    public function getAdapter();
}