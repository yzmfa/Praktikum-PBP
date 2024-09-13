<!-- Nama File  : user_form_post2.php -->
<!-- Deskripsi  : Menampilkan kembali isi form -->
<!-- Nama/NIM   : Yusuf Zaenul Mustofa/24060122120021 -->
<!-- Tanggal    : 11 September 2024 -->

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>user_form_post2</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>

<body>
  <?php
  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

  if (isset($_POST['submit'])) {
    // Validasi nama: tidak boleh kosong, hanya dapat berisi huruf dan spasi
    $nama = test_input($_POST['nama']);
    if (empty($nama)) {
      $error_nama = "Nama harus diisi";
    } elseif (!preg_match("/^[a-zA-Z ]*$/", $nama)) {
      $error_nama = "Nama hanya dapat berisi huruf dan spasi";
    }

    // Validasi email: tidak boleh kosong, format harus benar
    $email = test_input($_POST['email']);
    if (empty($email)) {
      $error_email = "Email harus diisi";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $error_email = "Format email tidak benar";
    }

    // Validasi alamat: tidak boleh kosong
    $alamat = test_input($_POST['alamat']);
    if (empty($alamat)) {
      $error_alamat = "Alamat harus diisi";
    }

    // Validasi jenis kelamin: tidak boleh kosong
    if (!isset($_POST['jenis_kelamin'])) {
      $error_jenis_kelamin = "Jenis kelamin harus diisi";
    }

    // Validasi kota: tidak boleh kosong
    if (!isset($_POST['kota'])) {
      $error_kota = "Kota harus diisi";
    }

    // Validasi minat: tidak boleh kosong
    if (!isset($_POST['minat'])) {
      $error_minat = "Minat harus diisi";
    }
  }
  ?>
  
  <div class="container"><br />
    <div class="card">
      <div class="card-header">Form Mahasiswa</div>
      <div class="card-body">
        <form method="POST" autocomplete="on" action>
          <div class="form-group">
            <label for="nama">Nama:</label>
            <input type="text" class="form-control" id="nama" name="nama" maxlength="50" value="<?= isset($_POST['nama']) ? $_POST['nama'] : '' ?>">
            <div class="text-danger"><?= isset($error_nama) ? $error_nama : '' ?></div>
          </div>

          <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" value="<?= isset($_POST['email']) ? $_POST['email'] : '' ?>">
            <div class="text-danger"><?= isset($error_email) ? $error_email : '' ?></div>
          </div>

          <div class="form-group">
            <label for="alamat">Alamat:</label>
            <textarea class="form-control" id="alamat" name="alamat" rows="3"><?= isset($_POST['alamat']) ? $_POST['alamat'] : '' ?></textarea>
            <div class="text-danger"><?= isset($error_alamat) ? $error_alamat : '' ?></div>
          </div>

          <div class="form-group">
            <label for="kota">Kota/Kabupaten:</label>
            <select id="kota" name="kota" class="form-control">
              <option value="" selected disabled>-- Pilih Kota/Kabupaten --</option>
              <option value="Semarang" <?= isset($_POST['kota']) && $_POST['kota'] == 'Semarang' ? 'selected' : '' ?>>Semarang</option>
              <option value="Jakarta" <?= isset($_POST['kota']) && $_POST['kota'] == 'Jakarta' ? 'selected' : '' ?>>Jakarta</option>
              <option value="Bandung" <?= isset($_POST['kota']) && $_POST['kota'] == 'Bandung' ? 'selected' : '' ?>>Bandung</option>
              <option value="Surabaya" <?= isset($_POST['kota']) && $_POST['kota'] == 'Surabaya' ? 'selected' : '' ?>>Surabaya</option>
            </select>
            <div class="text-danger"><?= isset($error_kota) ? $error_kota : '' ?></div>
          </div>

          <label>Jenis Kelamin:</label>
          <div class="form-check">
            <input type="radio" class="form-check-input" name="jenis_kelamin" value="pria" <?= isset($_POST['jenis_kelamin']) && $_POST['jenis_kelamin'] == 'pria' ? 'checked' : '' ?>> Pria
            <div class="text-danger"><?= isset($error_jenis_kelamin) ? $error_jenis_kelamin : '' ?></div>
          </div>
          <div class="form-check">
            <input type="radio" class="form-check-input" name="jenis_kelamin" value="wanita" <?= isset($_POST['jenis_kelamin']) && $_POST['jenis_kelamin'] == 'wanita' ? 'checked' : '' ?>> Wanita
            <div class="text-danger"><?= isset($error_jenis_kelamin) ? $error_jenis_kelamin : '' ?></div>
          </div>
          
          <br>
          <label>Peminatan:</label>
          <div class="form-check">
            <input type="checkbox" class="form-check-input" name="minat[]" value="coding" <?= isset($_POST['minat']) && in_array('coding', $_POST['minat']) ? 'checked' : '' ?>> Coding
            <div class="text-danger"><?= isset($error_minat) ? $error_minat : '' ?></div>
          </div>
          <div class="form-check">
            <input type="checkbox" class="form-check-input" name="minat[]" value="ux_design" <?= isset($_POST['minat']) && in_array('ux_design', $_POST['minat']) ? 'checked' : '' ?>> UX Design
            <div class="text-danger"><?= isset($error_minat) ? $error_minat : '' ?></div>
          </div>
          <div class="form-check">
            <input type="checkbox" class="form-check-input" name="minat[]" value="data_science" <?= isset($_POST['minat']) && in_array('data_science', $_POST['minat']) ? 'checked' : '' ?>> Data Science
            <div class="text-danger"><?= isset($error_minat) ? $error_minat : '' ?></div>
          </div>
          
          <br>
          <button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button>
          <button type="reset" class="btn btn-danger">Reset</button>
        </form>
      </div>

      <?php
      if (isset($_POST['submit'])) {
        echo "<h3>Your Input:</h3>";
        echo "Nama: " . $_POST['nama'] . "<br>";
        echo "Email: " . $_POST['email'] . "<br>";
        echo "Kota: " . $_POST['kota'] . "<br>";
        echo "Jenis Kelamin: " . $_POST['jenis_kelamin'] . "<br>";

        if (!empty($_POST['minat'])) {
          echo "Minat yang dipilih: <br>";
          foreach ($_POST['minat'] as $minat_item) {
            echo "- " . $minat_item . "<br>";
          }
        }
      }
      ?>
    </div>
  </div>
</body>

</html>
