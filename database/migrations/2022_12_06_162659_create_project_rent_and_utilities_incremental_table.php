<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('project_rent_and_utilities_incremental', function (Blueprint $table) {
            $table->id();
            $table->integer('rent_id');
            $table->string('year');
            $table->string('incremental_value');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('project_rent_and_utilities_incremental');
    }
};
