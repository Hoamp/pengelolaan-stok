<?php
require_once './config/db.php';
$qNamaBahan = "SELECT nama,id_bahan FROM bahan";
$nama_bahan = mysqli_query($conn, $qNamaBahan);

?>

<?php require_once './layouts/top.php' ?>

<div class="container">
    <div class="row">
        <div class="col-md-6    ">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Tambah Bahan</h4>
                    <form action="proses.php" method="post">
                        <select name="nama" id="" class="form-select">
                            <?php foreach ($nama_bahan as $bahan) : ?>
                                <option value="<?= $bahan['id_bahan']; ?>"><?= $bahan['nama']; ?></option>
                            <?php endforeach ?>
                        </select>
                        <div class="my-3">
                            <label for="stok-bahan" class="form-label">Pertambahan stok</label>
                            <input type="text" class="form-control" id="stok-bahan" name="stok">
                        </div>
                        <button type="submit" name="bahan-tambah" class="btn btn-primary">Tambah Bahan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<?php require_once './layouts/bot.php' ?>