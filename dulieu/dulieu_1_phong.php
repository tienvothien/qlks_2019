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
				<th class='canhgiua'>Giá Giờ <br> (VNĐ)</th>
				<th class='canhgiua'>Giá ngày <br> (VNĐ)</th>
				<th class='canhgiua'>Loại phòng</th>
				<th class='canhgiua'>Sửa</th>
				<th class='canhgiua'>Chi tiết</th>
				<th class='canhgiua'>Xóa</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$stt = 1;
			while ($row_phong = mysqli_fetch_array($selecet_phong)) {
				$r = mysqli_fetch_array(mysqli_query($conn, "SELECT loaiphong.ma_loai_phong, loaiphong.ten_loai_phong, giaphong.gia_phong_gio, giaphong.gia_phong_ngay FROM Loaiphong, giaphong where loaiphong.id = '$row_phong[id_loai_phong]'"));
				//end địa chỉ
				// lấy tên lớp
				 
				//end tên lớp
			echo "
				<td style='text-align:center;'>$stt</td>
				<td class='chuinhoa canhgiua'>$row_phong[ma_phong]</td>
				<td class='chuinthuong canhgiua'> $r[ma_loai_phong] - $r[ten_loai_phong]</td>
				<td class='chuinhoa canhgiua'>$r[gia_phong_gio]</td>
				<td class='chuinhoa canhgiua'>$r[gia_phong_ngay]</td>

				";?>
				<td class="canhgiua"><input type="button" name="edit" value="Sửa" id="<?php echo $row_phong['id']; ?>" class="btn btn-success btn-xs id_sua_phong" /></td>
				<td class="canhgiua"><input type="button" name="view" value="Chi tiết" id="<?php echo $row_phong['id']; ?>" class="btn btn-warning btn-xs view_chitietphong" /></td>
				<td class="canhgiua"><input type="button" name="delete" value="Xóa" id="<?php echo $row_phong['id']; ?>" class="btn btn-info btn-danger btn-xs xoa_phong" /></td>
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