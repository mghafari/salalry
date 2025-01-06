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
            $table->integer('price');
            $table->string('bank_or_institution');
            $table->integer('registration_owner');
            $table->string('other_first_name')->nullable();
            $table->string('other_last_name')->nullable();
            $table->string('other_national_id')->nullable();
            $table->integer('status');
            $table->boolean('active_status')->default(false);
            $table->boolean('type_shajareh')->default(false);
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
