<?php namespace Individuart\Work\Updates;

use October\Rain\Database\Updates\Migration;
use DbDongle;

class UpdateTimestampsNullable extends Migration
{
    public function up()
    {
        DbDongle::disableStrictMode();

        DbDongle::convertTimestamps('individuart_work_categories');
        DbDongle::convertTimestamps('individuart_work_works');
    }

    public function down()
    {
        // ...
    }
}
