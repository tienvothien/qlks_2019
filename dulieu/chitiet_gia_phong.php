<?php
if (isset($_POST["id_chitietgia_phong"])) {
include 'conn.php';
	
	$selecet_giaphong = mysqli_query($conn, "SELECT * FROM giaphong WHERE giaphong.xoa=0 and giaphong.id='$_POST[id_chitietgia_phong]' order by giaphong.ten_gia_phong");
	if (!mysqli_num_rows($selecet_giaphong)) {
		echo "<div style='text-align: center;'> Chưa có dữ liệu</div>";
	} else {
?>
<div class="table-responsive">
	<table class="table table-hover table-bordered table-striped" id="myTable">
		<thead>
			<tr>
				<th class='canhgiua' >STT</th>
				<th class='canhgiua'>Mã giá phòng</th>
				<th class='canhgiua' style="width: 100px;">Tên giá phòng</th>
				<th class='canhgiua'>Giá Giờ <br> (VNĐ)</th>
				<th class='canhgiua'>Giá ngày <br> (VNĐ)</th>
				<th class='canhgiua'>Loại phòng</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$stt = 1;
			while ($row_giaphong = mysqli_fetch_array($selecet_giaphong)) {
				$r = mysqli_fetch_array(mysqli_query($conn, "SELECT loaiphong.ma_loai_phong, loaiphong.ten_loai_phong FROM Loaiphong where loaiphong.id = '$row_giaphong[id_loai_phong]'"));
				//end địa chỉ
				// lấy tên lớp
				 
				//end tên lớp
			echo "
				<td style='text-align:center;'>$stt</td>
				<td class='chuinhoa canhgiua'>$row_giaphong[ma_gia_phong]</td>
				<td class='chuinthuong'> $row_giaphong[ten_gia_phong]</td>
				<td class='chuinthuong canhgiua'> ". number_format ($row_giaphong["gia_phong_gio"] , $decimals = 0 , $dec_point = "." , $thousands_sep = "," )."</td>
				<td class='chuinthuong canhgiua'> ". number_format ($row_giaphong["gia_phong_ngay"] , $decimals = 0 , $dec_point = "." , $thousands_sep = "," )."</td>
				<td class='chuinthuong canhgiua'> $r[ma_loai_phong] - $r[ten_loai_phong]</td>

				";?>
				
				<?php echo "
			</tr>
			";
			$stt++;
			}
			?>
		</tbody>
	</table>
<?php
}
}
?>