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
                    <form action="{{ URL::to('/data-gejala') }}" method="POST">
                        @csrf
                        <div class="mb-3 row">
                            <label for="namagejala" class="col-sm-2 col-form-label">Nama Gejala</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error('namagejala') is-invalid @enderror"
                                    placeholder="Masukkan gejala baru..." id="namagejala" name="namagejala">
                                @error('namagejala')
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
