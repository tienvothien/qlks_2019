<?php
if (isset($_POST["id_chitietloai_phong"])) {
include 'conn.php';
	$selecet_loaiphong = mysqli_query($conn, "SELECT * FROM loaiphong WHERE loaiphong.xoa=0  and loaiphong.id='$_POST[id_chitietloai_phong]' order by loaiphong.ten_loai_phong");
	if (!mysqli_num_rows($selecet_loaiphong)) {
		echo "<div style='text-align: center;'> Chưa có dữ liệu</div>";
	} else {
?>
<div class="table-responsive">
	<table class="table table-hover table-bordered table-striped" id="myTable">
		<thead>
			<tr>
				<th class='canhgiua' >STT</th>
				<th class='canhgiua'>Mã <br>loại phòng</th>
				<th class='canhgiua'>Tên <br> loại phòng</th>
				<th class='canhgiua'>Số Người <br> được ở</th>
				<th class='canhgiua'>Diện tích <br>(m<sup>2</sup>)</th>
				
			</tr>
		</thead>
		<tbody>
			<?php
			$stt = 1;
			while ($row_loaiphong = mysqli_fetch_array($selecet_loaiphong)) {
				
				//end địa chỉ
				// lấy tên lớp
				
				//end tên lớp
			echo "
				<td style='text-align:center;'>$stt</td>
				<td class='chuinhoa canhgiua'>$row_loaiphong[ma_loai_phong]</td>
				<td class='chuinthuong'> $row_loaiphong[ten_loai_phong]</td>
				<td class='chuinthuong canhgiua'> $row_loaiphong[nguoi_o]</td>
				<td class='chuinthuong canhgiua'> $row_loaiphong[dien_tich]</td>
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