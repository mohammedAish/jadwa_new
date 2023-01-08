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
        Schema::create('project_exp_general_incomes', function (Blueprint $table) {
            $table->id();
            $table->integer('project_id');
            $table->integer('fsIncome_id');
            $table->string('item');
            $table->integer('value');
            $table->enum('expensis_type',['0','1','2']);
            $table->integer('quantity');
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
        Schema::dropIfExists('project_exp_general_incomes');
    }
};
