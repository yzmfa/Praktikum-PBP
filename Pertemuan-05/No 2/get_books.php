<?php
// File     : get_books.php
// Deskripsi: mengambil data books dari database
// Nama/NIM : Yusuf Zaenul Mustofa/24060122120021
// Tanggal  : 25 September 2024

require_once('./lib/db_login.php');
$isbn = $_GET['isbn'];

$query = "SELECT * FROM books WHERE isbn='$isbn'";
$result = $db->query($query);

if (!$result) {
    die("Could not query the database: <br>" .$db->error);
}

while ($row = $result->fetch_object()) {
    echo 'ISBN: ' . $row->isbn . '<br/>';
    echo 'Author: ' . $row->author . '<br/>';
    echo 'Title: ' . $row->title . '<br/>';
    echo 'Price: ' . $row->price . '<br/>';
}

$result->free();
$db->close();

?>