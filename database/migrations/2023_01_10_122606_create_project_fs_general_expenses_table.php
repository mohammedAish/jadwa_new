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
        Schema::create('project_fs_general_expenses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('project_id');
            $table->enum('type' , ['amount','ratio','custom']);
            $table->integer('value')->nullable();

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
        Schema::dropIfExists('project_fs_general_expenses');
    }
};
