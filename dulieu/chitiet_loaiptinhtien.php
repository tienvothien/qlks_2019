<?php
if (isset($_POST["id_chitiet1_phong"])) {
include 'conn.php';
	$selecet_phong = mysqli_query($conn, "SELECT * FROM phong WHERE phong.xoa=0 and phong.id='$_POST[id_chitiet1_phong]'  order by phong.ma_phong");
	if (!mysqli_num_rows($selecet_phong)) {
		echo "<div style='text-align: center;'> Chưa có dữ liệu</div>";
	} else {
?>
<div class="table-responsive">
	<table class="table table-hover table-bordered table-striped" id="myTable">
		<tbody>
			<?php
			$row_phong = mysqli_fetch_array($selecet_phong);
			$r = mysqli_fetch_array(mysqli_query($conn, "SELECT loaiphong.ma_loai_phong, loaiphong.ten_loai_phong, giaphong.gia_phong_gio, giaphong.gia_phong_ngay FROM Loaiphong, giaphong, phong where phong.id='$row_phong[id]' AND phong.id_loai_phong = loaiphong.id AND loaiphong.id= giaphong.id_loai_phong"));?>
			<tr>
				<th class='canhgiua'>Phòng</th>
				<td class='chuinhoa canhgiua'><?php echo  $row_phong['ma_phong'];?></td>
			</tr>
			<tr>
				<th class='canhgiua'>Loại phòng</th>
				<td class='chuinthuong canhgiua'> <?php echo $r['ma_loai_phong'] ."-". $r['ten_loai_phong'];?></td>
			</tr>
			<tr>
				<th class='canhgiua'>Giá Giờ <br> (VNĐ)</th>
				<td class='chuinhoa canhgiua'><?php echo number_format ($r["gia_phong_gio"] , $decimals = 0 , $dec_point = "." , $thousands_sep = "," );?></td>
			</tr>
			
			<tr>
				<th class='canhgiua'>Giá ngày <br> (VNĐ)</th>
				<td class='chuinhoa canhgiua'><?php echo number_format ($r["gia_phong_ngay"] , $decimals = 0 , $dec_point = "." , $thousands_sep = "," );?></td>
				
			</tr>
			
		</tr>
	</tbody>
</table>
<?php
}
}
if (isset($_POST["id_chitiet1_phong_o12"])) {
include 'conn.php';
	$selecet_phong = mysqli_query($conn, "SELECT phong.id, phong.ma_phong, thuephong.thoi_gian_vao, giaphong.gia_phong_gio, giaphong.gia_phong_ngay FROM thuephong, giaphong, loaiphong, phong WHERE thuephong.id_phong='$_POST[id_chitiet1_phong_o12]' AND giaphong.id_loai_phong = loaiphong.id AND thuephong.id_phong= phong.id AND phong.id_loai_phong=loaiphong.id and thuephong.thoi_gian_ra is null ORDER BY thoi_gian_vao");
	if (!mysqli_num_rows($selecet_phong)) {
		echo "<div style='text-align: center;'> Chưa có dữ liệu</div>";
	} else {
?>
<div class="table-responsive">
	<table class="table table-hover table-bordered table-striped" id="myTable">
		<tbody>
			<?php
			$row_phong = mysqli_fetch_array($selecet_phong);
			$ngayvao =date("H:i:s d/m/Y" , strtotime($row_phong['thoi_gian_vao']));
			?>
			<tr>
				<th class='canhgiua'>Vào lúc</th>
				<td class='chuinhoa canhgiua'><?php echo $ngayvao ;?></td>
			</tr>
			<tr>
				<th class='canhgiua'>Ra lúc</th>
				<td class='chuinthuong canhgiua'> <?php echo date("H:i:s d/m/Y");?></td>
			</tr>
			<tr>
				<th class='canhgiua'>Số ngày ở</th>
				<td class=' canhgiua'> <?php 
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
							// sô giờ qua 12 giờ 
							$qua_12_so_gio = round((strtotime($ngayra)-strtotime($han_12_gio))/3600,2);
							$thoi_gian_o_tinh_ngay = round((strtotime($han_12_gio)- strtotime($ngayvao))/(3600*24), 0);//tính số ngày
							echo $thoi_gian_o_tinh_ngay." ngày";
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
								echo $thoi_gian_o_tinh_ngay." giờ";
								$tienphongngay=$tientheongay;// tính tiền phòng không có phụ thu
								$tongtien = $tienphongngay;// tính tổng số tiền phòng
							}else{
								echo $thoi_gian_o_tinh_ngay." ngày";
								$tienphongngay=$thoi_gian_o_tinh_ngay*$tientheongay;// tính tiền phòng không có phụ thu
								$tongtien = $tienphongngay;// tính tổng số tiền phòng
							}
							
							
						}
						
					}else{// trả phòng trước 4 tiếng
						echo $thoi_gian_o_tinh_ngay =round((strtotime($ngayra)- strtotime($ngayvao))/(3600), 0)." giờ";
						$tienphongngay = $tientheogio;// tính tổng tiền theo giờ
						$tongtien = $tientheogio;// tính tổng tiền theo giờ
					}
				?></td>
			</tr>
			<tr>
				<th class="canhgiua">Số giờ qua 12 giờ</th>
				<td class="canhgiua"><?php 
				$so_gio=floor($qua_12_so_gio);
				$so_phuc=round(($qua_12_so_gio-$so_gio)*60, 0, PHP_ROUND_HALF_DOWN);
				echo  $so_gio." giờ ".$so_phuc." phút"; ?></td>
			</tr>
			<tr>
				<th class="canhgiua">Tiền phòng</th>
				<td class="text-center">
					<?php echo number_format ($tienphongngay , $decimals = 0 , $dec_point = "." , $thousands_sep = "," ) ?>
				</td>
			</tr>
			<tr>
				<th class="canhgiua">Tiền phụ thu quá giờ</th>
				<td class="text-center">
					<?php echo number_format ($tien_phuthu , $decimals = 0 , $dec_point = "." , $thousands_sep = "," ) ?>
				</td>
			</tr>
			<tr>
				<th class="canhgiua">Tổng tiền</th>
				<td class="text-center" style="color:red;">
					<?php echo number_format ($tongtien , $decimals = 0 , $dec_point = "." , $thousands_sep = "," ) ?>
				</td>
			</tr>

			
			
		</tr>
	</tbody>
</table>
<?php
}
}
?>