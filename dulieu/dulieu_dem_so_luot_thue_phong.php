<?php
include 'conn.php';

	$selecet_phong = mysqli_query($conn, "SELECT * FROM phong WHERE phong.xoa=0  order by phong.ma_phong");
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
				<th class='canhgiua'>Tổng số lần thuê</th>
				<th class='canhgiua'>Chi tiết</th>
				
			</tr>
		</thead>
		<tbody>
			<?php
			$stt = 1;
			while ($row_phong = mysqli_fetch_array($selecet_phong)) {
				$r = mysqli_fetch_array(mysqli_query($conn, "SELECT loaiphong.ma_loai_phong, loaiphong.ten_loai_phong, giaphong.gia_phong_gio, giaphong.gia_phong_ngay FROM Loaiphong, giaphong, phong where phong.id='$row_phong[id]' AND phong.id_loai_phong = loaiphong.id AND loaiphong.id= giaphong.id_loai_phong"));
				//Tính tổng số phòng được khách thuê
				$tongsolanthue = mysqli_fetch_array(mysqli_query($conn, "SELECT COUNT(thuephong.id_khach_hang) AS tongsolanthue FROM phong, thuephong WHERE phong.id = thuephong.id_phong AND phong.ma_phong ='$row_phong[ma_phong]'"));
				 
				//end tên lớp
			echo "
				<td style='text-align:center;'>$stt</td>
				<td class='chuinhoa canhgiua'>$row_phong[ma_phong]</td>
				<td class='chuinthuong '> $r[ma_loai_phong] - $r[ten_loai_phong]</td>

				<td class='chuinhoa canhgiua'>$tongsolanthue[tongsolanthue]</td>
				";?>
				
				<td class="canhgiua"><input type="button" name="view" value="Chi tiết" id="<?php echo $row_phong['id']; ?>" class="btn btn-warning btn-xs view_chitietphong" /></td>
				
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
?>