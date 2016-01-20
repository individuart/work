<?php namespace Individuart\Work\Components;

use Cms\Classes\ComponentBase;
use Individuart\Work\Models\Work;
use Individuart\Work\Models\Category;
use Str;

class Worklist extends ComponentBase
{

    public function componentDetails()
    {
        return [
            'name'        => 'Worklist Component',
            'description' => 'individuart.work::lang.backend.worklist_description'
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

        $this->addCss('https://fonts.googleapis.com/css?family=Open+Sans:400,700&subset=latin,latin-ext');
        $this->addCss('https://fonts.googleapis.com/css?family=Josefin+Sans:400,300,300italic,400italic,700,700italic');
    }


    public function works(){
        $works = Work::published()->orderBy('sort_order','asc')->get();






        if($works) {
            foreach ($works as $work){
                $work['slug'] = Str::slug($work['name']);
                $work['css-categories'] = '';
                if($categories = $work->categories)
                {
                    foreach($categories as $cat)
                    {
                        $work['css_categories'] .= ' cat-' . $cat->id . ' ';
                    }


                }
            }
        }

        return $works;
    }

    public function categories(){
        $categories = Category::published()->orderBy('sort_order','asc')->get();
        return $categories;
    }

    public function onWork()
    {
    }

    public function work(){
        $work_id = post('work_id');
        //extraigo los datos de este trabajo para pasarlos al partial
        $work = Work::find($work_id);
        //extract categories work from
        $categories = $work->categories;
        if(!empty($categories))
        {
            foreach($categories as $cat)
            {
                $array_cats[] = $cat->name;
            }
            if(!empty($array_cats))
            {
                $work['lst_categories'] = implode(" ,",$array_cats);
            }
        }
        return $work;
    }

}