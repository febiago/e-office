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
            body {
                font-family: "Times-Roman";
                font-size: 12pt;
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
        <hr style="border: 2px solid">
        <br>
        <center><b id="spt"><u>LEMBAR DISPOSISI</u></b></center>
        <br>
        <table width="100%" border="2">
            <tr>
                <td width="15%" style="border-right: none;" height="40px">Surat Dari</td>
                <td width="35%" style="border-left: none;">: {{ $data->pengirim }} </td>
                <td width="18%" style="border-right: none;">Diterima Tanggal</td>
                <td style="border-left: none;">: {{ $tglDiterima }}</td>
            </tr>

            <tr>
                <td width="15%" style="border-right: none;" height="40px">Tanggal Surat</td>
                <td width="35%" style="border-left: none;">: {{ $tglSurat }}</td>
                <td width="18%" style="border-right: none;">Nomor Pengendali</td>
                <td style="border-left: none;">: {{ $data->id }}</td>
            </tr>
            <tr>
                <td width="15%" style="border-right: none;" height="40px">Nomor Surat</td>
                <td width="35%" style="border-left: none;">: {{ $data->no_surat }}</td>
                <td width="18%" style="border-bottom: none; border-right: none;">Diteruskan Kepada</td>
                <td style="border-bottom: none; border-left: none;">: </td>
            </tr>
            <tr>
                <td width="15%" style="border-right: none; border-bottom: none; vertical-align: text-top;" height="40px">Perihal</td>
                <td width="35%" style="border-left: none; border-bottom: none; vertical-align: text-top;" rowspan="3">: {{ $data->perihal }}</td>
                <td width="18%" style="border-bottom: none; border-top: none;" colspan="2">1.</td>
            </tr>
            <tr>
                <td style="border-bottom: none; border-top: none; border-right: none;" height="40px"></td>
                <td style="border-bottom: none; border-top: none;" colspan="2">2.</td>
            </tr>
            <tr>
                <td width="15%" style="border-top: none; border-right: none;" height="40px"></td>
                <td width="18%" style="border-bottom: none; border-top: none;" colspan="2">3.</td>
            </tr>
            <tr>
                <td style="border-bottom: none;" colspan="4" height="50px"><center>ISI DISPOSISI</center></td>
            </tr>
            <tr>
                <td style="border-top: none;" class="align-text-top" colspan="4" height="500px"></td>
            </tr>
        </table>
    </body>
</html>