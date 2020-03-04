<?php


namespace App\Presenters;


class KnihaPresenter extends BasePresenter
{
    public function renderDefault()
    {
        $this->template->knihy = $this->knihyModel->getSeznamKnih();
    }
}