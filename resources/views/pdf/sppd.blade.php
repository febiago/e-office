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
                @foreach($data->take(1) as $nosurat)
                    <td>: {{ $nosurat->surat_keluar->no_surat }}</td>
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
                <td width="57%" colspan="2"> Camat Punung</td>
            </tr>
            <tr>
                <td width="4%">2</td>
                <td width="35%">Nama / NIP Pegawai uang melaksanakan Perjalan Dinas</td>
                <td width="4%">:</td>
                <td width="57%" colspan="2"> {{ $sppd->pegawai->nama }} <br> {{ $sppd->pegawai->nip }}</td>
            </tr>
            <tr>
                <td width="4%">3</td>
                <td width="35%">a. Pangkat / Golongan</td>
                <td width="4%">:</td>
                <td width="57%" colspan="2"> {{ $sppd->pegawai->pangkat }}</td>
            </tr>
            <tr>
                <td width="4%"></td>
                <td width="35%">b. Jabatan</td>
                <td width="4%">:</td>
                <td width="57%" colspan="2"> {{ $sppd->pegawai->jabatan }}</td>
            </tr>
            <tr>
                <td width="4%"></td>
                <td width="35%">c. Tingkat Biaya Perjalan Dinas</td>
                <td width="4%">:</td>
                <td width="57%" colspan="2"> {{ $sppd->jenis_sppd->nama }}</td>
            </tr>
            <tr>
                <td width="4%">4</td>
                <td width="35%">Maksud perjalan dinas</td>
                <td width="4%">:</td>
                <td width="57%" colspan="2"> {{ $sppd->surat_keluar->perihal }}</td>
            </tr>
            <tr>
                <td width="4%">5</td>
                <td width="35%">Alat Angkut yang digunakan</td>
                <td width="4%">:</td>
                <td width="57%" colspan="2"> {{ $sppd->kendaraan }}</td>
            </tr>
            <tr>
                <td width="4%">6</td>
                <td width="35%">a. Tempat berangkat</td>
                <td width="4%">:</td>
                <td width="57%" colspan="2"> Kecamatan Punung</td>
            </tr>
            <tr>
                <td width="4%"></td>
                <td width="35%">b. Tempat tujuan</td>
                <td width="4%">:</td>
                <td width="57%" colspan="2"> {{ $sppd->tujuan }}</td>
            </tr>
            <tr>
                <td width="4%">7</td>
                <td width="35%">a. Lamanya Perjalan Dinas</td>
                <td width="4%">:</td>
                <td width="57%" colspan="2">  {{ $hari + 1 }} Hari</td>
            </tr>
            <tr>
                <td width="4%">8</td>
                <td width="35%">Pengikut : nama</td>
                <td width="4%">:</td>
                <td width="20%">Tanggal Lahir</td>
                <td width="37%">Keterangan / Jabatan</td>
            </tr>
                {{ $currentPage = $loop->iteration; }}
            @forelse($pengikut as $np)
            @if($currentPage == 1)
            <tr>
                <td width="4%"></td>
                <td width="35%">{{ $loop->iteration }}. {{ $np->pegawai->nama }}</td>
                <td width="4%">:</td>
                <td width="20%"> </td>
                <td width="37%">{{ $np->pegawai->jabatan }}</td>
            </tr>
            @else
            <tr>
                <td width="4%"></td>
                <td width="35%">{{ $loop->iteration }}.</td>
                <td width="4%">:</td>
                <td width="20%"></td>
                <td width="37%"></td>
            </tr>
            @endif
            @empty
            <tr>
                <td width="4%"></td>
                <td width="35%">1. </td>
                <td width="4%">:</td>
                <td width="20%"> </td>
                <td width="37%"></td>
            </tr>
            <tr>
                <td width="4%"></td>
                <td width="35%">2. </td>
                <td width="4%">:</td>
                <td width="20%"> </td>
                <td width="37%"></td>
            </tr>
            @endforelse
            <tr>
                <td width="4%">9</td>
                <td width="35%">Pembebanan Anggaran</td>
                <td width="4%">:</td>
                <td width="57%" colspan="2"> APBD Kab. Pacitan</td>
            </tr>
            <tr>
                <td width="4%"></td>
                <td width="35%">a. Instansi</td>
                <td width="4%">:</td>
                <td width="57%" colspan="2"> Kecamatan Punung</td>
            </tr>
            <tr>
                <td width="4%"></td>
                <td width="35%">b. Kode rekening</td>
                <td width="4%">:</td>
                <td width="57%" colspan="2"> 5.1.02.04.01.0003</td>
            </tr>
            <tr>
                <td width="4%">10</td>
                <td width="35%">Keterangan Lain-Lain</td>
                <td width="4%">:</td>
                <td width="57%" colspan="2"> {{ $sppd->keterangan }}</td>
            </tr>
        </table>
        <br>
        
        <table>
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
        <div class="page_break"></div>
    @endforeach
    @foreach($data->take(1) as $nosurat)                
    <table>
        <tr>
            <td width="300"></td>
            <td width="80">SPPD Nomor</td>
            <td>: {{ $nosurat->surat_keluar->no_surat }}</td>
        </tr><tr>
            <td width="300"></td>
            <td width="80">Lembar Ke</td>
            <td>: 2</td>
        </tr>
    </table>
    <br>
    <table width="100%" border="1">
        <tr>
            <td style="border-right: none;" width="2%"></td>
            <td style="border-left: none;" width="48%"></td>
            <td width="48%">
                Berangkat dari &nbsp; : Kecamatan Punung
                <br>Pada tanggal&nbsp; &nbsp; &nbsp; : {{ $tgl_berangkat }}
                <br>Ke &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; : {{ $sppd->tujuan }}
                <br> <br>
                <center><b>CAMAT PUNUNG</b></center>
                <br> <br> <br>
                <center><b><u>{{ $camat->nama }}</u></b></center>
                <center>NIP. {{ $camat->nip }}</center>
            </td>
        </tr>
        <tr>
            <td style="border-right: none;" width="2%">II</td>
            <td style="border-left: none;" height:="80px" width="48%">
                Tiba di &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : {{ $sppd->tujuan }}
                <br>Pada Tanggal&nbsp; : {{ $tgl_berangkat }}
                <br>Kepala&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :
                <br> <br> <br> <br> <br> <br>
            </td>
            <td width="48%">
                Berangkat dari &nbsp; : {{ $sppd->tujuan }}
                <br>Ke &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; : Kecamatan Punung
                <br>Pada tanggal&nbsp; &nbsp; &nbsp; : {{ $tgl_kembali }}
            </td>
        </tr>
        <tr>
            <td style="border-right: none;" width="2%">III</td>
            <td style="border-left: none;" height:="80px" width="48%">
                Tiba di &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :
                <br>Pada Tanggal&nbsp; :
                <br>Kepala&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :
                <br> <br> <br> <br> <br> <br>
            </td>
            <td width="48%">
                Berangkat dari &nbsp; :
                <br>Ke &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; : 
                <br>Pada tanggal&nbsp; &nbsp; &nbsp; : 
            </td>
        </tr>
        <tr>
            <td style="border-right: none;" width="2%">VI</td>
            <td style="border-left: none;" height:="80px" width="48%">
                Tiba di &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :
                <br>Pada Tanggal&nbsp; :
                <br>Kepala&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :
                <br> <br> <br> <br> <br> <br>
            </td>
            <td width="48%">
                Berangkat dari &nbsp; :
                <br>Ke &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; : 
                <br>Pada tanggal&nbsp; &nbsp; &nbsp; : 
            </td>
        </tr>
        <tr>
            <td style="border-right: none;" width="2%">V</td>
            <td style="border-left: none;" width="48%">
                Tiba di &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : Kecamatan Punung
                <br>Pada tanggal&nbsp; &nbsp; &nbsp; : {{ $tgl_berangkat }}
                <br> <br> <br> <br>
                <center><b>CAMAT PUNUNG</b></center>
                <br> <br> <br>
                <center><b><u>{{ $camat->nama }}</u></b></center>
                <center>NIP. {{ $camat->nip }}</center>
            </td>
            <td width="48%" style="text-align: justify;">
                Telah diperiksa dengan keterangan bahwa perjalanan tersebut diatas dilakukan atas perintahnya
                dan semata mata untuk kepentingan jabatan dalam waktu sesingkat singkatnya
                <br> <br>
                <center><b>PENGGUNA ANGGARAN</b></center>
                <br> <br> <br>
                <center><b><u>{{ $camat->nama }}</u></b></center>
                <center>NIP. {{ $camat->nip }}</center>
            </td>
        </tr>
        <tr>
            <td style="border-right: none;" width="2%">VI</td>
            <td colspan="2">CATATAN LAIN - LAIN</td>
        </tr>
        <tr>
            <td style="border-right: none;" width="2%">VII</td>
            <td colspan="2">Perhatian</td>
        </tr>
        <tr>
            <td style="text-align: justify;" colspan="3">
                <br>
            Pejabat yang berwenang menerbitkan SPD, pegawai yang melakukan perjalanan dinas, para pejabat yang mengesahkan 
            tanggal berangkat / tiba serta Bendaharawan bertanggungjawab berdasarkan peraturan-peraturan Keuangan Negara 
            apabila Negara mendapat rugi akibat kesalahan, kelalaian dan kealpaannya <br>
            </td>
        </tr>
        
    </table>
    @endforeach
    </body>
</html>