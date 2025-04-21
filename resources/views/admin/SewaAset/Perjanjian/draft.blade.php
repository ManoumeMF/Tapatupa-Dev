@php
    \Carbon\Carbon::setLocale('id');
@endphp

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Draft Document</title>
    <link rel="stylesheet" href="{{ public_path('admin_resources/assets/css/styles.css') }}">
    <link rel="stylesheet" href="{{ public_path('admin_resources/assets/libs/bootstrap/css/bootstrap.min.css') }}">
    <style>
        @page {
            margin: 150px 70px 80px 70px;
        }

        header {
            font-family: 'Times New Roman';
            position: fixed;
            top: -110px;
            left: 0;
            right: 0;
            height: 70px;
            text-align: center;
            line-height: 1.2;
        }


        footer {
            font-family: 'Times New Roman';
            position: fixed;
            bottom: -60px;
            left: 0;
            right: 0;
            height: 50px;
            text-align: center;
            font-size: 10px;
            color: #555;
        }

        .content {
            font-family: 'Times New Roman';
            font-size: 12px;
        }

        .logo {
            float: left;
            width: 80px;
            height: auto;
        }

        .header-text {
            margin-left: 100px;
            text-align: left;
            text-align: center;
        }

        .clear {
            clear: both;
        }

        hr {
            content: "";
            display: block;
            border: 7px solid black;
        }

        small {
            font-size: 9px;
        }

        table {
            border-collapse: collapse;
            margin: 0;
        }

        th,
        td {
            padding: 2px 4px;
            text-align: left;
            /* Ini penting biar teksnya mulai dari kiri */
            vertical-align: top;
            /* Ini untuk vertikal: mulai dari atas */
        }

        ol.custom-list {
            list-style: none;
            counter-reset: nomor;
            padding-left: 0;
            text-align: justify;
        }

        ol.custom-list li {
            counter-increment: nomor;
            margin-bottom: 8px;
            position: relative;
            padding-left: 25px;
        }

        ol.custom-list li::before {
            content: "(" counter(nomor) ").";
            position: absolute;
            left: 0;
            /*font-weight: bold;*/
        }
    </style>
</head>

