<?php
include '../koneksi.php';

if (isset($_POST['simpan'])) {
    $nama = $_POST['nama'];
    $price = $_POST['price'];
    $kategori = $_POST['kategori'];


    $sql = "INSERT INTO tb_menu VALUES(NULL, '$nama', '$price', '$kategori')";

    if (empty($nama) || empty($price) || empty($kategori)) {
        echo "
            <script>
                alert('Pastikan Anda Mengisi Semua Data');
                window.location = 'menu-entry.php';
            </script>
        ";
    } elseif (mysqli_query($koneksi, $sql)) {
        echo "
            <script>
                alert('Data Menu Berhasil Ditambahkan');
                window.location = 'menu.php'
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Terjadi Kesalahan');
                window.location = 'menu-entry.php'
            </script>
        ";
    }
} elseif (isset($_POST['edit'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $price = $_POST['price'];
    $kategori = $_POST['kategori'];

    $sql = "UPDATE tb_menu SET 
            nama = '$nama',
            price = '$price',
            kategori = '$kategori'
            WHERE id = '$id'";

    if (mysqli_query($koneksi, $sql)) {
        echo "
            <script>
                alert('Data Menu Berhasil Diubah');
                window.location = 'menu.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Terjadi Kesalahan');
                window.location = 'menu-edit.php';
            </script>
        ";
    }
} elseif (isset($_POST['hapus'])) {
    $id = $_POST['id'];

    $sql = "DELETE FROM tb_menu WHERE id = $id";
    if (mysqli_query($koneksi, $sql)) {
        echo "
            <script>
                alert('Data Menu Berhasil Dihapus');
                window.location = 'menu.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Data Categories Gagal Dihapus');
                window.location = 'menu.php';
            </script>
        ";
    }
} else {
    header('location: menu.php');
}
