@extends('layouts.app')

@section('title', 'Blank Page')

@push('style')
    <link rel="stylesheet" href="{{ asset('library/datatables/media/css/jquery.dataTables.min.css') }}">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script>
        var dateInput = document.getElementById("dateInput").value;
        var newDateFormat = changeDateFormat(dateInput);
        document.getElementById("tgl_surat").value = newDateFormat;
    </script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Blank Page</h1>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Basic DataTables</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <a href="javascript:void(0)" class="btn btn-success mb-2" id="btn-create-masuk">TAMBAH</a>
                                <table class="table-striped table"
                                    id="table-1">
                                    <thead>
                                        <tr>
                                            <th class="text-center">
                                                No
                                            </th>
                                            <th>No Surat</th>
                                            <th>Tanggal</th>
                                            <th>Perihal</th>
                                            <th>Asal Surat</th>
                                            <th>Tanggal Penerimaan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody id="table-masuk">
                                    @foreach($smasuk as $masuk)
                                        <tr id="index_{{ $masuk->id }}">
                                            <td>{{ $masuk->no_surat }}</td>
                                            <td>{{ $masuk->tgl_surat }}</td>
                                            <td>{{ $masuk->perihal }}</td>
                                            <td>{{ $masuk->pengirim }}</td>
                                            <td>{{ $masuk->tgl_diterima }}</td>
                                            <td class="text-center">
                                                <a href="javascript:void(0)" id="btn-edit-masuk" data-id="{{ $masuk->id }}" class="btn btn-primary btn-sm">EDIT</a>
                                                <a href="javascript:void(0)" id="btn-delete-masuk" data-id="{{ $masuk->id }}" class="btn btn-danger btn-sm">DELETE</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

<!-- Modal -->
    <div class="modal fade" id="masuk-create" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">TAMBAH SURAT MASUK</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @csrf
                <div class="form-row">
                    <div class="form-group col-md-6" >
                        <label for="name" class="control-label">No Surat</label>
                        <input type="text" class="form-control @error('no_surat') is-invalid @enderror" id="no_surat" name="no_surat" required>
                        @error('no_surat')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group col-md-6" >
                        <label for="name" class="control-label">Asal Surat</label>
                        <input type="text" class="form-control @error('pengirim') is-invalid @enderror" id="pengirim" name="pengirim" required>
                        @error('pengirim')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-3" >
                        <label for="name" class="control-label">Tanggal Surat</label>
                        <input name="tgl_surat" id="tgl_surat" type="date" class="form-control datepicker @error('tgl_surat') is-invalid @enderror" required>
                        @error('tgl_surat')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group col-md-3" >
                        <label for="name" class="control-label">Tanggal Diterima</label>
                        <input name="tgl_diterima" id="tgl_diterima" type="date" class="form-control datepicker @error('tgl_diterima') is-invalid @enderror" required>
                        @error('tgl_diterima')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group col-md-6" >
                        <label for="name" class="control-label">Perihal</label>
                        <input type="text" class="form-control @error('perihal') is-invalid @enderror" id="perihal" name="perihal" required>
                        @error('perihal')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6" >
                        <label for="name" class="control-label">Ditujukan</label>
                        <input type="text" class="form-control @error('ditujukan') is-invalid @enderror" id="ditujukan" name="ditujukan" required>
                        @error('ditujukan')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group col-md-6" >
                        <label for="name" class="control-label">Keterangan</label>
                        <input type="text" class="form-control @error('keterangan') is-invalid @enderror" id="keterangan" name="keterangan">
                        @error('keterangan')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6" >
                        <label for="name" class="control-label">Kategori</label>
                        <input type="text" class="form-control @error('kategori') is-invalid @enderror" id="kategori" name="kategori">
                        @error('kategori')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group col-md-6" >
                        <label for="name" class="control-label">Gambar</label>
                        <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image">
                        @error('image')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">TUTUP</button>
                    <button type="button" class="btn btn-primary" id="store">SIMPAN</button>
                </div>
            
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
    //button create post event
    $('body').on('click', '#btn-create-masuk', function () {

    //open modal
    $('#masuk-create').modal('show');
    });

    //action create post
    $('#store').click(function(e) {
        $.ajaxSetup({
          headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        e.preventDefault();
        //define variable
        let no_surat        = $('#no_surat').val();
        let pengirim        = $('#pengirim').val();
        let perihal         = $('#perihal').val();
        let tgl_surat       = $('#tgl_surat').val();
        let tgl_diterima    = $('#tgl_diterima').val();
        let ditujukan       = $('#ditujukan').val();
        let kategori        = $('#kategori').val();
        let keterangan      = $('#keterangan').val();
        let image           = $('#image').val();
        let token           = $("meta[name='csrf-token']").attr("content");
        
        //ajax
        $.ajax({
            url: '/surat-masuk',
            type: "POST",
            cache: false,
            data: {
                "no_surat"      :no_surat,
                "pengirim"      :pengirim,
                "perihal"       :perihal,
                "tgl_surat"     :tgl_surat,
                "tgl_diterima"  :tgl_diterima,
                "ditujukan"     :ditujukan,
                "kategori"      :kategori,
                "keterangan"    :keterangan,
                "image"         :image,
                "_token"        :token
            },
            success:function(response){

                //show success message
                Swal.fire({
                    type: 'success',
                    icon: 'success',
                    title: `${response.message}`,
                    showConfirmButton: false,
                    timer: 3000
                });

                //data post
                let smasuk = `
                    <tr id="index_${response.data.id}">
                        <td>${response.data.no_surat}</td>
                        <td>${response.data.pengirim}</td>
                        <td>${response.data.perihal}</td>
                        <td>${response.data.tgl_surat}</td>
                        <td>${response.data.tgl_diterima}</td>
                        <td>${response.data.ditujukan}</td>
                        <td>${response.data.kategori}</td>
                        <td>${response.data.keterangan}</td>
                        <td>${response.data.image}</td>
                        <td class="text-center">
                            <a href="javascript:void(0)" id="btn-edit-post" data-id="${response.data.id}" class="btn btn-primary btn-sm">EDIT</a>
                            <a href="javascript:void(0)" id="btn-delete-post" data-id="${response.data.id}" class="btn btn-danger btn-sm">DELETE</a>
                        </td>
                    </tr>
                `;
                
                //append to table
                $('#table-masuk').prepend(smasuk);
                
                //clear form
                $('#no_surat').val('');
                $('#pengirim').val('');
                $('#perihal').val('');
                $('#tgl_surat').val('');
                $('#tgl_diterima').val('');
                $('#ditujukan').val('');
                $('#kategori').val('');
                $('#keterangan').val('');
                $('#image').val('');

                //close modal
                $('#masuk-create').modal('hide');
                
            },
            error:function(error){
                
                if(error.responseJSON.title[0]) {

                    //show alert
                    $('#alert-no_surat').removeClass('d-none');
                    $('#alert-no_surat').addClass('d-block');

                    //add message to alert
                    $('#alert-no_surat').html(error.responseJSON.no_surat[0]);
                } 
            }

        });

    });

</script>

    <!-- JS Libraies -->
    <script src="assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
    <script src="assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js"></script>
    <script src="{{ asset('library/datatables/media/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('library/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('library/jquery-ui-dist/jquery-ui.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/modules-datatables.js') }}"></script>
@endpush
