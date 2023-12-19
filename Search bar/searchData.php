<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "cinec exam department";


$con = new mysqli($servername, $username, $password, $database);


if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Search</title>

    <style>
        body {
            background-color: whitesmoke;
        }
       
    </style>
</head>
<body>
    <?php
    $data = $_GET['data'];

    $sql = "SELECT * FROM course WHERE Course_Code='$data'";
    $result = mysqli_query($con, $sql);

    if ($result) {
        $row = mysqli_fetch_assoc($result);

        echo '<div class="container">
            <div class="jumbotron">
                <h1 class="display-4">' . $row['Course_Code'] . '</h1>
                <p class="lead">Course is: ' . $row['Course_Name'] . '</p>
                <hr class="my-4">
                <p class="lead">
                <a class="btn btn-primary btn-lg" href="SearchBar3.php" role="button">Back</a>
                </p>
            </div>
        </div>';
    }
    ?>
</body>
</html>
