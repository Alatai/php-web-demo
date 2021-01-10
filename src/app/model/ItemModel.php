<?php

namespace app\model;

use frame\mvc\BaseModel;
use frame\db\BasePDBC;

class ItemModel extends BaseModel
{
    protected $table = "item";

    public function search($keyword)
    {
        $sql = "SELECT * FROM `$this->table` WHERE `item_name` like :keyword";
        $sth = BasePDBC::pdo()->prepare($sql);
        $sth = $this->formatParam($sth, [":keyword" => "%$keyword%"]);
        $sth->execute();

        return $sth->fetchAll();
    }
}