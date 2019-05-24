<?php 
include 'conn.php';
$tongsoltbi = mysqli_query($conn,"SELECT COUNT(DISTINCT loaithietbi.id) AS TONG FROM loaithietbi WHERE loaithietbi.XOA=0");
if (mysqli_num_rows($tongsoltbi)) {
	while ($row = mysqli_fetch_array($tongsoltbi)) {
	
	echo "

		<h3>Tổng số loại thiết bị</h3>
			<p>
				$row[TONG]<br>
			</p>";
}
}
 ?>