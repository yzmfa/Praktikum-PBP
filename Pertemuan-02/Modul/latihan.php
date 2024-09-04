<?php
    /* File     : latihan.php
       Deskripsi: Latihan dasar penggunaan PHP 
       Nama/NIM : Yusuf Zaenul Mustofa/24060122120021
       Tanggal  : 4 September 2024
    */

    // Array mahasiswa
    $array_mhs = array(
        'Abdul' => array(89, 90, 54),
        'Budi' => array(98, 65, 74),
        'Nina' => array(67, 56, 84)
    );

    // Fungsi untuk menghitung rata-rata
    function hitung_rata($array){
        $total = array_sum($array);
        return $total / count($array);
    }

    // Membuat tabel
    echo '<table border="1">';
    echo '<tr><th>Nama</th><th>Nilai 1</th><th>Nilai 2</th><th>Nilai 3</th><th>Rata2</th></tr>';

    // Menampilkan data mahasiswa dalam tabel
    foreach($array_mhs as $nama => $nilai){
        echo '<tr>';
        echo '<td>'.$nama.'</td>';
        foreach($nilai as $n){
            echo '<td>'.$n.'</td>';
        }
        echo '<td>'.hitung_rata($nilai).'</td>';
        echo '</tr>';
    }

    echo '</table>';
?>
