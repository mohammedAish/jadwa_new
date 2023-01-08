<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('general_project_income', function (Blueprint $table) {
            $table->id();
            $table->integer('project_id');
            $table->string('item');
            $table->string('value');
            $table->string('quantity');
            $table->string('value_incremental');
            $table->string('quantity_incremental');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('general_project_income');
    }
};
