<?php 
include 'conn.php';
$tongsophonglanhdon = mysqli_query($conn,"SELECT COUNT(DISTINCT phong.id) AS TONG FROM phong, loaiphong WHERE phong.id_loai_phong=loaiphong.id AND loaiphong.ma_loai_phong='lp106' AND phong.xoa =0");
if (mysqli_num_rows($tongsophonglanhdon)) {
	while ($row = mysqli_fetch_array($tongsophonglanhdon)) {
	
	echo "

		<h3>Tổng số phòng lạnh đơn</h3>
			<p>
				$row[TONG]<br>
			</p>";
}
}
 ?>