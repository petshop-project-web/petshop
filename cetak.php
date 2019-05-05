<?php

require_once __DIR__ . '/vendor/autoload.php';

require 'function.php';

session_start();

if( !isset($_SESSION["login"]) ){
  header("Location: index.php");
  exit;
}
if( $_SESSION["user_type"] != "admin" ){
  header("Location: index.php");
  exit;
}

$products = query("SELECT * FROM products");

$mpdf = new \Mpdf\Mpdf();

$html = '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Daftar Produk</title>
    <link rel="stylesheet" href="css/print.css">
</head>
<body>
    <h1>Daftar Produk</h1>
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>No</th>
            <th>Code</th>
            <th>Foto</th>
            <th>Nama</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>Keterangan</th>
            <th>Tipe</th>
            <th>Rating</th>
        </tr>';

        $i = 1;
        foreach($products as $product){
            $html .= '<tr>
                <td>'. $i++ .'</td>
                <td>'. $product["product_code"] .'</td>
                <td><img src="img/products/'. $product["product_img_name"] .'" width="50" ></td>
                <td>'. $product["product_name"] .'</td>
                <td>'. $product["price_product"] .'</td>
                <td>'. $product["qty_product"] .'</td>
                <td>'. $product["product_desc"] .'</td>
                <td>'. $product["product_type"] .'</td>
                <td>'. $product["product_rating"] .'</td>
                </tr>';
        }

$html .= '</table>
</body>
</html>';

$mpdf->WriteHTML($html);
$mpdf->Output('daftar-produk.pdf', 'I');

?>