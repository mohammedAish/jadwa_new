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
        Schema::create('project_fs_utilities_incrementals_details', function (Blueprint $table) {
            $table->id();
            $table->Integer('utilities_id');
            $table->unsignedBigInteger('project_id');
            $table->integer('year');
            $table->integer('incremental');
            
            $table->foreign('project_id')->references('id')->on('projects')->cascadeOnDelete();
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
        Schema::dropIfExists('project_fs_utilities_incrementals_details');
    }
};
