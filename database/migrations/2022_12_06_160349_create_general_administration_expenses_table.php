<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('general_administration_expenses', function (Blueprint $table) {
            $table->id();
            $table->integer('project_id');
            $table->integer('admin_expenses_id');
            $table->string('type');
            $table->string('value');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('general_administration_expenses');
    }
};
