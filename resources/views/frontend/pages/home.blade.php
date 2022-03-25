@extends('frontend.index')

@section('content-wrapper')
    <div class="d-flex justify-content-center align-items-center log-in">
        <div>
            <div class="container p-0 text-center">
                <div class="lh-1 fw-bolder title-home mb-5">
                    <p class="fs-1 title-one">SELAMAT DATANG</p>
                    <p class="fs-1 title-two">DI</p>
                    <div class="text-white long-text">
                        <p class="fs-2 fw-bolder text-break">Aplikasi Sistem Pakar Dalam Mendiagnosa Penyakit Abses Gigi Pada
                            Anak
                        </p>
                    </div>
                </div>
                <a href="{{ URL::to('/konsultasi') }}" class="btn btn-primary">Mulai Konsultasi</a>
            </div>
        </div>
    </div>
@endsection
