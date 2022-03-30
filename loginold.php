<?php

include "dbconfigL.php";
$con = mysqli_connect($host,$login,$password,$dbname)

or die("<br>Cannot connect to DB:$dbname on $host\n");





$myusername=$_POST['username'];	 
$mypassword=$_POST['password'];


$sqlsearch="select id,first_name,last_name,email,password,reservation from hotel.members where email ='$myusername'";

$result1 = mysqli_query($con, $sqlsearch);

$numberofrows = mysqli_num_rows($result1);

if($numberofrows <1){
echo "Username is not in the system. Please Login with valid user.";

} else {
	while($row = mysqli_fetch_array($result1)){
			$uid = $row['id'];
			$fname = $row['first_name'];
			$lname = $row['last_name'];
			$email = $row['email'];
			$password = $row['password'];
			$reservation = $row['reservation'];

//$pass = $row['password'];

	if($mypassword != $password){

		echo "$email exists but password does not match, please login with correct password.";
	
	} else { 
			
			
			$cookiearray = array(
				'uid' => $uid,
				'login' => $email,
				'name' => $fname);
			echo json_encode($cookiearray);
			



	}}}
	?>

	
