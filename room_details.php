<?php
include "dbconfigL.php";
$con = mysqli_connect($host,$login,$password,$dbname)
or die("<br>Cannot connect to DB:$dbname on $host\n");


if(isset($_POST['uid'])) {
        
    
$uid = $_POST['uid'];




$sqlselect = "select c_id,first_name,last_name,room_number,check_in,check_out,room_type,bed_type,cost_per_night from check_in_history c,members m, hotel_rooms h where c.r_num = h.room_number AND c.m_id = m.id and booked = 1 and m_id = $uid";


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