<?php
$insert = false;
if(isset($_POST['firstname'])){
    // Set connection variables
    $server = "localhost:3307";
    $username = "root";
    $password = "";

    // Create a database connection
    $con = mysqli_connect($server, $username, $password);

    // Check for connection success
    if(!$con){
        die("connection to this database failed due to" . mysqli_connect_error());
    }
    // echo "Success connecting to the db";

    // Collect post variables
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $sql = "INSERT INTO `ustrip`.`form` (`firstname`, `lastname`, `age`, `gender`, `email`, `phone`, `address`, `dt`) VALUES ('$firstname', '$lastname', '$age', '$gender', '$email', '$phone', '$address', current_timestamp());";
    // echo $sql;

    // Execute the query
    if($con->query($sql) == true){
        // echo "Successfully inserted";

        // Flag for successful insertion
        $insert = true;
    }
    else{
        echo "ERROR: $sql <br> $con->error";
    }

    // Close the database connection
    $con->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registeration form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
    <h1>Welcome to bit mesra us trip form</h1>
    <p>Enter your details and submit this form to confirm your participation in the trip</p>
    <?php
        if($insert == true){
        echo "<p class='submitMsg'>Thanks for submitting your form. We are happy to see you joining us for the US trip</p>";
        }
    ?>
        <form action="index.php" method="post">
            <input type="text" name="firstname" id="firstname" placeholder="Enter your First Name">
            <input type="text" name="lastname" id="lastname" placeholder="Enter your Last Name">
            <input type="text" name="age" id="age" placeholder="Enter your Age">
            <input type="text" name="gender" id="gender" placeholder="Enter your Gender">
            <input type="email" name="email" id="email" placeholder="Enter your Email">
            <input type="phone" name="phone" id="phone" placeholder="Enter your Contact no.">
            <textarea name="address" id="address" cols="15" rows="5" placeholder="Enter your Complete Address"></textarea>
            <button class="btn">Submit</button>
            <button class="btn">
            <a href="list.php">View Responses</a>
            </button> 
        </form>
    </div>
</body>
</html>

<!-- INSERT INTO `form` (`sno`, `firstname`, `lastname`, `age`, `gender`, `email`, `phone`, `address`, `dt`) VALUES ('1', 'test', 'name', '21', 'male', 'test@test.com', '9999999999', 'this is a test', '2021-08-28 14:42:37.000000'); -->