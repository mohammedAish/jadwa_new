<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('project_selling_and_marketing_expenses', function (Blueprint $table) {
            $table->id();
            $table->integer('project_id');
            $table->string('title')->nullable();
            $table->string('type');
            $table->string('value');
            $table->string('incremental');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('project_selling_and_marketing_expenses');
    }
};
