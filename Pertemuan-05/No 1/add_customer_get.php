<?php
// File: add_customer.php
// Deskripsi: menambahkan data ke database menggunakan metode get
// Nama/NIM : Yusuf Zaenul Mustofa/24060122120021
// Tanggal  : 25 September 2024
require_once('./lib/db_login.php');

$name = $db->real_escape_string($_GET['name']);
$address = $db->real_escape_string($_GET['address']);
$city = $db->real_escape_string($_GET['city']);

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
            Name: '.$_GET['name'].'<br>
            Address: '.$_GET['address'].'<br>
            City: '.$_GET['city'].'<br>
          </div>';
}

// Close DB Connection
$db->close();
