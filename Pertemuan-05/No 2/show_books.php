<?php 
// File     : show_books.php
// Deskripsi: menampilkan data dari books
// Nama/NIM : Yusuf Zaenul Mustofa/24060122120021
// Tanggal  : 25 September 2024

include('./lib/header.html') ?>
<div class="row w-50 mx-auto mt-5">
    <div class="col">
        <div class="card">
            <div class="card-header">Show Books Data</div>
            <div class="card-body">
                <select name="books" id="books" class="form-select" onchange="showBooks(this.value)">
                    <option value="">-- Select a Book --</option>
                    <?php
                    require_once('./lib/db_login.php');

                    // Asign A Query
                    $query = "SELECT * FROM books ORDER BY isbn";
                    $result = $db->query($query);

                    if (!$result) {
                        die("Could not query the database: <br>" . $db->error);
                    }

                    while ($row = $result->fetch_object()) {
                        echo "<option value='" . $row->isbn . "'>" . $row->title . "</option>";
                    }                    

                    $result->free();
                    $db->close();
                    ?>
                </select>
                <br>
                <div id="detail_books"></div>
            </div>
        </div>
    </div>
</div>
<?php include('./lib/footer.html') ?>