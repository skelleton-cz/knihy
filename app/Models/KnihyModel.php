<?php


namespace App\Models;


class KnihyModel extends BaseModel
{

    public function getSeznamKnih()
    {
        return $this->getTableKnihy();
    }
}