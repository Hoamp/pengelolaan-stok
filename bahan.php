<?php
require_once './config/db.php';
$query_all = "SELECT * FROM bahan";
$data_bahan = mysqli_query($conn, $query_all);
$no = 1;


?>

<?php require_once './layouts/top.php' ?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Seluruh Bahan</h4>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary my-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Tambah Bahan
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
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0 text-center">Stok <small>(dirijen)</small></h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Status</h6>
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
                                        <td class="border-bottom-0">
                                            <p class="mb-0 fw-normal text-center"><?= $data['stok']; ?> </p>
                                        </td>
                                        <td class="border-bottom-0">
                                            <?php if ($data['stok'] > 50) { ?>
                                                <div class="d-flex align-items-center gap-2">
                                                    <span class="badge bg-success rounded-3 fw-semibold">Banyak</span>
                                                </div>
                                            <?php } else if ($data['stok'] > 20) { ?>
                                                <div class="d-flex align-items-center gap-2">
                                                    <span class="badge bg-primary rounded-3 fw-semibold">Sedang</span>
                                                </div>
                                            <?php } else { ?>
                                                <div class="d-flex align-items-center gap-2">
                                                    <span class="badge bg-warning rounded-3 fw-semibold">Sedikit</span>
                                                </div>
                                            <?php } ?>
                                        </td>
                                        <td class="border-bottom-0">
                                            <a href="proses-delete.php?bahan=<?= $data['id_bahan']; ?>" class="btn btn-danger">Delete</a>
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
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah bahan</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="nama-bahan" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="nama-bahan" name="nama">
                    </div>
                    <div class="mb-3">
                        <label for="stok-bahan" class="form-label">stok</label>
                        <input type="text" class="form-control" id="stok-bahan" name="stok">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="bahan-tambah">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php require_once './layouts/bot.php' ?>