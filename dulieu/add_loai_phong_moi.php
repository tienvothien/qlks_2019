<?php 
include 'kiemtradangnhap.php';
//neut tôn tại mãi thêm Loại phòng thì thêm không thì thoát
if (isset($_POST['ma_loai_phong_themmoi123'])) {
	include 'conn.php';
	
	$ma_loai_phong_themmoi123=$_POST['ma_loai_phong_themmoi123'];// lấy x
	$ten_loai_phongthemmoi_12=$_POST['ten_loai_phongthemmoi_12'];// lấy tên loại phòng
	$nguoi_o_loai_phongthemmoi_12=$_POST['nguoi_o_loai_phongthemmoi_12']; // lấy người ở loại phòng
	$dien_tich_loai_phongthemmoi_12=$_POST['dien_tich_loai_phongthemmoi_12']; // lấy diện tích loại phòng
	
	$ngay = date('Y/m/d H:i:s');
	$kiemtra_ma_loai_phong = (mysqli_query($conn,"SELECT loaiphong.id FROM loaiphong WHERE loaiphong.ten_loai_phong='$ten_loai_phongthemmoi_12'"));
	if (mysqli_num_rows($kiemtra_ma_loai_phong)) {
		echo "6";// mã đã tồn tại
	}else{
		$insert_loai_phong ="INSERT INTO loaiphong( ma_loai_phong, ten_loai_phong, nguoi_o, dien_tich, ngaythem, id_nguoithem) VALUES ('$ma_loai_phong_themmoi123','$ten_loai_phongthemmoi_12','$nguoi_o_loai_phongthemmoi_12','$dien_tich_loai_phongthemmoi_12','$ngay','$_SESSION[idnv]')";
		if (mysqli_query($conn, $insert_loai_phong)) {
					// thêm tài khoản vào
			echo "99";
		}else {
			echo "100";
		}
	}
} else {
	header("location:./../quanly/login");
	// echo "123123124";
}
mysqli_close($conn);
?>