<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('project_rent_and_utilities', function (Blueprint $table) {
            $table->id();
            $table->integer('project_id');
            $table->string('title');
            $table->string('type');
            $table->string('value');
            $table->string('incremental');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('project_rent_and_utilities');
    }
};
