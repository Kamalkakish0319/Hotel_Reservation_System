<?php
include "dbconfigL.php";
$con = mysqli_connect($host,$login,$password,$dbname)
or die("<br>Cannot connect to DB:$dbname on $host\n");


if(isset($_POST['user'])) {
        

$user_id = $_POST['user'];

//echo $ticket_number . $employee_id;



	if($user_id){
				$sqlupdate = "UPDATE check_in_history set booked = 0 where m_id = $user_id";
	
				$resultupdate = mysqli_query($con, $sqlupdate);

				echo "Your stay has been cancelled! ";
} 		
			

else{
	echo "<br>Database error:" . mysqli_error($con);
}


}

mysqli_close($con);
?>
