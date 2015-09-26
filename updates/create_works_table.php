<?php namespace Individuart\Work\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class CreateWorksTable extends Migration
{

    public function up()
    {
        Schema::create('individuart_work_works', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name',200);
            $table->string('description',200);
            $table->text('content');
            $table->date('workdate')->nullable();
            $table->boolean('published',false);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('individuart_work_works');
    }

}