<body>
    <header>
        <img src="{{ public_path('admin_resources/assets/images/user-general/logo_kab_taput.jpg') }}" class="logo"
            alt="Logo" height="80px" width="80px">
        <div class="header-text">
            <table style="text-align:center; width:100%;">
                <tr><strong style="font-size:16px;">PEMERINTAH KABUPATEN TAPANULI UTARA</strong></tr>
                <tr><strong style="font-size:20px;">SEKRETARIAT DAERAH</strong></tr>
                <tr><small>Jalan Let. Jend. Suprapto No.1 Telp. (0633) 21371 Tarutung</small></tr>
                <tr><small>Web site: http://www.taputkab.go.id;E-mail:Sekda@taputkab.go.id</small></tr>
            </table>
        </div>
        <div class="clear"></div>
        <hr>
    </header>

    <footer>
        Halaman {PAGE_NUM} dari {PAGE_COUNT}
    </footer>

    <div class="content">
        <div style="text-align:center;">
            <strong style="font-size:15px; text-align:center;">SURAT PERJANJIAN</strong>
            <p style="font-size:12px; text-align:center;">NOMOR: {{ $draftPerjanjian->nomorSuratPerjanjian }}</p>
            <p>TENTANG</p>
            <p style="font-weight: bold;">SEWA MENYEWA TANAH MILIK PEMERINTAH KABUPATEN TAPANULI UTARA</p>
        </div>
        <div>
            <p style="text-indent: 30px; text-align: justify;">
                Pada hari ini, {{ \Carbon\Carbon::parse($draftPerjanjian->tanggalDisahkan)->translatedFormat('l') }}
                tanggal
                {{ Riskihajar\Terbilang\Facades\Terbilang::make(\Carbon\Carbon::parse('2025-04-17')->format('d')) }}
                bulan {{ \Carbon\Carbon::parse($draftPerjanjian->tanggalDisahkan)->translatedFormat('F') }} tahun
                {{ Riskihajar\Terbilang\Facades\Terbilang::make(\Carbon\Carbon::parse('2025-04-17')->format('Y')) }}
                bertempat di Tarutung, kami yang bertanda tangan di bawah ini:
            </p>
            <table>
                <tr>
                    <td style="width:250px;">I. {{ $draftPerjanjian->namaPegawai }}</td>
                    <td>:</td>
                    <td style="text-align: justify;">
                        {{ $draftPerjanjian->namaJabatanBidang }} Kabupaten Tapanuli Utara, selaku Pengelolaan Barang
                        Milik Daerah Kabupaten
                        Tapanuli Utara bertindak untuk dan atas nama Pemerintah Kabupaten Tapanuli Utara, selanjutnya
                        dalam Perjanjian disebut sebagai <strong>PIHAK KESATU</strong>;
                    </td>
                </tr>
                <tr>
                    <td>II. {{ $draftPerjanjian->namaWajibRetribusi }}</td>
                    <td>:</td>
                    <td style="text-align: justify;">
                        Pekerjaan : {{ $draftPerjanjian->namaPekerjaan }}<br>
                        Alamat : {{ $draftPerjanjian->alamatWajibRetribusi }}<br>
                        selanjutnya dalam Perjanjian disebut sebagai <strong>PIHAK KEDUA</strong>.

                    </td>
                </tr>
            </table><br>
            <p style="text-indent: 30px; text-align: justify;">
                Berdasarkan Peraturan Menteri Dalam Negeri Republik Indonesia Nomor 7 Tahun 2024 tentang Perubahan Atas
                Peraturan Menteri Dalam Negeri Nomor 19 Tahun 2016 tentang Pedoman Pengelolaan Barang Milik Daerah,
                Peraturan Daerah Kabupaten Tapanuli Utara Nomor 08 Tahun 2016 tentang Pengelolaan Barang Milik Daerah
                dan
                Peraturan Bupati Tapanuli Utara Nomor 38 Tahun 2016 tentang Pedoman Pengelolaan Barang Milik Daerah dan
                Surat Permohonan PIHAK KEDUA tanggal
                {{ \Carbon\Carbon::parse($draftPerjanjian->tanggalPermohonan)->translatedFormat('d F Y') }}, PIHAK
                KESATU
                dan PIHAK KEDUA tersebut di atas,
                sepakat membuat dan mengadakan Perjanjian tentang <strong>“Sewa Menyewa Tanah Milik Pemerintah Kabupaten
                    Tapanuli Utara"</strong> terletak di Lokasi {{ $draftPerjanjian->lokasiObjekRetribusi }}
                {{ $draftPerjanjian->alamatObjekRetribusi }}, dengan ketentuan sebagai berikut:
            </p>
        </div>
        <div>
            <div style="white-space: pre; text-align: center;">
                BAB I
                POKOK PERJANJIAN
                Bagian Kesatu
                Objek Sewa Menyewa
                Pasal 1
            </div>
            <ol class="custom-list">
                <li>
                    PIHAK KESATU menyewakan tanah milik Pemerintah Kabupaten Tapanuli Utara kepada PIHAK KEDUA
                    dengan
                    ukuran seluas 62,5 m² (enam puluh dua koma lima meter persegi) yang terletak di Lokasi Luar Pekan
                    Jl.
                    Sisingamangaraja Kecamatan Tarutung, Kabupaten Tapanuli Utara.
                </li>
                <li>
                    Sewa menyewa tanah milik Pemerintah Kabupaten Tapanuli Utara untuk dimanfaatkan sebagai Tempat
                    Usaha
                    dengan batas-batas sebagai berikut:
                    <table>
                        <tr>
                            <td>a. </td>
                            <td>Sebelah Utara</td>
                            <td>:</td>
                            <td>{{ $draftPerjanjian->batasUtara }}</td>
                        </tr>
                        <tr>
                            <td>b. </td>
                            <td>Sebelah Selatan</td>
                            <td>:</td>
                            <td>{{ $draftPerjanjian->batasSelatan }}</td>
                        </tr>
                        <tr>
                            <td>c. </td>
                            <td>Sebelah Timur</td>
                            <td>:</td>
                            <td>{{ $draftPerjanjian->batasTimur }}</td>
                        </tr>
                        <tr>
                            <td>d. </td>
                            <td>Sebelah Barat</td>
                            <td>:</td>
                            <td>{{ $draftPerjanjian->batasBarat }}</td>
                        </tr>
                    </table>
                </li>
            </ol>
            sebagaimana diuraikan pada peta situasi tanah dalam Lampiran Surat Perjanjian ini, dan merupakan bagian yang
            tidak terpisahkan dari Perjanjian ini.
        </div>

        <div>
            <div style="white-space: pre; text-align: center;">
                Bagian Kedua
                Jangka Waktu dan Berakhirnya Perjanjian Sewa Menyewa
                Pasal 2
            </div>
            <ol class="custom-list">
                <li>
                    Jangka waktu Perjanjian Sewa-Menyewa pemakaian tanah milik Pemerintah Kabupaten Tapanuli Utara
                    ini berlaku selama {{ $draftPerjanjian->lamaSewa }}
                    ({{ Riskihajar\Terbilang\Facades\Terbilang::make($draftPerjanjian->lamaSewa) }})
                    {{ $draftPerjanjian->namaSatuan }} terhitung sejak tanggal
                    {{ \Carbon\Carbon::parse($draftPerjanjian->tanggalAwalBerlaku)->translatedFormat('d F Y') }} sampai
                    dengan tanggal {{ \Carbon\Carbon::parse($draftPerjanjian->tanggalAkhirBerlaku)->translatedFormat('d F Y') }}.
                </li>
                <li>
                    Apabila PIHAK KEDUA ingin memperpanjang Perjanjian Sewa-Menyewa tanah dimaksud maka PIHAK KEDUA
                    selambat-lambatnya 2 (dua) bulan sebelun berakhir masa Perjanjian ini harus menyampaikan permohonan
                    perpanjangan kepada PIHAK KESATU.
                </li>
                <li>
                    Apabila setelah jangka waktu 2 (dua) bulan setelah berakhirnya Surat Perjanjian Sewa Menyewa,
                    PIHAK KEDUA tidak mengajukan Surat Permohonan perpanjangan, maka PHAK KEDUA dianggap telah
                    mengundurkan diri dan Surat Perjanjian Sewa Menyewa ini tidak berlaku lagi.
                </li>
            </ol>
        </div>


        <p><strong>Hari:</strong>
        <p>Hari: {{ \Carbon\Carbon::parse($draftPerjanjian->tanggalDisahkan)->translatedFormat('l') }}</p>
        </p>
        <p><strong>Description:</strong> {{ $draftPerjanjian->namaPegawai }}</p>
        <p><strong>Created at:</strong> {{ $draftPerjanjian->namaStatus }}</p>
    </div>

</body>

</html>