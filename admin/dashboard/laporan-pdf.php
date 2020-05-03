<?php
require_once '../../core/init.php';
if (!Session::exists('email')) {
    header('Location: ../index.php');
}

require_once("../../dompdf/autoload.inc.php");
use Dompdf\Dompdf;

$report = new Laporan();
$datas = $report->selectReport(Input::get('start'), Input::get('to'));

if (count($datas) == 0) {
    echo "<script>alert('Tidak ada data pada tanggal tersebut.'); window.location.href='laporan.php'</script>";
} else {
    $dompdf = new Dompdf();

    $html = "<html><center><h3>Report KUTBI Textile</h3></center>";
    $html .= "<center>Pada Tanggal ".Input::get('start')." - ".Input::get('to')."</center><hr/><br/>";
    $html .= "
<table border='1' width='100%'>
<tr>
    <th>No</th>
    <th>Invoice</th>
    <th>Level</th>
    <th>Sub Total</th>
    <th>Total</th>
    <th>Status</th>
    <th>Tanggal</th>
</tr>
";

    $no = 1;
    $sub = 0;
    $total = 0;
    foreach ($datas as $value) {
        $level = $value['level'] == '0' ? 'Online' : 'POS';
        $html .= "<tr>
    <th style='text-align:center;'>$no</th>
    <td>".$value['order_id']."</td>
    <td>".$level."</td>
    <td>".$value['sub_total']."</td>
    <td>".$value['total']."</td>
    <td>".$value['status']."</td>
    <td>".$value['tanggal']."</td>
</tr>";
        $no++;
        $sub += $value['sub_total'];
        $total += $value['total'];
    }

    $html .= "
<tr>
    <th colspan='6'>Sub Total</th>
    <th>$sub</th>
</tr>
<tr>
    <th colspan='6'>Total</th>
    <th>$total</th>
</tr>
";

    $html .= "</html>";

    $dompdf->loadHtml($html);
    $dompdf->setPaper('A4', 'potrait');
    $dompdf->render();
    $dompdf->stream('laporan-pdf.pdf');
}

// echo '<pre>';
// print_r($html);
// echo '</pre>';
// die;
