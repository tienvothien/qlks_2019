<?php 
	include 'kiemtradangnhap.php';
	if (isset($_POST['id_xoa_nhan_vien123'])) {// xoa nhân viên
		include 'conn.php';
		$id_xoa_nhan_vien123=$_POST['id_xoa_nhan_vien123'];
		$delet_nhan_vien="UPDATE nhanvien SET nhanvien.xoa=1, nhanvien.ngayxoa='".date("Y/m/d h:i:s")."', nhanvien.id_nguoixoa='$_SESSION[idnv]' WHERE nhanvien.id='$id_xoa_nhan_vien123'";
		if (mysqli_query($conn,$delet_nhan_vien)) {
			echo "99";
		}else{
			echo "100";
		}

	}
	if (isset($_POST['id_xoa_khach_hang123'])) {// xóa khách hàng
		include 'conn.php';
		$id_xoa_khach_hang123=$_POST['id_xoa_khach_hang123'];
		$delet_khach_hang="UPDATE khachhang SET khachhang.xoa=1, khachhang.ngayxoa='".date("Y/m/d h:i:s")."', khachhang.id_nguoixoa='$_SESSION[idnv]' WHERE khachhang.id='$id_xoa_khach_hang123'";
		if (mysqli_query($conn,$delet_khach_hang)) {
			echo "99";
		}else{
			echo "100";
		}

	}// end xoa khách hàng
	if (isset($_POST['id_xoa_loai_phong123'])) { // xóa loại phòng
		include 'conn.php';
		$id_xoa_loai_phong123=$_POST['id_xoa_loai_phong123'];
		$delet_loai_phong="UPDATE loaiphong SET loaiphong.xoa=1, loaiphong.ngayxoa='".date("Y/m/d h:i:s")."', loaiphong.id_nguoixoa='$_SESSION[idnv]' WHERE loaiphong.id='$id_xoa_loai_phong123'";
		if (mysqli_query($conn,$delet_loai_phong)) {
			echo "99";
		}else{
			echo "100";
		}

	}// end xóa loại phòng
	if (isset($_POST['id_xoa_gia_phong123'])) { // xóa giá phòng
		include 'conn.php';
		$id_xoa_gia_phong123=$_POST['id_xoa_gia_phong123'];
		$delet_gia_phong="UPDATE giaphong SET giaphong.xoa=1, giaphong.ngayxoa='".date("Y/m/d h:i:s")."', giaphong.id_nguoixoa='$_SESSION[idnv]' WHERE giaphong.id='$id_xoa_gia_phong123'";
		if (mysqli_query($conn,$delet_gia_phong)) {
			echo "99";
		}else{
			echo "100";
		}

	}// end xóa giá phòng
	if (isset($_POST['id_xoa_1_phong123'])) { // xóa phòng
		include 'conn.php';
		$id_xoa_1_phong123=$_POST['id_xoa_1_phong123'];
		$delet_gia_phong="UPDATE phong SET phong.xoa=1, phong.ngayxoa='".date("Y/m/d h:i:s")."', phong.id_nguoixoa='$_SESSION[idnv]' WHERE phong.id='$id_xoa_1_phong123'";
		if (mysqli_query($conn,$delet_gia_phong)) {
			echo "99";
		}else{
			echo "100";
		}

	}// end xóa phòng

	// xóa loai thiet bi
	if (isset($_POST['mathietbixoa123'])) {
		include 'conn.php';

		// insert dữ liệu vào cơ sơ dữ liệu
		$update_ltb = "UPDATE loaithietbi SET XOA=1 WHERE loaithietbi.MA_LOAI_THIET_BI='$_POST[mathietbixoa123]'";
		if (mysqli_query($conn, $update_ltb)) {
			echo "99";
		} else {
			echo "100";
		}
	}
 ?>