@extends('layouts.app')

@section('title', 'SPPD')

@push('style')
    <link rel="stylesheet" href="{{ asset('library/datatables/media/css/jquery.dataTables.min.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Tambah Perjalanan Dinas</h1>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>HTML5 Form Basic</h4>
                            </div>
                            <div class="card-body">
                            {!! Form::open(['url' => '/sppd/create']) !!}
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    {!! Form::label('no_spt', 'No SPT') !!}
                                    {!! Form::select('no_spt', $sppds, null, ['class' => 'form-control select2', 'placeholder' => 'Pilih No SPT']) !!}
                                </div>
                                <div class="form-group col-md-6" >
                                    <label for="name" class="control-label">Asal Surat</label>
                                    <input type="text" class="form-control" id="pengirim" name="pengirim" required>
                                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-pengirim"></div>
                                </div>
                            </div>
                            
                              <button type="submit" class="btn btn-primary">Submit</button>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')

    <!-- JS Libraies -->
    <script src="{{ asset('library/datatables/media/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('library/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="{{ asset('library/jquery-ui-dist/jquery-ui.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/modules-datatables.js') }}"></script>
@endpush
