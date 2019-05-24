<?php 
include 'conn.php';
$tongsoloaiphong = mysqli_query($conn,"SELECT  COUNT( DISTINCT thuephong.id_phong) AS TONG FROM phong, thuephong WHERE phong.xoa=0 and phong.id = thuephong.id_phong AND thuephong.thoi_gian_ra IS null");
if (mysqli_num_rows($tongsoloaiphong)) {
	while ($row = mysqli_fetch_array($tongsoloaiphong)) {
	
	echo "

		<h3>Tổng số phòng có khách</h3>
			<p>
				$row[TONG]
			</p>";
}
}
 ?>