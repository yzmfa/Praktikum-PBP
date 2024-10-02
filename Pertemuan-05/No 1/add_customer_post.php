<?php
// File: add_customer.php
// Deskripsi: menambahkan data ke database menggunakan metode post
// Nama/NIM : Yusuf Zaenul Mustofa/24060122120021
// Tanggal  : 25 September 2024

require_once('./lib/db_login.php');

$name = $db->real_escape_string($_POST['name']);
$address = $db->real_escape_string($_POST['address']);
$city = $db->real_escape_string($_POST['city']);

// Assign a query
$query = "INSERT INTO customers (name, address, city) VALUES ('" . $name . "', '" . $address . "', '" . $city . "')";
$result = $db->query($query);

if (!$result) {
    echo '<div class="alert alert-danger alert-dismissible">
            <strong>Error!</strong> Could not query the database<br>'.
            $db->error. '<br>query = '.$query.
        '</div>';
} else {
    echo '<div class="alert alert-success alert-dismissible">
            <strong>Success!</strong> Data has been added.<br>
            Name: '.$_POST['name'].'<br>
            Address: '.$_POST['address'].'<br>
            City: '.$_POST['city'].'<br>
          </div>';
}

// Close DB Connection
$db->close();
