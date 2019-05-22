<?php 
include 'kiemtradangnhap.php';
//neut tôn tại mãi thêm Loại phòng thì thêm không thì thoát
if (isset($_POST['cmnd_index_phong_sua_12'])) {
	include 'conn.php';
	
	$cmnd_index_phong_sua_12=$_POST['cmnd_index_phong_sua_12'];// lấy x
	$id_index_phong_sua_12=$_POST['id_index_phong_sua_12'];// lấy x
	$ngay = date('Y/m/d H:i:s');

		$kiemtra_mkhachhanh = (mysqli_query($conn,"SELECT khachhang.id as idkh FROM khachhang WHERE khachhang.xoa=0 and khachhang.cmnd='$cmnd_index_phong_sua_12'"));
		if (!mysqli_num_rows($kiemtra_mkhachhanh)) {
			echo "6";// mã đã tồn tại
		}else{
			$row_sl=mysqli_fetch_array(mysqli_query($conn,"SELECT count(thuephong.id)  as row_sl FROM thuephong where thuephong.thoi_gian_ra is null and thuephong.id_phong='$id_index_phong_sua_12'"));
			$slolp = mysqli_fetch_array(mysqli_query($conn,"SELECT loaiphong.nguoi_o as slolp FROM phong, loaiphong where phong.id = '$id_index_phong_sua_12' and phong.id_loai_phong = loaiphong.id"));
			if ($row_sl['row_sl']==$slolp['slolp']) {
				echo "1";
			}else{
				// kiểm tra xem khách có đang ở trong phòng hay khong
				$id_kh = mysqli_fetch_array($kiemtra_mkhachhanh);
				$sl_kh_dang_co_op=(mysqli_query($conn,"SELECT thuephong.id  as sl_kh_dang_co_op FROM thuephong where thuephong.thoi_gian_ra is null and thuephong.id_khach_hang='$id_kh[idkh]'"));
				if (mysqli_num_rows($sl_kh_dang_co_op)) {
					echo '101';
				}else{
					$insert_1_phong ="INSERT INTO thuephong(id_phong, id_khach_hang, thoi_gian_vao, ngaythem, id_nguoithem) VALUES ('$id_index_phong_sua_12','$id_kh[idkh]', '$ngay','$ngay','$_SESSION[idnv]')";
					if (mysqli_query($conn, $insert_1_phong)) {
								// thêm tài khoản vào
						echo "99";
					}else {
						echo "100";
					}
				}
			}
		}
} else {
	header("location:./../quanly/login");
	// echo "123123124";
}
mysqli_close($conn);
?>