<?php
$insert = false;

if (isset($_POST['f_name'])) {

    $server = "localhost";
    $username = "root";
    $pass = "";
    $database = "std_reg";

    $con = mysqli_connect($server, $username, $pass, $database);

    if (!$con) {
        die("Connection failed!" . mysqli_connect_errno());
    } else {
        // echo "Connected successfully!";
    }

    $f_name = $_POST['f_name'];
    $l_name = $_POST['l_name'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $erno = $_POST['erno'];

    $sql = "INSERT INTO `trip` (f_name, l_name, age, gender, email, erno, date) 
        VALUES ('$f_name', '$l_name', '$age', '$gender', '$email', '$erno', current_timestamp())";

    // echo $sql;

    if ($con->query($sql)) {
        // echo "<br>Form submitted!";
        $insert = true;
        header("Location: submitted.html");
    } else {
        echo "$sql <br> $con->error";
    }

    $con->close();
}
