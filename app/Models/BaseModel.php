<?php

namespace App\Models;

use \Nette\Database;

abstract class BaseModel
{
    /** @var Database\Connection $db */
    public $db;

    /**
     * BaseModel constructor.
     * @param Database\Context $database
     */
    public function __construct(Database\Context $database)
    {
        $this->db = $database;
    }

    /**
     * @return Database\Table\Selection
     */
    public function getTableKnihy()
    {
        return $this->db->table('knihy');
    }

    /**
     * @return Database\Table\Selection
     */
    public function getTableAutori()
    {
        return $this->db->table('autor');
    }
}