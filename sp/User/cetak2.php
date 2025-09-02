<div class="header">
        <img src="assets/img/awanreptile.jpg" alt="Logo">
        <div>
            <h2>AWAN REPTILE</h2>
            <h3>CAMELEON & BEARDED DRAGON</h3>
            <p> Jl. Mayang IV Larangan Selatan, Tangerang, Banten.</p>
        </div>
    </div>


<?php
session_start();
include 'koneksi.php';
?>

<?php
$selected = (array) $_GET['selected'];

$rowsa = mysqli_query($koneksi, "SELECT kd_gejala, gejala FROM gejala WHERE kd_gejala IN ('".implode("','", $selected)."')");
$as = mysqli_fetch_assoc($rowsa);

$sql_row = "SELECT COUNT(relasi.kd_gejala) as rowspan, relasi.kd_gejala, relasi.nilai, penyakit.* FROM relasi INNER JOIN penyakit ON relasi.kd_penyakit = penyakit.kd_penyakit WHERE kd_gejala IN ('".implode("','", $selected)."') GROUP BY relasi.kd_penyakit";
$data_row = mysqli_query($koneksi, $sql_row);

$sql = "SELECT relasi.kd_gejala, relasi.nilai, penyakit.* FROM relasi INNER JOIN penyakit ON relasi.kd_penyakit = penyakit.kd_penyakit WHERE kd_gejala IN ('".implode("','", $selected)."')";
$data = mysqli_query($koneksi, $sql);

$as = mysqli_fetch_assoc($data);
?>

<html>
<head>
    <title>Hasil Diagnosa</title>
    <style>
        /* Tambahkan styling sesuai kebutuhan */
        body {
            font-family: Arial, sans-serif;
        }
        .header, .footer {
            margin-bottom: 20px;
        }
        .header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    border-bottom: 2px solid #000;
    margin-bottom: 20px;
}

.header img {
    width: auto;
    height: 120px;
    margin-right: 20px;
}

.header div {
    text-align: center;
    flex: 1;
}

.header h3 {
    margin: 0;
    font-size: 18px; /* Adjust as needed */
    /* Adds a border below the text */
    padding-bottom: 5px; /* Adjust spacing between text and border */
}

.footer {
    text-align: right;
}

.footer p {
    margin: 5px 0;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px;
}

table, th, td {
    border: 1px solid black;
}

th, td {
    padding: 8px;
    text-align: left;
}

.panel-title {
    font-weight: bold;
}

hr {
    border: 1px solid #000;
}

.spacer {
    margin-top: 70px; /* Sesuaikan dengan jarak yang diinginkan */
}

    </style>
</head>
<body>

<h3>Hasil Analisa</h3>
<table border="1">
    <thead>
        <tr>
            <th>No</th>
            <th>Kode Gejala</th>
            <th>Nama Gejala</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        $i = 1;
        foreach ($rowsa as $key) {
            echo "<tr>";
            echo "<td>".$i++."</td>";
            echo "<td>".$key['kd_gejala']."</td>";
            echo "<td>".$key['gejala']."</td>";
            echo "</tr>";
        }
        ?>
    </tbody>
</table>

<br>

<h3>Hasil Analisa</h3>
<table border="1">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Penyakit</th>
            <th>Nama Gejala</th>
            <th>Nilai</th>
            <th>Total</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        $no = 1;
        $hasil_semua = [];
        $rowspan = 1;

        foreach ($data_row as $key_row) {
            $hasil_semua[] = [
                'kd_penyakit' => $key_row['kd_penyakit'],
                'penyakit' => $key_row['penyakit'],
                'solusi' => $key_row['solusi'],
            ];

            foreach ($data as $key) {
                if ($key_row['kd_penyakit'] == $key['kd_penyakit']) {
                    echo "<tr>";
                    if ($key_row['kd_gejala'] == $key['kd_gejala']) {
                        echo "<td rowspan='".$key_row['rowspan']."'><center>".$no."</center></td>";
                        echo "<td rowspan='".$key_row['rowspan']."'><left>".$key['penyakit']."</left></td>";
                    }
                    echo "<td><center>".$key['kd_gejala']."</center></td>";
                    echo "<td><center>".$key['nilai']."</center></td>";

                    if ($key_row['kd_gejala'] == $key['kd_gejala']) {
                        $jumlah_penyakit = mysqli_query($koneksi, "SELECT COUNT(kd_penyakit) as jumlah_penyakit FROM relasi WHERE kd_penyakit = '".$key['kd_penyakit']."'");
                        $jumlah_penyakit = mysqli_fetch_assoc($jumlah_penyakit)['jumlah_penyakit'];
                        $total = number_format($key_row['rowspan'] / $jumlah_penyakit * 100, 2);
                        $totalArray[] = [
                            'kd_penyakit' => $key['kd_penyakit'],
                            'total' => $total,
                            'penyakit' => $key_row['penyakit'],
                            'solusi' => $key_row['solusi'],
                        ];
                        echo "<td rowspan='".$key_row['rowspan']."'><center>".$total."</center></td>";
                    }
                    echo "</tr>";
                }
            }
            $rowspan = $key_row['rowspan'];
        }
        ?>
    </tbody>
</table>

<h3>Kesimpulan</h3>
<table border="1">
    <thead>
        <?php
        usort($totalArray, function($a, $b) {
            return $b['total'] <=> $a['total'];
        });

        $terbesar = $totalArray[0];

        echo "<tr><td colspan='4'>Kesimpulan berdasarkan nilai total terbesar:</td></tr>";
        echo "<tr><td colspan='2'>Kode Penyakit:</td><td colspan='2'>".$terbesar['kd_penyakit']."</td></tr>";
        echo "<tr><td colspan='2'>Nama Penyakit:</td><td colspan='2'>".$terbesar['penyakit']."</td></tr>";
        echo "<tr><td colspan='2'>Solusi:</td><td colspan='2'>".$terbesar['solusi']."</td></tr>";
        ?>
    </thead>
</table>

<script>
    window.print();
</script>

 <!-- Footer -->
 <div class="footer">
        <hr>
        <?php
        $hari = array('Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu');
        $bulan = array(
            1 => 'Januari', 2 => 'Februari', 3 => 'Maret', 4 => 'April', 5 => 'Mei', 6 => 'Juni',
            7 => 'Juli', 8 => 'Agustus', 9 => 'September', 10 => 'Oktober', 11 => 'November', 12 => 'Desember'
        );
        $tanggal = date('j');
        $bulan_sekarang = $bulan[date('n')];
        $tahun = date('Y');
        $hari_sekarang = $hari[date('w')];
        ?>
        <p>Tangerang, <?= $hari_sekarang ?>, <?= $tanggal ?> <?= $bulan_sekarang ?> <?= $tahun ?></p>
        <p><strong></strong></p>
        <div class="spacer"></div>
        <p><strong>Pemilik Iguana</strong></strong></p>
    </div>


</body>
</html>