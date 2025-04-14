<!DOCTYPE html>
<html>

<head>
    <title>Laporan Pendapatan</title>
    <style>
    body {
        font-family: sans-serif;
    }

    h2 {
        margin-bottom: 20px;
    }
    </style>
</head>

<body>
    <h2>Laporan Pendapatan</h2>
    <p>Total Pendapatan: Rp {{ number_format($totalPendapatan, 0, ',', '.') }}</p>
</body>

</html>