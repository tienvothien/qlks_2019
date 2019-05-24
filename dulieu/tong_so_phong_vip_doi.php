<?php 
include 'conn.php';
$tongsophongvipdoi = mysqli_query($conn,"SELECT COUNT(DISTINCT phong.id) AS TONG FROM phong, loaiphong WHERE phong.id_loai_phong=loaiphong.id AND loaiphong.ma_loai_phong='lp109' AND phong.xoa =0");
if (mysqli_num_rows($tongsophongvipdoi)) {
	while ($row = mysqli_fetch_array($tongsophongvipdoi)) {
	
	echo "

		<h3>Tổng số phòng VIP đôi</h3>
			<p>
				$row[TONG]<br>
			</p>";
}
}
 ?>