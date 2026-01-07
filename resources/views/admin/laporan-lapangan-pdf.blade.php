<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Semua Lapangan Olahraga</title>
</head>
<style>
    body {
        font-family: Arial, Helvetica, sans-serif;
        margin: 0;
        padding: 20px;
        font-size: 12px;
    }

    .header {
        text-align: center;
        margin-bottom: 20px;
        border-bottom: 2px solid #333;
        padding-bottom: 10px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 15px;
    }

    th,td {
        border: 1px soolid #ddd;
        padding: 8px;
        text-align: left;
    }

    th {
        background-color: #f2f2f2;
        font-weight: bold;
        text-align: center;
    }

    .profile-img-small {
        width: 100px;
        height: 70px;
        /* border-radius: 50%; */
        object-fit: cover;
        border: 1px solid #ddd;
        display: block;
        margin: 0 auto;
    }

    .no-image {
        width: 100px;
        height: 70px;
        /* border-radius: 50%; */
        background: #ddd;
        object-fit: cover;
        border: 1px solid #ddd;
        display: flex;
        align-items: center;
        margin: 0 auto;
        color: #666;
        justify-content: center;
        font-size: 8px;
        margin: 0 auto;
        color: #666;
    }

    .footer {
        margin-top: 30px;
        text-align: center;
        font-size: 10px;
        color: #666;
        border-top: 1px solid #ddd;
        padding-top: 8px;
    }

    .text-center {
        text-align: center;
    }
</style>
<body>
    <div class="header">
        <h2>Data Semua Lapangan Olahraga</h2>
    </div>

    <table>
        <thead>
             <tr>
                <th>No</th>
                <th>ID Lapangan</th>
                <th>Gambar</th>
                <th>Nama Lapangan</th>
                <th>Jenis</th>
                <th>Lokasi</th>
                <th>Kondisi</th>
                <th>Harga / Jam</th>
                <th>Jam Operasional</th>
                <th>Kontak</th>
                <th>Deskripsi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($lapangans as $index => $lapangan)
                <tr>
                    <td class="text-center">{{ $index + 1 }}</td>
                    <td class="text-center">{{ $lapangan->id_lapangan }}</td>
                    <td class="text-center">
                        @php
                            $imagePath = storage_path('app/public/gambar/' . $lapangan->gambar);
                        @endphp

                        @if ($lapangan->gambar && file_exists($imagePath))
                            <img src="file://{{ $imagePath }}" class="profile-img-small">
                        @else
                            <div class="no-image">NO IMG</div>
                        @endif
                    </td>

                    <td class="text-center">{{ $lapangan->nama_lapangan }}</td>
                    <td class="text-center">{{ $lapangan->jenis }}</td>
                    <td class="text-center">{{ $lapangan->lokasi }}</td>
                    <td class="text-center">{{ $lapangan->kondisi }}</td>
                    <td class="text-center">
                        Rp {{ number_format($lapangan->harga_per_jam, 0, ',', '.') }}
                    </td>
                    <td class="text-center">
                        {{ $lapangan->jam_buka }} - {{ $lapangan->jam_tutup }}
                    </td>
                    <td class="text-center">{{ $lapangan->kontak }}</td>
                    <td class="text-center">{{ $lapangan->deskripsi }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="footer">
        Total : {{ $lapangans->count() }} Lapangan Olahraga | Dicetak {{ \Carbon\Carbon::now()->format("d F Y H:i:s") }}
    </div>
</body>
</html>