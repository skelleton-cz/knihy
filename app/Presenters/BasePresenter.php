<?php
namespace App\Presenters;

use Nette\Application\UI\Presenter;

abstract class BasePresenter extends Presenter
{
    /** @var \App\Models\KnihyModel @inject */
    public $knihyModel;

}