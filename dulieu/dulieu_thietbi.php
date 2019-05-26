<?php
include 'conn.php';

	$selecet_loaithietbi = mysqli_query($conn, "SELECT * FROM  loaithietbi where XOA =0 ");
	if (!mysqli_num_rows($selecet_loaithietbi)) {
		echo "<div style='text-align: center;'> Chưa có dữ liệu</div>";
	} else {
?>
<div class="table-responsive">
	<table class="table table-hover table-bordered table-striped" id="myTable">
		<thead>
			<tr>
				<th>STT</th>
                <th>Mã loại thiết bị</th>
                <th>Tên loại thiết bị</th>
                <th>Cập nhật</th>
                <th>Xóa</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$stt = 1;
			while ($row = mysqli_fetch_array($selecet_loaithietbi)) {
			echo "
			<tr>
				<td style='text-align:center;'>$stt</td>
				<td class='chuinhoa canhgiua'>$row[MA_LOAI_THIET_BI]</td>
				<td class='canhgiua chuinthuong'>$row[TEN_LOAI_THIET_BI]</td>
				
				";?>
				
				 <td class="canhgiua">
                    <button type="button" class="btn btn-info btn-lg1 capnhattb2323" id="<?php echo $row['MA_LOAI_THIET_BI']; ?>">Cập nhật</button>
                </td>
                <td class="canhgiua">
                    <button type="button" class="btn btn-info btn-lg1 btn_xoatb" id="<?php echo $row['MA_LOAI_THIET_BI']; ?>">Xóa</button>
                </td
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