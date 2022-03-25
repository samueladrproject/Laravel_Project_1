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
        Schema::create('tabel_data_penyakit', function (Blueprint $table) {
            $table->id('id_penyakit');
            $table->string('nama_penyakit');
            $table->longText('detail_penyakit');
            $table->longText('saran_penyakit');
            $table->timestamps();
        });

        $insertedData = [
            [
                'nama_penyakit' => 'Abses Periapikal',
                'detail_penyakit' => 'Abses periapikal merupakan suatu infeksi tulang aveloar kronis peradikular yang berjalan lama dan bertingkat rendah, dan sumber infeksi terdapat pada saluran akar.',
                'saran_penyakit' => 'Gunakan antibiotik amoxillin,paracetamol atau penisilin v untuk mengurangi rasa nyeri pada gigi anak; Berkumur dengan air garam; Oleskan bawang putih untuk meredakan rasa sakitnya karena bawang putih mengandung asam amino allicin yang berfungsi meredakan nyeri; Olesi dengan minyak cengkeh pada area gigi yang sakit karena terdapat senyawa antibakteri pada cengkeh yang dapat mencegah infeksi; Seduh the pepermint lalu biarkan selama 10-15 menit sebelum digunakan untuk anak berkumur; Jika abses gigi pada anak semakin parah,segera periksakan ke Dokter Gigi untuk ditangani.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'nama_penyakit' => 'Abses Gingiva',
                'detail_penyakit' => 'Abses gingiva adalah keadaan inflamasi akut, terlokalisir yang dapat berasal dari berbagai sumber, diantaranya infeksi bakteri plak, trauma, dan infeksi benda asing.',
                'saran_penyakit' => 'Berkumur dengan baking soda; Minum obat pereda nyeri seperti paracetamol,amoxillin atau penisilin v; Kompres dengan es batu agar peradangan dan pembengkakan pada gusi perlahan akan mereda; Haluskan bawang putih lalu campurkan dengan sedikit garam setelah itu aplikasikan dan gosok pelan pada bagian gusi; Jika abses gigi pada anak semakin parah,segera periksakan ke Dokter Gigi untuk ditangani.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ];

        DB::table('tabel_data_penyakit')->insert($insertedData);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tabel_data_penyakit');
    }
};
