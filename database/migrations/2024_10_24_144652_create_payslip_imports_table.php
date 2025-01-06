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
        Schema::create('payslip_imports', function (Blueprint $table) {
            $table->id();
            $table->integer('index');
            $table->string('value')->nullable();
            $table->foreignId('payslip_head_import_id')->constrained('payslip_head_imports');
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
        Schema::dropIfExists('payslip_imports');
    }
};
