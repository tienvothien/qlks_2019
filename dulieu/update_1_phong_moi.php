<?php 
include 'kiemtradangnhap.php';
//neu tôn tại mã thêm Loại phòng thì thêm không thì thoát
if (isset($_POST['id_1_phong_sua_12'])) {
	include 'conn.php';
	
	$id_1_phong_sua_12=$_POST['id_1_phong_sua_12'];// lấy mp
	$ma_1_phong_sua_12=$_POST['ma_1_phong_sua_12'];
	
	$idloai_phong_1_phong_sua_12=$_POST['idloai_phong_1_phong_sua_12']; 
		$ngay = date('Y/m/d H:i:s');
		
		$kiemtra_ma_phong = (mysqli_query($conn,"SELECT phong.id FROM phong WHERE phong.id<>'$id_1_phong_sua_12' and phong.ma_phong='$ma_1_phong_sua_12'"));
		if (mysqli_num_rows($kiemtra_ma_phong)) {
			echo "6";// ma đã tồn tại
		}else{
					$insert_1_phong ="UPDATE phong SET phong.ma_phong='$ma_1_phong_sua_12', phong.id_loai_phong='$idloai_phong_1_phong_sua_12' WHERE phong.id='$id_1_phong_sua_12'";
					if (mysqli_query($conn, $insert_1_phong)) {
						// thêm vào
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