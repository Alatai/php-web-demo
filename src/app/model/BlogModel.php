<?php

namespace app\model;

use frame\mvc\BaseModel;
use frame\db\BasePDBC;
use PDO;

/**
 * Class BlogModel
 * @author: 斉鵬
 */
class BlogModel extends BaseModel
{
    protected $table = "blog";

    /**
     * Like sql by blog's name or blog's content.
     *
     * @param $keyword
     * @return array
     */
    public function searchByKeyword($keyword)
    {
        $sql = "SELECT * FROM `$this->table` WHERE `title` LIKE :keyword OR `content` LIKE :keyword";
        $sth = BasePDBC::pdo()->prepare($sql);
        $sth = $this->formatParam($sth, [":keyword" => "%$keyword%"]);
        $sth->execute();

        return $sth->fetchAll();
    }

    /**
     * Create pageResult.
     * @param $currentPage
     * @param $pageSize
     * @return PageResult
     */
    public function paginate($currentPage, $pageSize)
    {
        $param_1 = ($currentPage - 1) * $pageSize;
        $param_2 = $pageSize;

        $userTable = (new UserModel())->getTable();

        // listData sql
        $sql = "SELECT b.*, u.name AS writer FROM `$this->table` b, `$userTable` u WHERE b.user_id = u.id LIMIT :param_1, :param_2";
        $sth = BasePDBC::pdo()->prepare($sql);
        $sth->bindParam(":param_1", $param_1, PDO::PARAM_INT);
        $sth->bindParam(":param_2", $param_2, PDO::PARAM_INT);
        $sth->execute();

        $listData = $sth->fetchAll();

        // totalCount sql
        $sql = "SELECT COUNT(*) FROM `$this->table`";
        $sth = BasePDBC::pdo()->prepare($sql);
        $sth->execute();

        $totalCount = $sth->fetchColumn();

        return new PageResult($listData, $totalCount, $currentPage, $pageSize);
    }

}
