<?php


namespace App\Presenters;


use Nette\Application\UI\Form;
use Nette\Utils\ArrayHash;
use Nette\Utils\DateTime;

class AutorPresenter extends BasePresenter
{

    public function renderDefault()
    {
        $this->template->autori = $this->autoriModel->getTableAutori();
        $this->template->knihy = $this->knihyModel->getTableKnihy();
    }

    protected function createComponentAutorForm()
    {
        $form = new Form();
        $form->addHidden('id');
        $form->addText('jmeno', 'Jméno autora: ')
            ->setRequired();
        $form->addText('prijmeni', 'Příjmení autora: ')
            ->setRequired();
        $form->addText('rokNarozeni', 'Rok narození: ');
        $form->addSubmit('save', "Uložit");

        $form->onSuccess[] = [$this, 'autorFormUlozit'];

        return $form;
    }

    public function autorFormUlozit(Form $form, ArrayHash $vals)
    {
        unset($vals->id);
        $vals->rokNarozeni = new DateTime($vals->rokNarozeni);

        $this->autoriModel->add($vals);

        $this->presenter->flashMessage("Autor úspěšně založen");
        $this->presenter->redirect('Autor:default');
    }
}