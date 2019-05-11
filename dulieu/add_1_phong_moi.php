<?php 
include 'kiemtradangnhap.php';
//neut tôn tại mãi thêm Loại phòng thì thêm không thì thoát
if (isset($_POST['ma_1_phong_themmoi123'])) {
	include 'conn.php';
	
	$ma_1_phong_themmoi123=$_POST['ma_1_phong_themmoi123'];// lấy x
	$idloai_phong_1_phongthemmoi_12=$_POST['idloai_phong_1_phongthemmoi_12']; // lấy id loại phòng
	
		$ngay = date('Y/m/d H:i:s');
		$kiemtra_ma_1_phong = (mysqli_query($conn,"SELECT phong.id FROM phong WHERE phong.xoa=0 and phong.ma_phong='$ma_1_phong_themmoi123'"));
		if (mysqli_num_rows($kiemtra_ma_1_phong)) {
			echo "6";// mã đã tồn tại
		}else{
			$insert_1_phong ="INSERT INTO phong(ma_phong, id_loai_phong, ngaythem, id_nguoithem) VALUES ('$ma_1_phong_themmoi123','$idloai_phong_1_phongthemmoi_12', '$ngay','$_SESSION[idnv]')";
			if (mysqli_query($conn, $insert_1_phong)) {
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