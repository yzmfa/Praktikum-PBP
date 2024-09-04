<?php
    /* File     : variabel dan konstanta.php
       Deskripsi: Dasar PHP Variabel dan Konstanta
       Nama/NIM : Yusuf Zaenul Mustofa/24060122120021
       Tanggal  : 4 September 2024
    */

    //assign nilai ke variabel 
    $a = 15; 
    echo 'Variabel a berisi : '.$a.'<br />'; 
    $a = 'Pemrograman Web dan Internet'; 
    echo 'Variabel a berisi : '.$a.'<br />'; 

    // Variabel lokal
    function diskon(){ 
        $harga = 1000; 
        $harga = 0.2 * $harga; 
    } 
    $harga = 2000; 
    diskon(); 
    echo 'harga = '.$harga.'<br />';

    // Variabel global
    function diskon1(){ 
        global $harga; 
        $harga = 0.8 * $harga; 
    } 
    $harga = 2000; 
    diskon1(); 
    echo 'harga = '.$harga.'<br />';

    // Variabel statik
    function diskon2(){ 
        static $harga = 1000; 
        $harga = 0.8 * $harga; 
        echo 'harga = '.$harga.'<br />'; 
    } 
    $harga = 30; 
    diskon2(); 
    diskon2(); 
    echo 'harga = '.$harga.'<br />';

    // Variabel super global
    echo htmlentities($_SERVER["PHP_SELF"]); 

    // Konstanta
    define("PWI", "Permograman Web dan Internet "); 
    echo 'Hari ini sedang praktikum '.PWI.'<br />'; 
    $constant_name = "PWI"; 
    echo 'Hari ini sedang praktikum '.constant($constant_name).'<br />'; 

    // Konstanta bawaan PHP
    echo 'File yang sedang diproses "'. __FILE__ .'" pada baris "'. __LINE__ .'"<br />';
?>
