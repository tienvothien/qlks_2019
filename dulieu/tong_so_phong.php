<?php 
include 'conn.php';
$tongsoloaiphong = mysqli_query($conn,"SELECT COUNT(DISTINCT phong.id) AS TONG FROM phong WHERE phong.xoa=0");
if (mysqli_num_rows($tongsoloaiphong)) {
	while ($row = mysqli_fetch_array($tongsoloaiphong)) {
	
	echo "

		<h3>Tổng số phòng</h3>
			<p>
				$row[TONG]<br>
			</p>";
}
}
 ?>