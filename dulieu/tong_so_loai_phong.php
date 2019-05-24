<?php 
include 'conn.php';
$tongsoloaiphong = mysqli_query($conn,"SELECT COUNT(DISTINCT loaiphong.id) AS TONG FROM loaiphong WHERE loaiphong.xoa=0");
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