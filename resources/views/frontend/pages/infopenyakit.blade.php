@extends('frontend.index')

@section('content-wrapper')
    <div class="container">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <b>Informasi Penyakit</b>
            </div>
            <div class="card-body">
                <div class="container-fluid row">
                    <div class="col-sm-6">
                        <div class="card mb-3" style="max-width: 540px;">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <img src="https://qph.fs.quoracdn.net/main-qimg-92bd054922e9c3b6bae17b3de0be246a-pjlq"
                                        class="img-fluid rounded-start" alt="...">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title fw-bold" style="color: #000;">Abses Periapikal</h5>
                                        <p class="card-text text-justify" style="color: #000;">
                                            Abses periapikal merupakan suatu infeksi tulang aveloar kronis peradikular yang
                                            berjalan lama dan bertingkat rendah, dan sumber infeksi terdapat pada saluran
                                            akar.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="card mb-3" style="max-width: 540px;">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <img src="https://idnmedis.com/wp-content/uploads/2020/03/jenis-abses-gigi.jpg"
                                        class="img-fluid rounded-start" alt="...">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title fw-bold" style="color: #000;">Abses Gingiva</h5>
                                        <p class="card-text text-justify" style="color: #000;">
                                            Abses gingiva adalah keadaan inflamasi akut, terlokalisir yang dapat berasal
                                            dari
                                            berbagai sumber, diantaranya infeksi bakteri plak, trauma, dan infeksi benda
                                            asin.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
