<?php


namespace App\Presenters;


class AutorPresenter extends BasePresenter
{

    public function renderDefault()
    {
        $this->template->autori = $this->autoriModel->getTableAutori();
        $this->template->knihy = $this->knihyModel->getTableKnihy();
    }
}