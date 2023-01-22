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
        Schema::create('project_fs_selling_and_marketing_costs', function (Blueprint $table) {
            $table->id();
            $table->integer('marketing_amount');
            $table->integer('marketing_ratio');
            $table->integer('marketing_growth_rate');
            $table->unsignedBigInteger('project_id');
            $table->timestamps();

            $table->foreign('project_id')->references('id')->on('projects')->cascadeOnDelete();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('project_fs_selling_and_marketing_costs');
    }
};
