<?php 
include 'conn.php';
$tongsophong = mysqli_query($conn,"SELECT COUNT(*) AS TONG FROM phong");
if (mysqli_num_rows($tongsophong)) {
	while ($row = mysqli_fetch_array($tongsophong)) {
	
	echo "

					 						<h3>Tổng số phòng</h3>
					 						<p>
					 							$row[TONG]
					 						</p>";
}
}
 ?>