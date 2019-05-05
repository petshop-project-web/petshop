<?php

$conn = mysqli_connect("localhost","root","","petshop");

function query($query){
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ( $row = mysqli_fetch_assoc($result) ){
        $rows[] = $row;
    }
    return $rows;
}

function register($data){
    global $conn;

    $first_name = htmlspecialchars($data["first_name"]);
    $last_name = htmlspecialchars($data["last_name"]);
    $user_address = htmlspecialchars($data["user_address"]);
    $user_city = htmlspecialchars($data["user_city"]);
    $email = strtolower(stripslashes($data["email"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);
    $user_sex = htmlspecialchars($data["user_sex"]);

    //cek konfirmasi password
    if($password !== $password2){
        echo "
            <script>
                alert('Konfirmasi Password Tidak Sesuai');
                document.location.href='register.php';
            </script>
        ";

        return false;
    }

    // cek username
    $result = mysqli_query($conn, "SELECT email FROM users WHERE email = '$email'");
    
    if( mysqli_fetch_assoc($result) ){
        echo "
            <script>
                alert('email sudah terdaftar!');
                document.location.href='register.php';
            </script>
        ";
        return false;
    }

    // enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    // tambahkan data baru ke database
    $query = "INSERT INTO users VALUES
                ('','$first_name','$last_name','$user_address','$user_city','$email','$password',
                DEFAULT,'$user_sex',NOW())";
    
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function cari($keyword){
    $query = "SELECT * FROM products WHERE product_name LIKE '$keyword%'";

    return query($query);
}

?>