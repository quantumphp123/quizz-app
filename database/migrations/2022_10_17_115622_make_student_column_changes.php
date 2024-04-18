<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MakeStudentColumnChanges extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('students', function (Blueprint $table) {
            $table->string('gender')->after('password')->nullable(false)->change();
            $table->string('dateOfBirth')->after('gender')->nullable(false)->change();
            $table->string('class')->after('dateOfBirth')->nullable(false)->change();
            $table->string('profilePic')->after('class')->nullable()->change();
            $table->string('bio')->after('profilePic')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('students', function (Blueprint $table) {
            //
        });
    }
}
