<?php
include "dbconfigL.php";
$con = mysqli_connect($host,$login,$password,$dbname)
or die("<br>Cannot connect to DB:$dbname on $host\n");

$sql= "select room_number,room_type,is_vacant,bed_count,bed_type,cost_per_night from hotel_rooms";
$result = mysqli_query($con, $sql); 

if($result) {
	echo "Hotel Rooms:";
	echo "<TABLE border=1>\n";
	echo "<TR><TH>Room Number<TH>Room Type<TH>Is_Vacant<TH>Bed Count<TH>Bed Type<TH>Cost<TH>Title\n";
	while($row = mysqli_fetch_array($result)){
		$room_num = $row['room_number'];
		$room_type = $row['room_type'];
		$vacant= $row['is_vacant'];
		$bed_count = $row['bed_count'];
		$bed_type = $row['bed_type'];
		$cost_per_night = $row['cost_per_night'];	
	

		if ($room_num <>"")
			echo "<TR><TD>$room_num<TD>$room_type<TD>$vacant<TD>$bed_count<TD>$bed_type<TD>$cost_per_night\n";
		}
		echo "</TABLE>\n";
} else {
	echo "<br>Database error:" . mysqli_error($con);
}