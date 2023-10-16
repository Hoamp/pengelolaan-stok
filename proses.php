<?php
date_default_timezone_set('Asia/Jakarta');
require_once './config/db.php';

// bahan
if (isset($_POST['bahan-tambah'])) {
    $nama = $_POST['nama'];
    $stok = $_POST['stok'];

    $q = "INSERT INTO `bahan` 
    (`id_bahan`, `nama`, `stok`) 
    VALUES 
    (NULL, '$nama', '$stok');";

    $data = mysqli_query($conn, $q);

    // arahkan ke halaman lain
    echo "<script>alert('Berhasil tambah bahan');</script>";
    echo "<script>window.location.href = 'bahan.php';</script>";
}

// bahan masuk
if (isset($_POST['bahan-masuk-tambah'])) {
    $pertambahan_stok = $_POST['pertambahan_stok'];
    $id_bahan = $_POST['id_bahan'];

    $waktu_sekarang = time();
    $waktu = date('H-d-m-Y', $waktu_sekarang);

    $q = "INSERT INTO `bahan_masuk` 
    (`id_bahan_masuk`, `id_bahan`, `penambahan_stok`, `waktu`) 
    VALUES 
    (NULL, '$id_bahan', '$pertambahan_stok', '$waktu');";
    $do_q = mysqli_query($conn, $q);

    // arahkan ke halaman lain
    echo "<script>alert('Berhasil tambah bahan masuk');</script>";
    echo "<script>window.location.href = 'bahan-masuk.php';</script>";
}

// bahan keluar
if (isset($_POST['bahan-keluar-tambah'])) {
    $pengurangan_stok = $_POST['pengurangan_stok'];
    $id_bahan = $_POST['id_bahan'];

    $waktu_sekarang = time();
    $waktu = date('H-d-m-Y', $waktu_sekarang);

    $q = "INSERT INTO `bahan_keluar` 
    (`id_bahan_keluar`, `id_bahan`, `pengurangan_stok`, `waktu`) 
    VALUES 
    (NULL, '$id_bahan', '$pengurangan_stok', '$waktu');";
    $do_q = mysqli_query($conn, $q);

    // arahkan ke halaman lain
    echo "<script>alert('Berhasil mengurangi stok bahan');</script>";
    echo "<script>window.location.href = 'bahan-keluar.php';</script>";
}

if (isset($_POST['bahan-edit'])) {
    $nama = $_POST['nama'];
    $stok = $_POST['stok'];
    $id_bahan = $_POST['id_bahan'];

    $q = "UPDATE `bahan` 
    SET `nama` = '$nama', 
    `stok` = '$stok' 
    WHERE `bahan`.`id_bahan` = '$id_bahan';";
    $do_q = mysqli_query($conn, $q);


    // arahkan ke halaman lain
    echo "<script>alert('Berhasil mengedit bahan');</script>";
    echo "<script>window.location.href = 'bahan.php';</script>";
}
