<?php

namespace app\model;

use frame\mvc\BaseModel;
use frame\db\BasePDBC;

/**
 * Class UserModel
 * @author: 斉鵬
 */
class UserModel extends BaseModel
{
    protected $table = "user";

    public function getTable()
    {
        return $this->table;
    }

    /**
     * Like sql by user's name.
     *
     * @param $keyword
     * @return array
     */
    public function searchByKeyword($keyword)
    {
        $sql = "SELECT * FROM `$this->table` WHERE `name` like :keyword";
        $sth = BasePDBC::pdo()->prepare($sql);
        $sth = $this->formatParam($sth, [":keyword" => "%$keyword%"]);
        $sth->execute();

        return $sth->fetchAll();
    }

    /**
     * Select for login.
     *
     * @param $account
     * @param $password
     * @return mixed
     */
    public function login($account, $password)
    {
        return $this->where([" name = ? ", " and password = ? ",
            " or email = ? ", " and password = ? "],
            [$account, $password, $account, $password])->fetch();
    }

    public function searchById($id)
    {
        return $this->where(["id = :id"], [":id" => $id])->fetch();
    }
}