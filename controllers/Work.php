<?php namespace Individuart\Work\Controllers;

use BackendMenu;
use Backend\Classes\Controller;

/**
 * Work Back-end Controller
 */
class Work extends Controller
{
    public $implement = [
        'Backend.Behaviors.FormController',
        'Backend.Behaviors.ListController',
        'Backend.Behaviors.ReorderController'
    ];

    public $formConfig = 'config_form.yaml';
    public $listConfig = 'config_list.yaml';
    public $reorderConfig = 'config_reorder.yaml';

    public function __construct()
    {
        parent::__construct();

        BackendMenu::setContext('Individuart.Work', 'work', 'work');
    }
}