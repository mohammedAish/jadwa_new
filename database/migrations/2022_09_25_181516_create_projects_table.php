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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('project_type_id');
            $table->unsignedBigInteger('owner_id');
            $table->unsignedBigInteger('created_by');
            $table->string('name');
            $table->text('idea');
            $table->string('logo');
            $table->string('country');
            $table->string('city');
            $table->string('language');
            $table->date('start_date');
            $table->integer('development_duration');
            $table->integer('number_days_year');
            $table->float('vat');
            $table->string('currency');
            $table->enum('study_duration',['5','10'])->nullable()->default('5');
            $table->foreign('owner_id')->references('id')->on('users')->cascadeOnDelete();
            $table->foreign('created_by')->references('id')->on('users')->cascadeOnDelete();
            $table->foreign('project_type_id')->references('id')->on('project_types')->cascadeOnDelete();
            $table->enum('revenu_entry', ['m','y'])->default('m');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projects');
    }
};
