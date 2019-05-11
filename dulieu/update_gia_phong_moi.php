<?php 
include 'kiemtradangnhap.php';
//neut tôn tại mãi thêm Loại phòng thì thêm không thì thoát
if (isset($_POST['id_gia_phong_sua_12'])) {
	include 'conn.php';
		// xuwr lý hình ảnh
	
	// end xử lý đường dẫn ảnh
	$id_gia_phong_sua_12=$_POST['id_gia_phong_sua_12'];// lấy mssv
	$ten_gia_phong_sua_12=$_POST['ten_gia_phong_sua_12'];// lấy tên sinh viên
	$gia_phong_gio_sua_12=$_POST['gia_phong_gio_sua_12']; // lấy ngày sinh sinh viên
	$gia_phong_ngay_sua_12=$_POST['gia_phong_ngay_sua_12']; // lấy ngày giới tính sinh viên
	$idloai_phong_gia_phong_sua_12=$_POST['idloai_phong_gia_phong_sua_12']; // lấy ngày giới tính sinh viên
	
	$gia_phong_gio_sua_12=preg_replace('/(,)/u', '', strip_tags($gia_phong_gio_sua_12));
	$gia_phong_ngay_sua_12=preg_replace('/(,)/u', '', strip_tags($gia_phong_ngay_sua_12));
	if ($gia_phong_gio_sua_12<50000) {
		echo "1";
	}elseif ($gia_phong_ngay_sua_12<50000) {
		echo "2";
		}else{
		$ngay = date('Y/m/d H:i:s');
		
		$kiemtra_ten_gia_phong = (mysqli_query($conn,"SELECT giaphong.id FROM giaphong WHERE giaphong.id<>'$id_gia_phong_sua_12' and giaphong.ten_gia_phong='$ten_gia_phong_sua_12'"));
		if (mysqli_num_rows($kiemtra_ten_gia_phong)) {
			echo "6";// mssv đã tồn tại
		}else{
					$insert_gia_phong ="UPDATE giaphong SET giaphong.ten_gia_phong='$ten_gia_phong_sua_12', giaphong.id_loai_phong='$idloai_phong_gia_phong_sua_12', giaphong.gia_phong_gio='$gia_phong_gio_sua_12', giaphong.gia_phong_ngay='$gia_phong_ngay_sua_12' WHERE giaphong.id='$id_gia_phong_sua_12'";
					if (mysqli_query($conn, $insert_gia_phong)) {
						// thêm tài khoản vào
						echo "99";
						
					}else {
						echo "100";
					}
		}
	}
} else {
	header("location:./../quanly/login");
	// echo "123123124";
}
mysqli_close($conn);
?>