<?php 
    /* File     : function.php
       Deskripsi: Dasar PHP Function
       Nama/NIM : Yusuf Zaenul Mustofa/24060122120021
       Tanggal  : 4 September 2024
    */

    // Fungsi yang tidak mengembalikan nilai (prosedur)
    function print_mhs($nama, $nim, $prodi){ 
        echo 'Nama: '.$nama.'<br />'; 
        echo 'NIM: '.$nim.'<br />'; 
        echo 'Prodi: '.$prodi.'<br />'; 
    }
    print_mhs('Alfa', '123456123', 'Ilmu Komputer/ Informatika'); 

    // Menghitung harga setelah diskon
    function hitung_diskon($harga, $diskon){ 
        $harga = $harga - ($harga*$diskon/100); 
        return $harga; 
    } 
    $harga = 10000; 
    $diskon = 20; 
    $harga_diskon = hitung_diskon($harga, $diskon); 
    echo 'Harga sebelum diskon = '.$harga.'<br />'; 
    echo 'Harga setelah diskon = '.$harga_diskon.'<br />';

    // Menghitung harga setelah diskon dengan nilai default diskon
    function hitung_diskon2($harga, $diskon=10){ 
        $harga = $harga - ($harga*$diskon/100); 
        return $harga; 
    } 
    $harga = 10000; 
    $harga_diskon = hitung_diskon2($harga); 
    echo 'Harga sebelum diskon = '.$harga.'<br />'; 
    echo 'Harga setelah diskon = '.$harga_diskon.'<br />';

    // Menghitung harga setelah diskon (referensi sebagai parameter)
    function hitung_diskon3(&$harga, $diskon){ 
        $harga = $harga - ($harga*$diskon/100); 
        return $harga; 
    } 
    $harga = 10000; 
    $diskon = 20; 
    echo 'Harga sebelum diskon = '.$harga.'<br />'; 
    hitung_diskon3($harga, $diskon); 
    echo 'Harga setelah diskon = '.$harga.'<br />';

    // Fungsi rekursif untuk menghitung faktorial
    function faktorial($n){ 
        if($n == 0){ 
            return 1; 
        }else{ 
            return $n * faktorial($n-1); 
        } 
    }

?>