@extends('layouts.app')

@section('title', 'Dashboard')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Dashboard</h1>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-primary">
                            <i class="far fa-user"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Surat Masuk</h4>
                            </div>
                            <div class="card-body">
                                {{ $smasuk }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-danger">
                            <i class="far fa-newspaper"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Surat Keluar</h4>
                            </div>
                            <div class="card-body">
                                {{ $skeluar }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-warning">
                            <i class="far fa-file"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Disposisi</h4>
                            </div>
                            <div class="card-body">
                                {{ $disposisi }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-success">
                            <i class="fas fa-circle"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>SPPD</h4>
                            </div>
                            <div class="card-body">
                                {{ $sppd }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-12 col-12 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Statistik Surat Masuk</h4>
                            <div class="card-header-action">
                                <div class="btn-group">
                                    <a href="#"
                                        class="btn btn-primary">Week</a>
                                    <a href="#"
                                        class="btn">Month</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <canvas id="myChart"
                                height="182">
                            </canvas>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-md-12 col-12 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Statistik Surat Keluar</h4>
                            <div class="card-header-action">
                                <div class="btn-group">
                                    <a href="#"
                                        class="btn btn-primary">Week</a>
                                    <a href="#"
                                        class="btn">Month</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <canvas id="myChart2"
                                height="182">
                            </canvas>
                        </div>
                    </div>
                </div>
                
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->
    <script src="{{ asset('library/chart.js/dist/Chart.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/index-0.js') }}"></script>
@endpush
