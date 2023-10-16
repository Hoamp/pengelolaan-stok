<?php
require_once './config/db.php';
$query_all = "SELECT * FROM bahan_masuk INNER JOIN bahan ON bahan.id_bahan = bahan_masuk.id_bahan ";
$data_bahan = mysqli_query($conn, $query_all);
$no = 1;

$qNamaBahan = "SELECT nama,id_bahan,stok FROM bahan";
$nama_bahan = mysqli_query($conn, $qNamaBahan);


?>

<?php require_once './layouts/top.php' ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Laporan Bahan Masuk</h4>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary my-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Tambah Stok Bahan
                    </button>


                    <div class="table-responsive">
                        <table class="table text-nowrap mb-0 align-middle">
                            <thead class="text-dark fs-4">
                                <tr>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">No</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Nama</h6>
                                    </th>
                                    <th class="border-bottom-0 text-center">
                                        <h6 class="fw-semibold mb-0">Penambahan Stok</h6>
                                    </th>
                                    <th class="border-bottom-0 text-center">
                                        <h6 class="fw-semibold mb-0">Waktu <small>(jam-tanggal-bulan-tahun)</small></h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Aksi</h6>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data_bahan as $data) : ?>
                                    <tr>
                                        <td class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0"><?= $no; ?></h6>
                                        </td>
                                        <td class="border-bottom-0">
                                            <h6 class="fw-semibold mb-1"><?= $data['nama']; ?></h6>
                                        </td>
                                        <td class="border-bottom-0 text-center">
                                            <p class="mb-0 fw-normal"><?= $data['penambahan_stok']; ?></p>
                                        </td>
                                        <td class="border-bottom-0 text-center">
                                            <p class="mb-0 fw-normal"><?= $data['waktu']; ?></p>

                                        </td>
                                        <td class="border-bottom-0">

                                        </td>
                                    </tr>
                                <?php $no++;
                                endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="proses.php" method="post">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah bahan masuk</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <select name="id_bahan" id="" class="form-select">
                        <?php foreach ($nama_bahan as $bahan) : ?>
                            <option value="<?= $bahan['id_bahan']; ?>"><?= $bahan['nama']; ?>, Stok : <?= $bahan['stok']; ?></option>
                        <?php endforeach ?>
                    </select>
                    <div class="my-3">
                        <label for="stok-bahan" class="form-label">Pertambahan stok</label>
                        <input type="text" class="form-control" id="stok-bahan" name="pertambahan_stok">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="bahan-masuk-tambah">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php require_once './layouts/bot.php' ?>