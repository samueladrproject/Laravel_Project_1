@extends('backend.index')
@section('content-wrapper')
    <div class="row">
        <div class="col-xl col-lg">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between bg-primary">
                    <h6 class="m-0 font-weight-bold text-white">Tambah {{ $titlePage }}</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <form action="{{ URL::to('/data-aturan') }}" method="POST">
                        @csrf
                        <div class="mb-3 row">
                            <label for="namapenyakit" class="col-sm-2 col-form-label">Nama Penyakit</label>
                            <div class="col-sm-10">
                                <select class="form-select @error('namapenyakit') is-invalid @enderror" id="namapenyakit"
                                    name="namapenyakit">
                                    @if (old('namapenyakit') == null)
                                        <option selected disabled>Open this select menu</option>
                                        @foreach ($dataPenyakit as $penyakit)
                                            <option value="{{ $penyakit->nama_penyakit }}">
                                                {{ $penyakit->nama_penyakit }}</option>
                                        @endforeach
                                    @else
                                        <option disabled>Open this select menu</option>
                                        @foreach ($dataPenyakit as $penyakit)
                                            <option value="{{ $penyakit->nama_penyakit }}"
                                                {{ old('namapenyakit') == $penyakit->nama_penyakit ? 'selected' : '' }}>
                                                {{ $penyakit->nama_penyakit }}</option>
                                        @endforeach
                                    @endif
                                </select>
                                @error('namapenyakit')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="namagejala" class="col-sm-2 col-form-label">Nama Gejala</label>
                            <div class="col-sm-10">
                                <select class="form-select @error('namagejala') is-invalid @enderror" id="namagejala"
                                    name="namagejala">
                                    @if (old('namagejala') == null)
                                        <option selected disabled>Open this select menu</option>
                                        @foreach ($dataGejala as $gejala)
                                            <option value="{{ $gejala->nama_gejala }}">
                                                {{ $gejala->nama_gejala }}</option>
                                        @endforeach
                                    @else
                                        <option disabled>Open this select menu</option>
                                        @foreach ($dataGejala as $gejala)
                                            <option value="{{ $gejala->nama_gejala }}"
                                                {{ old('namagejala') == $gejala->nama_gejala ? 'selected' : '' }}>
                                                {{ $gejala->nama_gejala }}</option>
                                        @endforeach
                                    @endif
                                </select>
                                @error('namagejala')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="nilaimb" class="col-sm-2 col-form-label">Nilai MB</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control @error('nilaimb') is-invalid @enderror"
                                    id="nilaimb" name="nilaimb" value="{{ old('nilaimb') }}" step=".01">
                                @error('nilaimb')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="nilaimd" class="col-sm-2 col-form-label">Nilai MD</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control @error('nilaimd') is-invalid @enderror"
                                    id="nilaimd" name="nilaimd" value="{{ old('nilaimd') }}" step=".01">
                                @error('nilaimd')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
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
    </div>
@endsection
