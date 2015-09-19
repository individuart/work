<?php namespace Individuart\Work\Components;

use Cms\Classes\ComponentBase;
use Individuart\Work\Models\Work;
use Str;

class Worklist extends ComponentBase
{

    public function componentDetails()
    {
        return [
            'name'        => 'Worklist Component',
            'description' => 'Listado de trabajos para online portfolio'
        ];
    }

    public function defineProperties()
    {
        return [];
    }

    public function onRun()
    {
        $this->addJs('assets/js/work.min.js');
        $this->addCss('assets/css/work.min.css');

       $this->works = Work::published()->orderBy('sort_order','asc')->get();

        foreach($this->works as $work){
            $work['slug'] = Str::slug($work['name']);
        }

    }

    public function onWork()
    {
        $work_id = post('work_id');
        //extraigo los datos de este trabajo para pasarlos al partial
        $this->work = Work::find($work_id);
    }

}