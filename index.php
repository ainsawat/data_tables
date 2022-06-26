<?php

$servername = "localhost";
$username = "root";
$password = "";

try {
     $conn = new PDO("mysql:host=$servername;dbname=data_db", $username, $password);
    // set the PDO error mode to exception
     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Connected successfully";
} catch(PDOException $e) {
     echo "Connection failed: " . $e->getMessage();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" />
</head>
<body>
    <div class="container">
   <h3 class="mt-4">รายการสินค้า</h3>
   <hr>
<table id="myTable" class="table table-striped">
            <thead>
                <th>ID</th>
                <th>Name</th>
                <th>Category</th>
                <th>Package</th>
                <th>Price</th>
            </thead>
<tdody>

    <?php
        $stmt = $conn->query("SELECT * FROM users");
        $stmt->execute();

        $users = $stmt->fetchALL();
        foreach($users as $user) {
    ?>        
    
        <tr>
            <td><?php echo $user['id'] ?></td>
            <td><?php echo $user['name'] ?></td>
            <td><?php echo $user['category'] ?></td>
            <td><?php echo $user['package'] ?></td>
            <td><?php echo $user['price'] ?></td>
        </tr>
        
        <?php
        
        }
    ?>
    </tdody>
</table>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>

    <script>
    $(document).ready( function () {
        $('#myTable').DataTable();
    } );
    </script>
</body>
</html>