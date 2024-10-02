<?php
// File     : get_customer.php
// Deskripsi: mengambil data customers dari database
// Nama/NIM : Yusuf Zaenul Mustofa/24060122120021
// Tanggal  : 25 September 2024

require_once('./lib/db_login.php');
$customerid = $_GET['id'];

$query = " SELECT * FROM customers WHERE customerid=".$customerid;
$result = $db->query($query);

if (!$result) {
    die("Could not query the database: <br>" .$db->error);
}

while ($row = $result->fetch_object()){
    echo 'Name: '.$row->name.'<br/>';
    echo 'Address: '.$row->address.'<br/>';
    echo 'City: '.$row->city.'<br/>';
}

$result->free();
$db->close();

?>
