<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('project_selling_and_marketing_expenses_incremental', function (Blueprint $table) {
            $table->id();
            $table->integer('selling_id');
            $table->string('year');
            $table->string('incremental_value');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('project_selling_and_marketing_expenses_incremental');
    }
};
