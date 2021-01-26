<?php

namespace frame\db;

use \PDOStatement;

/**
 * Class BaseQuery
 * @package frame\db
 */
class BaseQuery
{
    protected $table; // database table name
    protected $primaryKey; // table's primary key
    private $filter = ""; // WHERE and ORDER condition
    private $param = array(); // sql's parameter array

    /**
     * Where sql.
     * ex: $this->where(["id = 1", "and title='Web'", ...])->fetch();
     *
     * @param array $where
     * @param array $param
     * @return $this
     */
    public function where($where = array(), $param = array())
    {
        if ($where) {
            $this->filter .= " WHERE ";
            $this->filter .= implode(" ", $where);

            $this->param = $param;
        }

        return $this;
    }

    /**
     * Order sql.
     * ex: $this->order("id DESC", "title ASC", ...)->fetch();
     *
     * @param array $order
     * @return $this
     */
    public function order($order = array())
    {
        if ($order) {
            $this->filter .= " ORDER BY ";
            $this->filter .= implode(" ", $order);
        }

        return $this;
    }

    /**
     * Select all sql.
     */
    public function fetchAll()
    {
        $sql = sprintf("SELECT * FROM `%s` %s", $this->table, $this->filter);
        $sth = BasePDBC::pdo()->prepare($sql);
        $sth = $this->formatParam($sth, $this->param);
        $sth->execute();

        return $sth->fetchAll();
    }

    /**
     * Select one sql.
     */
    public function fetch()
    {
        $sql = sprintf("SELECT * FROM `%s` %s", $this->table, $this->filter);
        $sth = BasePDBC::pdo()->prepare($sql);
        $sth = $this->formatParam($sth, $this->param);
        $sth->execute();

        return $sth->fetch();
    }

    /**
     * Delete sql by id.
     *
     * @param $id
     * @return int
     */
    public function delete($id)
    {
        $sql = sprintf("DELETE from `%s` WHERE `%s` = :%s", $this->table, $this->primaryKey, $this->primaryKey);
        $sth = BasePDBC::pdo()->prepare($sql);
        $sth = $this->formatParam($sth, [$this->primaryKey => $id]);
        $sth->execute();

        return $sth->rowCount();
    }

    /**
     * Insert sql.
     *
     * @param $data
     * @return int
     */
    public function add($data)
    {
        $sql = sprintf("INSERT INTO `%s` %s", $this->table, $this->formatInsert($data));
        $sth = BasePDBC::pdo()->prepare($sql);
        $sth = $this->formatParam($sth, $data);
        $sth = $this->formatParam($sth, $this->param);
        $sth->execute();

        return $sth->rowCount();
    }

    /**
     * Update sql.
     *
     * @param $data
     * @return int
     */
    public function update($data)
    {
        $sql = sprintf("UPDATE `%s` SET %s %s", $this->table, $this->formatUpdate($data), $this->filter);
        $sth = BasePDBC::pdo()->prepare($sql);
        $sth = $this->formatParam($sth, $data);
        $sth = $this->formatParam($sth, $this->param);
        $sth->execute();

        return $sth->rowCount();
    }

    /**
     * Parameter array bind parameter.
     *
     * @param PDOStatement $sth
     * @param array $params
     * @return PDOStatement
     */
    public function formatParam(PDOStatement $sth, $params = array())
    {
        foreach ($params as $param => &$val) {
            $param = is_int($param) ? $param + 1 : ":" . ltrim($param, ":");
            $sth->bindParam($param, $val);
        }

        return $sth;
    }

    /**
     * Format insert sql sentence.
     *
     * @param $data
     * @return string
     */
    private function formatInsert($data)
    {
        $fields = array();
        $names = array();

        foreach ($data as $key => $val) {
            $fields[] = sprintf("`%s`", $key);
            $names[] = sprintf(":%s", $key);
        }

        $field = implode(",", $fields);
        $name = implode(",", $names);

        return sprintf("(%s) VALUES (%s)", $field, $name);
    }

    /**
     * Format update sql sentence.
     *
     * @param $data
     * @return string
     */
    private function formatUpdate($data)
    {
        $fields = array();

        foreach ($data as $key => $val) {
            $fields[] = sprintf("`%s` = :%s", $key, $key);
        }

        return implode(",", $fields);
    }
}