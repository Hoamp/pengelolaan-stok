<?php
// ambil library dan koneksi
require_once('config/db.php');
// convert file ke excel
$dari = $_POST['dari'];
$sampai = $_POST['sampai'];
header('Content-Type: application/vnd.ms-excel');
header("Content-Disposition: attachment; filename=\"Laporan bahan keluar $dari s/d $sampai.xls\"");
header('Cache-Control: max-age=0');

$data = mysqli_query($conn, "SELECT * FROM bahan_keluar INNER JOIN bahan ON bahan.id_bahan = bahan_keluar.id_bahan WHERE waktu >= '$dari' AND waktu <= '$sampai'");
?>
<h3>Laporan Bahan keluar <?php echo "$dari s/d $sampai" ?></h3>
<table width="100%" border="1" class="text-center">
    <thead>
        <tr class="text-center">
            <th>No</th>
            <th>Nama</th>
            <th>Pengurangan Stok</th>
            <th>Waktu (jam, tanggal, bulan, tahun)</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
        foreach ($data as $b_keluar) { ?>
            <tr class="text-center">
                <td><?= $no++; ?></td>
                <td><?= $b_keluar['nama']; ?></td>
                <td><?= $b_keluar['pengurangan_stok']; ?></td>
                <td><?= $b_keluar['waktu']; ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>