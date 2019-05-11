<?php  
	include 'kiemtradangnhap.php';
	if (isset($_POST['id_nhan_vien_sua'])) {// dữ nhân vine
		include 'conn.php';
		$query = "SELECT * FROM nhanvien WHERE nhanvien.id='".$_POST["id_nhan_vien_sua"]."'";
		$result = mysqli_query($conn, $query);
		$row = mysqli_fetch_array($result);
		echo json_encode($row);
		// echo "1";
	}// en dư lieuen nahan vien sửa
	if (isset($_POST['id_khach_hang_sua'])) {// dư liệu khách hàng
		include 'conn.php';
		$query = "SELECT * FROM khachhang WHERE khachhang.id='".$_POST["id_khach_hang_sua"]."'";
		$result = mysqli_query($conn, $query);
		$row = mysqli_fetch_array($result);
		echo json_encode($row);
		// echo "1";
	}// end dữ liệu khách hàng
	if (isset($_POST['id_loai_phong_sua'])) {// dữ liệu loại phòng
		include 'conn.php';
		$query = "SELECT * FROM loaiphong WHERE loaiphong.id='".$_POST["id_loai_phong_sua"]."'";
		$result = mysqli_query($conn, $query);
		$row = mysqli_fetch_array($result);
		echo json_encode($row);
		// echo "1";
	}//end dữ liệu loại phòng
	if (isset($_POST['id_gia_phong_sua'])) {// dữ liệu giá phòng
		include 'conn.php';
		$query = "SELECT * FROM giaphong WHERE giaphong.id='".$_POST["id_gia_phong_sua"]."'";
		$result = mysqli_query($conn, $query);
		$row = mysqli_fetch_array($result);
		echo json_encode($row);
		// echo "1";
	}//end dữ liệu giá phòng
?>
	

 