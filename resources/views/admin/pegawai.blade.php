@extends('layouts.app')

@section('title', 'Pegawai')

@push('style')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap4.min.css">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Pegawai</h1>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <button class="btn btn-success mb-2" id="btn-create-pegawai" data-toggle="modal" data-target="#pegawai-create">TAMBAH PEGAWAI</button>
                                <table class="table-striped table"
                                    id="table-1">
                                    <thead>
                                        <tr>
                                            <th class="text-center">No</th>
                                            <th>Nama</th>
                                            <th>NIP</th>
                                            <th>Pangkat</th>
                                            <th>Jabatan</th>
                                            <th>Kendaraan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody id="table-pegawai">
                                    @php
                                        use Carbon\Carbon;
                                    @endphp
                                    @foreach($pegawais as $pegawai)
                                        <tr id="index_{{ $pegawai->id }}">
                                            <td>{{ $loop->iteration + 1 }}</td>
                                            <td>{{ $pegawai->nama }}</td>
                                            <td>{{ $pegawai->nip }}</td>
                                            <td>{{ $pegawai->pangkat }}</td>
                                            <td>{{ $pegawai->jabatan }}</td>
                                            <td>{{ $pegawai->kendaraan }}</td>
                                            <td class="text-center">
                                                <a href="javascript:void(0)" id="btn-edit-pegawai" data-id="{{ $pegawai->id }}" class="btn btn-primary btn-sm"><i class="far fa-edit"></i></a>
                                                <a href="javascript:void(0)" id="btn-delete-pegawai" data-id="{{ $pegawai->id }}" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></a>
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
    <div class="modal fade" id="pegawai-create" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">TAMBAH PEGAWAI</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <form enctype="multipart/form-data">
                <div class="form-row">
                    <div class="form-group col-md-6" >
                        <label for="name" class="control-label">NAMA</label>
                        <input type="text" class="form-control" id="nama" name="nama" required>
                        <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-nama"></div>
                    </div>
                    <div class="form-group col-md-6" >
                        <label for="name" class="control-label">NIP</label>
                        <input type="text" class="form-control" id="nip" name="nip" required>
                        <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-nip"></div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6" >
                        <label for="pangkat" class="control-label">PANGKAT</label>
                        <select class="form-control" id="pangkat" name="pangkat">
                          <option value="I/a">Juru Muda (I/a)</option>
                          <option value="I/b">Juru Muda Tingkat I (I/b)</option>
                          <option value="I/c">Juru (I/c)</option>
                          <option value="I/d">Juru Tingkat I (I/d)</option>
                          <option value="II/a">Pengatur Muda (II/a)</option>
                          <option value="II/b">Pengatur Muda Tingkat I (II/b)</option>
                          <option value="II/c">Pengatur (II/c)</option>
                          <option value="II/d">Pengatur Tingkat I (II/d)</option>
                          <option value="III/a">Penata Muda (III/a)</option>
                          <option value="III/b">Penata Muda Tingkat I (III/b)</option>
                          <option value="III/c">Penata (III/c)</option>
                          <option value="III/d">Penata Tingkat I (III/d)</option>
                          <option value="IV/a">Pembina (IV/a)</option>
                          <option value="IV/b">Pembina Tingkat I (IV/b)</option>
                          <option value="IV/c">Pembina Utama Muda (IV/c)</option>
                          <option value="IV/d">Pembina Utama (IV/d)</option>
                        </select>
                        <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-pangkat"></div>
                    </div>
                    <div class="form-group col-md-6" >
                        <label for="name" class="control-label">JABATAN</label>
                        <input type="text" class="form-control" id="jabatan" name="jabatan" required>
                        <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-jabatan"></div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6" >
                        <label for="name" class="control-label">KENDARAAN</label>
                        <input type="text" class="form-control" id="kendaraan" name="kendaraan" required>
                        <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-kendaraan"></div>
                    </div>
                </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">TUTUP</button>
                    <button type="button" class="btn btn-primary" id="store">SIMPAN</button>
                </div>
            </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
    $(document).ready(function(){
        $('.btn-create-pegawai').click(function(){
           $('#pegawai-create').modal('show');
        });
    });

    $('#pegawai-create').on('hidden.bs.modal', function (e) {
      $('body').removeClass('modal-open');
      $('.modal-backdrop').remove();
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
            url: '/pegawai',
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
                $('#pegawai-create').modal('hide');

                setTimeout(function(){
		        	location.reload();
		        }, 500);
                
            },
            error:function(error){
                
                if(error.responseJSON.no_surat[0]) {

                    //show alert
                    $('#alert-no_surat').removeClass('d-none');
                    $('#alert-no_surat').addClass('d-block');

                    //add message to alert
                    $('#alert-no_surat').html(error.responseJSON.no_surat[0]);
                } 

                if(error.responseJSON.pengirim[0]) {

                    //show alert
                    $('#alert-pengirim').removeClass('d-none');
                    $('#alert-pengirim').addClass('d-block');

                    //add message to alert
                    $('#alert-pengirim').html(error.responseJSON.pengirim[0]);
                }
                if(error.responseJSON.perihal[0]) {

                    //show alert
                    $('#alert-perihal').removeClass('d-none');
                    $('#alert-perihal').addClass('d-block');

                    //add message to alert
                    $('#alert-perihal').html(error.responseJSON.perihal[0]);
                } 

                if(error.responseJSON.tgl_surat[0]) {

                    //show alert
                    $('#alert-tgl_surat').removeClass('d-none');
                    $('#alert-tgl_surat').addClass('d-block');

                    //add message to alert
                    $('#alert-tgl_surat').html(error.responseJSON.tgl_surat[0]);
                }

                if(error.responseJSON.tgl_diterima[0]) {

                    //show alert
                    $('#alert-tgl_diterima').removeClass('d-none');
                    $('#alert-tgl_diterima').addClass('d-block');

                    //add message to alert
                    $('#alert-tgl_diterima').html(error.responseJSON.tgl_diterima[0]);
                }
                
                if(error.responseJSON.ditujukan[0]) {

                    //show alert
                    $('#alert-ditujukan').removeClass('d-none');
                    $('#alert-ditujukan').addClass('d-block');

                    //add message to alert
                    $('#alert-ditujukan').html(error.responseJSON.ditujukan[0]);
                } 
            }

        });

    });
    </script>

    <!-- Modal -->
    <div class="modal fade" id="modal-edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">EDIT SURAT MASUK</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <input type="hidden" id="id_spegawai">

                    <div class="form-row">
                        <div class="form-group col-md-6" >
                            <label for="name" class="control-label">No Surat</label>
                            <input type="text" class="form-control" id="no_surat-edit">
                            <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-no_surat-edit"></div>
                        </div>
                        <div class="form-group col-md-6" >
                            <label for="name" class="control-label">Pengirim</label>
                            <input type="text" class="form-control" id="pengirim-edit">
                            <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-pengirim-edit"></div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-3" >
                            <label for="name" class="control-label">Tanggal Surat</label>
                            <input id="tgl_surat-edit" type="date" class="form-control" required>
                            <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-tgl_surat-edit"></div>
                        </div>
                        <div class="form-group col-md-3" >
                            <label for="name" class="control-label">Tanggal Diterima</label>
                            <input id="tgl_diterima-edit" type="date" class="form-control" required>
                            <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-tgl_diterima-edit"></div>
                        </div>
                        <div class="form-group col-md-6" >
                            <label for="name" class="control-label">Perihal</label>
                            <input type="text" class="form-control" id="perihal-edit" required>
                            <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-perihal-edit"></div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6" >
                            <label for="name" class="control-label">Ditujukan</label>
                            <input type="text" class="form-control" id="ditujukan-edit">
                            <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-ditujukan-edit"></div>
                        </div>
                        <div class="form-group col-md-6" >
                            <label for="name" class="control-label">Keterangan</label>
                            <input type="text" class="form-control" id="keterangan-edit">
                            <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-keterangan-edit"></div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">TUTUP</button>
                    <button type="button" class="btn btn-primary" id="update">UPDATE</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        //button create post event
        $(document).on('click', '#btn-edit-pegawai', function() {
            let id_spegawai = $(this).data('id');

            //fetch detail post with ajax
            $.ajax({
                url: `/pegawai/${id_spegawai}`,
                type: "GET",
                cache: false,
                success:function(response){

                    //fill data to form
                    $('#id_spegawai').val(response.data.id);
                    $('#no_surat-edit').val(response.data.no_surat);
                    $('#pengirim-edit').val(response.data.pengirim);
                    $('#perihal-edit').val(response.data.perihal);
                    $('#tgl_surat-edit').val(response.data.tgl_surat);
                    $('#tgl_diterima-edit').val(response.data.tgl_diterima);
                    $('#ditujukan-edit').val(response.data.ditujukan);
                    $('#keterangan-edit').val(response.data.keterangan);

                    //open modal
                    $('#modal-edit').modal('show');
                }
            });
        });

        //action update post
        $('#update').click(function(e) {
            e.preventDefault();

            //define variable
            let id_spegawai   = $('#id_spegawai').val();
            let no_surat    = $('#no_surat-edit').val();
            let pengirim    = $('#pengirim-edit').val();
            let perihal     = $('#perihal-edit').val();
            let tgl_surat   = $('#tgl_surat-edit').val();
            let tgl_diterima= $('#tgl_diterima-edit').val();
            let ditujukan   = $('#ditujukan-edit').val();
            let keterangan  = $('#keterangan-edit').val();
            let token       = $("meta[name='csrf-token']").attr("content");

            //ajax
            $.ajax({

                url: `/pegawai/${id_spegawai}`,
                type: "PUT",
                cache: false,
                data: {
                    "no_surat"      :no_surat,
                    "pengirim"      :pengirim,
                    "perihal"       :perihal,
                    "tgl_surat"     :tgl_surat,
                    "tgl_diterima"  :tgl_diterima,
                    "ditujukan"     :ditujukan,
                    "keterangan"    :keterangan,
                    "_token"        :token
                },
                success:function(response){

                    //show success message
                    Swal.fire({
                        type: 'success',
                        icon: 'success',
                        title: `${response.message}`,
                        showConfirmButton: false,
                        timer: 2000
                    });

                    //close modal
                    $('#modal-edit').modal('hide');

                 setTimeout(function(){
		         	location.reload();
		         }, 500);

                },
                error:function(error){

                    if(error.responseJSON.title[0]) {

                        //show alert
                        $('#alert-title-edit').removeClass('d-none');
                        $('#alert-title-edit').addClass('d-block');

                        //add message to alert
                        $('#alert-title-edit').html(error.responseJSON.title[0]);
                    } 

                    if(error.responseJSON.content[0]) {

                        //show alert
                        $('#alert-content-edit').removeClass('d-none');
                        $('#alert-content-edit').addClass('d-block');

                        //add message to alert
                        $('#alert-content-edit').html(error.responseJSON.content[0]);
                    } 
                }
            });
        });

    //button create post event
    $(document).on('click', '#btn-delete-pegawai', function() {

        let id_spegawai = $(this).data('id');
        let token   = $("meta[name='csrf-token']").attr("content");

        Swal.fire({
            title: 'Apakah Kamu Yakin?',
            text: "Ingin menghapus data ini!",
            icon: 'warning',
            showCancelButton: true,
            cancelButtonText: 'TIDAK',
            confirmButtonText: 'YA, HAPUS!'
        }).then((result) => {
            if (result.isConfirmed) {

                console.log('test');

                //fetch to delete data
                $.ajax({

                    url: `/pegawai/${id_spegawai}`,
                    type: "DELETE",
                    cache: false,
                    data: {
                        "_token": token
                    },
                    success:function(response){ 

                        //show success message
                        Swal.fire({
                            type: 'success',
                            icon: 'success',
                            title: `${response.message}`,
                            showConfirmButton: false,
                            timer: 2000
                        });

                        //remove post on table
                        $(`#index_${id_spegawai}`).remove();
                    }
                });
            }
        })
        
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
