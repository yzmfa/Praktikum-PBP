<!-- Nama File  : user_form_post1.php -->
<!-- Deskripsi  : Validasi form dengan PHP -->
<!-- Nama/NIM   : Yusuf Zaenul Mustofa/24060122120021 -->
<!-- Tanggal    : 11 September 2024 -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Form Post</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2"
        crossorigin="anonymous">
</head>
<body>
    <?php
    if (isset($_POST['submit'])) {
        // Validasi nama
        $nama = test_input($_POST['nama']);
        if (empty($nama)) {
            $error_nama = "Nama harus diisi";
        } elseif (!preg_match("/^[a-zA-Z ]*$/", $nama)) {
            $error_nama = "Nama hanya dapat berisi huruf dan spasi";
        }

        // Validasi email
        $email = test_input($_POST['email']);
        if (empty($email)) {
            $error_email = "Email harus diisi";
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error_email = "Format email tidak benar";
        }

        // Validasi alamat
        $alamat = test_input($_POST['alamat']);
        if (empty($alamat)) {
            $error_alamat = "Alamat harus diisi";
        }

        // Validasi jenis kelamin
        if (!isset($_POST['jenis_kelamin'])) {
            $error_jenis_kelamin = "Jenis kelamin harus diisi";
        }

        // Validasi kota
        $kota = $_POST['kota'];
        if (empty($kota) || $kota == 'kota') {
            $error_kota = "Kota harus diisi";
        }

        // Validasi minat
        if (!isset($_POST['minat'])) {
            $error_minat = "Minat harus diisi";
        }
    }

    function test_input($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    ?>

    <div class="container">
        <br />
        <div class="card">
            <div class="card-header">Form Mahasiswa</div>
            <div class="card-body">
                <form method="POST" autocomplete="on" action>
                    <div class="form-group">
                        <label for="nama">Nama:</label>
                        <input type="text" class="form-control" id="nama" name="nama" maxlength="50">
                        <div class="text-danger"><?php if (isset($error_nama)) echo $error_nama; ?></div>
                    </div>

                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" name="email">
                        <div class="text-danger"><?php if (isset($error_email)) echo $error_email; ?></div>
                    </div>

                    <div class="form-group">
                        <label for="alamat">Alamat:</label>
                        <textarea class="form-control" id="alamat" name="alamat" rows="3"></textarea>
                        <div class="text-danger"><?php if (isset($error_alamat)) echo $error_alamat; ?></div>
                    </div>

                    <div class="form-group">
                        <label for="kota">Kota/Kabupaten:</label>
                        <select id="kota" name="kota" class="form-control">
                            <option value="Semarang">Semarang</option>
                            <option value="Jakarta">Jakarta</option>
                            <option value="Bandung">Bandung</option>
                            <option value="Surabaya">Surabaya</option>
                        </select>
                        <div class="text-danger"><?php if (isset($error_kota)) echo $error_kota; ?></div>
                    </div>

                    <label>Jenis Kelamin:</label>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" name="jenis_kelamin" value="pria">Pria
                        <div class="text-danger"><?php if (isset($error_jenis_kelamin)) echo $error_jenis_kelamin; ?></div>
                    </div>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" name="jenis_kelamin" value="wanita">Wanita
                        <div class="text-danger"><?php if (isset($error_jenis_kelamin)) echo $error_jenis_kelamin; ?></div>
                    </div>

                    <br>
                    <label>Peminatan:</label>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" name="minat[]" value="coding">Coding
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" name="minat[]" value="ux_design">UX Design
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" name="minat[]" value="data_science">Data Science
                    </div>
                    <div class="text-danger"><?php if (isset($error_minat)) echo $error_minat; ?></div>

                    <br>
                    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                    <button type="reset" class="btn btn-danger">Reset</button>
                </form>
            </div>

            <?php
            if (isset($_POST["submit"]) && !empty($_POST["nama"]) && !empty($_POST["email"]) && !empty($_POST["alamat"]) 
                && isset($_POST["jenis_kelamin"]) && !empty($_POST["kota"]) && isset($_POST["minat"])) {
                echo "<h3>Your Input:</h3>";
                echo "Nama: " . $_POST['nama'] . "<br />";
                echo "Email: " . $_POST['email'] . "<br />";
                echo "Kota: " . $_POST['kota'] . "<br />";
                echo "Jenis Kelamin: " . $_POST['jenis_kelamin'] . "<br />";

                $minat = $_POST['minat'];
                if (!empty($minat)) {
                    echo "Peminatan: ";
                    foreach ($minat as $minat_item) {
                        echo "<br />" . $minat_item;
                    }
                }
            }
            ?>
        </div>
    </div>
</body>
</html>
