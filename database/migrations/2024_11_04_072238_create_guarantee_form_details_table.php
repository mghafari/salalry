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
            $table->string('comment');
            $table->foreignId('old_status')->constrained('guarantee_form_statuses')->nullable();
            $table->foreignId('new_status')->constrained('guarantee_form_statuses');
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
