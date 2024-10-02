<?php 
// File     : delete_customer.php
// Deskripsi: Menghapus data customer berdasarkan customerid
// Nama/NIM : Yusuf Zaenul Mustofa/24060122120021
// Tanggal  : 18 September 2024

require_once('lib/db_login.php');

// Mendapatkan customerid yang dilewatkan melalui URL
$id = $_GET['id'];

if (!isset($id) || $id == '') {
    die("Customer ID tidak ditemukan.");
}

// Verifikasi apakah customer dengan ID tersebut ada di dalam database
$query = "SELECT * FROM customers WHERE customerid=".$id;
$result = $db->query($query);

if ($result->num_rows == 0) {
    die("Customer dengan ID tersebut tidak ditemukan.");
}

// Menghapus customer dari database
$query = "DELETE FROM customers WHERE customerid=".$id;
$result = $db->query($query);

if (!$result) {
    die("Could not delete the customer: <br />". $db->error. '<br>Query: ' . $query);
} else {
    // Tutup koneksi dan redirect ke halaman view_customer.php
    $db->close();
    header('location: view_customer.php');
}
?>
