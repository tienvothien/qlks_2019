<?php 
include 'conn.php';
$tongsoloaiphong = mysqli_query($conn,"SELECT  COUNT(phong.id) AS TONG FROM phong WHERE phong.id not in (SELECT   DISTINCT phong.id  FROM phong, thuephong WHERE phong.xoa=0 and phong.id = thuephong.id_phong AND thuephong.thoi_gian_ra IS null)");
if (mysqli_num_rows($tongsoloaiphong)) {
	while ($row = mysqli_fetch_array($tongsoloaiphong)) {
	
	echo "

		<h3>Tổng số phòng trống</h3>
			<p>
				$row[TONG]
			</p>";
}
}
 ?>