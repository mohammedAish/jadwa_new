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
        Schema::create('balance_projects', function (Blueprint $table) {
            $table->id();
            $table->integer('project_id');
            $table->string('item');
            $table->integer('cost');
            $table->integer('quantity');
            $table->integer('depreciation');
            $table->enum('balance_type',['equipment_buildings','transport','equipments','furniture','intangible_assets','other_assets','reserve']);
            $table->integer('purchase_year');
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
        Schema::dropIfExists('balance_projects');
    }
};
