<?php
include '../koneksi.php';

if (!isset($_GET['id']) || empty($_GET['id'])) {
    echo "<h3>Error: ID data tidak ditemukan di URL.</h3>";
    echo "<a href='../index.php'>Kembali ke Halaman Utama</a>";
    exit();
}

$id = $_GET['id'];
$query = mysqli_query($koneksi, "SELECT * FROM pariwisata WHERE id = '$id'");
$data = mysqli_fetch_assoc($query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Form Edit Destinasi Pariwisata</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        h2 { margin-bottom: 20px; }
        form { width: 400px; }
        label { display: block; margin-top: 12px; }
        input { width: 100%; padding: 8px; margin-top: 5px; box-sizing: border-box; }
        button { margin-top: 20px; padding: 10px 20px; background-color: #007bff; color: white; border: none; border-radius: 5px; cursor: pointer; }
        button:hover { background-color: #0056b3; }
    </style>
</head>
<body>

    <h2>Form Edit Data Destinasi Pariwisata</h2>

    <?php if ($data) : ?>
    <form action="edit.php" method="POST">
        <input type="hidden" name="id" value="<?= htmlspecialchars($data['id']); ?>">

        <label>ogc_fid:</label>
        <input type="number" name="ogc_fid" value="<?= htmlspecialchars($data['ogc_fid']); ?>" required>

        <label>Nama / Remark:</label>
        <input type="text" name="remark" value="<?= htmlspecialchars($data['remark']); ?>" required>

        <label>Longitude:</label>
        <input type="text" name="longitude" value="<?= htmlspecialchars($data['longitude']); ?>" required>

        <label>Latitude:</label>
        <input type="text" name="latitude" value="<?= htmlspecialchars($data['latitude']); ?>" required>

        <label>Namobj:</label>
        <input type="text" name="namobj" value="<?= htmlspecialchars($data['namobj']); ?>" required>

        <label>Simbol:</label>
        <input type="text" name="simbol" value="<?= htmlspecialchars($data['simbol']); ?>" required>

        <button type="submit">Simpan Perubahan</button>
    </form>
    <?php else : ?>
        <p>Data tidak ditemukan.</p>
        <a href="../index.php">Kembali</a>
    <?php endif; ?>

</body>
</html>