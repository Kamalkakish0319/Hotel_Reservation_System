<?php
include "dbconfigL.php";
$con = mysqli_connect($host,$login,$password,$dbname)
or die("<br>Cannot connect to DB:$dbname on $host\n");

$sql= "select c_id,first_name,last_name,room_number,check_in,check_out,room_type,bed_type,cost_per_night from check_in_history c,members m, hotel_rooms h where c.r_num = h.room_number AND c.m_id = m.id AND booked = 1";
$result = mysqli_query($con, $sql); 

if($result) {
	echo "Hotel Rooms:";
	echo "<TABLE border=1>\n";
	echo "<TR><TH>c_id<TH><TH>First Name<TH>Last Name<TH>Room Number<TH>Check-IN<TH>Check-Out<TH>Room Type<TH>Bed Type<TH>Cost\n";
	while($row = mysqli_fetch_array($result)){
		$c_id = $row['c_id'];
		$first_name = $row['first_name'];
		$last_name = $row['last_name'];
		$room_number= $row['room_number'];
		$check_in = $row['check_in'];
		$check_out = $row['check_out'];
		$room_type = $row['room_type'];
		$bed_type = $row['bed_type'];

		$cost_per_night = $row['cost_per_night'];	
	

		if ($first_name <>"")
			echo "<TR><TD>$c_id<TD><TD>$first_name<TD>$last_name<TD>$room_number<TD>$check_in<TD>$check_out<TD>$room_type<TD>$bed_type<TD>$cost_per_night\n";
		}
		echo "</TABLE>\n";
} else {
	echo "<br>Database error:" . mysqli_error($con);
}
mysqli_close($con);
?>
