<!DOCTYPE html>
<html>
<body>

<?php
$servername = ""; //database credentials
$username = "";
$password = "";
$dbname = "";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM values_of_colors";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "?" . $row["or_S"]. "," . $row["or_R"]. "," . $row["or_G"]. "," . $row["or_B"]. "," . $row["kr_S"]. "," . $row["kr_R"]. "," . $row["kr_G"]. "," . $row["kr_B"]. "," . $row["st_S"]. "," . $row["st_R"]. "," . $row["st_G"]. "," . $row["st_B"]. "?" ."<br>";
    }
} else {
    echo "0 results";
}

mysqli_close($conn);
?> 

</body>
</html>
