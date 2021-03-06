<?php

require_once 'connection.php';


  /* connect to the database */
$connection = mysqli_connect($db_hostname, $db_username,$db_password,$db_database);

/* if there is a problem with the connection */
if (!$connection)
    die("Unable to connect to MySQL: " . mysqli_error($connection));

//make an SQL statement and send it via the connection */
$query = "SELECT * FROM Transactions";
$result = mysqli_query($connection,$query);

if (!$result)
    die("Database access failed: " . mysqli_error($connection));

$html = "";

/*iterate through the result set*/
while ($row = mysqli_fetch_assoc($result)) {
    // echo "number of fields ".mysqli_num_fields($result);
    $html.="Transaction ID: " . $row['Transaction_id'] . "<br>";
    $html.="Date: " . $row['TrnsDate'] . "<br>";
    $html.="Account ID: " . $row['Account_ID'] . "<br>";
    $html.="Type: " . $row['TrnsType'] . "<br>";
    $html.="Amount: " . $row['TrnsAmount'] . "<br>";
    $html.="Employee ID: " . $row['Employee_ID'] . "<br>";
    $html.="<br><br>";}

// echo $html;

mysqli_close($connection);


?>