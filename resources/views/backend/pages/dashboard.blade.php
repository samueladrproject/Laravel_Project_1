@extends('backend.index')
@section('content-wrapper')
    <!-- Content Row -->
    <div class="row">
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card shadow h-100 bg-success">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="h4 mb-3 font-weight-bold text-white">{{ $dataDashboard['totalPenyakit'] }}</div>
                            <div class="text-xs font-weight-bold text-white text-uppercase mb-1">
                                Total Penyakit</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-bug fa-4x text-gray" style="opacity: 0.5;"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card shadow h-100 bg-info">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="h4 mb-3 font-weight-bold text-white">{{ $dataDashboard['totalGejala'] }}</div>
                            <div class="text-xs font-weight-bold text-white text-uppercase mb-1">
                                Total Gejala</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-vial fa-4x text-gray" style="opacity: 0.5;"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card shadow h-100 bg-warning">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="h4 mb-3 font-weight-bold text-white">{{ $dataDashboard['totalAturan'] }}</div>
                            <div class="text-xs font-weight-bold text-white text-uppercase mb-1">
                                Total Aturan</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-recycle fa-4x text-gray" style="opacity: 0.5;"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card shadow h-100" style="background-color: #ff4545">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="h4 mb-3 font-weight-bold text-white">{{ $dataDashboard['totalUser'] }}</div>
                            <div class="text-xs font-weight-bold text-white text-uppercase mb-1">
                                Total User</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-4x text-gray" style="opacity: 0.5;"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
