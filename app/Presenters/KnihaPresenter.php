<?php


namespace App\Presenters;


use Nette\Application\UI\Form;
use Nette\Utils\ArrayHash;

class KnihaPresenter extends BasePresenter
{
    protected $autori;

    public function renderDefault()
    {
        $this->template->knihy = $this->knihyModel->getSeznamKnih();
    }

    /**
     * Metoda `actionCokoliv` se vzdy provede pred metodou `renderCokoliv`
     * Behem vykreslovani formulare uzivateli je jiz potreba mit vyplnena data (napr obsah ciselniku OPTIONS)
     * v opacnem pripade by potvrzeni formulare vyvolalo bezpecnostni chybu
     */
    public function actionAdd()
    {
        $this->autori = $this->autoriModel->getSeznamAutoru()->fetchPairs('id', 'prijmeni');
    }

    protected function createComponentKnihaForm()
    {
        $form = new Form();
        $form->addHidden('id');
        $form->addText('nazev', 'Nazev knihy: ')
            ->setRequired();
        $form->addSelect('autor_id', 'Autor: ', $this->autori);
        $form->addInteger('rokVydani', 'Rok vydání: ');
        $form->addSubmit('save', "Uložit");

        $form->onSuccess[] = [$this, 'knihaFormUlozit'];

        return $form;
    }

    public function knihaFormUlozit(Form $form, ArrayHash $vals)
    {
        dump($vals);
        exit();
    }

}