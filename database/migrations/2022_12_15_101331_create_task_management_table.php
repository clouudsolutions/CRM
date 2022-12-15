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
        Schema::create('task_management', function (Blueprint $table) {
            $table->id();
            $table->string('task_name');
            $table->string('task_description');
            $table->string('date');
            $table->string('time');
            $table->string('reminder');
            $table->string('assignee');
            $table->json('sharing')->nullable();
            $table->string('followers');
            $table->string('tags');
            $table->string('client_project');
            $table->string('priority');
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
        Schema::dropIfExists('task_management');
    }
};
