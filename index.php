 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My CRUD</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
 </head>
 <body>
    <div class="container my-5">
        <h2>List of my Clients</h2>
        <a class="btn btn-primary" href="/mycrud/create.php" role="button">New Client</a>
        <br>

        <table class="table">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Created At</th>
                <th>Action</th>
            </tr>
            <thead>
                <tbody>
                    <?php
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $database = "mycrud";

                    $conn = new mysqli($servername, $username, $password, $database);

                    if ($conn->connect_error) {
                        die("Connection failed. ". $conn->connect_error);
                    }

                    $sql = "SELECT * FROM clients";
                    $result = $conn->query($sql);

                    if (!$result) {
                        die("Invalid query. ". $conn->connect_error);
                    }

                    while($row = $result->fetch_assoc()) {
                        echo"
                        <tr>
                            <td>$row[id]</td>
                            <td>$row[name]</td>
                            <td>$row[email]</td>
                            <td>$row[phone]</td>
                            <td>$row[address]</td>
                            <td>$row[created_at]</td>
                            <td>
                                <a class='btn btn-primary btn-sm' href='/mycrud/edit.php?id=$row[id]'>Edit</a>
                                <a class='btn btn-danger btn-sm' href='/mycrud/delete.php?id=$row[id]'>Delete</a>
                            </td>
                        </tr>
                        ";
                    }
                    ?>
                </tbody>
            </thead>
        </table>
    </div>
 </body>
 </html>