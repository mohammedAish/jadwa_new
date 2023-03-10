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
        Schema::create('fs_account_receivables', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('project_id')->unique();
            $table->integer('account_receivable');
            $table->integer('account_payable');
            $table->integer('inventory');
            $table->foreign('project_id')->references('id')->on('projects')->cascadeOnDelete();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fs_account_receivables');
    }
};
