<?php
include 'conn.php';

	$selecet_khachhang = mysqli_query($conn, "SELECT * FROM khachhang WHERE khachhang.xoa=0  order by khachhang.ten_khach_hang, khachhang.ho_khach_hang");
	if (!mysqli_num_rows($selecet_khachhang)) {
		echo "<div style='text-align: center;'> Chưa có dữ liệu</div>";
	} else {
?>
<div class="table-responsive">
	<table class="table table-hover table-bordered table-striped" id="myTable">
		<thead>
			<tr>
				<th>STT</th>
				<th>Mã khách hàng</th>
				<th style="width: 100px;">Tên khách hàng</th>
				<th>Ngày sinh</th>
				<th>Giới tính</th>
				<th>CMND</th>
				<th class='canhgiua'>Hộ khẩu thường chú</th>
				<th>Điện thoại</th>
				<th>Lượt ở</th>
				<th>Sửa</th>
				<th>Chi tiết</th>
				<th>Xóa</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$stt = 1;
			while ($row_khachhang = mysqli_fetch_array($selecet_khachhang)) {
				$diachi2='';
				$diachi1='';
				// lấy địa chỉ
				$diachi = mysqli_fetch_array(mysqli_query($conn, "SELECT xa.capxa, xa.tenxa, huyen.tenhuyen, huyen.caphuyen, tinh.tentinh FROM tinh INNER JOIN huyen ON tinh.matinh = huyen.matinh INNER JOIN xa ON huyen.mahuyen = xa.mahuyen WHERE xa.maxa = '$row_khachhang[maxa]'"));
				$diachi1=$row_khachhang['sonha'].", ".$diachi["capxa"] .$diachi['tenxa'].", ".$diachi["caphuyen"].$diachi['tenhuyen'].", ".$diachi['tentinh'];
				//tim sos luoc thue
				$slthuep = mysqli_fetch_array(mysqli_query($conn, "SELECT COUNT(thuephong.id) AS slthuep FROM thuephong WHERE thuephong.id_khach_hang='$row_khachhang[id]'"));
				
			echo "
			<tr>
				<td style='text-align:center;'>$stt</td>
				<td class='chuinhoa canhgiua'>$row_khachhang[ma_khach_hang]</td>
				<td class='chuinthuong'>$row_khachhang[ho_khach_hang] $row_khachhang[ten_khach_hang]</td>
				<td class='canhgiua'>".date('d/m/Y', strtotime($row_khachhang["ngay_sinh"]))."</td>
				<td class='canhgiua chuinthuong'>$row_khachhang[gioi_tinh]</td>
				<td class='canhgiua chuinthuong'>$row_khachhang[cmnd]</td>
				<td class=' chuinthuong '>$diachi1</td>

				<td class='canhgicanhgiuaua chuinhoa'>$row_khachhang[so_dien_thoai]</td>
				<td class='canhgicanhgiuaua chuinhoa'>$slthuep[slthuep]</td>
				";?>
				<td class="canhgiua"><input type="button" name="edit" value="Sửa" id="<?php echo $row_khachhang['id']; ?>" class="btn btn-success btn-xs id_sua_khachhang" /></td>
				<td class="canhgiua"><input type="button" name="view" value="Chi tiết" id="<?php echo $row_khachhang['id']; ?>" class="btn btn-warning btn-xs view_chitietkhachhang" /></td>
				<td class="canhgiua"><input type="button" name="delete" value="Xóa" id="<?php echo $row_khachhang['id']; ?>" class="btn btn-info btn-danger btn-xs xoa_khachhang" /></td>
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