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
	if (isset($_POST['id_1_phong_sua'])) {// dữ liệu giá phòng
		include 'conn.php';
		$query = "SELECT * FROM phong WHERE phong.id='".$_POST["id_1_phong_sua"]."'";
		$result = mysqli_query($conn, $query);
		$row = mysqli_fetch_array($result);
		echo json_encode($row);
		// echo "1";
	}//end dữ liệu giá phòng
	if (isset($_POST['id_index_phong_sua'])) {// dữ liệu giá phòng
		include 'conn.php';
<<<<<<< HEAD
		$query = "SELECT phong.id, phong.ma_phong, loaiphong.ten_loai_phong, giaphong.gia_phong_gio, giaphong.gia_phong_ngay,phong.id_loai_phong FROM phong, giaphong, loaiphong WHERE phong.id='$_POST[id_index_phong_sua]' and phong.id_loai_phong=loaiphong.id AND loaiphong.id=giaphong.id_loai_phong";
=======
		$query = "SELECT phong.id, phong.ma_phong, loaiphong.ten_loai_phong, giaphong.gia_phong_gio, giaphong.gia_phong_ngay, phong.id_loaiphong FROM phong, giaphong, loaiphong WHERE phong.id='$_POST[id_index_phong_sua]' and phong.id_loai_phong=loaiphong.id AND loaiphong.id=giaphong.id_loai_phong";
>>>>>>> a372135607b0f2981d89beba21feb03523b125f7
		$result = mysqli_query($conn, $query);
		$row = mysqli_fetch_array($result);
		echo json_encode($row);
		// echo "1";
	}//end dữ liệu giá phòng
	//hiện thông tin thiết bi cần xóa
	if (isset($_POST["mathietbixoa123"])) {
		include 'conn.php';
		$query = "SELECT * FROM loaithietbi WHERE loaithietbi.MA_LOAI_THIET_BI ='$_POST[mathietbixoa123]'";
		$result = mysqli_query($conn, $query);
		$row = mysqli_fetch_array($result);
		echo json_encode($row);
	}//end
?>
	

 