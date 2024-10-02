<?php
// File     : db_login.php
// Deskripsi: melakukan koneksi ke database
// Nama/NIM : Yusuf Zaenul Mustofa/24060122120021
// Tanggal  : 18 September 2024

$db_host = 'localhost';
$db_database = 'bookorama';
$db_username = 'root';
$db_password = '';

//  Connect database
$db = new mysqli($db_host, $db_username, $db_password, $db_database);
if ($db->connect_errno) {
    die('Could not connect to the database: <br/>' . $db->connect_error);
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>