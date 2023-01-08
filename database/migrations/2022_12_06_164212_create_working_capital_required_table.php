<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('working_capital_required', function (Blueprint $table) {
            $table->id();
            $table->integer('project_id');
            $table->string('cogs');
            $table->string('rent');
            $table->string('salaries');
            $table->string('selling_and_marketing_expenses');
            $table->string('general_and_admin_expenses');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('working_capital_required');
    }
};
