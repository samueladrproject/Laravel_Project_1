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
        Schema::create('tabel_data_riwayat', function (Blueprint $table) {
            $table->id('id_riwayat');
            $table->bigInteger('id_user');
            $table->date('tanggal');
            $table->string('gejala');
            $table->longText('diagnosa');
            $table->longText('solusi');
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
        Schema::dropIfExists('tabel_data_riwayat');
    }
};
