<?php
include "dbconfigL.php";
$con = mysqli_connect($host,$login,$password,$dbname)
or die("<br>Cannot connect to DB:$dbname on $host\n");


if(isset($_POST['c_in']) && isset($_POST['c_out'])) {
        
    
$c_in = $_POST['c_in'];
$c_out = $_POST['c_out'];
$user_id = $_POST['user'];
$room = $_POST['room_type'];



$sqlinsert = "INSERT INTO check_in_history(m_id,r_num,check_in,check_out,booked) VALUES
('$user_id','$room','$c_in','$c_out',1);";



$resultinsert = mysqli_query($con, $sqlinsert); 

if($resultinsert) {
	echo "Successfully booked room";
	} else {
	echo "<br>Unable to register:" . mysqli_error($con);
}

}
mysqli_close($con);
?>