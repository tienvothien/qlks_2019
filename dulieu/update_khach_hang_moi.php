<?php 
include 'kiemtradangnhap.php';
//neut tôn tại mãi thêm Loại phòng thì thêm không thì thoát
if (isset($_POST['id_khach_hang_sua_12'])) {
	include 'conn.php';
		// xuwr lý hình ảnh
	
	// end xử lý đường dẫn ảnh
	$id_khach_hang_sua_12=$_POST['id_khach_hang_sua_12'];// lấy mssv
	$ho_khach_hang_sua_12=$_POST['ho_khach_hang_sua_12'];// lấy họ  sinh viên
	$ten_khach_hang_sua_12=$_POST['ten_khach_hang_sua_12'];// lấy tên sinh viên
	$ngaysinh_khach_hang_sua_12=$_POST['ngaysinh_khach_hang_sua_12']; // lấy ngày sinh sinh viên
	$gioitinh_khach_hang_sua_12=$_POST['gioitinh_khach_hang_sua_12']; // lấy ngày giới tính sinh viên
	$tinh_khach_hang_sua_12=$_POST['tinh_khach_hang_sua_12']; // lấy  mã tỉnh sinh viên
	$huyen_khach_hang_sua_12=$_POST['huyen_khach_hang_sua_12']; // lấy  mã huyện sinh viên
	$xa_khach_hang_sua_12=$_POST['xa_khach_hang_sua_12']; // lấy  mã xã sinh viên
	$sonha_khach_hang_sua_12=$_POST['sonha_khach_hang_sua_12']; // lấy số nhà sinh viên
	$quequan_khach_hang_sua_12=$_POST['quequan_khach_hang_sua_12']; // lấy id quên quán nhà sinh viên
	$cmnd_khach_hang_sua_12=$_POST['cmnd_khach_hang_sua_12']; // lấy số cmnd sinh viên
	$ngay_capcnnd_khach_hang_sua_12=$_POST['ngay_capcnnd_khach_hang_sua_12']; // lấy ngày cấp số cmnd sinh viên
	$noicap_khach_hang_sua_12=$_POST['noicap_khach_hang_sua_12']; // lấy nơi cấp số cmnd sinh viên
	$so_dt_khach_hang_sua_12=$_POST['so_dt_khach_hang_sua_12']; // lấy sdt sinh viên
	
	$ngay = date('Y/m/d H:i:s');
	
	$kiemtra_so_cmnd = (mysqli_query($conn,"SELECT khachhang.id FROM khachhang WHERE khachhang.cmnd='$cmnd_khach_hang_sua_12' and khachhang.id<>'$id_khach_hang_sua_12'"));
	if (mysqli_num_rows($kiemtra_so_cmnd)) {
		echo "6";// mssv đã tồn tại
	}else{
			$kiemtra_sdt_sv = (mysqli_query($conn,"SELECT khachhang.id FROM khachhang WHERE khachhang.so_dien_thoai='$so_dt_khach_hang_sua_12' and khachhang.id<>'$id_khach_hang_sua_12'" ));
			if (mysqli_num_rows($kiemtra_sdt_sv) && $so_dt_khach_hang_sua_12!='') {
				echo "2";// sđt đã tồn tại
			}else{
				$insert_khach_hang ="UPDATE khachhang SET khachhang.ho_khach_hang='$ho_khach_hang_sua_12', khachhang.ten_khach_hang='$ten_khach_hang_sua_12', khachhang.gioi_tinh='$gioitinh_khach_hang_sua_12', khachhang.ngay_sinh='$ngaysinh_khach_hang_sua_12', khachhang.que_quan='$quequan_khach_hang_sua_12', khachhang.cmnd='$cmnd_khach_hang_sua_12', khachhang.ngay_cap='$ngay_capcnnd_khach_hang_sua_12', khachhang.noicap='$noicap_khach_hang_sua_12', khachhang.so_dien_thoai='$so_dt_khach_hang_sua_12', khachhang.matinh='$tinh_khach_hang_sua_12', khachhang.mahuyen='$huyen_khach_hang_sua_12', khachhang.maxa='$xa_khach_hang_sua_12', khachhang.sonha='$sonha_khach_hang_sua_12' WHERE khachhang.id='$id_khach_hang_sua_12'";
				if (mysqli_query($conn, $insert_khach_hang)) {
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