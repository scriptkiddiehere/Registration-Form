<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responses</title>
    <link rel="stylesheet" href="link.css">
</head>
<body>
    <div class="list-container">
        <h1>List of the candidates</h1>
        <div style="overflow-x:auto;">
        <table>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Phone</th>
            </tr>
            <?php
            $server = "localhost:3307";
            $username = "root";
            $password = "";

            $con = mysqli_connect($server, $username, $password, "ustrip");
            if(!$con){
                die("connection to this database failed due to" . mysqli_connect_error());
            }

            $sql = "SELECT firstname, lastname, email, phone from form";
            $result = $con-> query($sql);

            if($result-> num_rows > 0) {
                while($row = $result-> fetch_assoc()) {
                    echo "<tr><td>". $row["firstname"] ."</td><td>". $row["lastname"] ."</td><td>". $row["email"] ."</td><td>". $row["phone"] ."</td></tr>";
                }
                echo "</table></div>";
            }
            else {
                echo "0 result";
            }
            $con-> close();
            ?>
            <div class="center">
            <button class="btn">
            <a href="index.php">Back</a>
            </button>
        </div>
    </div>
</body>
</html>