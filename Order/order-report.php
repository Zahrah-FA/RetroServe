<?php
include('../koneksi.php');
require_once("../dompdf/autoload.inc.php");

use Dompdf\Dompdf;

$dompdf = new Dompdf();

// Fetch orders with item names
$query = mysqli_query($koneksi, "SELECT o.*, m.nama as item_name FROM tb_order o JOIN tb_menu m ON o.item = m.id ORDER BY o.tanggal DESC");

$html = '<center><h3>Order Report</h3></center><hr/><br>';
$html .= '<table border="1" width="100%">
            <tr>
                <th>No</th>
                <th>Date</th>
                <th>Customer</th>
                <th>Item</th>
                <th>Quantity</th>
                <th>Total</th>
            </tr>';
$no = 1;
while ($order = mysqli_fetch_array($query)) {
    $html .= "<tr>
                <td>" . $no . "</td>
                <td>" . $order['tanggal'] . "</td>
                <td>" . $order['customer'] . "</td>
                <td>" . $order['item_name'] . "</td>
                <td>" . $order['quantity'] . "</td>
                <td>Rp. " . number_format($order['total']) . "</td>
            </tr>";
    $no++;
}
$html .= "</table>";

$dompdf->loadHtml($html);
// Setting paper size and orientation
$dompdf->setPaper('A4', 'portrait');
// Rendering HTML to PDF
$dompdf->render();
// Outputting the PDF file
$dompdf->stream('order-report.pdf');
?>

