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
        input {
            width: 20%;
            height: 5%;
            border: 1px;
            border-radius: 5px;
            padding: 8px 15px 8px 15px;
            margin: 10px 0px 15px 0px;
            box-shadow: 1px 1px 2px 1px blue;
        }
        button {
            width: 8%;
            height: 5%;
            border: 1px;
            border-radius: 5px;
            padding: 8px 15px 8px 15px;
            margin: 10px 0px 15px 0px;
            box-shadow: 1px 1px 2px 1px blue;
        }
        table {
            border-collapse: collapse;
            width: 80%;
            border: 1px solid #d1d1d1;
        }
        th, td {
            border: 1px solid #d1d1d1;
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f1f1f1;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #e3f2fd;
        }
    </style>
</head>
<body>
    <h1>Search</h1>
    <div class="container my-5">
        <form method="post" style="background-color: lightblue">
            <input type="text" placeholder="Enter Course Code" name="search"><br>
            <button name="submit">Search</button>
        </form>
        <div class="container my-5">
            <table class="table">
                <?php
                if (isset($_POST['submit'])) {
                    $search = $_POST['search'];
                    // Change table and column names down
                    $sql = "SELECT * FROM course WHERE Course_Code LIKE '%$search%' OR Course_Name LIKE '%$search%'";
                    $result = mysqli_query($con, $sql);
                    if ($result) {
                        if (mysqli_num_rows($result) > 0) {
                            echo '<thead>
                            <tr>
                            <th>Course Code</th>
                            <th>Course Name</th>
                            </tr>
                            </thead>';
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo '<tbody>
                                <tr>
                                <td><a href="searchData.php?data='.$row['Course_Code'].'">'.$row['Course_Code'].'</a></td>
                                <td>' . $row['Course_Name'] . '</td>
                                </tr>
                                </tbody>';
                            }
                        } else {
                            echo '<h2  class=text-danger>Invalid Search</h2>';
                        }
                    }
                }
                ?>
                
            </table>
        </div>
    </div>
</body>
</html>
