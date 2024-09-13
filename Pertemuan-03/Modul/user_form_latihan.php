<!-- Nama File  : user_form_latihan.php -->
<!-- Deskripsi  : Latihan membuat form input siswa -->
<!-- Nama/NIM   : Yusuf Zaenul Mustofa/24060122120021 -->
<!-- Tanggal    : 11 September 2024 -->

<?php
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

if (isset($_POST['submit'])) {
  // Validasi NIS: terdiri atas 10 karakter dan hanya berisi angka 0-9
  $nis = test_input($_POST['nis']);
  if (empty($nis)) {
    $error_nis = "NIS harus diisi";
  } elseif (!preg_match("/^[0-9]{10}$/", $nis)) {
    $error_nis = "Format NIS tidak benar";
  }

  // Validasi nama: tidak boleh kosong, hanya dapat berisi huruf dan spasi
  $nama = test_input($_POST['nama']);
  if (empty($nama)) {
    $error_nama = "Nama harus diisi";
  } elseif (!preg_match("/^[a-zA-Z ]*$/", $nama)) {
    $error_nama = "Nama hanya dapat berisi huruf dan spasi";
  }

  // Validasi jenis kelamin: tidak boleh kosong
  if (!isset($_POST['jenis_kelamin'])) {
    $error_jenis_kelamin = "Jenis kelamin harus diisi";
  }

  // Validasi kelas: tidak boleh kosong
  if (!isset($_POST['kelas'])) {
    $error_kelas = "Kelas harus diisi";
  }

  // Validasi ekstra hanya jika kelas X atau XI
  if (isset($_POST['kelas']) && ($_POST['kelas'] == 'X' || $_POST['kelas'] == 'XI')) {
    if (!isset($_POST['ekstra'])) {
      $error_ekstra = "Anda harus memilih minimal 1 ekstrakurikuler";
    } elseif (count($_POST['ekstra']) > 3) {
      $error_ekstra = "Anda hanya boleh memilih maksimal 3 ekstrakurikuler";
    }
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Form Input Siswa</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
  
  <script>
    function displayEkstra() {
      var kelas = document.getElementById("kelas").value;
      var ekstraForm = document.getElementById("ekstraForm");
      if (kelas === "X" || kelas === "XI") {
        ekstraForm.style.display = "block";
      } else {
        ekstraForm.style.display = "none";
      }
    }
  </script>
</head>

<body onload="displayEkstra()">
  <div class="container"><br />
    <div class="card">
      <div class="card-header">Form Input Siswa</div>
      <div class="card-body">
        <form method="POST" autocomplete="on" action="">
          <div class="form-group">
            <label for="nis">NIS:</label>
            <input type="text" class="form-control" id="nis" name="nis" value="<?= isset($_POST['nis']) ? $_POST['nis'] : '' ?>">
            <div class="text-danger"><?= isset($error_nis) ? $error_nis : '' ?></div>
          </div>

          <div class="form-group">
            <label for="nama">Nama:</label>
            <input type="text" class="form-control" id="nama" name="nama" maxlength="50" value="<?= isset($_POST['nama']) ? $_POST['nama'] : '' ?>">
            <div class="text-danger"><?= isset($error_nama) ? $error_nama : '' ?></div>
          </div>

          <label>Jenis Kelamin:</label>
          <div class="form-check">
            <input type="radio" class="form-check-input" name="jenis_kelamin" value="pria" <?= isset($_POST['jenis_kelamin']) && $_POST['jenis_kelamin'] == 'pria' ? 'checked' : '' ?>> Pria
          </div>
          <div class="form-check">
            <input type="radio" class="form-check-input" name="jenis_kelamin" value="wanita" <?= isset($_POST['jenis_kelamin']) && $_POST['jenis_kelamin'] == 'wanita' ? 'checked' : '' ?>> Wanita
          </div>
          <div class="text-danger"><?= isset($error_jenis_kelamin) ? $error_jenis_kelamin : '' ?></div>

          <div class="form-group">
            <label for="kelas">Kelas:</label>
            <select id="kelas" name="kelas" class="form-control" onchange="displayEkstra()">
              <option value="" selected disabled>-- Pilih Kelas --</option>
              <option value="X" <?= isset($_POST['kelas']) && $_POST['kelas'] == 'X' ? 'selected' : '' ?>>X</option>
              <option value="XI" <?= isset($_POST['kelas']) && $_POST['kelas'] == 'XI' ? 'selected' : '' ?>>XI</option>
              <option value="XII" <?= isset($_POST['kelas']) && $_POST['kelas'] == 'XII' ? 'selected' : '' ?>>XII</option>
            </select>
            <div class="text-danger"><?= isset($error_kelas) ? $error_kelas : '' ?></div>
          </div>

          <div id="ekstraForm" style="display:none;">
            <label>Ekstrakurikuler:</label>
            <div class="form-check">
              <input type="checkbox" class="form-check-input" name="ekstra[]" value="pramuka" <?= isset($_POST['ekstra']) && in_array('pramuka', $_POST['ekstra']) ? 'checked' : '' ?>> Pramuka
            </div>
            <div class="form-check">
              <input type="checkbox" class="form-check-input" name="ekstra[]" value="seni_tari" <?= isset($_POST['ekstra']) && in_array('seni_tari', $_POST['ekstra']) ? 'checked' : '' ?>> Seni Tari
            </div>
            <div class="form-check">
              <input type="checkbox" class="form-check-input" name="ekstra[]" value="sinematografi" <?= isset($_POST['ekstra']) && in_array('sinematografi', $_POST['ekstra']) ? 'checked' : '' ?>> Sinematografi
            </div>
            <div class="form-check">
              <input type="checkbox" class="form-check-input" name="ekstra[]" value="basket" <?= isset($_POST['ekstra']) && in_array('basket', $_POST['ekstra']) ? 'checked' : '' ?>> Basket
            </div>
            <div class="text-danger"><?= isset($error_ekstra) ? $error_ekstra : '' ?></div>
          </div>

          <br>
          <button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button>
          <button type="reset" class="btn btn-danger">Reset</button>
        </form>
      </div>

      <?php
      if (isset($_POST['submit']) && empty($error_nis) && empty($error_nama) && empty($error_jenis_kelamin) && empty($error_kelas) && empty($error_ekstra)) {
        echo "<h3>Your Input:</h3>";
        echo "NIS: " . $_POST['nis'] . "<br>";
        echo "Nama: " . $_POST['nama'] . "<br>";
        echo "Jenis Kelamin: " . $_POST['jenis_kelamin'] . "<br>";
        echo "Kelas: " . $_POST['kelas'] . "<br>";

        if (isset($_POST['ekstra'])) {
          echo "Ekstra yang dipilih: <br>";
          foreach ($_POST['ekstra'] as $ekstra_item) {
            echo "- " . $ekstra_item . "<br>";
          }
        }
      }
      ?>
    </div>
  </div>
</body>

</html>
