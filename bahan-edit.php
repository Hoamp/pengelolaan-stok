<?php
require_once 'config/db.php';
$id_bahan = $_GET['id_bahan'];
$q = "SELECT * FROM bahan WHERE id_bahan = '$id_bahan'";
$dataB = mysqli_query($conn, $q);
$data = mysqli_fetch_assoc($dataB);
?>
<?php require_once './layouts/top.php' ?>

<div class="container">
    <div class="row">
        <div class="col-md-6    ">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Edit Bahan</h4>
                    <form action="proses.php" method="post">
                        <div class="mb-3">
                            <label for="nama-bahan" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="nama-bahan" name="nama" value="<?= $data['nama']; ?>">
                        </div>
                        <input type="hidden" class="form-control" id="nama-bahan" name="id_bahan" value="<?= $data['id_bahan']; ?>">
                        <div class="mb-3">
                            <label for="stok-bahan" class="form-label">stok</label>
                            <input type="text" class="form-control" id="stok-bahan" name="stok" value="<?= $data['stok']; ?>">
                        </div>
                        <button type="submit" name="bahan-edit" class="btn btn-primary">Edit Bahan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<?php require_once './layouts/bot.php' ?>