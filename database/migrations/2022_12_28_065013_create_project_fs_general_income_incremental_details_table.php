<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_fs_general_income_incremental_details', function (Blueprint $table) {
            $table->id();
            $table->integer('project_fs_income_incremental_id');
            $table->integer('year');
            $table->integer('incremental');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('project_fs_general_income_incremental_details');
    }
};
