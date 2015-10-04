<?php namespace Individuart\Work\Controllers;

use BackendMenu;
use Backend\Classes\Controller;
use Individuart\Work\Models\Work;
use October\Rain\Support\Facades\Flash;

/**
 * Work Back-end Controller
 */
class Works extends Controller
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

        BackendMenu::setContext('Individuart.Work', 'work', 'works');
    }

    public function index_onDelete()
    {
        if (($checkedIds = post('checked')) && is_array($checkedIds) && count($checkedIds)) {

            foreach ($checkedIds as $workId) {
                if (!$work = Work::find($workId))
                    continue;
                if($work->featured_image) {
                    $work->featured_image->delete();
                }
                $work->delete();
            }

            Flash::success(e(trans('individuart.work::lang.backend.successfully_deleted')));
        }

        return $this->listRefresh();
    }

}