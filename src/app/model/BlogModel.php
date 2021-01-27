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
     * Select sql by blog id.
     *
     * @param $id
     * @return null
     */
    public function searchById($id)
    {
        $userTable = (new UserModel())->getTable();

        $sql = "SELECT b.*, u.name AS writer FROM `$this->table` b, `$userTable` u WHERE b.user_id = u.id AND b.id = :id";
        $sth = BasePDBC::pdo()->prepare($sql);
        $sth->bindParam(":id", $id, PDO::PARAM_INT);

        $sth->execute();

        return $sth->fetch();
    }

    /**
     * Create pageResult.
     * @param $keyword
     * @param $currentPage
     * @return PageResult
     */
    public function paginate($keyword, $currentPage)
    {
        $pageSize = 4;

        $param_1 = ($currentPage - 1) * $pageSize;
        $param_2 = $pageSize;

        $userTable = (new UserModel())->getTable();
        $keyword = "%" . $keyword . "%";

        $sql = "SELECT b.*, u.name AS writer FROM `$this->table` b, `$userTable` u WHERE b.user_id = u.id AND title LIKE :keyword ORDER BY b.id DESC LIMIT :param_1, :param_2";
        $sth = BasePDBC::pdo()->prepare($sql);
        $sth->bindParam(":keyword", $keyword, PDO::PARAM_STR);
        $sth->bindParam(":param_1", $param_1, PDO::PARAM_INT);
        $sth->bindParam(":param_2", $param_2, PDO::PARAM_INT);
        $sth->execute();

        $listData = $sth->fetchAll();

        // totalCount sql
        $sql = "SELECT COUNT(*) FROM `$this->table` WHERE title LIKE :keyword";
        $sth = BasePDBC::pdo()->prepare($sql);
        $sth->bindParam(":keyword", $keyword, PDO::PARAM_STR);

        $sth->execute();

        $totalCount = $sth->fetchColumn();

        return new PageResult($listData, $totalCount, $currentPage, $pageSize);
    }
}
