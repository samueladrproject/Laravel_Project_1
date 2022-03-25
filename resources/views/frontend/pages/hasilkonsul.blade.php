@extends('frontend.index')

@section('content-wrapper')
    <div class="container">
        <div class="card">
            <div class="card-header bg-primary">
                <p class="text-white fw-bold m-0 p-0">Hasil Konsultasi</p>
            </div>
            <div class="card-body">
                @if (session()->has('success') && session()->has('message') && session()->has('kodepasien'))
                    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                        <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                            <path
                                d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                        </symbol>
                        <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
                            <path
                                d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z" />
                        </symbol>
                        <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                            <path
                                d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                        </symbol>
                    </svg>
                    <div class="alert alert-success alert-dismissible d-flex align-items-center fade show" role="alert">
                        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:">
                            <use xlink:href="#check-circle-fill" />
                        </svg>
                        <div>
                            {{ session('success') . ' ' . session('message') . ' ' }}<b>{{ session('kodepasien') }}</b>
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <div class="d-grid gap-2 d-md-flex justify-content-md-end mb-3">
                    <button class="btn btn-primary" type="button" onclick="printDiv('laporanprint');"><i
                            class="fas fa-print mr-1"></i> Print</button>
                </div>
                <div id="laporanprint">
                    <h3 class="text-center fw-bold mb-5" style="font-weight: bold;">HASIL KONSULTASI</h3>
                    <div class="mb-3 row">
                        <div class="col-sm-4">
                            <div class="mb-3">
                                <label for="namapasien" class="form-label" style="font-weight: bold;">Nama
                                    Pasien</label>
                                <input type="text" readonly class="form-control-plaintext" id="namapasien"
                                    value="{{ $namaPasien }}">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="mb-3">
                                <label for="alamatpasien" class="form-label" style="font-weight: bold;">Alamat
                                    Pasien</label>
                                <textarea class="form-control-plaintext" readonly id="alamatpasien"
                                    rows="3">{{ $alamatPasien }}</textarea>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="mb-3">
                                <label for="nohppasien" class="form-label" style="font-weight: bold;">No. HP
                                    Pasien</label>
                                <input type="text" readonly class="form-control-plaintext" id="nohppasien"
                                    value="{{ $nohpPasien }}">
                            </div>
                        </div>
                    </div>
                    <div class="card mb-3">
                        <div class="card-body p-0" style="border: 2px solid #ff00f7;">
                            <table class="table table-bordered" style="width: 100%; margin-bottom: 0;">
                                <thead>
                                    <tr style="background-color: #ff00f7;">
                                        <th class="text-white text-center m-0 p-0 py-2" style="width:5% ;">No</th>
                                        <th class="text-white text-center">Gejala yang dialami</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i = 1;
                                    @endphp
                                    @foreach ($hasilGejala as $gejala)
                                        <tr>
                                            <td>{{ $i }}</td>
                                            <td>{{ $gejala }}</td>
                                        </tr>
                                        @php
                                            $i++;
                                        @endphp
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card mb-3">
                        <div class="card-header bg-success">
                            <p class="text-white fw-bold m-0 p-0">Diagnosis Penyakit</p>
                        </div>
                        <div class="card-body" style="border: 2px solid #198754;">
                            <p class="m-0 p-0 text-success"><b>{{ $namaPenyakit }}</b> /
                                {{ $persentasePenyakit . ' % ' . '(' . $probabilitas . ')' }}
                            </p>
                        </div>
                    </div>
                    <div class="card mb-3">
                        <div class="card-header" style="background: #0d6efd;">
                            <p class="text-white fw-bold m-0 p-0">Detail Penyakit</p>
                        </div>
                        <div class="card-body" style="border: 2px solid #0d6efd;">
                            <p class="text-justify m-0 p-0">
                                {{ $detailPenyakit }}
                            </p>
                        </div>
                    </div>
                    <div class="card mb-3">
                        <div class="card-header bg-warning">
                            <p class="text-white fw-bold m-0 p-0">Saran Pengobatan</p>
                        </div>
                        <div class="card-body" style="border: 2px solid #ffc107;">
                            <pre>{{ $saranPenyakit }}</pre>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function printDiv(divName) {
            var printContents = document.getElementById(divName).innerHTML;

            var bootstrapContainer = "<!DOCTYPE html>";
            bootstrapContainer += "<html lang='en'>";
            bootstrapContainer += "<head>";
            bootstrapContainer += "<meta charset='UTF-8'>";
            bootstrapContainer += "<meta name='viewport' content='width=device-width, initial-scale=1.0'>";
            bootstrapContainer += "<meta http-equiv='X-UA-Compatible' content='ie=edge'>";
            bootstrapContainer +=
                "<link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC' crossorigin='anonymous'>";
            bootstrapContainer += "<title>Laporan Hasil Konsultasi</title>";
            bootstrapContainer += "</head>";
            bootstrapContainer += "<body>";
            bootstrapContainer += printContents;
            bootstrapContainer +=
                '<scr' +
                'ipt type="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"> integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"' +
                '</sc' + 'ript>';
            bootstrapContainer += "</body>";
            bootstrapContainer += "</html>";
            var w = window.open();
            w.document.write(bootstrapContainer);
            w.document.write('<scr' + 'ipt type="text/javascript">' +
                'window.onload = function() { window.print(); window.close(); };' + '</sc' + 'ript>'); //
            w.document.close(); // necessary for IE>= 10
            w.focus(); // necessary for IE >= 10
            return true;
        }
    </script>
@endsection
