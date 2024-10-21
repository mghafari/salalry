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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('family');
            $table->string('mobile')->unique();
            $table->string('personal_code')->unique();
            $table->string('national_code')->unique();
            $table->string('account_no')->unique()->nullable();
            $table->string('ins_no')->unique()->nullable();
            $table->boolean('status')->default(1);
            $table->timestamp('sms_send_at')->nullable();
            $table->string('sms_code')->nullable();
            $table->string('role')->default('user');
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
        Schema::dropIfExists('users');
    }
};
