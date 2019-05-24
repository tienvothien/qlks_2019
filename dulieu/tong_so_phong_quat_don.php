<?php 
include 'conn.php';
$tongsophongquatdon = mysqli_query($conn,"SELECT COUNT(DISTINCT phong.id) AS TONG FROM phong, loaiphong WHERE phong.id_loai_phong=loaiphong.id AND loaiphong.ma_loai_phong='lp104' AND phong.xoa =0");
if (mysqli_num_rows($tongsophongquatdon)) {
	while ($row = mysqli_fetch_array($tongsophongquatdon)) {
	
	echo "

		<h3>Tổng số phòng quạt đơn</h3>
			<p>
				$row[TONG]<br>
			</p>";
}
}
 ?>