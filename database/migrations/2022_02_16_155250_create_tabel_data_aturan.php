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
        Schema::create('tabel_data_aturan', function (Blueprint $table) {
            $table->id('id_aturan');
            $table->string('nama_penyakit');
            $table->string('nama_gejala');
            $table->float('nilai_MB');
            $table->float('nilai_MD');
            $table->timestamps();
        });

        $insertedData = [
            [
                'nama_penyakit' => 'Abses Periapikal',
                'nama_gejala' => 'Demam',
                'nilai_MB' => 0.57,
                'nilai_MD' => 0.57,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'nama_penyakit' => 'Abses Periapikal',
                'nama_gejala' => 'Terdapat nanah pada gigi anak',
                'nilai_MB' => 0.37,
                'nilai_MD' => 0.37,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'nama_penyakit' => 'Abses Periapikal',
                'nama_gejala' => 'Terjadi perubahan warna pada gigi (berwarna gelap)',
                'nilai_MB' => 0.15,
                'nilai_MD' => 0.15,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'nama_penyakit' => 'Abses Periapikal',
                'nama_gejala' => 'Sensitif pada tekanan saat mengunyah dan menggigit',
                'nilai_MB' => 0.37,
                'nilai_MD' => 0.37,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'nama_penyakit' => 'Abses Periapikal',
                'nama_gejala' => 'Sensitif pada suhu panas dan dingin',
                'nilai_MB' => 0.57,
                'nilai_MD' => 0.57,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'nama_penyakit' => 'Abses Periapikal',
                'nama_gejala' => 'Terjadi pembengkakan pada wajah dan pipi',
                'nilai_MB' => 0.15,
                'nilai_MD' => 0.15,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'nama_penyakit' => 'Abses Periapikal',
                'nama_gejala' => 'Gigi anak terasa nyeri dan berdenyut yang dapat menyebar ke tulang rahang, leher dan telinga',
                'nilai_MB' => 0.37,
                'nilai_MD' => 0.37,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'nama_penyakit' => 'Abses Periapikal',
                'nama_gejala' => 'Pembengkakan kelenjar getah bening dibawah rahang',
                'nilai_MB' => 0.15,
                'nilai_MD' => 0.15,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'nama_penyakit' => 'Abses Periapikal',
                'nama_gejala' => 'Bau mulut',
                'nilai_MB' => 0.37,
                'nilai_MD' => 0.37,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'nama_penyakit' => 'Abses Periapikal',
                'nama_gejala' => 'Anak sulit menelan',
                'nilai_MB' => 0.8,
                'nilai_MD' => 0.8,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'nama_penyakit' => 'Abses Periapikal',
                'nama_gejala' => 'Gigi berlubang',
                'nilai_MB' => 0.15,
                'nilai_MD' => 0.15,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'nama_penyakit' => 'Abses Periapikal',
                'nama_gejala' => 'Gigi pada anak terasa goyang',
                'nilai_MB' => 0.37,
                'nilai_MD' => 0.37,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'nama_penyakit' => 'Abses Gingiva',
                'nama_gejala' => 'Demam',
                'nilai_MB' => 0.78,
                'nilai_MD' => 0.78,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'nama_penyakit' => 'Abses Gingiva',
                'nama_gejala' => 'Terdapat nanah pada gigi anak',
                'nilai_MB' => 0.58,
                'nilai_MD' => 0.58,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'nama_penyakit' => 'Abses Gingiva',
                'nama_gejala' => 'Bau mulut',
                'nilai_MB' => 0.78,
                'nilai_MD' => 0.78,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'nama_penyakit' => 'Abses Gingiva',
                'nama_gejala' => 'Gusi mengkilat, bengkak, dan merah',
                'nilai_MB' => 0.36,
                'nilai_MD' => 0.36,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'nama_penyakit' => 'Abses Gingiva',
                'nama_gejala' => 'Tumbuhnya akar dibagian bawah gusi',
                'nilai_MB' => 0.6,
                'nilai_MD' => 0.6,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ];

        DB::table('tabel_data_aturan')->insert($insertedData);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tabel_data_aturan');
    }
};
