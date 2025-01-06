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
        Schema::table('payslip_head_settings', function (Blueprint $table) {
            $table->integer('place_total_benefit')->nullable();
            $table->integer('place_total_deduction')->nullable();
            $table->integer('place_total_installment')->nullable();
            $table->integer('place_net_paid')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('payslip_head_settings', function (Blueprint $table) {
            //
        });
    }
};
