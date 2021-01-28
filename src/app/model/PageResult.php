<?php

namespace app\model;

/**
 * Class PageResult
 * @package app\model
 * @author 斉鵬
 */
class PageResult
{
    private $listData;
    private $totalCount;
    private $currentPage;
    private $totalPage;
    private $beginPage;
    private $prePage;
    private $nextPage;
    private $endPage;
    private $pageSize;

    public function __construct($listData, $totalCount, $currentPage, $pageSize)
    {
        $this->listData = $listData;
        $this->totalCount = $totalCount;
        $this->currentPage = $currentPage;
        $this->pageSize = $pageSize;

        $this->totalPage = $this->totalCount % $this->pageSize == 0 ?
            intval($this->totalCount / $this->pageSize) :
            intval($this->totalCount / $this->pageSize) + 1;
        $this->beginPage = 1;
        $this->prePage = $this->currentPage > 1 ? $this->currentPage - 1 : 1;
        $this->nextPage = $this->currentPage < $this->totalPage ? $this->currentPage + 1 : $this->totalPage;
        $this->endPage = $this->totalPage;
    }

    public function getListData()
    {
        return $this->listData;
    }

    public function getTotalCount()
    {
        return $this->totalCount;
    }

    public function getCurrentPage()
    {
        return $this->currentPage;
    }

    public function getTotalPage()
    {
        return $this->totalPage;
    }

    public function getBeginPage()
    {
        return $this->beginPage;
    }

    public function getPrePage()
    {
        return $this->prePage;
    }

    public function getNextPage()
    {
        return $this->nextPage;
    }

    public function getEndPage()
    {
        return $this->endPage;
    }

    public function getPageSize()
    {
        return $this->pageSize;
    }
}