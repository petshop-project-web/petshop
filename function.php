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
    $email = htmlspecialchars($data["email"]);
    $password = htmlspecialchars($data["password"]);
    $user_sex = htmlspecialchars($data["user_sex"]);

    $query = "INSERT INTO users VALUES
                ('','$first_name','$last_name','$user_address','$user_city','$email','$password',
                DEFAULT,'$user_sex',NOW())";
    
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

?>