<?php
include 'conn.php';
if (isset($_POST['id_chitietindex_phong'])) {
	$selecet_khachhang = mysqli_query($conn, "SELECT khachhang.id as idkh, khachhang.ma_khach_hang, khachhang.ho_khach_hang, khachhang.ten_khach_hang, khachhang.gioi_tinh, khachhang.ngay_sinh, khachhang.que_quan, khachhang.cmnd, khachhang.so_dien_thoai, khachhang.matinh, khachhang.mahuyen, khachhang.maxa,khachhang.sonha, phong.ma_phong, thuephong.thoi_gian_vao, thuephong.id as idtp  FROM khachhang, thuephong , phong WHERE thuephong.thoi_gian_ra is null and thuephong.id_phong='$_POST[id_chitietindex_phong]' and thuephong.id_khach_hang=khachhang.id and phong.id= thuephong.id_phong and khachhang.xoa=0 order by khachhang.ten_khach_hang, khachhang.ho_khach_hang");
	if (!mysqli_num_rows($selecet_khachhang)) {
		echo "<div style='text-align: center;'> Chưa có dữ liệu</div>";
	} else {
		
?>
<div class="table-responsive">
	<table class="table table-hover table-bordered table-striped" id="myTable">
		<thead>
			<tr>
				<th class='canhgiua' >STT</th>
				<th class='canhgiua'>Phòng</th>
				<th class='canhgiua'>Time vào</th>
				<th class='canhgiua'>Mã khách hàng</th>
				<th class='canhgiua' style="width: 100px;">Tên khách hàng</th>
				<th class='canhgiua'>Ngày sinh</th>
				<th class='canhgiua'>Giới tính</th>
				<th class='canhgiua'>CMND</th>
				<th class='canhgiua canhgiua hidden'>Hộ khẩu thường trú</th>
				<th class='canhgiua'>Điện thoại</th>
				
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
				
				//end địa chỉ
				// lấy tên lớp
				 
				//end tên lớp
			echo "
			<tr>
				<td style='text-align:center;'>$stt</td>
				<td class='chuinhoa canhgiua'>$row_khachhang[ma_phong]</td>
				<td class='chuinhoa canhgiua'>".date("H:i:s d/m/Y", strtotime($row_khachhang['thoi_gian_vao']))."</td>
				<td class='chuinhoa canhgiua'>$row_khachhang[ma_khach_hang]</td>
				<td class='chuinthuong'>$row_khachhang[ho_khach_hang] $row_khachhang[ten_khach_hang]</td>
				<td class='canhgiua'>".date('d/m/Y', strtotime($row_khachhang["ngay_sinh"]))."</td>
				<td class='canhgiua chuinthuong'>$row_khachhang[gioi_tinh]</td>
				<td class='canhgiua chuinthuong'>$row_khachhang[cmnd]</td>
				<td class=' chuinthuong hidden'>$diachi1</td>

				<td class='canhgicanhgiuaua chuinhoa'>$row_khachhang[so_dien_thoai]</td>
				";?>
				
				
				<?php echo "
			</tr>
			";
			$stt++;
			}
			?>
		</tbody>
	</table>
<?php }
}else{
	$selecet_khachhang = mysqli_query($conn, "SELECT khachhang.id as idkh, khachhang.ma_khach_hang, khachhang.ho_khach_hang,  khachhang.ten_khach_hang, khachhang.gioi_tinh, khachhang.ngay_sinh, khachhang.que_quan, khachhang.cmnd, khachhang.so_dien_thoai, khachhang.matinh, khachhang.mahuyen, khachhang.maxa,khachhang.sonha, phong.ma_phong, thuephong.thoi_gian_vao, thuephong.id as idtp  FROM khachhang, thuephong , phong WHERE thuephong.thoi_gian_ra is null and thuephong.id_khach_hang=khachhang.id and phong.id= thuephong.id_phong and khachhang.xoa=0 order by khachhang.ten_khach_hang, khachhang.ho_khach_hang");
	if (!mysqli_num_rows($selecet_khachhang)) {
		echo "<div style='text-align: center;'> Chưa có dữ liệu</div>";
	} else {
?>
<div class="table-responsive">
	<table class="table table-hover table-bordered table-striped" id="myTable">
		<thead>
			<tr>
				<th class='canhgiua' >STT</th>
				<th class='canhgiua'>Phòng</th>
				<th class='canhgiua'>Time vào</th>
				<th class='canhgiua'>Mã KH</th>
				<th class='canhgiua' style="width: 100px;">Tên KH</th>
				<th class='canhgiua'>Ngày sinh</th>
				<th class='canhgiua'>Giới tính</th>
				<th class='canhgiua'>CMND</th>
				<th class='canhgiua canhgiua hidden'>HKTT</th>
				<th class='canhgiua'>Điện thoại</th>
				<!-- <th class='canhgiua'>Chuyển</th> -->
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
				
				//end địa chỉ
				// lấy tên lớp
				 
				//end tên lớp
			echo "
			<tr>
				<td style='text-align:center;'>$stt</td>
				<td class='chuinhoa canhgiua'>$row_khachhang[ma_phong]</td>
				<td class='chuinhoa canhgiua'>".date("H:i:s d/m/Y", strtotime($row_khachhang['thoi_gian_vao']))."</td>
				<td class='chuinhoa canhgiua'>$row_khachhang[ma_khach_hang]</td>
				<td class='chuinthuong'>$row_khachhang[ho_khach_hang] $row_khachhang[ten_khach_hang]</td>
				<td class='canhgiua'>".date('d/m/Y', strtotime($row_khachhang["ngay_sinh"]))."</td>
				<td class='canhgiua chuinthuong'>$row_khachhang[gioi_tinh]</td>
				<td class='canhgiua chuinthuong'>$row_khachhang[cmnd]</td>
				<td class=' chuinthuong hidden'>$diachi1</td>

				<td class='canhgicanhgiuaua chuinhoa'>$row_khachhang[so_dien_thoai]</td>
				";?>

				<!-- <td class="canhgiua"><input type="button" name="edit" value="Chuyển" id="<?php echo $row_khachhang['idtp']; ?>" class="btn btn-success btn-xs id_sua_chuyenphong" /></td> -->
				
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