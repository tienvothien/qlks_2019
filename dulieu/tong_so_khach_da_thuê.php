<?php 
include 'conn.php';
$tongsokhachdangthue = mysqli_query($conn,"SELECT COUNT(DISTINCT khachhang.id) AS TONG FROM khachhang, thuephong WHERE thuephong.id_khach_hang = khachhang.id AND khachhang.xoa =0 AND thuephong.thoi_gian_ra IS null");
if (mysqli_num_rows($tongsokhachdangthue)) {
	while ($row = mysqli_fetch_array($tongsokhachdangthue)) {
	
	echo "

		<h3>Tổng số khách đang thuê</h3>
			<p>
				$row[TONG]<br>
			</p>";
}
}
 ?>