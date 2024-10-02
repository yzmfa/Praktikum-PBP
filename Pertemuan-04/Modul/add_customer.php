<?php 
// File: add_customer.php
// Deskripsi: menampilkan form add data customer dan menambahkan data ke database
// Nama/NIM : Yusuf Zaenul Mustofa/24060122120021
// Tanggal  : 18 September 2024

require_once('lib/db_login.php');

// Mengecek apakah user belum menekan tombol submit
if (!isset($_POST["submit"])) {
    // Inisialisasi nilai kosong
    $name = $address = $city = '';
} else {
    $valid = TRUE; // Flag validasi
    $name = test_input($_POST['name']);
    if ($name =='') {
        $error_name = "Name is required";
        $valid = FALSE;
    }

    $address = test_input($_POST['address']);
    if ($address == '') {
        $error_address = "Address is required"; 
        $valid = FALSE;
    }
    
    $city = $_POST['city'];
    if ($city == '' || $city == 'none') {
        $error_city = "City is required"; 
        $valid = FALSE;
    }

    // Menambahkan data ke dalam database
    if ($valid) {
        // Query untuk menambahkan data customer
        $query = "INSERT INTO customers (name, address, city) VALUES ('".$name."', '".$address."', '".$city."')";
        
        // Eksekusi query
        $result = $db->query($query);
        if (!$result) {
            die ("Could not query the database: <br />". $db->error. '<br>Query: ' . $query );
        } else {
            $db->close();
            header('location: view_customer.php');
        }
    }
}
?>

<?php include('lib/header.html'); ?>
<br>
<div class="card">
    <div class="card-header">Add New Customer</div>
        <div class="card-body">
            <form method="POST" autocomplete="on" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <div class="form-group">
                    <label for="name">Nama: </label>
                    <input type="text" class="form-control" id="name" name="name" value="<?php echo $name; ?>">
                    <div class="error"><?php if (isset($error_name)) echo $error_name; ?></div> 
                </div>
                <div class="form-group">
                    <label for="address">Address:</label>
                    <textarea class="form-control" id="address" name="address" rows="5"><?php echo $address; ?></textarea>
                    <div class="error"><?php if (isset($error_address)) echo $error_address; ?></div> 
                </div>
                <div class="form-group">
                    <label for="city">City:</label>
                        <select name="city" id="city" class="form-control" required>
                            <option value="none" <?php if (!isset($city)) echo 'selected="true"'; ?>> --Select a city--</option>
                            <option value="Airport West" <?php if (isset($city) && $city=="Airport West") echo 'selected="true"'; ?>>Airport West</option>
                            <option value="Box Hill" <?php if (isset($city) && $city=="Box Hill") echo 'selected="true"'; ?>>Box Hill</option>
                            <option value="Yarraville" <?php if (isset($city) && $city=="Yarraville") echo 'selected="true"'; ?>>Yarraville</option>
                        </select>
                    <div class="error"><?php if (isset($error_city)) echo $error_city; ?> </div> 
                </div> 
                    
                <br>
                <button type="submit" class="btn btn-primary" name="submit" value="submit">Submit </button>
                <a href="view_customer.php" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>

<?php include('lib/footer.html') ?>
<?php
// $db->close();
?>
