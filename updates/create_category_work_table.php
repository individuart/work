<?php namespace Individuart\Work\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class CreateCategoryWorkTable extends Migration
{

    public function up()
    {
        Schema::create('individuart_work_category_work', function($table)
        {
            $table->integer('work_id')->unsigned();
            $table->integer('category_id')->unsigned();
            $table->primary(['work_id','category_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('individuart_work_category_work');
    }

}
