<?php 
// File     : show_server_time.php
// Deskripsi: menampilkan waktu server
// Nama/NIM : Yusuf Zaenul Mustofa/24060122120021
// Tanggal  : 25 September 2024

include('./lib/header.html'); ?>
<div class="row w-75 mx-auto text-center">
    <div class="col">
        <div class="card mt-5">
            <div class="card-header">Ajax Server Time</div>
            <div class="card-body">
                <div class="mb-4 h1" id="showtime"></div>
                <button class="btn btn-success" onclick="get_server_time()">Show Server Time</button>
            </div>
        </div>
    </div>
</div>
<?php include('./lib/footer.html'); ?>