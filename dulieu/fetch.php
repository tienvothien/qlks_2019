<?php  
	include 'kiemtradangnhap.php';
	if (isset($_POST['id_nhan_vien_sua'])) {
		include 'conn.php';
		$query = "SELECT * FROM nhanvien WHERE nhanvien.id='".$_POST["id_nhan_vien_sua"]."'";
		$result = mysqli_query($conn, $query);
		$row = mysqli_fetch_array($result);
		echo json_encode($row);
		// echo "1";
	}
?>
	

 