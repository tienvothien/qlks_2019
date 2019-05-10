<?php 
	include 'kiemtradangnhap.php';
	if (isset($_POST['id_xoa_nhan_vien123'])) {
		include 'conn.php';
		$id_xoa_nhan_vien123=$_POST['id_xoa_nhan_vien123'];
		$delet_nhan_vien="UPDATE nhanvien SET nhanvien.xoa=1, nhanvien.id_nguoixoa='".date("Y/m/d h:i:s")."', nhanvien.ngayxoa='$_SESSION[idnv]' WHERE nhanvien.id='$id_xoa_nhan_vien123'";
		if (mysqli_query($conn,$delet_nhan_vien)) {
			echo "99";
		}else{
			echo "100";
		}

	}

 ?>