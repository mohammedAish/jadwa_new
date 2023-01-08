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
        Schema::create('system_contacts', function (Blueprint $table) {
            $table->id();
            $table->enum('type',['FaceBook','TWitter','Instagram','Tiktok','Snapchat','WhatsApp','YouTube','Email','Phone']);
            $table->string('title');
            $table->text('value');
            $table->softDeletes();
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
        Schema::dropIfExists('system_contacts');
    }
};
