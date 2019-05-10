<?php 
	include 'kiemtradangnhap.php';
	if (isset($_POST['id_xoa_nhan_vien123'])) {
		include 'conn.php';
		$id_xoa_nhan_vien123=$_POST['id_xoa_nhan_vien123'];
		$delet_nhan_vien="UPDATE nhanvien SET nhanvien.xoa=1, nhanvien.ngayxoa='".date("Y/m/d h:i:s")."', nhanvien.id_nguoixoa='$_SESSION[idnv]' WHERE nhanvien.id='$id_xoa_nhan_vien123'";
		if (mysqli_query($conn,$delet_nhan_vien)) {
			echo "99";
		}else{
			echo "100";
		}

	}
	if (isset($_POST['id_xoa_khach_hang123'])) {
		include 'conn.php';
		$id_xoa_khach_hang123=$_POST['id_xoa_khach_hang123'];
		$delet_khach_hang="UPDATE khachhang SET khachhang.xoa=1, khachhang.ngayxoa='".date("Y/m/d h:i:s")."', khachhang.id_nguoixoa='$_SESSION[idnv]' WHERE khachhang.id='$id_xoa_khach_hang123'";
		if (mysqli_query($conn,$delet_khach_hang)) {
			echo "99";
		}else{
			echo "100";
		}

	}

 ?>