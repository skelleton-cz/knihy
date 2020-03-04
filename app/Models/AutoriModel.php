<?php
  

namespace App\Models;


use Nette\Utils\ArrayHash;

class AutoriModel extends BaseModel
{
    public function getSeznamAutoru()
    {
        return $this->getTableAutori();
    }

    public function add(ArrayHash $data)
    {
        return $this->getTableAutori()->insert($data);
    }
}