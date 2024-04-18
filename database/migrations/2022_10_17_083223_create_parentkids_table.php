<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParentkidsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('parentkids', function (Blueprint $table) {
            $table->renameColumn('parentId', 'parent_id');
            $table->renameColumn('studentId', 'student_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('parentkids', function (Blueprint $table) {
            $table->renameColumn('parent_id', 'parentId');
            $table->renameColumn('student_id', 'studentId');
        });
    }
}
