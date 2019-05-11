<?php 
include 'kiemtradangnhap.php';
//neut tôn tại mãi thêm Loại phòng thì thêm không thì thoát
if (isset($_POST['ma_gia_phong_themmoi123'])) {
	include 'conn.php';
	
	$ma_gia_phong_themmoi123=$_POST['ma_gia_phong_themmoi123'];// lấy x
	$ten_gia_phongthemmoi_12=$_POST['ten_gia_phongthemmoi_12'];// lấy tên loại phòng
	$idloai_phong_gia_phongthemmoi_12=$_POST['idloai_phong_gia_phongthemmoi_12']; // lấy id loại phòng
	$gia_phong_giothemmoi_12=$_POST['gia_phong_giothemmoi_12']; // lấy giá giờ loại phòng
	$gia_phong_ngaythemmoi_12=$_POST['gia_phong_ngaythemmoi_12']; // lấy giá  ngày loại phòng
	$gia_phong_giothemmoi_12=preg_replace('/(,)/u', '', strip_tags($gia_phong_giothemmoi_12));
	$gia_phong_ngaythemmoi_12=preg_replace('/(,)/u', '', strip_tags($gia_phong_ngaythemmoi_12));
	if ($gia_phong_giothemmoi_12<50000) {
		echo "1";
	}elseif ($gia_phong_ngaythemmoi_12<50000) {
		echo "2";
	}else{
		$ngay = date('Y/m/d H:i:s');
		$kiemtra_ma_gia_phong = (mysqli_query($conn,"SELECT giaphong.id FROM giaphong WHERE giaphong.ten_gia_phong='$ten_gia_phongthemmoi_12'"));
		if (mysqli_num_rows($kiemtra_ma_gia_phong)) {
			echo "6";// mã đã tồn tại
		}else{
			$insert_gia_phong ="INSERT INTO giaphong(ma_gia_phong, ten_gia_phong, gia_phong_gio, gia_phong_ngay, id_loai_phong, ngaythem, id_nguoithem) VALUES ('$ma_gia_phong_themmoi123','$ten_gia_phongthemmoi_12','$gia_phong_giothemmoi_12','$gia_phong_ngaythemmoi_12', '$idloai_phong_gia_phongthemmoi_12', '$ngay','$_SESSION[idnv]')";
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