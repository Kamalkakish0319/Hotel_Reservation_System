<?php
include "dbconfigL.php";
$con = mysqli_connect($host,$login,$password,$dbname)
or die("<br>Cannot connect to DB:$dbname on $host\n");


if(isset($_POST['fName']) && isset($_POST['lName'])) {
        
    
$fname = $_POST['fName'];
$lname = $_POST['lName'];
$email = $_POST['mEmail'];
$password = $_POST['mPassword'];



$sqlinsert = "INSERT INTO members(first_name,last_name,date_created,email,password) VALUES
('$fname','$lname',now(),'$email','$password');";




$resultinsert = mysqli_query($con, $sqlinsert); 

if($resultinsert) {
	echo "Successfully registered";
	} else {
	echo "<br>Unable to register:" . mysqli_error($con);
}

}
mysqli_close($con);
?>