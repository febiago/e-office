@extends('layouts.app')

@section('title', 'Kegiatan')

@push('style')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap4.min.css">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Kegiatan</h1>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <form id="filterForm">
                                    <div class="form-row">
                                        <div class="form-group col-md-2" >
                                            <label for="tanggal_awal" class="control-label">Tanggal Awal</label>
                                            <input class="form-control" type="date" id="tanggal_awal" name="tanggal_awal">
                                        </div>
                                        <div class="form-group col-md-2" >
                                            <label for="tannggal-akhir" class="control-label">Tanggal Akhir</label>
                                            <input class="form-control" type="date" id="tanggal_akhir" name="tanggal_akhir">
                                        </div>
                                        <div class="form-group col-md-3" >
                                            <br>
                                            <button class="btn btn-info mb-2" type="submit">Filter</button>
                                        </div>
                                    </div>
                                </form>
                                    <table id="table-1" class="table-striped table">
                                        <thead>
                                            <tr>
                                                <th>Tanggal</th>
                                                <th>Deskripsi</th>
                                                <!-- Kolom lainnya -->
                                            </tr>
                                        </thead>
                                        <tbody></tbody>
                                    </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@push('scripts')
    <script>
        $(document).ready(function() {
            // Mengirim permintaan filter menggunakan Ajax saat form disubmit
            $('#filterForm').submit(function(event) {
                event.preventDefault(); // Mencegah form submit secara default

                var tanggalAwal = $('#tanggal_awal').val(); // Mengambil tanggal awal dari input
                var tanggalAkhir = $('#tanggal_akhir').val(); // Mengambil tanggal akhir dari input

                // Mengirim permintaan filter menggunakan Ajax
                $.ajax({
                    url: '/rekap/filter',
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        tanggal_awal: tanggalAwal,
                        tanggal_akhir: tanggalAkhir
                    },
                    success: function(response) {
                        var tbody = $('#table-1 tbody');
                        tbody.empty();

                        $.each(response, function(index, sppd) {
                            var row = $('<tr>');
                            row.append($('<td>').text(sppd.kegiatan.nama));
                            row.append($('<td>').text(sppd.jenis_sppd_sum_biaya));
                            
                            tbody.append(row);
                        });
                    }
                });
            });
        });
    </script>

    <!-- JS Libraies -->
    <script src="{{ asset('library/datatables/media/js/jquery.dataTables.min.js') }}"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{ asset('library/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('library/jquery-ui-dist/jquery-ui.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/modules-datatables.js') }}"></script>
@endpush
