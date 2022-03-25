@extends('frontend.index')

@section('content-wrapper')
    <div class="container">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <b>Pencarian Data</b>
            </div>
            <div class="card-body">
                <form action="{{ URL::to('/konsultasi/pencarian') }}" method="POST" class="row g-3">
                    @csrf
                    <div class="col-auto">
                        <label for="staticEmail2" class="visually-hidden">Kode Pasien</label>
                        <input type="text" readonly disabled class="form-control-plaintext" id="staticEmail2"
                            value="Kode Pasien">
                    </div>
                    <div class="col-auto">
                        <input type="text" class="form-control" id="kode_pasien" name="kode_pasien"
                            placeholder="Masukkan Kode Pasien...">
                    </div>
                    <div class="col-auto">
                        <button type="submit" class="btn btn-primary mb-3">Cari</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="card">
            <div class="card-header bg-primary text-white">
                <b>Laman Konsultasi</b>
            </div>
            <div class="card-body">
                <form action="{{ URL::to('/konsultasi') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @if (session()->has('error'))
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
                        <div class="alert alert-danger alert-dismissible d-flex align-items-center fade show" role="alert">
                            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:">
                                <use xlink:href="#exclamation-triangle-fill" />
                            </svg>
                            <div>
                                {{ session('error') }}
                            </div>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                    @endif
                    <div class="mb-3 row">
                        <label for="namapasien" class="col-sm-2 col-form-label">Nama Pasien</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control @error('namapasien') is-invalid @enderror"
                                id="namapasien" name="namapasien" value="{{ old('namapasien') }}" autofocus>
                            @error('namapasien')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="alamatpasien" class="col-sm-2 col-form-label">Alamat Pasien</label>
                        <div class="col-sm-10">
                            <textarea class="form-control @error('alamatpasien') is-invalid @enderror" id="alamatpasien"
                                name="alamatpasien" rows="3">{{ old('alamatpasien') }}</textarea>
                            @error('alamatpasien')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="nohppasien" class="col-sm-2 col-form-label">No.HP Pasien</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control @error('nohppasien') is-invalid @enderror"
                                id="nohppasien" name="nohppasien" value="{{ old('nohppasien') }}" onkeypress="return isNumberKey(event)">
                            @error('nohppasien')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <table class="table table-bordered mb-3">
                        <thead class="bg-primary">
                            <tr>
                                <th class="text-white text-center">No</th>
                                <th class="text-white text-center">Kode</th>
                                <th class="text-white text-center">Gejala</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody class="bg-white">
                            @php
                                $i = 1;
                            @endphp
                            @foreach ($daftarGejala as $gejala)
                                <tr>
                                    <th class="text-center">{{ $i }}</th>
                                    <th class="text-center">{{ 'G' . $i }}</th>
                                    <th>{{ $gejala->nama_gejala }}</th>
                                    <th class="text-center">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="choiceRadio[]"
                                                value="{{ $gejala->nama_gejala }}">
                                        </div>
                                    </th>
                                </tr>
                                @php
                                    $i++;
                                @endphp
                            @endforeach
                        </tbody>
                    </table>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <button class="btn btn-secondary mr-md-2" type="reset"><i class="fas fa-ban mr-1"></i> Reset
                            Forms</button>
                        <button class="btn btn-primary" type="submit"><i class="fas fa-save mr-1"></i> Simpan
                            Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
