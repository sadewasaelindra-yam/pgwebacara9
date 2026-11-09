<?php
include '../koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id        = $_POST['id'];
    $ogc_fid   = $_POST['ogc_fid'];
    $remark    = $_POST['remark'];
    $longitude = $_POST['longitude'];
    $latitude  = $_POST['latitude'];
    $namobj    = $_POST['namobj'];
    $simbol    = $_POST['simbol'];

    $stmt = mysqli_prepare(
        $koneksi,
        "UPDATE pariwisata SET 
            ogc_fid = ?, 
            remark = ?, 
            longitude = ?, 
            latitude = ?, 
            namobj = ?, 
            simbol = ? 
         WHERE id = ?"
    );

    mysqli_stmt_bind_param(
        $stmt,
        "isssssi",
        $ogc_fid,
        $remark,
        $longitude,
        $latitude,
        $namobj,
        $simbol,
        $id
    );

    if (mysqli_stmt_execute($stmt)) {
        header("Location: ../index.php");
        exit();
    } else {
        echo "Gagal memperbarui data: " . mysqli_error($koneksi);
    }
} else {
    header("Location: ../index.php");
    exit();
}
?>