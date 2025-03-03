<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Print Report</title>
    <style>
        table {
            width: 70%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
    </style>
</head>
<body>
    <h2>Laporan - Barang Keluar</h2>
    <table>
        <thead>
            <tr>
                <th>ID Masuk</th>
                <th>Nama Barang</th>
                <th>Jumlah</th>
                <th>Tanggal</th>
                <th>Penerima</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($brg_keluar as $brg): ?>
                <tr>
                    <td><?php echo $brg->idkeluar; ?></td>
                    <td><?php echo $brg->nama_brg; ?></td>
                    <td><?php echo $brg->jumlah; ?></td>
                    <td><?php echo $brg->tanggal; ?></td>
                    <td><?php echo $brg->ambil; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <br>
    <button onclick="window.print()" type="button" class="btn btn-secondary">Print</button>
</body>
</html>
