<?php 
include 'conn.php';
$tongsohoadon = mysqli_query($conn,"SELECT COUNT(DISTINCT bienlai.id) AS TONG FROM bienlai");
if (mysqli_num_rows($tongsohoadon)) {
	while ($row = mysqli_fetch_array($tongsohoadon)) {
	
	echo "

		<h3>Tổng số hóa đơn</h3>
			<p>
				$row[TONG]<br>
			</p>";
}
}
 ?>