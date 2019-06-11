<?php 
//them thiết bị vào loại phòng
if (isset($_POST['ma_loai_phong']) && isset($_POST['ma_loai_tb']) && isset($_POST['soluong_loai_tb'])) {
	include 'conn.php';
	// kiêm tra thiết bị đã tồng tại chưa
	$kt_maltb = mysqli_query($conn, "SELECT * FROM cothietbi WHERE  XOA=0 AND MA_LOAI_THIET_BI = '" . $_POST['ma_loai_tb'] . "' AND ma_loai_phong='$_POST[ma_loai_phong]' AND ma_loai_phong='$_POST[soluong_loai_tb]' ");
	if (mysqli_num_rows($kt_maltb)) {
		echo "1";
	} else {
		// insert dữ liệu vào cơ sơ dữ liệu
		$insert_loaitb = "INSERT INTO cothietbi(ma_loai_phong, MA_LOAI_THIET_BI, SO_LUONG) VALUES ('$_POST[ma_loai_phong]','$_POST[ma_loai_tb]', '$_POST[soluong_loai_tb]')";
		if (mysqli_query($conn, $insert_loaitb)) {
			echo "99";
		} else {
			echo "100";
		}
	}
}

// xử lý xoa thiết bị trong từng loại phòng
if (isset($_POST['ma_loai_phong_xoa'])) {
	include 'conn.php';
	$capnhat = "UPDATE cothietbi SET XOA=1 WHERE cothietbi.id ='$_POST[ma_loai_phong_xoa]' ";
	if (mysqli_query($conn, $capnhat)) {
		echo "99";
	} else {
		echo "100";
	}

}
 ?>