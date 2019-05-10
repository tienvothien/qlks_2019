<?php
//danhnhap can bo
if (isset($_POST['tendangnhap_login']) && isset($_POST['matkhau_login'])) {
	include 'conn.php';
	$tendangnhap_login = $_POST['tendangnhap_login'];
	$matkhau_login = $_POST['matkhau_login'];
	$ktrataikhoan = mysqli_query($conn, "SELECT taikhoan.id as idtk FROM taikhoan WHERE taikhoan.tendangnhap ='$tendangnhap_login' and taikhoan.xoa=0");
	// kiem tra tên đăng nhập
	if (mysqli_num_rows($ktrataikhoan)) {
		// nếu có tồn tài tên đang nhập thì kiểm tra mật khẩu
		$ktrataikhoan_MK = mysqli_query($conn, "SELECT taikhoan.id as idtk,taikhoan.tendangnhap FROM taikhoan WHERE taikhoan.tendangnhap ='$tendangnhap_login' and taikhoan.xoa=0  and taikhoan.matkhau='$matkhau_login'");
		if (mysqli_num_rows($ktrataikhoan_MK)) {
			//kiểm tra có phải là sinh viên không
			$qr_quyen_sv = (mysqli_query($conn, "SELECT nhanvien.id AS idnv, nhanvien.ma_nhan_vien, nhanvien.ho_nhan_vien, nhanvien.ten_nhan_vien FROM nhanvien WHERE nhanvien.ma_nhan_vien ='$tendangnhap_login'"));
				$row1 = mysqli_fetch_array($qr_quyen_sv);
				session_start();
				$_SESSION['idnv'] = $row1['idnv'];
				$_SESSION['ma_nhan_vien'] = $row1['ma_nhan_vien'];
				$_SESSION['ho_nhan_vien'] = $row1['ho_nhan_vien'];
				$_SESSION['ten_nhan_vien'] = $row1['ten_nhan_vien'];
				$_SESSION['kt_dangnhap_sv'] = 1;

		} else {
			echo "1";
		}
	} else {
		echo "2";
	}
} else {
	header('location:./../quanly/login/');
}
?>