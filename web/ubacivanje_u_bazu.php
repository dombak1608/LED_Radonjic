<html>
  <head>
    <meta http-equiv="content-type" content="text/html; charset=ISO-8859-1">

    <title>
      Izmjena boja
    </title>
  </head>
<body>

<?php print '<h1>Izmjena boja</h1>'; ?>

<br><br>

<?php
$servername = ""; //database credentials
$username = "";
$password = "";
$dbname = "";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn)
{
    die("Connection failed: " . mysqli_connect_error());
}

$ormarS=$_POST['ormarS'];
$ormarR=$_POST['ormarR'];
$ormarG=$_POST['ormarG'];
$ormarB=$_POST['ormarB'];
$krevetS=$_POST['krevetS'];
$krevetR=$_POST['krevetR'];
$krevetG=$_POST['krevetG'];
$krevetB=$_POST['krevetB'];
$stolS=$_POST['stolS'];
$stolR=$_POST['stolR'];
$stolG=$_POST['stolG'];
$stolB=$_POST['stolB'];

$sql = "UPDATE values_of_colors
SET or_S= '$ormarS', or_R= '$ormarR', or_G= '$ormarG', or_B= '$ormarB', kr_S= '$krevetS', kr_R= '$krevetR', kr_G= '$krevetG', kr_B= '$krevetB', st_S= '$stolS', st_R= '$stolR', st_G= '$stolG', st_B= '$stolB'
WHERE prim_k = 1;";

if (mysqli_query($conn, $sql))
{
    echo "Baza uspješno izmjenjena";
} else
{
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>
<br>
<?php
  print "PHP version ==> " . phpversion() . "<br><br>
  ";
  print "Server date and time is ==> " . date("D M j,Y H:i:s T e",time()) . "<br>
  ";
?>

</body>
</html>
