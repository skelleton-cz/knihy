<?php


namespace App\Models;


use Nette\Utils\ArrayHash;

class KnihyModel extends BaseModel
{

    public function getSeznamKnih()
    {
        return $this->getTableKnihy();
    }

    public function add(ArrayHash $data)
    {
        return $this->getTableKnihy()->insert($data);
    }
}