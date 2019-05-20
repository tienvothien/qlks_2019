<?php 
include 'kiemtradangnhap.php';
//neut tôn tại mãi thêm Loại phòng thì thêm không thì thoát
if (isset($_POST['id_xoa_index_phong123'])) {
	include 'conn.php';
	
	$id_xoa_index_phong123=$_POST['id_xoa_index_phong123'];// lấy thông tin phòng tính tiền;
	$kiemtra_mkhachhanh = (mysqli_query($conn,"SELECT phong.id as idphong, thuephong.id as id_thuephong, phong.ma_phong, thuephong.thoi_gian_vao, giaphong.gia_phong_gio, giaphong.gia_phong_ngay FROM thuephong, giaphong, loaiphong, phong WHERE thuephong.id_phong='$id_xoa_index_phong123' AND giaphong.id_loai_phong = loaiphong.id AND thuephong.id_phong= phong.id AND phong.id_loai_phong=loaiphong.id and thuephong.thoi_gian_ra is null ORDER BY thoi_gian_vao LIMIT 1"));// kiểm tra phòng có tồn tại khách thuê phòng khồng
		if (!mysqli_num_rows($kiemtra_mkhachhanh)) {
			echo "1";// mã đã tồn tại
		}else{
			$row_phong = mysqli_fetch_array($kiemtra_mkhachhanh);
			$ngayvao = date("Y/m/d H:i:s" , strtotime($row_phong['thoi_gian_vao']));// thời gian vào
			$ngayra =date("Y/m/d H:i:s"); // nhày giờ hệ thống
			$ngay= round((strtotime($ngayra)-strtotime($ngayvao))/(3600), 2);// tính số giờ đã ở
			$tienphongngay=0;
			$tien_phuthu=0;
			$tongtien=0;
			$qua_12_so_gio=0;
			$tientheogio = $row_phong['gia_phong_gio'];
			$tientheongay = $row_phong['gia_phong_ngay'];
			$han_12_gio = date("Y/m/d 12:00:00");// 12 giờ hiện tại
			$thoi_gian_o_tinh_ngay = round((strtotime($ngayra)- strtotime($ngayvao))/(3600*24), 0);
			if ($ngay>4) {// trả phòng hơn 4 tiếng
				$kiem_tra_ngay_vao= date("Y/m/d" , strtotime($row_phong['thoi_gian_vao'])); // láy ngày vào
				$kiem_tra_ngay_hientai= date("Y/m/d" ); // láy ngày vào
				if (strtotime($ngayra)>strtotime($han_12_gio) && $kiem_tra_ngay_vao !=  $kiem_tra_ngay_hientai ) {// nếu trả phòng sau 12 giờ
					$qua_12_so_gio = round((strtotime($ngayra)-strtotime($han_12_gio))/3600,2);// sô giờ qua 12 giờ 
					$thoi_gian_o_tinh_ngay = round((strtotime($han_12_gio)- strtotime($ngayvao))/(3600*24), 0);//tính số ngày
					$tienphongngay=$thoi_gian_o_tinh_ngay*$tientheongay;// tính tiền phòng rheo số ngày ở
					$tongtien = $tienphongngay;// gán tổng tiền phòng
					if ($qua_12_so_gio>4) {// nếu số giờ trả sau 12 giờ hơn 4 giờ
						$tongtien=$tongtien+$tientheongay;// tiền phòng bằng tiền phòng cộng thêm tiền 1 ngày
						$tien_phuthu =$tientheongay;// tính tiền phụ thu theo ngày
					}else{// nếu số giờ trả sau 12 giờ không quá 4 giờ
						$tongtien=$tongtien+$tientheogio;// tiền phòng cộng thêm tiền giờ
						$tien_phuthu= $tientheogio;// tính tiền phụ thu theo tiền giờ
					}
				}else{// trả phòng trước 12 giờ
					if ($thoi_gian_o_tinh_ngay<1) {
						$thoi_gian_o_tinh_ngay=round((strtotime($ngayra)- strtotime($ngayvao))/(3600), 2);
						$tienphongngay=$tientheongay;// tính tiền phòng không có phụ thu
						$tongtien = $tienphongngay;// tính tổng số tiền phòng
					}else{
						$tienphongngay=$thoi_gian_o_tinh_ngay*$tientheongay;// tính tiền phòng không có phụ thu
						$tongtien = $tienphongngay;// tính tổng số tiền phòng
					}
				}
			}else{// trả phòng trước 4 tiếng
				$tienphongngay = $tientheogio;// tính tổng tiền theo giờ
				$tongtien = $tientheogio;// tính tổng tiền theo giờ
			}
			$insert_1_phong ="INSERT INTO bienlai(id_phong, id_thuephong, ngay_tinhbienlai, id_nguoi_tinh, tongtien, tienngay, tienphuthu) VALUES ('$row_phong[idphong]','$row_phong[id_thuephong]','$ngayra','$_SESSION[idnv]','$tongtien','$tienphongngay','$tien_phuthu')";

			if (mysqli_query($conn, $insert_1_phong)) {
								// thêm tài khoản vào
				$updet_thp = (mysqli_query($conn,"SELECT phong.id as idphong, thuephong.id as id_thuephong, phong.ma_phong, thuephong.thoi_gian_vao, giaphong.gia_phong_gio, giaphong.gia_phong_ngay FROM thuephong, giaphong, loaiphong, phong WHERE thuephong.id_phong='$id_xoa_index_phong123' AND giaphong.id_loai_phong = loaiphong.id AND thuephong.id_phong= phong.id AND phong.id_loai_phong=loaiphong.id and thuephong.thoi_gian_ra is null ORDER BY thoi_gian_vao"));// tìm các id thuê phong để update thời gian gia
				while ($r_1 = mysqli_fetch_array($updet_thp)) {
					mysqli_query($conn,"UPDATE thuephong SET thuephong.thoi_gian_ra ='$ngayra' WHERE thuephong.id='$r_1[id_thuephong]'");
				}
				echo "99";
			}else {
				echo var_dump($insert_1_phong);
			}
		}
} else {
	header("location:./../quanly/login");
	// echo "123123124";
}
mysqli_close($conn);
?>