<?php


namespace App\Presenters;


use Cassandra\Date;
use Nette\Application\UI\Form;
use Nette\Utils\ArrayHash;
use Nette\Utils\DateTime;

class KnihaPresenter extends BasePresenter
{
    protected $autori;

    public function renderDefault()
    {
        $this->template->knihy = $this->knihyModel->getSeznamKnih();
        $this->template->autori = $this->autoriModel->getSeznamAutoru();
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
        unset($vals->id);
        $vals->rokVydani = new DateTime($vals->rokVydani);

        $this->knihyModel->add($vals);

        $this->presenter->flashMessage("Kniha úspěšně vytvořena");
        $this->presenter->redirect('Kniha:default');
    }

}