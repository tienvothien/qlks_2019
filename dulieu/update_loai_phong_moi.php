<?php 
include 'kiemtradangnhap.php';
//neut tôn tại mãi thêm Loại phòng thì thêm không thì thoát
if (isset($_POST['id_loai_phong_sua_12'])) {
	include 'conn.php';
		// xuwr lý hình ảnh
	
	// end xử lý đường dẫn ảnh
	$id_loai_phong_sua_12=$_POST['id_loai_phong_sua_12'];// lấy mssv
	$ten_loai_phong_sua_12=$_POST['ten_loai_phong_sua_12'];// lấy tên sinh viên
	$nguoi_o_loai_phong_sua_12=$_POST['nguoi_o_loai_phong_sua_12']; // lấy ngày sinh sinh viên
	$dien_tich_loai_phong_sua_12=$_POST['dien_tich_loai_phong_sua_12']; // lấy ngày giới tính sinh viên
	
	
	$ngay = date('Y/m/d H:i:s');
	
	$kiemtra_ten_laoi_phong = (mysqli_query($conn,"SELECT loaiphong.id FROM loaiphong WHERE loaiphong.id<>'$id_loai_phong_sua_12' and loaiphong.ten_loai_phong='$ten_loai_phong_sua_12'"));
	if (mysqli_num_rows($kiemtra_ten_laoi_phong)) {
		echo "6";// mssv đã tồn tại
	}else{
				$insert_loai_phong ="UPDATE loaiphong SET loaiphong.ten_loai_phong='$ten_loai_phong_sua_12', loaiphong.nguoi_o='$nguoi_o_loai_phong_sua_12', loaiphong.dien_tich='$dien_tich_loai_phong_sua_12' WHERE loaiphong.id='$id_loai_phong_sua_12'";
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