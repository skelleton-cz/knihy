<?php
  

namespace App\Models;


class AutoriModel extends BaseModel
{
    public function getSeznamAutoru()
    {
        return $this->getTableAutori();
    }
}

