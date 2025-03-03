<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Print Report</title>
    <style>
        table {
            width: 100%;
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
    <h2>Report - Barang Masuk</h2>
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
            <?php foreach ($brg_masuk as $brg): ?>
                <tr>
                    <td><?php echo $brg->idmasuk; ?></td>
                    <td><?php echo $brg->nama_brg; ?></td>
                    <td><?php echo $brg->jumlah; ?></td>
                    <td><?php echo $brg->tanggal; ?></td>
                    <td><?php echo $brg->penerima; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <br>
    <button onclick="window.print()">Print</button>
</body>
</html>
