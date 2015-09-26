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
        return [

        ];
    }

    public function onRun()
    {
        $this->addJs('assets/js/work.min.js');
        $this->addCss('assets/css/work.min.css');
    }


    public function works(){
        $works = Work::published()->orderBy('sort_order','asc')->get();



        if($works) {
            foreach ($works as $work) {
                $work['slug'] = Str::slug($work['name']);
            }
        }
        return $works;
    }

    public function onWork()
    {
    }

    public function work(){
        $work_id = post('work_id');
        //extraigo los datos de este trabajo para pasarlos al partial
        $work = Work::find($work_id);
        return $work;
    }

}