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
        Schema::create('forms', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable();
            $table->string('year')->nullable();
            $table->string('month')->nullable();
            $table->string('name')->nullable();
            $table->string('family')->nullable();
            $table->string('karkerd_adi')->nullable();
            $table->string('karkerd_moaser')->nullable();
            $table->string('gheybat')->nullable();
            $table->string('onvan')->nullable();
            $table->string('ezafekar')->nullable();
            $table->string('tatilkari')->nullable();
            $table->string('jomekari')->nullable();
            $table->string('haghmamoriat')->nullable();
            $table->string('haghtahol')->nullable();
            $table->string('hagholad')->nullable();
            $table->string('haghayabzahab')->nullable();
            $table->string('haghsarparasti')->nullable();
            $table->string('haghsanavat')->nullable();
            $table->string('haghmaskan')->nullable();
            $table->string('hoghoghpaye')->nullable();
            $table->string('bedehkaripersonel')->nullable();
            $table->string('jarime')->nullable();
            $table->string('jamekolmazayanakhales')->nullable();
            $table->string('khalesepardakhti')->nullable();
            $table->string('jahanfolad')->nullable();
            $table->string('maliyatmah')->nullable();
            $table->string('bimekarmand')->nullable();
            $table->string('bimekarfarma')->nullable();
            $table->string('bimetakmilikarmand')->nullable();
            $table->string('bimtakmilikarfarma')->nullable();
            $table->string('bimeomrkarmand')->nullable();
            $table->string('bimeomrkarfarma')->nullable();

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
        Schema::dropIfExists('forms');
    }
};
