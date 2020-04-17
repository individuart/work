<?php

namespace Individuart\Materialize\Updates;

use October\Rain\Database\Updates\Migration;
use Schema;

class UpdateSortableFieldsToNullable extends Migration
{
    public function up()
    {
        Schema::table('individuart_work_categories', function ($table) {
            $table->integer('sort_order')->nullable()->change();
        });
        Schema::table('individuart_work_works', function ($table) {
            $table->integer('sort_order')->nullable()->change();
        });
    }

    public function down()
    {
        Schema::table('individuart_work_categories', function ($table) {
            $table->integer('sort_order')->nullable(false)->change();
        });
        Schema::table('individuart_work_works', function ($table) {
            $table->integer('sort_order')->nullable(false)->change();
        });
    }
}
