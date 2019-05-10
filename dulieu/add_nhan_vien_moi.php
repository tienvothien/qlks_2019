<?php 
include 'kiemtradangnhap.php';
//neut tôn tại mãi thêm Loại phòng thì thêm không thì thoát
if (isset($_POST['ma_nhan_vien_themmoi123'])) {
	include 'conn.php';
		// xuwr lý hình ảnh
	$duongdananhcanbo = "./../images/"; // đường dẫn ảnh
	$hinhanhthem=$_FILES['image12']['name'];// lấy tên ảnh sinh viên thêm
	$target_file = $duongdananhcanbo . basename($_FILES["image12"]["name"]);// lấy loại file
	// end xử lý đường dẫn ảnh
	$ma_nhan_vien_themmoi123=$_POST['ma_nhan_vien_themmoi123'];// lấy mssv
	$ho_nhan_vienthemmoi_12=$_POST['ho_nhan_vienthemmoi_12'];// lấy họ  sinh viên
	$ten_nhan_vienthemmoi_12=$_POST['ten_nhan_vienthemmoi_12'];// lấy tên sinh viên
	$ngaysinh_nhan_vienthemmoi_12=$_POST['ngaysinh_nhan_vienthemmoi_12']; // lấy ngày sinh sinh viên
	$gioitinh_nhan_vienthemmoi_12=$_POST['gioitinh_nhan_vienthemmoi_12']; // lấy ngày giới tính sinh viên
	$tinh_them_nhan_vien=$_POST['tinh_them_nhan_vien']; // lấy  mã tỉnh sinh viên
	$huyen_them_nhan_vien=$_POST['huyen_them_nhan_vien']; // lấy  mã huyện sinh viên
	$xa_them_nhan_vien=$_POST['xa_them_nhan_vien']; // lấy  mã xã sinh viên
	$sonha_them_nhan_vien=$_POST['sonha_them_nhan_vien']; // lấy số nhà sinh viên
	$quequan_them_nhan_vien=$_POST['quequan_them_nhan_vien']; // lấy id quên quán nhà sinh viên
	$cmnd_them_nhan_vien=$_POST['cmnd_them_nhan_vien']; // lấy số cmnd sinh viên
	$ngay_capcnnd_them_nhan_vien=$_POST['ngay_capcnnd_them_nhan_vien']; // lấy ngày cấp số cmnd sinh viên
	$noicap_them_nhan_vien=$_POST['noicap_them_nhan_vien']; // lấy nơi cấp số cmnd sinh viên
	$so_dt_them_nhan_vien=$_POST['so_dt_them_nhan_vien']; // lấy sdt sinh viên
	
	$ngay = date('Y/m/d H:i:s');
	
	$kiemtra_so_cmnd = (mysqli_query($conn,"SELECT nhanvien.id FROM nhanvien WHERE nhanvien.cmnd='$cmnd_them_nhan_vien'"));
	if (mysqli_num_rows($kiemtra_so_cmnd)) {
		echo "6";// mssv đã tồn tại
	}else{
			$kiemtra_sdt_sv = (mysqli_query($conn,"SELECT nhanvien.id FROM nhanvien WHERE nhanvien.so_dien_thoai='$so_dt_them_nhan_vien' " ));
			if (mysqli_num_rows($kiemtra_sdt_sv) && $so_dt_them_nhan_vien!='') {
				echo "2";// sđt đã tồn tại
			}else{
				$insert_nhan_vien ="INSERT INTO nhanvien( anhcanhan, ma_nhan_vien, ten_nhan_vien, ho_nhan_vien, gioi_tinh, ngay_sinh, que_quan, cmnd, ngay_cap, noicap, so_dien_thoai, matinh, mahuyen, maxa, sonha, ngaythem, id_nguoithem) VALUES ('$hinhanhthem','$ma_nhan_vien_themmoi123','$ten_nhan_vienthemmoi_12','$ho_nhan_vienthemmoi_12','$gioitinh_nhan_vienthemmoi_12','$ngaysinh_nhan_vienthemmoi_12','$quequan_them_nhan_vien','$cmnd_them_nhan_vien','$ngay_capcnnd_them_nhan_vien','$noicap_them_nhan_vien','$so_dt_them_nhan_vien','$tinh_them_nhan_vien','$huyen_them_nhan_vien','$xa_them_nhan_vien','$sonha_them_nhan_vien','$ngay','$_SESSION[idnv]')";
				if (mysqli_query($conn, $insert_nhan_vien)) {
					move_uploaded_file($_FILES["image12"]["tmp_name"], $target_file);
					// thêm tài khoản vào
					mysqli_query($conn,"INSERT INTO taikhoan( tendangnhap, matkhau, ngaythem, id_nguoithem) VALUES ('$ma_nhan_vien_themmoi123','".md5(md5(md5($ma_nhan_vien_themmoi123)))."','$ngay','$_SESSION[idnv]' )");
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