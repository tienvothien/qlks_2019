<?php 
include 'conn.php';
$tongsophongquatdoi = mysqli_query($conn,"SELECT COUNT(DISTINCT phong.id) AS TONG FROM phong, loaiphong WHERE phong.id_loai_phong=loaiphong.id AND loaiphong.ma_loai_phong='lp105' AND phong.xoa =0");
if (mysqli_num_rows($tongsophongquatdoi)) {
	while ($row = mysqli_fetch_array($tongsophongquatdoi)) {
	
	echo "

		<h3>Tổng số phòng quạt đôi</h3>
			<p>
				$row[TONG]<br>
			</p>";
}
}
 ?>