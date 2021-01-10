<?php

namespace frame\mvc;

use frame\db\BaseQuery;

/**
 * Class BaseModel
 * @package frame\mvc
 */
class BaseModel extends BaseQuery
{
    protected $model;

    /**
     * BaseModel constructor.
     */
    public function __construct()
    {
        if (!$this->table) {
            $this->model = get_class($this);
            $this->model = substr($this->model, 0, -5);
            $this->table = strtolower($this->model);
        }
    }
}
