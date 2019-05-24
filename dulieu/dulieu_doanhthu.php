<?php
include 'conn.php';
if (isset($_POST['tim_doanhthu_ngaybd'])) {
	$tim_doanhthu_ngaybd=$_POST['tim_doanhthu_ngaybd']." 00:00:00";
	$tim_doanhthu_ngaykt=$_POST['tim_doanhthu_ngaykt']." 23:00:00";
	$tim_doanhthu_ngayid_phong=$_POST['tim_doanhthu_id_phong'];
	if ($_POST['tim_doanhthu_ngaybd']=='') {
		 $tim_doanhthu_ngaybd='2015/1/1';
	}
	if ($_POST['tim_doanhthu_ngaykt']=='') {
		 $tim_doanhthu_ngaykt=date("Y/m/d H:i:s");
	}
	if ($tim_doanhthu_ngayid_phong=='') {
		$selecet_bienlai = mysqli_query($conn, "SELECT bienlai.id, phong.ma_phong, bienlai.id_phong, bienlai.id_thuephong, bienlai.tongtien, bienlai.tienngay, bienlai.tienphuthu, bienlai.ngay_tinhbienlai, bienlai.id_nguoi_tinh FROM bienlai, phong WHERE (ngay_tinhbienlai between '$tim_doanhthu_ngaybd' and '$tim_doanhthu_ngaykt' ) and phong.id=bienlai.id_phong order by bienlai.ngay_tinhbienlai DESC");
	}elseif ( $tim_doanhthu_ngayid_phong!='') {
		$selecet_bienlai = mysqli_query($conn, "SELECT bienlai.id, phong.ma_phong, bienlai.id_phong, bienlai.id_thuephong, bienlai.tongtien, bienlai.tienngay, bienlai.tienphuthu, bienlai.ngay_tinhbienlai, bienlai.id_nguoi_tinh FROM bienlai, phong WHERE (ngay_tinhbienlai between '$tim_doanhthu_ngaybd' and '$tim_doanhthu_ngaykt' ) and bienlai.id_phong='$tim_doanhthu_ngayid_phong' and phong.id=bienlai.id_phong order by bienlai.ngay_tinhbienlai DESC");
	}
}else{
	$selecet_bienlai = mysqli_query($conn, "SELECT bienlai.id, phong.ma_phong, bienlai.id_phong, bienlai.id_thuephong, bienlai.tongtien, bienlai.tienngay, bienlai.tienphuthu, bienlai.ngay_tinhbienlai, bienlai.id_nguoi_tinh FROM bienlai, phong WHERE phong.id=bienlai.id_phong order by bienlai.ngay_tinhbienlai DESC");
	}
	if (!mysqli_num_rows($selecet_bienlai)) {
		echo "<div style='text-align: center;'> Chưa có dữ liệu</div>";
	} else {
?>
<div class="table-responsive">
	<table class="table table-hover table-bordered table-striped" id="myTable">
		<thead>
			<tr>
				<th class='canhgiua' >STT</th>
				<th class='canhgiua'>Phòng</th>
				<th class='canhgiua' >Tiền thu</th>
				<th class='canhgiua'>Tiền ngày <br> (VNĐ)</th>
				<th class='canhgiua'>Phụ thu <br> (VNĐ)</th>
				<th class='canhgiua'>Ngày tính</th>
				<th class='canhgiua'>Nhân viên</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$stt = 1;
			$tongdoanhthu=$tongthungay=$tongphuthu=0;
			while ($row_bienlai = mysqli_fetch_array($selecet_bienlai)) {
				$tongdoanhthu+=$row_bienlai['tongtien'];
				$tongthungay+=$row_bienlai['tienngay'];
				$tongphuthu+=$row_bienlai['tienphuthu'];
				$row_1 = mysqli_fetch_array(mysqli_query($conn,"SELECT nhanvien.ten_nhan_vien, nhanvien.ho_nhan_vien, nhanvien.ma_nhan_vien FROM nhanvien WHERE nhanvien.id=$row_bienlai[id_nguoi_tinh]"));
			echo "
				<td style='text-align:center;'>$stt</td>
				<td class='chuinhoa canhgiua'>$row_bienlai[ma_phong]</td>
				<td class='chuinthuong canhgiua'> ". number_format ($row_bienlai["tongtien"] , $decimals = 0 , $dec_point = "." , $thousands_sep = "," )."</td>
				<td class='chuinthuong canhgiua'> ". number_format ($row_bienlai["tienngay"] , $decimals = 0 , $dec_point = "." , $thousands_sep = "," )."</td>
				<td class='chuinthuong canhgiua'> ". number_format ($row_bienlai["tienphuthu"] , $decimals = 0 , $dec_point = "." , $thousands_sep = "," )."</td>
				<td class='canhgiua'>".date("d/m/Y H:i:s", strtotime($row_bienlai['ngay_tinhbienlai']))."</td>
				
				<td class='canhgiua'> $row_1[ho_nhan_vien] $row_1[ten_nhan_vien]</td>
				";?>
				
				<?php echo "
			</tr>
			";
			$stt++;
			}
			echo "
			<tr>
				<td class='canhgiua'>$stt</td>
				<td class='canhgiua'>Tổng</td>
				<td class='canhgiua'>". number_format ($tongdoanhthu , $decimals = 0 , $dec_point = "." , $thousands_sep = "," )."</td>
				<td class='canhgiua'>". number_format ($tongthungay , $decimals = 0 , $dec_point = "." , $thousands_sep = "," )."</td>
				<td class='canhgiua'>". number_format ($tongphuthu , $decimals = 0 , $dec_point = "." , $thousands_sep = "," )."</td>
				<td class='canhgiua'></td>
				<td class='canhgiua'></td>

			</tr>
			";
			?>
		</tbody>
	</table>

<?php
}
?>