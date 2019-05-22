<?php
//them thiết bị mới
if (isset($_POST['them_ma_tb'])) {
	include 'conn.php';
	// kiêm tra ma thiết bị đã tồng tại chưa
	$kt_matb = mysqli_query($conn, "SELECT * FROM loaithietbi WHERE MA_LOAI_THIET_BI = '" . $_POST['them_ma_tb'] . "'");
	if (mysqli_num_rows($kt_matb)) {
		echo "1";
	} else {
		// insert dữ liệu vào cơ sơ dữ liệu
		$them_tb = "INSERT INTO loaithietbi (MA_LOAI_THIET_BI, TEN_LOAI_THIET_BI) VALUES ('$_POST[them_ma_tb]','$_POST[them_loai_tb]')";
		if (mysqli_query($conn, $them_tb)) {
			echo "99";
		} else {
			echo "100";
		}
	}
}

//cập nhật lại thiết bị vào
if (isset($_POST['ma_thietbicapnhat12334']) && isset($_POST['ten_ltpcapnhat12345'])) {
	include 'conn.php';
	$capnhat = "UPDATE loaithietbi SET TEN_LOAI_THIET_BI='$_POST[ten_ltpcapnhat12345]' WHERE loaithietbi.MA_LOAI_THIET_BI ='$_POST[ma_thietbicapnhat12334]' ";
	if (mysqli_query($conn, $capnhat)) {
		echo "99";
	} else {
		echo "100";
	}

}

?>