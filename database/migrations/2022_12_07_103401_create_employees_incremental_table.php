<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('employees_incremental', function (Blueprint $table) {
            $table->id();
            $table->integer('employee_id');
            $table->string('year');
            $table->string('headcount');
            $table->string('incremental_salary');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('employees_incremental');
    }
};
