@extends('backend.index')
@section('content-wrapper')
    <div class="row">
        @if (session()->has('success'))
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
                    {{ session('success') }}
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <!-- Area Chart -->
        <div class="col-xl-8 col-lg-7">
            <table class="table table-bordered">
                <thead class="bg-primary">
                    <tr>
                        <th class="text-white">No</th>
                        <th class="text-white">Tanggal</th>
                        <th class="text-white">Nama Pasien</th>
                        <th class="text-white">Alamat Pasien</th>
                        <th class="text-white">No.HP Pasien</th>
                        <th class="text-white">Penyakit</th>
                        <th class="text-white text-center">Probabilitas</th>
                        <th class="text-white text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i = 1;
                    @endphp
                    @foreach ($tabelRiwayat as $riwayat)
                        <tr>
                            <td>{{ $i }}</td>
                            <td>{{ $riwayat['tanggal_periksa'] }}</td>
                            <td>{{ $riwayat['nama_user'] }}</td>
                            <td>{{ $riwayat['alamat_user'] }}</td>
                            <td>{{ $riwayat['no_hp'] }}</td>
                            <td>{{ $riwayat['nama_penyakit'] }}</td>
                            <td>{{ $riwayat['probabilitas'] }}</td>
                            <td class="text-center">
                                <a href="{{ URL::to('/konsultasi' . '/' . Crypt::encryptString($riwayat['kode_user'])) }}"
                                    class="btn btn-secondary">Detail</a>
                                <form action="{{ URL::to('/data-riwayat') }}" method="post" class="d-inline">
                                    @csrf
                                    <input type="hidden" name="kode_user" value="{{ $riwayat['kode_user'] }}" />
                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                </form>
                            </td>
                        </tr>

                        @php
                            $i++;
                        @endphp
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Pie Chart -->
        <div class="col-xl-4 col-lg-5">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between bg-primary">
                    <h6 class="m-0 font-weight-bold text-white"><i class="fas fa-chart-pie mr-1"></i> Grafik</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-pie pt-4 pb-2">
                        <canvas id="myPieChart"></canvas>
                    </div>
                    <div class="mt-4 text-center small">
                        <span class="mr-2">
                            <i class="fas fa-circle text-primary"></i> Abses Periapikal
                        </span>
                        <span class="mr-2">
                            <i class="fas fa-circle text-success"></i> Abses Gingiva
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
