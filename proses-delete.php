<?php
require_once 'config/db.php';
if (isset($_GET['bahan'])) {
    $id_bahan = $_GET['bahan'];
    $q = "DELETE FROM bahan WHERE id_bahan = '$id_bahan'";
    $delete = mysqli_query($conn, $q);


    // arahkan ke halaman lain
    echo "<script>alert('Berhasil delete bahan');</script>";
    echo "<script>window.location.href = 'bahan.php';</script>";
    die;
}
if (isset($_GET['bahan_masuk'])) {
    $id_bahan_masuk = $_GET['bahan_masuk'];
    $q = "DELETE FROM bahan_masuk WHERE id_bahan_masuk = '$id_bahan_masuk'";
    $delete = mysqli_query($conn, $q);


    // arahkan ke halaman lain
    echo "<script>alert('Berhasil delete bahan masuk');</script>";
    echo "<script>window.location.href = 'bahan-masuk.php';</script>";
    die;
}
if (isset($_GET['bahan_keluar'])) {
    $id_bahan_keluar = $_GET['bahan_keluar'];
    $q = "DELETE FROM bahan_keluar WHERE id_bahan_keluar = '$id_bahan_keluar'";
    $delete = mysqli_query($conn, $q);


    // arahkan ke halaman lain
    echo "<script>alert('Berhasil delete bahan keluar');</script>";
    echo "<script>window.location.href = 'bahan-keluar.php';</script>";
    die;
}
