<?php
include 'conn.php';

	$selecet_nhanvien = mysqli_query($conn, "SELECT * FROM nhanvien WHERE nhanvien.xoa=0  order by nhanvien.ten_nhan_vien, nhanvien.ho_nhan_vien");
	if (!mysqli_num_rows($selecet_nhanvien)) {
		echo "<div style='text-align: center;'> Chưa có dữ liệu</div>";
	} else {
?>
<div class="table-responsive">
	<table class="table table-hover table-bordered table-striped" id="myTable">
		<thead>
			<tr>
				<th >STT</th>
				<th>Mã nhân viên</th>
				<th style="width: 170px;">Tên nhân viên</th>
				<th>Ngày sinh</th>
				<th>Giới tính</th>
				<th >Hộ khẩu thường trú</th>
				<th>Điện thoại</th>
				<th>Sửa</th>
				<th>Chi tiết</th>
				<th>Xóa</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$stt = 1;
			while ($row_nhanvien = mysqli_fetch_array($selecet_nhanvien)) {
				$diachi2='';
				$diachi1='';
				// lấy địa chỉ
				$diachi = mysqli_fetch_array(mysqli_query($conn, "SELECT xa.capxa, xa.tenxa, huyen.tenhuyen, huyen.caphuyen, tinh.tentinh FROM tinh INNER JOIN huyen ON tinh.matinh = huyen.matinh INNER JOIN xa ON huyen.mahuyen = xa.mahuyen WHERE xa.maxa = '$row_nhanvien[maxa]'"));
				$diachi1=$row_nhanvien['sonha'].",".$diachi["capxa"] .$diachi['tenxa'].",".$diachi["caphuyen"].$diachi['tenhuyen'].",".$diachi['tentinh'];
				
				//end địa chỉ
				// lấy tên lớp
				 
				//end tên lớp
			echo "
			<tr>
				<td style='text-align:center;'>$stt</td>
				<td class='chuinhoa canhgiua'>$row_nhanvien[ma_nhan_vien]</td>
				<td class='chuinthuong'>$row_nhanvien[ho_nhan_vien] $row_nhanvien[ten_nhan_vien]</td>
				<td class='canhgiua'>".date('d/m/Y', strtotime($row_nhanvien["ngay_sinh"]))."</td>
				<td class='canhgiua chuinthuong'>$row_nhanvien[gioi_tinh]</td>
				<td class=' chuinthuong '>$diachi1</td>

				<td class='canhgiua chuinhoa'>$row_nhanvien[so_dien_thoai]</td>
				";?>
				<td class="canhgiua"><input type="button" name="edit" value="Sửa" id="<?php echo $row_nhanvien['id']; ?>" class="btn btn-success btn-xs id_sua_nhanvien" /></td>
				<td class="canhgiua"><input type="button" name="view" value="Chi tiết" id="<?php echo $row_nhanvien['id']; ?>" class="btn btn-warning btn-xs view_chitietnhanvien" /></td>
				<td class="canhgiua"><input type="button" name="delete" value="Xóa" id="<?php echo $row_nhanvien['id']; ?>" class="btn btn-info btn-danger btn-xs xoa_nhanvien" /></td>
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