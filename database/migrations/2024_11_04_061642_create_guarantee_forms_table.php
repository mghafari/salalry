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
        Schema::create('guarantee_forms', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->string('price');
            $table->string('bank_or_institution');
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('nationale_id')->nullable();
            $table->foreignId('status_id')->constrained('guarantee_form_statuses');
            $table->foreignId('active_status_id')->constrained('guarantee_form_statuses');
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
        Schema::dropIfExists('guarantee_forms');
    }
};
