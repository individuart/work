<?php namespace Individuart\Work\Controllers;

use BackendMenu;
use Backend\Classes\Controller;
use Individuart\Work\Models\Category;
use October\Rain\Support\Facades\Flash;

/**
 * Categories Back-end Controller
 */
class Categories extends Controller
{
    public $implement = [
        'Backend.Behaviors.FormController',
        'Backend.Behaviors.ReorderController',
        'Backend.Behaviors.ListController'
    ];

    public $formConfig = 'config_form.yaml';
    public $listConfig = 'config_list.yaml';
    public $reorderConfig = 'config_reorder.yaml';
    public $relationConfig = 'config_relation.yaml';

    public function __construct()
    {
        parent::__construct();

        BackendMenu::setContext('Individuart.Work', 'work', 'categories');
    }

    public function index_onDelete()
    {
        if (($checkedIds = post('checked')) && is_array($checkedIds) && count($checkedIds)) {

            foreach ($checkedIds as $categoryId) {

                if (!$category = Category::find($categoryId))
                    continue;

                //delete works related with category from relationship table
                if($categories = $category->works)
                {
                    foreach($categories as $cat){
                        $category->works()->detach($cat->id);
                    }
                }

                $category->delete();

            }

            Flash::success(e(trans('individuart.work::lang.backend.successfully_deleted')));
        }

        return $this->listRefresh();
    }
}