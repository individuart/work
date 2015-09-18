<?php namespace Individuart\Work\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class AddUrlWorksTable extends Migration
{


    public function up()
    {
        Schema::table('individuart_work_works', function($table)
        {
            $table->string('url',200);
        });

    }

    public function down()
    {
        Schema::table('individuart_work_works', function($table)
        {
            $table->dropColumn('url');
        });
    }

}
