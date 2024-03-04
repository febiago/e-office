@extends('layouts.app')

@section('title', 'SPPD')

@push('style')
    <link rel="stylesheet" href="{{ asset('library/datatables/media/css/jquery.dataTables.min.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
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
                    
                            <div class="card-body">
                            <form action="{{ route('sppd.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    {!! Form::label('surat_keluar_id', 'No SPT') !!}
                                    {!! Form::select('surat_keluar_id', $sppds, null, ['class' => 'form-control select2' . ($errors->has('surat_keluar_id') ? ' is-invalid' : ''), 'placeholder' => '']) !!}
                                @error('surat_keluar_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                                <div class="form-group col-md-4">
                                    {!! Form::label('pegawai', 'Pegawai') !!}
                                    {!! Form::select('pegawai', $pegawais, null, ['class' => 'form-control select2' . ($errors->has('pegawai') ? ' is-invalid' : ''), 'placeholder' => '']) !!}
                                @error('pegawai')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="kendaraan" class="control-label">Kendaraan</label>
                                    <input type="text" name="kendaraan" id="kendaraan" class="form-control">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    {!! Form::label('jenis', 'Jenis SPPD') !!}
                                    {!! Form::select('jenis', $jenis, null, ['class' => 'form-control select2']) !!}
                                </div>
                                <div class="form-group col-md-4">
                                    {!! Form::label('kegiatan', 'Sub Kegiatan') !!}
                                    {!! Form::select('kegiatan', $kegiatans, null, ['class' => 'form-control select2', 'placeholder' => '']) !!}
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="sisa_anggaran" class="control-label">Sisa Anggaran</label>
                                    <input type="text" name="sisa_anggaran" id="sisa_anggaran" class="form-control" disabled>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-3" >
                                    <label for="name" class="control-label">Tanggal Berangkat</label>
                                    <input name="tgl_berangkat" id="tgl_berangkat" type="date" value="{{ old('tgl_berangkat') }}" class="form-control" required>
                                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-tgl_berangkat"></div>
                                </div>
                                <div class="form-group col-md-3" >
                                    <label for="name" class="control-label">Tanggal Kembali</label>
                                    <input name="tgl_kembali" id="tgl_kembali" type="date" value="{{ old('tgl_kembali') }}" class="form-control" required>
                                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-tgl_kembali"></div>
                                </div>
                                <div class="form-group col-md-6" >
                                    <label for="name" class="control-label">Tujuan</label>
                                    <input type="text" class="form-control" id="tujuan" value="{{ old('tujuan') }}" name="tujuan" required>
                                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-tujuan"></div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6" >
                                    <label for="name" class="control-label">Dasar SPPD</label>
                                    <input type="text" class="form-control" id="dasar" value="{{ old('dasar') }}" name="dasar">
                                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-dasar"></div>
                                </div>
                                
                                <div class="form-group col-md-6" >
                                    <label for="name" class="control-label">Keterangan</label>
                                    <input type="text" class="form-control" id="keterangan" value="{{ old('keterangan') }}" name="keterangan">
                                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-keterangan"></div>
                                </div>
                            </div>
                                <h4>Pengikut</h4>
                                <button type="button" class="btn btn-success mb-2" id="tambah-pengikut">Tambah Pengikut</button>
                                <div id="error"></div>
                            <div id="pengikut-container" class="form-row">
                                
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">SIMPAN</button>
                            </div>
                              
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
<script>
    $(document).ready(function () {
    $('#tambah-pengikut').on('click', function () {
        var index = $('select[name="pegawai_id[]"]').length;
        var html = '<div class="form-group col-md-4" >' +
            '<label for="name" class="control-label">Nama</label>'+
            '{!! Form::select("pegawai_id[]", $pegawais, null, ["class" => "form-control select2", "placeholder" => "", "name" => "pegawai_id[]", "onchange" => "cekUnique(), getKendaraan(this)"]) !!}' +
            '</div>'+
            '<div class="form-group col-md-2">'+
            '<label for="angkutan" class="control-label">Kendaraan</label>'+
            '<input type="text" name="angkutan[]" id="kendaraan-' + index + '" class="form-control">'+
            '</div>';
        
        $('#pengikut-container').append(html);
        $(".select2").select2();
    });

      // Hapus Pengikut
    $(document).on("click", ".btn-remove-pengikut", function() {
      $(this).parents(".input-group").remove();
    });
    });

    $('#kegiatan').change(function() {
        var id = $(this).val();
        if (id != '') {
            $.ajax({
                url: 'create/sisa-anggaran/' + id,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    var sisaAnggaran = data.sisa_anggaran;
                    var formattedSisaAnggaran = sisaAnggaran.toLocaleString('id-ID', { style: 'currency', currency: 'IDR' });
                    $('#sisa_anggaran').val(formattedSisaAnggaran);
                }
            });
        }
    });

    $('#pegawai').change(function() {
            var pegawaiId = $(this).val();
            if (pegawaiId) {
                $.ajax({
                    url: 'create/kendaraan/' + pegawaiId,
                    type: 'GET',
                    data: {
                        'id': pegawaiId
                    },
                    success: function(data) {
                        $('#kendaraan').val(data);
                    }
                });
            }
        });

    function getKendaraan(element) {
        var pegawaiId = $(element).val();
        var index = $('select[name="pegawai_id[]"]').index($(element));
        var kendaraanElement = $('#kendaraan-' + index);

        if (pegawaiId) {
            $.ajax({
                url: '{{ route("kendaraan") }}',
                type: 'GET',
                data: {
                    'id': pegawaiId
                },
                success: function(data) {
                    kendaraanElement.val(data);
                }
            });
        } else {
            kendaraanElement.val('');
        }
    }

    function cekUnique() {
        let tgl_berangkat = $('#tgl_berangkat').val();
        let pengikut = $('select[name="pegawai_id[]"]').map(function() {
          return $(this).val();
        }).get();

            $.ajax({
                type: 'POST',
                url: '{{ route("check-unique") }}',
                data: {
                    '_token': '{{ csrf_token() }}',
                    'tgl_berangkat': tgl_berangkat,
                    'pegawai_id': pengikut,
                },
                success: function(data) {
                    if (data.errors) {
                        var errorHtml = '';
                        $.each(data.errors, function(index, value) {
                            errorHtml += '<div class="alert alert-danger"><strong>' + value + '</strong></div>';
                        });
                        $('#error').html(errorHtml); //menampilkan pesan error pada div dengan id "error"
                    } else {
                        $('#error').html('');
                        console.log(data);
                    }
                }
            });
        };

    $('select[name="pegawai_id[]"]').change(cekUnique);
    

</script>
    <!-- JS Libraies -->
    <script src="{{ asset('library/datatables/media/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('library/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="{{ asset('library/jquery-ui-dist/jquery-ui.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/modules-datatables.js') }}"></script>
@endpush
