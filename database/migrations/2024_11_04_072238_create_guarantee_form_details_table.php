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
        Schema::create('guarantee_form_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('gurantee_form_id')->constrained('guarantee_forms');
            $table->foreignId('editor_id')->constrained('users');
            $table->string('editor_name')->nullable();
            $table->string('comment')->nullable();
            $table->integer('old_status')->nullable();
            $table->integer('new_status');
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
        Schema::dropIfExists('guarantee_form_details');
    }
};
