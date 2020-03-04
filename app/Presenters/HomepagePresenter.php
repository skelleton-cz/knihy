<?php

declare(strict_types=1);

namespace App\Presenters;


final class HomepagePresenter extends BasePresenter
{
    public function renderDefault()
    {
        $this->template->knihy = $this->knihyModel->getSeznamKnih();
        $this->template->autori = $this->autoriModel->getTableAutori();
    }
}
