<?php namespace Individuart\Work\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class CreateCategoriesTable extends Migration
{

    public function up()
    {
        Schema::create('individuart_work_categories', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name',200);
            $table->boolean('published',false);
            $table->timestamps();
            $table->integer('sort_order');
        });
    }

    public function down()
    {
        Schema::dropIfExists('individuart_work_categories');
    }

}
