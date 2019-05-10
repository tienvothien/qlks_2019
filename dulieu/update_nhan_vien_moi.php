<?php 
include 'kiemtradangnhap.php';
//neut tôn tại mãi thêm Loại phòng thì thêm không thì thoát
if (isset($_POST['id_nhan_vien_sua_12'])) {
	include 'conn.php';
		// xuwr lý hình ảnh
	$duongdananhcanbo = "./../images/"; // đường dẫn ảnh
	$hinhanhthem=$_FILES['image_123']['name'];// lấy tên ảnh sinh viên thêm
	$target_file = $duongdananhcanbo . basename($_FILES["image_123"]["name"]);// lấy loại file
	// end xử lý đường dẫn ảnh
	$id_nhan_vien_sua_12=$_POST['id_nhan_vien_sua_12'];// lấy mssv
	$ho_nhan_vien_sua_12=$_POST['ho_nhan_vien_sua_12'];// lấy họ  sinh viên
	$ten_nhan_vien_sua_12=$_POST['ten_nhan_vien_sua_12'];// lấy tên sinh viên
	$ngaysinh_nhan_vien_sua_12=$_POST['ngaysinh_nhan_vien_sua_12']; // lấy ngày sinh sinh viên
	$gioitinh_nhan_vien_sua_12=$_POST['gioitinh_nhan_vien_sua_12']; // lấy ngày giới tính sinh viên
	$tinh_nhan_vien_sua_12=$_POST['tinh_nhan_vien_sua_12']; // lấy  mã tỉnh sinh viên
	$huyen_nhan_vien_sua_12=$_POST['huyen_nhan_vien_sua_12']; // lấy  mã huyện sinh viên
	$xa_nhan_vien_sua_12=$_POST['xa_nhan_vien_sua_12']; // lấy  mã xã sinh viên
	$sonha_nhan_vien_sua_12=$_POST['sonha_nhan_vien_sua_12']; // lấy số nhà sinh viên
	$quequan_nhan_vien_sua_12=$_POST['quequan_nhan_vien_sua_12']; // lấy id quên quán nhà sinh viên
	$cmnd_nhan_vien_sua_12=$_POST['cmnd_nhan_vien_sua_12']; // lấy số cmnd sinh viên
	$ngay_capcnnd_nhan_vien_sua_12=$_POST['ngay_capcnnd_nhan_vien_sua_12']; // lấy ngày cấp số cmnd sinh viên
	$noicap_nhan_vien_sua_12=$_POST['noicap_nhan_vien_sua_12']; // lấy nơi cấp số cmnd sinh viên
	$so_dt_nhan_vien_sua_12=$_POST['so_dt_nhan_vien_sua_12']; // lấy sdt sinh viên
	
	$ngay = date('Y/m/d H:i:s');
	
	$kiemtra_so_cmnd = (mysqli_query($conn,"SELECT nhanvien.id FROM nhanvien WHERE nhanvien.cmnd='$cmnd_nhan_vien_sua_12' and nhanvien.id<>'$id_nhan_vien_sua_12'"));
	if (mysqli_num_rows($kiemtra_so_cmnd)) {
		echo "6";// mssv đã tồn tại
	}else{
			$kiemtra_sdt_sv = (mysqli_query($conn,"SELECT nhanvien.id FROM nhanvien WHERE nhanvien.so_dien_thoai='$so_dt_nhan_vien_sua_12' and nhanvien.id<>'$id_nhan_vien_sua_12'" ));
			if (mysqli_num_rows($kiemtra_sdt_sv) && $so_dt_nhan_vien_sua_12!='') {
				echo "2";// sđt đã tồn tại
			}else{
				$insert_nhan_vien ="UPDATE nhanvien SET nhanvien.ho_nhan_vien='$ho_nhan_vien_sua_12', nhanvien.ten_nhan_vien='$ten_nhan_vien_sua_12', nhanvien.gioi_tinh='$gioitinh_nhan_vien_sua_12', nhanvien.ngay_sinh='$ngaysinh_nhan_vien_sua_12', nhanvien.que_quan='$quequan_nhan_vien_sua_12', nhanvien.cmnd='$cmnd_nhan_vien_sua_12', nhanvien.ngay_cap='$ngay_capcnnd_nhan_vien_sua_12', nhanvien.noicap='$noicap_nhan_vien_sua_12', nhanvien.so_dien_thoai='$so_dt_nhan_vien_sua_12', nhanvien.matinh='$tinh_nhan_vien_sua_12', nhanvien.mahuyen='$huyen_nhan_vien_sua_12', nhanvien.maxa='$xa_nhan_vien_sua_12', nhanvien.sonha='$sonha_nhan_vien_sua_12' WHERE nhanvien.id='$id_nhan_vien_sua_12'";
				if (mysqli_query($conn, $insert_nhan_vien)) {
					move_uploaded_file($_FILES["image_123"]["tmp_name"], $target_file);
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