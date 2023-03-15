<!DOCTYPE html>
<html>
    <head>
        <title>SPPD</title>
        <style>
            #kop {
              font-size: 24px;
            }
            #spt {
              font-size: 20px;
            }
            td {
                vertical-align: text-top;
            }
            body {
                font-family: "Times-Roman";
                font-size: 11pt;
            }
            .page_break { 
                page-break-before: always; 
            }
            table {
                border-collapse:collapse;
            }
        </style>
    </head>
    <body>
        <table width="100%">
            <tr>
                <td width="0%" align="center"><img src="{{ public_path('img/kop.png') }}" width="92" alt="Logo">
                </td>
                <td valign="top" width="100%" align="center">
                    <b id="kop">PEMERINTAH KABUPATEN PACITAN</b>
                    <br><b id="kop">KECAMATAN PUNUNG</b>
                    <br>Jl. Raya Solo Nomor 021 Pacitan, Telp (0357) 511032
                    <br>Website : www.punung.pacitankab.go.id
                    <br>Email : kecpunung@gmail.com
                </td>
            </tr>
        </table>
        <hr>
        <br>
        <center><b id="spt"><u>Surat Perintah Tugas</u></b></center>
        @foreach($data->take(1) as $sppd)
            <center>Nomor : {{ $sppd->surat_keluar->no_surat }}</center>
        @endforeach
        <br />
        <table border="0">
            <tr>
                <td width="60">Dasar &nbsp; &nbsp; &nbsp; &nbsp; :</td>
                <td>1. </td>
                <td>Peraturan Daearah Kabupaten Pacitan Nomor 08 Tahun 2022 tentang Pendapatan dan Belanja Daerah Kabupaten Pacitan Tahun Anggaran 2023 </td>
            </tr>
            <tr>
                <td width="60"></td>
                <td>2. </td>
                <td>Peraturan Daearah Kabupaten Pacitan Nomor 08 Tahun 2022 tentang Pendapatan dan Belanja Daerah Kabupaten Pacitan Tahun Anggaran 2023 </td>
            </tr>
            <tr>
                <td width="60"></td>
                <td>3. </td>
                <td>Peraturan Daearah Kabupaten Pacitan Nomor 08 Tahun 2022 tentang Pendapatan dan Belanja Daerah Kabupaten Pacitan Tahun Anggaran 2023 </td>
            </tr>
            <tr>
                <td width="60"></td>
                <td>4. </td>
                <td>Peraturan Daearah Kabupaten Pacitan Nomor 08 Tahun 2022 tentang Pendapatan dan Belanja Daerah Kabupaten Pacitan Tahun Anggaran 2023 </td>
            </tr>
        </table>
        <br>
        <center><b>MEMERINTAHKAN</b></center>
        @foreach($data as $sppd)
        <table border="0">
            <tr>
                <td width="60">
                    @if($loop->first)
                    Kepada &nbsp; &nbsp; :
                    @endif
                </td>
                <td>{{ $loop->iteration }}. </td>
                <td width="100">Nama</td>
                <td>: {{ $sppd->pegawai->nama }}</td>
            </tr>
            <tr>
                <td width="60"></td>
                <td></td>
                <td width="100">Pangkat / golongan</td>
                <td>: {{ $sppd->pegawai->pangkat }}</td>
            </tr>
            <tr>
                <td width="60"></td>
                <td></td>
                <td width="100">Nip</td>
                <td>: {{ $sppd->pegawai->nip }}</td>
            </tr>
            <tr>
                <td width="60"></td>
                <td></td>
                <td width="100">Jabatan</td>
                <td>: {{ $sppd->pegawai->jabatan }}</td>
            </tr>
        </table>
        @endforeach
        <br />
        <table>
            <tr>
                <td width="53">Untuk &nbsp; &nbsp;</td> 
                <td>: 1. </td>
                <td>{{ $sppd->surat_keluar->perihal }}</td>
            </tr>
            <tr>
                <td></td> 
                <td>: 2.</td>
                <td>Pada Tanggal {{ $tgl_berangkat }} s.d {{ $tgl_kembali }}</td>
            </tr>
            <tr>
                <td></td> 
                <td>: 3.</td>
                <td>Bertempat di {{ $sppd->tujuan }}</td>
            </tr>
        </table>
        <br>
        <table border="0">
            <tr>
                <td width="310"></td>
                <td width="220" align="center">Ditetapkan di Pacitan</td>
            </tr>
            <tr>
                <td width="310"></td>
                <td width="220" align="center">Pada Tanggal : {{ $tgl_spt }}</td>
            </tr>
            <tr>
                <td width="310"></td>
                <td width="220" align="center"><b>Camat Punung</b></td>
            </tr>
            <tr>
                <td width="310" height="35"></td>
            </tr>
            <tr>
                <td width="310"></td>
                <td width="220" align="center"><b><u>{{ $camat->nama }}</u></b></td>
            </tr>
            <tr>
                <td width="310"></td>
                <td width="220" align="center">{{ $camat->pangkat }}</td>
            </tr>
            <tr>
                <td width="310"></td>
                <td width="220" align="center">NIP. {{ $camat->nip }}</td>
            </tr>
        </table>

        <div class="page_break">
         @foreach($data as $sppd)
        <table width="100%">
            <tr>
                <td width="0%" align="center"><img src="{{ public_path('img/kop.png') }}" width="92" alt="Logo">
                </td>
                <td valign="top" width="100%" align="center">
                    <b id="kop">PEMERINTAH KABUPATEN PACITAN</b>
                    <br><b id="kop">KECAMATAN PUNUNG</b>
                    <br>Jl. Raya Solo Nomor 021 Pacitan, Telp (0357) 511032
                    <br>Website : www.punung.pacitankab.go.id
                    <br>Email : kecpunung@gmail.com
                </td>
            </tr>
        </table>
        <hr>
        <br>
        <table>
            <tr>
                <td width="330"></td>
                <td width="70">Lembar ke</td>
                <td>: 1</td>
            </tr>
            <tr>
                <td width="330"></td>
                <td width="70">Kode no</td>
                <td>: {{ $loop->iteration }}</td>
            </tr>
            <tr>
                <td width="330"></td>
                <td width="70">Nomor</td>
                @foreach($data->take(1) as $sppd)
                    <td>: {{ $sppd->surat_keluar->no_surat }}</td>
                @endforeach
            </tr>
        </table>
        <br>
        <center><b id="spt"><u>SURAT PERJALANAN DINAS (SPD)</u></b></center>
        <br>
        <table width="100%" border="1">
            <tr>
                <td width="4%">1</td>
                <td width="35%">Pengguna Anggaran / Kuasa Pengguna Anggaran</td>
                <td width="4%">:</td>
                <td width="57%">Camat Punung</td>
            </tr>
            <tr>
                <td width="4%">2</td>
                <td width="35%">Nama / NIP Pegawai uang melaksanakan Perjalan Dinas</td>
                <td width="4%">:</td>
                <td width="57%">{{ $sppd->pegawai->nama }} <br> {{ $sppd->pegawai->nip }}</td>
            </tr>
            <tr>
                <td width="4%">3</td>
                <td width="35%">a. Pangkat / Golongan</td>
                <td width="4%">:</td>
                <td width="57%">{{ $sppd->pegawai->pangkat }}</td>
            </tr>
            <tr>
                <td width="4%"></td>
                <td width="35%">b. Jabatan</td>
                <td width="4%">:</td>
                <td width="57%">{{ $sppd->pegawai->jabatan }}</td>
            </tr>
            <tr>
                <td width="4%"></td>
                <td width="35%">c. Tingkat Biaya Perjalan Dinas</td>
                <td width="4%">:</td>
                <td width="57%">{{ $sppd->jenis_sppd->nama }}</td>
            </tr>
            <tr>
                <td width="4%">4</td>
                <td width="35%">Maksud perjalan dinas</td>
                <td width="4%">:</td>
                <td width="57%">{{ $sppd->surat_keluar->perihal }}</td>
            </tr>
            <tr>
                <td width="4%">5</td>
                <td width="35%">Alat Angkut yang digunakan</td>
                <td width="4%">:</td>
                <td width="57%">{{ $sppd->kendaraan }}</td>
            </tr>
            <tr>
                <td width="4%">6</td>
                <td width="35%">a. Tempat berangkat</td>
                <td width="4%">:</td>
                <td width="57%">Kecamatan Punung</td>
            </tr>
            <tr>
                <td width="4%"></td>
                <td width="35%">b. Tempat tujuan</td>
                <td width="4%">:</td>
                <td width="57%">{{ $sppd->tujuan }}</td>
            </tr>
            <tr>
                <td width="4%">7</td>
                <td width="35%">a. Lamanya Perjalan Dinas</td>
                <td width="4%">:</td>
                <td width="57%"> {{ $hari + 1 }} Hari</td>
            </tr>
            <tr>
                <td width="4%">8</td>
                <td width="35%">Pengikut : nama</td>
                <td width="4%">:</td>
                <td width="20%">Tanggal Lahir</td>
                <td width="37%">Keterangan / Jabatan</td>
            </tr>
            <tr>
                <td width="4%">1</td>
                <td width="35%"> </td>
                <td width="4%">:</td>
                <td colspan="2" width="57%">Camat Punung</td>
            </tr>
        </table>
        <div class="page_break">
        @endforeach
        </div>
    </body>
</html>