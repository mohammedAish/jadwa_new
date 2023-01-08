<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('working_capital', function (Blueprint $table) {
            $table->id();
            $table->integer('project_id');
            $table->string('account_receivable');
            $table->string('account_payable');
            $table->string('inventory');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('working_capital');
    }
};
