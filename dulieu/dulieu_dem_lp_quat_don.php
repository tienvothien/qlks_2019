<?php
include 'conn.php';

	$selecet_phong = mysqli_query($conn, "SELECT phong.ma_phong, loaiphong.ten_loai_phong FROM phong, loaiphong WHERE phong.id_loai_phong = loaiphong.id AND loaiphong.ma_loai_phong='lp104' and phong.xoa=0");
	if (!mysqli_num_rows($selecet_phong)) {
		echo "<div style='text-align: center;'> Chưa có dữ liệu</div>";
	} else {
?>
<div class="table-responsive">
	<table class="table table-hover table-bordered table-striped" id="myTable">
		<thead>
			<tr>
				<th class='canhgiua' >STT</th>
				<th class='canhgiua'>Phòng</th>
				<th class='canhgiua'>Loại phòng</th>
				
			</tr>
		</thead>
		<tbody>
			<?php
			$stt = 1;
			while ($row_phong = mysqli_fetch_array($selecet_phong)) {
				$r = mysqli_fetch_array(mysqli_query($conn, "SELECT loaiphong.ma_loai_phong, loaiphong.ten_loai_phong, giaphong.gia_phong_gio, giaphong.gia_phong_ngay FROM Loaiphong, giaphong, phong where phong.id='$row_phong[id]' AND phong.id_loai_phong = loaiphong.id AND loaiphong.id= giaphong.id_loai_phong"));
				//end địa chỉ
				// lấy tên lớp
				 
				//end tên lớp
			echo "
				<td style='text-align:center;'>$stt</td>
				<td class='chuinhoa canhgiua'>$row_phong[ma_phong]</td>
				<td class='chuinthuong '> $r[ma_loai_phong] - $r[ten_loai_phong]</td>
				

				";?>
				<?php echo"  
			</tr>
			";
			$stt++;
			}
			?>
		</tbody>
	</table>

<?php
}
?>