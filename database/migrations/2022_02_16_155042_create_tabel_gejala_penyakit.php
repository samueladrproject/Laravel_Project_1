<?php

use Carbon\Carbon;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
        Schema::create('tabel_gejala_penyakit', function (Blueprint $table) {
            $table->id('id_gejala');
            $table->string('nama_gejala');
            $table->timestamps();
        });

        $insertedData = [
            [
                'nama_gejala' => 'Demam',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'nama_gejala' => 'Terdapat nanah pada gigi anak',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'nama_gejala' => 'Terjadi perubahan warna pada gigi (berwarna gelap)',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'nama_gejala' => 'Sensitif pada tekanan saat mengunyah dan menggigit',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'nama_gejala' => 'Sensitif pada suhu panas dan dingin',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'nama_gejala' => 'Terjadi pembengkakan pada wajah dan pipi',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'nama_gejala' => 'Gigi anak terasa nyeri dan berdenyut yang dapat menyebar ke tulang rahang, leher dan telinga',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'nama_gejala' => 'Pembengkakan kelenjar getah bening dibawah rahang',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'nama_gejala' => 'Bau mulut',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'nama_gejala' => 'Anak sulit menelan',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'nama_gejala' => 'Gigi berlubang',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'nama_gejala' => 'Gigi pada anak terasa goyang',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'nama_gejala' => 'Gusi mengkilat, bengkak, dan merah',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'nama_gejala' => 'Tumbuhnya akar dibagian bawah gusi',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ];

        DB::table('tabel_gejala_penyakit')->insert($insertedData);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tabel_gejala_penyakit');
    }
};
