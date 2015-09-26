<?php namespace Individuart\Work\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class AddLongDescWorksTable extends Migration
{


    public function up()
    {
        Schema::table('individuart_work_works', function($table)
        {
            $table->text('long_description');
        });

    }

    public function down()
    {
        Schema::table('individuart_work_works', function($table)
        {
            $table->dropColumn('long_description');
        });
    }

}
