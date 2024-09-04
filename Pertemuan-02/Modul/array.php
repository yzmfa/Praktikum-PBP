<?php
    /* File     : array.php
       Deskripsi: Dasar PHP Array
       Nama/NIM : Yusuf Zaenul Mustofa/24060122120021
       Tanggal  : 4 September 2024
    */

    // Numeric array
    for ($i=0;$i<10;$i++){ 
        $diskon[] = $i * 5; 
    } 
    if (is_array($diskon)) 
        echo 'Array'; 
    else 
        echo 'Not Array'; 

    $n = sizeof($diskon); 
    for($i=0;$i<=($n-1);$i++){ 
        echo 'Diskon hari ke-'.($i+1).' = '.$diskon[$i].' % <br />'; 
    }

    // Assosiative array
    $bulan = array(
        'jan' => 'Januari', 
        'feb' => 'Februari', 
        'mar' => 'Maret', 
        'apr' => 'April', 
        'mei' => 'Mei', 
        'jun' => 'Juni', 
        'jul' => 'Juli', 
        'agu' => 'Agustus', 
        'sep' => 'Sepetember', 
        'okt' => 'Oktober', 
        'nov' => 'November', 
        'des' => 'Desember'
    ); 

    foreach($bulan as $kode_bulan => $nama_bulan){ 
        echo 'Kode bulan "'.$kode_bulan.'" => "'.$nama_bulan.'"<br />'; 
    }

?>