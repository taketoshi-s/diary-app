<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeWeightRecordsAttWeightRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('weight_records', function (Blueprint $table) {
            
            $table->decimal('weight', 4, 1)->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('weight_records', function (Blueprint $table) {
            
            $table->decimal('weight', 3, 1)->nullable()->change();
        });
    }
}
