<?php
include 'koneksi.php';

$query = mysqli_query($koneksi, "SELECT * FROM pariwisata");

if (!$query) {
    die("Query gagal: " . mysqli_error($koneksi));
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Destinasi Pariwisata</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        h2 { margin-bottom: 15px; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; margin-bottom: 20px; }
        table, th, td { border: 1px solid #ccc; }
        th, td { padding: 10px; text-align: left; }
        th { background-color: #f4f4f4; }
        .btn-input { display: inline-block; padding: 10px 20px; background-color: #007bff; color: white; text-decoration: none; border-radius: 5px; font-weight: bold; }
        .btn-input:hover { background-color: #0056b3; }
        .btn-edit { color: #007bff; text-decoration: none; font-weight: bold; }
        .btn-delete { color: red; text-decoration: none; font-weight: bold; }
        .btn-edit:hover, .btn-delete:hover { text-decoration: underline; }
    </style>
</head>
<body>

    <h2>Daftar Data Destinasi Pariwisata Kabupaten Klaten</h2>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>ogc_fid</th>
                <th>Nama / Remark</th>
                <th>Longitude</th>
                <th>Latitude</th>
                <th>Namobj</th>
                <th>Simbol</th>
                <th colspan="2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $no = 1;
            while ($row = mysqli_fetch_assoc($query)) : 
            ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= htmlspecialchars($row['ogc_fid']); ?></td>
                <td><?= htmlspecialchars($row['remark']); ?></td>
                <td><?= htmlspecialchars($row['longitude']); ?></td>
                <td><?= htmlspecialchars($row['latitude']); ?></td>
                <td><?= htmlspecialchars($row['namobj']); ?></td>
                <td><?= htmlspecialchars($row['simbol']); ?></td>
                <td>
                    <a class="btn-edit" href="edit/index.php?id=<?= $row['id']; ?>">Edit</a>
                </td>
                <td>
                    <a class="btn-delete" href="delete.php?id=<?= $row['id']; ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>

</body>
</html>