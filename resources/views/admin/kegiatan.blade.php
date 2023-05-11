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
                                <button class="btn btn-success mb-2" id="btn-create-kegiatan" data-toggle="modal" data-target="#kegiatan-create">TAMBAH KEGIATAN</button>
                                <table class="table-striped table"
                                    id="table-1">
                                    <thead>
                                        <tr>
                                            <th class="text-center">No</th>
                                            <th>Kode</th>
                                            <th>Program</th>
                                            <th>Kegiatan</th>
                                            <th>Sub Kegiatan</th>
                                            <th>Anggaran</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody id="table-kegiatan">
                                    @php
                                        use Carbon\Carbon;
                                    @endphp
                                    @foreach($kegiatans as $kegiatan)
                                        <tr id="index_{{ $kegiatan->id }}">
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $kegiatan->kode }}</td>
                                            <td>{{ $kegiatan->program }}</td>
                                            <td>{{ $kegiatan->nm_kegiatan }}</td>
                                            <td>{{ $kegiatan->sub_kegiatan }}</td>
                                            <td>{{ $kegiatan->anggaran }}</td>
                                            <td class="text-center">
                                                <a href="javascript:void(0)" id="btn-edit-kegiatan" data-id="{{ $kegiatan->id }}" class="btn btn-primary btn-sm"><i class="far fa-edit"></i></a>
                                                <a href="javascript:void(0)" id="btn-delete-kegiatan" data-id="{{ $kegiatan->id }}" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></a>
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
    <div class="modal fade" id="kegiatan-create" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                        <input type="text" class="form-control" id="kode" name="kode" required>
                        <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-kode"></div>
                    </div>
                    <div class="form-group col-md-6" >
                        <label for="name" class="control-label">Program</label>
                        <input type="text" class="form-control" id="program" name="program" required>
                        <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-program"></div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6" >
                        <label for="nm_kegiatan" class="control-label">PANGKAT</label>
                        <select class="form-control" id="nm_kegiatan" name="nm_kegiatan">
                          <option value="-"> - </option>
                          <option value="Juru Muda (I/a)">Juru Muda (I/a)</option>
                          <option value="Juru Muda Tingkat I (I/b)">Juru Muda Tingkat I (I/b)</option>
                          <option value="Juru (I/c)">Juru (I/c)</option>
                          <option value="Juru Tingkat I (I/d)">Juru Tingkat I (I/d)</option>
                          <option value="Pengatur Muda (II/a)">Pengatur Muda (II/a)</option>
                          <option value="Pengatur Muda Tingkat I (II/b)">Pengatur Muda Tingkat I (II/b)</option>
                          <option value="Pengatur (II/c)">Pengatur (II/c)</option>
                          <option value="Pengatur Tingkat I (II/d)">Pengatur Tingkat I (II/d)</option>
                          <option value="Penata Muda (III/a)">Penata Muda (III/a)</option>
                          <option value="Penata Muda Tingkat I (III/b)">Penata Muda Tingkat I (III/b)</option>
                          <option value="Penata (III/c)">Penata (III/c)</option>
                          <option value="Penata Tingkat I (III/d)">Penata Tingkat I (III/d)</option>
                          <option value="Pembina (IV/a)">Pembina (IV/a)</option>
                          <option value="Pembina Tingkat I (IV/b)">Pembina Tingkat I (IV/b)</option>
                          <option value="Pembina Utama Muda (IV/c)">Pembina Utama Muda (IV/c)</option>
                          <option value="Pembina Utama (IV/d)">Pembina Utama (IV/d)</option>
                        </select>
                        <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-nm_kegiatan"></div>
                    </div>
                    <div class="form-group col-md-6" >
                        <label for="name" class="control-label">JABATAN</label>
                        <input type="text" class="form-control" id="sub_kegiatan" name="sub_kegiatan" required>
                        <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-sub_kegiatan"></div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6" >
                        <label for="name" class="control-label">KENDARAAN</label>
                        <input type="text" class="form-control" id="anggaran" name="anggaran" required>
                        <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-anggaran"></div>
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
        $('.btn-create-kegiatan').click(function(){
           $('#kegiatan-create').modal('show');
        });
    });

    $('#kegiatan-create').on('hidden.bs.modal', function (e) {
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
        let kode       = $('#kode').val();
        let program        = $('#program').val();
        let nm_kegiatan    = $('#nm_kegiatan').val();
        let sub_kegiatan    = $('#sub_kegiatan').val();
        let anggaran  = $('#anggaran').val();
        let token      = $("meta[name='csrf-token']").attr("content");
        
        //ajax
        $.ajax({
            url: '/kegiatan',
            type: "POST",
            cache: false,
            data: {
                "kode"      :kode,
                "program"       :program,
                "nm_kegiatan"   :nm_kegiatan,
                "sub_kegiatan"   :sub_kegiatan,
                "anggaran" :anggaran,
                "_token"    :token
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
                $('#kode').val('');
                $('#program').val('');
                $('#nm_kegiatan').val('');
                $('#sub_kegiatan').val('');
                $('#anggaran').val('');

                //close modal
                $('#kegiatan-create').modal('hide');

                setTimeout(function(){
		        	location.reload();
		        }, 500);
                
            },
            error:function(error){
                
                if(error.responseJSON.kode[0]) {

                    //show alert
                    $('#alert-kode').removeClass('d-none');
                    $('#alert-kode').addClass('d-block');

                    //add message to alert
                    $('#alert-kode').html(error.responseJSON.kode[0]);
                } 

                if(error.responseJSON.program[0]) {

                    //show alert
                    $('#alert-program').removeClass('d-none');
                    $('#alert-program').addClass('d-block');

                    //add message to alert
                    $('#alert-program').html(error.responseJSON.program[0]);
                }
                if(error.responseJSON.nm_kegiatan[0]) {

                    //show alert
                    $('#alert-nm_kegiatan').removeClass('d-none');
                    $('#alert-nm_kegiatan').addClass('d-block');

                    //add message to alert
                    $('#alert-nm_kegiatan').html(error.responseJSON.nm_kegiatan[0]);
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

                    <input type="hidden" id="id_kegiatan" value="{{ $kegiatan->id }}">

                    <div class="form-row">
                        <div class="form-group col-md-6" >
                            <label for="name" class="control-label">Program</label>
                            <input type="text" class="form-control" id="program-edit">
                            <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-program-edit"></div>
                        </div>
                        <div class="form-group col-md-6" >
                            <label for="name" class="control-label">Kode</label>
                            <input type="text" class="form-control" id="kode-edit">
                            <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-kode-edit"></div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6" >
                            <label for="name" class="control-label">Kegiatan</label>
                            <select class="form-control" id="nm_kegiatan-edit" required>
                                <option value="-" {{ old('nm_kegiatan', $kegiatan->nm_kegiatan) == '-' ? 'selected' : '' }}> - </option>
                                <option value="Juru Muda (I/a)" {{ old('nm_kegiatan', $kegiatan->nm_kegiatan) == 'Juru Muda (I/a)' ? 'selected' : '' }}>Juru Muda (I/a)</option>
                                <option value="Juru Muda Tingkat I (I/b)" {{ old('nm_kegiatan', $kegiatan->nm_kegiatan) == 'Juru Muda Tingkat I (I/b)' ? 'selected' : '' }}>Juru Muda Tingkat I (I/b)</option>
                                <option value="Juru (I/c)" {{ old('nm_kegiatan', $kegiatan->nm_kegiatan) == 'Juru (I/c)' ? 'selected' : '' }}>Juru (I/c)</option>
                                <option value="Juru Tingkat I (I/d)" {{ old('nm_kegiatan', $kegiatan->nm_kegiatan) == 'Juru Tingkat I (I/d)' ? 'selected' : '' }}>Juru Tingkat I (I/d)</option>
                                <option value="Pengatur Muda (II/a)" {{ old('nm_kegiatan', $kegiatan->nm_kegiatan) == 'Pengatur Muda (II/a)' ? 'selected' : '' }}>Pengatur Muda (II/a)</option>
                                <option value="Pengatur Muda Tingkat I (II/b)" {{ old('nm_kegiatan', $kegiatan->nm_kegiatan) == 'Pengatur Muda Tingkat I (II/b)' ? 'selected' : '' }}>Pengatur Muda Tingkat I (II/b)</option>
                                <option value="Pengatur (II/c)" {{ old('nm_kegiatan', $kegiatan->nm_kegiatan) == 'Pengatur (II/c)' ? 'selected' : '' }}>Pengatur (II/c)</option>
                                <option value="Pengatur Tingkat I (II/d)" {{ old('nm_kegiatan', $kegiatan->nm_kegiatan) == 'Pengatur Tingkat I (II/d)' ? 'selected' : '' }}>Pengatur Tingkat I (II/d)</option>
                                <option value="Penata Muda (III/a)" {{ old('nm_kegiatan', $kegiatan->nm_kegiatan) == 'Penata Muda (III/a)' ? 'selected' : '' }}>Penata Muda (III/a)</option>
                                <option value="Penata Muda Tingkat I (III/b)" {{ old('nm_kegiatan', $kegiatan->nm_kegiatan) == 'Penata Muda Tingkat I (III/b)' ? 'selected' : '' }}>Penata Muda Tingkat I (III/b)</option>
                                <option value="Penata (III/c)" {{ old('nm_kegiatan', $kegiatan->nm_kegiatan) == 'Penata (III/c)' ? 'selected' : '' }}>Penata (III/c)</option>
                                <option value="Penata Tingkat I (III/d)" {{ old('nm_kegiatan', $kegiatan->nm_kegiatan) == 'Penata Tingkat I (III/d)' ? 'selected' : '' }}>Penata Tingkat I (III/d)</option>
                                <option value="Pembina (IV/a)" {{ old('nm_kegiatan', $kegiatan->nm_kegiatan) == 'Pembina (IV/a)' ? 'selected' : '' }}>Pembina (IV/a)</option>
                                <option value="Pembina Tingkat I (IV/b)" {{ old('nm_kegiatan', $kegiatan->nm_kegiatan) == 'Pembina Tingkat I (IV/b)' ? 'selected' : '' }}>Pembina Tingkat I (IV/b)</option>
                                <option value="Pembina Utama Muda (IV/c)" {{ old('nm_kegiatan', $kegiatan->nm_kegiatan) == 'Pembina Utama Muda (IV/c)' ? 'selected' : '' }}>Pembina Utama Muda (IV/c)</option>
                                <option value="Pembina Utama (IV/d)" {{ old('nm_kegiatan', $kegiatan->nm_kegiatan) == 'Pembina Utama (IV/d)' ? 'selected' : '' }}>Pembina Utama (IV/d)</option>
                            </select>
                            <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-nm_kegiatan-edit"></div>
                        </div>

                        <div class="form-group col-md-6" >
                            <label for="name" class="control-label">Perihal</label>
                            <input type="text" class="form-control" id="sub_kegiatan-edit" required>
                            <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-sub_kegiatan-edit"></div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6" >
                            <label for="name" class="control-label">Anggaran</label>
                            <input type="text" class="form-control" id="anggaran-edit">
                            <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-anggaran-edit"></div>
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
        $(document).on('click', '#btn-edit-kegiatan', function() {
            let id_kegiatan = $(this).data('id');

            //fetch detail post with ajax
            $.ajax({
                url: `/kegiatan/${id_kegiatan}`,
                type: "GET",
                cache: false,
                success:function(response){

                    //fill data to form
                    $('#id_kegiatan').val(response.data.id);
                    $('#program-edit').val(response.data.program);
                    $('#kode-edit').val(response.data.kode);
                    $('#nm_kegiatan-edit').val(response.data.nm_kegiatan);
                    $('#sub_kegiatan-edit').val(response.data.sub_kegiatan);
                    $('#anggaran-edit').val(response.data.anggaran);

                    //open modal
                    $('#modal-edit').modal('show');
                }
            });
        });

        //action update post
        $('#update').click(function(e) {
            e.preventDefault();

            //define variable
            let id_kegiatan   = $('#id_kegiatan').val();
            let program           = $('#program-edit').val();
            let kode          = $('#kode-edit').val();
            let nm_kegiatan       = $('#nm_kegiatan-edit').val();
            let sub_kegiatan       = $('#sub_kegiatan-edit').val();
            let anggaran     = $('#anggaran-edit').val();
            let token         = $("meta[name='csrf-token']").attr("content");

            //ajax
            $.ajax({

                url: `/kegiatan/${id_kegiatan}`,
                type: "PUT",
                cache: false,
                data: {
                    "program"           :program,
                    "kode"          :kode,
                    "nm_kegiatan"       :nm_kegiatan,
                    "sub_kegiatan"       :sub_kegiatan,
                    "anggaran"     :anggaran,
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
                        $('#alert-program-edit').removeClass('d-none');
                        $('#alert-program-edit').addClass('d-block');

                        //add message to alert
                        $('#alert-program-edit').html(error.responseJSON.program[0]);
                    } 

                    if(error.responseJSON.content[0]) {

                        //show alert
                        $('#alert-kode-edit').removeClass('d-none');
                        $('#alert-kode-edit').addClass('d-block');

                        //add message to alert
                        $('#alert-kode-edit').html(error.responseJSON.kode[0]);
                    } 
                }
            });
        });

    //button create post event
    $(document).on('click', '#btn-delete-kegiatan', function() {

        let id_kegiatan = $(this).data('id');
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
                //fetch to delete data
                $.ajax({

                    url: `/kegiatan/${id_kegiatan}`,
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
                        $(`#index_${id_kegiatan}`).remove();
                    },
                    error: function(xhr, status, error) {
                        //show error message
                        Swal.fire({
                            type: 'error',
                            icon: 'error',
                            title: 'Terjadi Kesalahan!',
                            text: 'Gagal menghapus data!',
                            showConfirmButton: false,
                            timer: 2000
                        });
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
