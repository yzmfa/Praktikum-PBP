<?php
// File     : view_customer.php
// Deskripsi: menampilkan data customer 
// Nama/NIM : Yusuf Zaenul Mustofa/24060122120021
// Tanggal  : 18 September 2024
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
<body>
    <div class="container">
        <div class="card mt-5">
            <div class="card-header">Customer Data</div>
            <div class="card-body">

                <br>
                <a class="btn btn-primary" href="add_customer.php">+ Add Customer Data</a> <br> <br>

                <table class="table table-striped">
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Address</th>
                        <th>City</th>
                        <th>Action</th>
                    </tr>

                    <?php

                    require_once('lib/db_login.php');
                    $query = "SELECT * FROM customers ORDER BY customerid";
                    $result = $db->query($query);

                    if(!$result){
                        die ("could not query the database : <br />".$db->error ."<br>Query: ".$query);
                    }

                    $i = 1;
                    while ($row = $result->fetch_object()){
                        echo '<tr>';
                        echo '<td>'.$i.'</td>';
                        echo '<td>'.$row->name.'</td>';
                        echo '<td>'.$row->address.'</td>';
                        echo '<td>'.$row->city.'</td>';
                        echo '<td><a class="btn btn-warning btn-sm" href="edit_customer.php?id='.$row->customerid.'">Edit</a>&nbsp;&nbsp;
                        <a class="btn btn-danger btn-sm" href="delete_customer.php?id='.$row->customerid.'">Delete</a>
                            </td>';
                        echo '</tr>';
                        $i++;
                    }

                    echo '</table>';
                    echo '<br />';
                    echo 'Total Rows = '.$result->num_rows;
                    $result->free();
                    $db->close();
                    ?>
                </table>
            </div>
        </div>
    </div>
</body>
</html>