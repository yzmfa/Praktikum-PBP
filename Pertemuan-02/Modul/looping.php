<?php 
    /* File     : looping.php
       Deskripsi: Dasar PHP Looping
       Nama/NIM : Yusuf Zaenul Mustofa/24060122120021
       Tanggal  : 4 September 2024
    */

    // For Loop
    $harga = 1000; 
    echo '<table border="1">'; 
    echo '<tr><td>No</td><td>Diskon</td><td>Harga Setelah Diskon</td></tr>'; 
    for ($i=1;$i<=10;$i++){ 
        echo '<tr>'; 
        echo '<td>'.$i.'</td>'; 
        $diskon = $i * 0.1; 
        echo '<td>'.($diskon*100).' % </td>'; 
        $harga_diskon = $harga - ($harga * $diskon); 
        echo '<td>'.$harga_diskon.'</td>'; 
        echo '</tr>'; 
    } 
    echo '</table>';

    // While Loop (contoh belum ada, bisa disesuaikan dengan For Loop di atas)

    // Do-While Loop (contoh belum ada, bisa disesuaikan dengan For Loop di atas)

?>