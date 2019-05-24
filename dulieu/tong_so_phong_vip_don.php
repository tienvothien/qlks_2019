<?php 
include 'conn.php';
$tongsophongvipdon = mysqli_query($conn,"SELECT COUNT(DISTINCT phong.id) AS TONG FROM phong, loaiphong WHERE phong.id_loai_phong=loaiphong.id AND loaiphong.ma_loai_phong='lp108' AND phong.xoa =0");
if (mysqli_num_rows($tongsophongvipdon)) {
	while ($row = mysqli_fetch_array($tongsophongvipdon)) {
	
	echo "

		<h3>Tổng số phòng VIP đơn</h3>
			<p>
				$row[TONG]<br>
			</p>";
}
}
 ?>