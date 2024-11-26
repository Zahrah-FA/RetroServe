<?php
include '../koneksi.php';

if (isset($_POST['simpan'])) {
    $customer = $_POST['customer'];
    $item = $_POST['item'];
    $quantity = $_POST['quantity'];
    $status = $_POST['status'];

    // Get the price of the item
    $sql = "SELECT price FROM tb_menu WHERE id = '$item'";
    $result = mysqli_query($koneksi, $sql);
    $row = mysqli_fetch_assoc($result);
    $price = $row['price'];

    // Calculate total
    $total = $price * $quantity;

    $tanggal = date('Y-m-d');

    $sql = "INSERT INTO tb_order (customer, item, quantity, total, status, tanggal) 
            VALUES ('$customer', '$item', '$quantity', '$total', '$status', '$tanggal')";

    if (mysqli_query($koneksi, $sql)) {
        echo "
            <script>
                alert('Order added successfully');
                window.location = 'order.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Error adding order');
                window.location = 'order-entry.php';
            </script>
        ";
    }
} elseif (isset($_POST['edit'])) {
    $id = $_POST['id'];
    $customer = $_POST['customer'];
    $item = $_POST['item'];
    $quantity = $_POST['quantity'];
    $status = $_POST['status'];

    // Get the price of the item
    $sql = "SELECT price FROM tb_menu WHERE id = '$item'";
    $result = mysqli_query($koneksi, $sql);
    $row = mysqli_fetch_assoc($result);
    $price = $row['price'];

    // Calculate total
    $total = $price * $quantity;

    $sql = "UPDATE tb_order SET 
            customer = '$customer',
            item = '$item',
            quantity = '$quantity',
            total = '$total',
            status = '$status'
            WHERE id = '$id'";

    if (mysqli_query($koneksi, $sql)) {
        echo "
            <script>
                alert('Order updated successfully');
                window.location = 'order.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Error updating order');
                window.location = 'order-edit.php?id=$id';
            </script>
        ";
    }
} elseif (isset($_POST['hapus'])) {
    $id = $_POST['id'];

    $sql = "DELETE FROM tb_order WHERE id = $id";
    if (mysqli_query($koneksi, $sql)) {
        echo "
            <script>
                alert('Order deleted successfully');
                window.location = 'order.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Error deleting order');
                window.location = 'order.php';
            </script>
        ";
    }
} else {
    header('location: order.php');
}

