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
        Schema::create('payslip_settings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('payslip_head')->constrained('payslip_head_settings');
            $table->integer('index');
            $table->string('title');
            $table->integer('category');
            $table->boolean('visible_zero')->default(0);
            $table->boolean('status')->default(1);
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
        Schema::dropIfExists('payslip_settings');
    }
};
