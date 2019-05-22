<?php 
include 'conn.php';
$tongsoloaiphong = mysqli_query($conn,"SELECT COUNT(*) AS TONG FROM loaiphong");
if (mysqli_num_rows($tongsoloaiphong)) {
	while ($row = mysqli_fetch_array($tongsoloaiphong)) {
	
	echo "

					 						<h3>Tổng số loại phòng</h3>
					 						<p>
					 							$row[TONG]
					 						</p>";
}
}
 ?>