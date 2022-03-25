@extends('frontend.index')

@section('content-wrapper')
    <div class="container">
        <div class="card mb-3">
            <img src="https://i.pinimg.com/736x/76/3d/3e/763d3ec52dc86e6fa5f9fa814dac2846.jpg" class="card-img-top"
                alt="...">
            <div class="card-body">
                <h2 class="fw-bold text-center mb-4">Tentang</h2>
                <p class="text-justify">
                    Sistem Pakar adalah aplikasi berbasis komputer yang digunakan untuk
                    menyelesaikan masalah sebagaimana yang dipikirkan oleh pakar. Pakar yang
                    dimaksud adalah orang yang mempunyai keahlian khusus yang dapat
                    menyelesaikan masalah yang tidak dapat diselesaikan oleh orang awam. Sebagai
                    contoh, dokter adalah seorang pakar yang mampu mendiagnosia penyakit yang
                    diderita pasien serta dapat memberikan penjelasan terhadap penyakit tersebut.
                </p>
                <p class="text-justify">
                    Sistem Pakar juga merupakan program artificial intellegence yang
                    menggabungkan pangkalan pengetahuan (Knowledge Base) dengan sistem
                    inferensi. Ini merupakan bagian software spesialisasi tingkat tinggi yang berusaha
                    menduplikasikan fungsi seorang pakar dalam suatu bidang keahlian. Program ini
                    bertidak sebagai seorang konsultan yang cerdas atau penasihat dalam suatu
                    lingkungan keahlian tertentu [7]. Tujuan dari Sistem Pakar adalah untuk
                    mentransfer keahlian dari seorang pakar ke dalam komputer kemudian ke
                    masyarakat. Proses ini meliputi empat kegiatan, yaitu perolehan pengetahuan (dari
                    para ahli atau sumber-sumber lainnya), representasi pengetahuan ke komputer,
                    kesimpulan dari pengetahuan dan pengalihan pengetahuan ke pengguna. Hal yang
                    unik dari Sistem Pakar adalah kemampuan untuk menjelaskan dimana keahlian
                    tersimpan dalam basis pengetahuan. Kemampuan komputer untuk mengambil
                    kesimpulan dilakukan oleh komponen yang dikenal sebagai mesin inferensi yaitu
                    meliputi prosedur tentang pemecahan masalah. Sistem Pakar yang dibuat
                    merupakan sistem yang berdasarkan pada aturan-aturan dimana program
                    disimpan dalam bentuk aturan-aturan sebagai prosedur pemecahan masalah.
                    Aturan tersebut biasanya berbentuk IF-THEN.
                </p>
                <p class="text-justify">
                    Secara umum, ada empat orang yang terlibat dalam pembuatan Sistem Pakar ,
                    yaitu [8]:
                <table class="table">
                    <tbody>
                        <tr>
                            <td>1.</td>
                            <td>Pakar</td>
                            <td>
                                Pakar/ahli (expert) adalah seorang yang memiliki pengetahuan khusus,
                                pandangan, pengalaman dan metode yang mendukung kemampuan untuk
                                memberikan saran dan penyelesaian masalah.
                            </td>
                        </tr>
                        <tr>
                            <td>2.</td>
                            <td>Perekayasaan pengetahuan</td>
                            <td>
                                Perekayasaan pengetahuan (knowledge enginer) adalah seorang yang berperan
                                dalam menerjemahkan pengetahuan seorang pakar sehingga pengetahuan
                                tersebut dapat digunakan oleh sistem komputer. Umumnya, seorang yang
                                menerjemahkan pengetahuan juga berperan sebagai pembuat sistem (system
                                builder).
                            </td>
                        </tr>
                        <tr>
                            <td>3.</td>
                            <td>Pemakai</td>
                            <td>
                                Pemakai (user) adalah seseorang yang berkonsultasi dengan sistem pakar untuk
                                mendapatkan saran dan solusi dari seorang pakar.
                            </td>
                        </tr>
                    </tbody>
                </table>
                </p>
            </div>
        </div>
    </div>
@endsection
