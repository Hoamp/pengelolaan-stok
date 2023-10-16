<?php require_once './layouts/top.php' ?>


<div class="container">
    <div class="row">
        <div class="col-md-6    ">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Tambah Bahan</h4>
                    <form action="proses.php" method="post">
                        <div class="mb-3">
                            <label for="nama-bahan" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="nama-bahan" name="nama">
                        </div>
                        <div class="mb-3">
                            <label for="stok-bahan" class="form-label">stok</label>
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