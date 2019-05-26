<?php 
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