
<?php
// site url
//define('SITE_URL', 'http://www.icons2023.com');

//Localhost URL
// define('SITE_URL', 'http://localhost/stnew/admin');


define('ADMIN_EMAIL', 'sampathraj.mp@gmail.com');
// connection mysqli_connect_error
//$connection = mysqli_connect('localhost', 'kavisoft_emsi17', 'f]X_3cr)nQfT','kavisoft_emsi2k17');
//$connection = mysqli_connect('localhost', 'kavisoft_emsi17', 'f]X_3cr)nQfT','kavisoft_emsi2k17');
//$connection = mysqli_connect("localhost", "root", "","cf8");
$connection = mysqli_connect("localhost", "root", "","stayteller");

$dblink = new mysqli("localhost", "root", "","stayteller");
   if ($dblink->connect_error) {
      die("Connection failed: " . $dblink->connect_error);
   }	
//if (!$connection){

if (mysqli_connect_errno())
{
    die("Database Connection Failed" . mysqli_connect_error());
}
?>
