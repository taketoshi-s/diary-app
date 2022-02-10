<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
           
            $table->decimal('weight', 3, 1)->after('name')->nullable();
            $table->integer('height')->after('name')->nullable();
            $table->integer('age')->after('name')->nullable();
            $table->string('nickname')->after('name')->nullable();
            $table->string('icon')->after('email')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            
            
            $table->dropColumn('height');
            $table->dropColumn('weight');
            $table->dropColumn('age');
            $table->dropColumn('nickname');
            $table->dropColumn('icon');
        });
    }
}
