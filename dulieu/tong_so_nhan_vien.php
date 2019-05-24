<?php 
include 'conn.php';
$tongsonhanvien = mysqli_query($conn,"SELECT COUNT(DISTINCT nhanvien.id) AS TONG FROM nhanvien WHERE nhanvien.xoa=0");
if (mysqli_num_rows($tongsonhanvien)) {
	while ($row = mysqli_fetch_array($tongsonhanvien)) {
	
	echo "

		<h3>Tổng số nhân viên</h3>
			<p>
				$row[TONG]<br>
			</p>";
}
}
 ?>