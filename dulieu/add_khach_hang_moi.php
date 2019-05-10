<?php 
include 'kiemtradangnhap.php';
//neut tôn tại mãi thêm Loại phòng thì thêm không thì thoát
if (isset($_POST['ma_khach_hang_themmoi123'])) {
	include 'conn.php';
		// xuwr lý hình ảnh
	// $duongdananhcanbo = "./../images/"; // đường dẫn ảnh
	// $hinhanhthem=$_FILES['image12']['name'];// lấy tên ảnh sinh viên thêm
	// $target_file = $duongdananhcanbo . basename($_FILES["image12"]["name"]);// lấy loại file
	// end xử lý đường dẫn ảnh
	$ma_khach_hang_themmoi123=$_POST['ma_khach_hang_themmoi123'];// lấy mssv
	$ho_khach_hangthemmoi_12=$_POST['ho_khach_hangthemmoi_12'];// lấy họ  sinh viên
	$ten_khach_hangthemmoi_12=$_POST['ten_khach_hangthemmoi_12'];// lấy tên sinh viên
	$ngaysinh_khach_hangthemmoi_12=$_POST['ngaysinh_khach_hangthemmoi_12']; // lấy ngày sinh sinh viên
	$gioitinh_khach_hangthemmoi_12=$_POST['gioitinh_khach_hangthemmoi_12']; // lấy ngày giới tính sinh viên
	$tinh_them_khach_hang=$_POST['tinh_them_khach_hang']; // lấy  mã tỉnh sinh viên
	$huyen_them_khach_hang=$_POST['huyen_them_khach_hang']; // lấy  mã huyện sinh viên
	$xa_them_khach_hang=$_POST['xa_them_khach_hang']; // lấy  mã xã sinh viên
	$sonha_them_khach_hang=$_POST['sonha_them_khach_hang']; // lấy số nhà sinh viên
	$quequan_them_khach_hang=$_POST['quequan_them_khach_hang']; // lấy id quên quán nhà sinh viên
	$cmnd_them_khach_hang=$_POST['cmnd_them_khach_hang']; // lấy số cmnd sinh viên
	$ngay_capcnnd_them_khach_hang=$_POST['ngay_capcnnd_them_khach_hang']; // lấy ngày cấp số cmnd sinh viên
	$noicap_them_khach_hang=$_POST['noicap_them_khach_hang']; // lấy nơi cấp số cmnd sinh viên
	$so_dt_them_khach_hang=$_POST['so_dt_them_khach_hang']; // lấy sdt sinh viên
	
	$ngay = date('Y/m/d H:i:s');
	
	$kiemtra_so_cmnd = (mysqli_query($conn,"SELECT khachhang.id FROM khachhang WHERE khachhang.cmnd='$cmnd_them_khach_hang'"));
	if (mysqli_num_rows($kiemtra_so_cmnd)) {
		echo "6";// mssv đã tồn tại
	}else{
			$kiemtra_sdt_sv = (mysqli_query($conn,"SELECT khachhang.id FROM khachhang WHERE khachhang.so_dien_thoai='$so_dt_them_khach_hang' " ));
			if (mysqli_num_rows($kiemtra_sdt_sv) && $so_dt_them_khach_hang!='') {
				echo "2";// sđt đã tồn tại
			}else{
				$insert_khach_hang ="INSERT INTO khachhang(ma_khach_hang, ten_khach_hang, ho_khach_hang, gioi_tinh, ngay_sinh, que_quan, cmnd, ngay_cap, noicap, so_dien_thoai, matinh, mahuyen, maxa, sonha, ngaythem, id_nguoithem)  VALUES ('$ma_khach_hang_themmoi123','$ten_khach_hangthemmoi_12','$ho_khach_hangthemmoi_12','$gioitinh_khach_hangthemmoi_12','$ngaysinh_khach_hangthemmoi_12','$quequan_them_khach_hang','$cmnd_them_khach_hang','$ngay_capcnnd_them_khach_hang','$noicap_them_khach_hang','$so_dt_them_khach_hang','$tinh_them_khach_hang','$huyen_them_khach_hang','$xa_them_khach_hang','$sonha_them_khach_hang','$ngay','$_SESSION[idnv]')";
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