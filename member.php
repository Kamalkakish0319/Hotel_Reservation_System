<?php
include "dbconfigL.php";
$con = mysqli_connect($host,$login,$password,$dbname)
or die("<br>Cannot connect to DB:$dbname on $host\n");


if(isset($_POST['uid'])) {
        
    
$uid = $_POST['uid'];




$sqlselect = "select id,first_name,last_name,date_created,email,password from members where id = $uid";


$result = mysqli_query($con, $sqlselect); 

if($result) {
	//echo "Successfully registered";
    while($row = mysqli_fetch_assoc($result))
    $test[] = $row; 
print json_encode($test);

	} else {
	echo "<br>Unable to register:" . mysqli_error($con);
}

}
mysqli_close($con);
?>