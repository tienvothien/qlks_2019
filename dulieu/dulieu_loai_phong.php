<?php
include 'conn.php';

	$selecet_loaiphong = mysqli_query($conn, "SELECT * FROM loaiphong WHERE loaiphong.xoa=0  order by loaiphong.ten_loai_phong");
	if (!mysqli_num_rows($selecet_loaiphong)) {
		echo "<div style='text-align: center;'> Chưa có dữ liệu</div>";
	} else {
?>
<div class="table-responsive">
	<table class="table table-hover table-bordered table-striped" id="myTable">
		<thead>
			<tr>
				<th class='canhgiua' >STT</th>
				<th class='canhgiua'>Mã loại phòng</th>
				<th class='canhgiua' style="width: 100px;">Tên loại phòng</th>
				<th class='canhgiua'>Số Người <br> được ở</th>
				<th class='canhgiua'>Diện tích <br>(m<sup>2</sup>)</th>
				<th class='canhgiua'>Sửa</th>
				<th class='canhgiua'>Chi tiết</th>
				<th class='canhgiua'>Xóa</th>
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
				<td class="canhgiua"><input type="button" name="edit" value="Sửa" id="<?php echo $row_loaiphong['id']; ?>" class="btn btn-success btn-xs id_sua_loaiphong" /></td>
				<td class="canhgiua"><input type="button" name="view" value="Chi tiết" id="<?php echo $row_loaiphong['id']; ?>" class="btn btn-warning btn-xs view_chitietloaiphong" /></td>
				<td class="canhgiua"><input type="button" name="delete" value="Xóa" id="<?php echo $row_loaiphong['id']; ?>" class="btn btn-info btn-danger btn-xs xoa_loaiphong" /></td>
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