<?php
namespace App\Presenters;

use App\Models\AutoriModel;
use Nette\Application\UI\Presenter;

abstract class BasePresenter extends Presenter
{
    /** @var \App\Models\KnihyModel @inject */
    public $knihyModel;


    /** @var AutoriModel @inject */
    public $autoriModel;
}