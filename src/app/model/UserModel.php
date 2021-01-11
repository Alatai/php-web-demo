<?php

namespace app\model;

use frame\mvc\BaseModel;
use frame\db\BasePDBC;

/**
 * Class UserModel
 * @author: M20W0324 斉鵬
 */
class UserModel extends BaseModel
{
    protected $table = "user";

    public function searchByKeyword($keyword)
    {
        $sql = "SELECT * FROM `$this->table` WHERE `name` like :keyword";
        $sth = BasePDBC::pdo()->prepare($sql);
        $sth = $this->formatParam($sth, [":keyword" => "%$keyword%"]);
        $sth->execute();

        return $sth->fetchAll();
    }
}