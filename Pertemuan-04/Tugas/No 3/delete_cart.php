<?php
// File     : delete_cart.php
// Deskripsi: untuk menghapus 
// Nama/NIM : Yusuf Zaenul Mustofa/24060122120021
// Tanggal  : 18 September 2024

session_start();
if (isset($_SESSION['cart'])){
    unset($_SESSION['cart']);
}

header('Location: show_cart.php');
?>