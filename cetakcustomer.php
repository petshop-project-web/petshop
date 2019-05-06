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

$users = query("SELECT * FROM users");

$mpdf = new \Mpdf\Mpdf();

$html = '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Daftar Customers</title>
    <link rel="stylesheet" href="css/print.css">
</head>
<body>
    <h1>Daftar Pelanggan</h1>
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Address</th>
            <th>City</th>
            <th>E-mail</th>
            <th>Sex</th>
            <th>Type</th>
            <th>Date</th>
        </tr>';

        $i = 1;
        foreach($users as $user){
            $html .= '<tr>
                <td>'. $i++ .'</td>
                <td>'. $user["first_name"] .'</td>
                <td>'. $user["last_name"] .'</td>
                <td>'. $user["user_address"] .'</td>
                <td>'. $user["user_city"] .'</td>
                <td>'. $user["email"] .'</td>
                <td>'. $user["user_sex"] .'</td>
                <td>'. $user["user_type"] .'</td>
                <td>'. $user["date_entered"] .'</td>
                </tr>';
        }

$html .= '</table>
</body>
</html>';

$mpdf->WriteHTML($html);
$mpdf->Output('daftar-pelanggan.pdf', 'I');

?>