<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('project_general_income_incremental', function (Blueprint $table) {
            $table->id();
            $table->integer('project_id');
            $table->integer('item_id');
            $table->string('year');
            $table->string('income_value');
            $table->string('quantity_value');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('general_income_incremental');
    }
};
