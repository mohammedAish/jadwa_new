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
        Schema::create('project_compatitors', function (Blueprint $table) {
            $table->id();
            $table->string('compatitor_vector1');
            $table->string('compatitor_vector2');
            $table->string('compatitor1');
            $table->string('compatitor2');
            $table->string('compatitor3');
            $table->string('compatitor4');
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
        Schema::dropIfExists('project_compatitors');
    }
};
