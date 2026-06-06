<!DOCTYPE html>
<html>

<head>

    <style>

        body{
            font-family: sans-serif;
        }

        table{
            width:100%;
            border-collapse: collapse;
        }

        th, td{
            border:1px solid #ccc;
            padding:10px;
            text-align:center;
        }

        th{
            background:#f1f5f9;
        }

    </style>

</head>

<body>

    <h2>Laporan Absensi Anggota Magang</h2>

    <table>

        <thead>

            <tr>

                <th>Nama</th>
                <th>NIM</th>
                <th>Divisi</th>
                <th>Hadir</th>
                <th>Izin</th>
                <th>Sakit</th>
                <th>Alfa</th>
                <th>Persentase</th>

            </tr>

        </thead>

        <tbody>

            <?php foreach($laporan as $item) : ?>

            <tr>

                <td><?= $item['nama']; ?></td>
                <td><?= $item['nim']; ?></td>
                <td><?= $item['divisi']; ?></td>
                <td><?= $item['hadir']; ?></td>
                <td><?= $item['izin']; ?></td>
                <td><?= $item['sakit']; ?></td>
                <td><?= $item['alfa']; ?></td>
                <td><?= $item['persentase']; ?></td>

            </tr>

            <?php endforeach; ?>

        </tbody>

    </table>

</body>

</html>