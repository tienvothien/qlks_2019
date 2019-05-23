<?php
include 'conn.php';

	$selecet_phong = mysqli_query($conn, "SELECT * FROM phong WHERE phong.xoa=0  order by phong.ma_phong");
	if (!mysqli_num_rows($selecet_phong)) {
		echo "<div style='text-align: center;'> Chưa có dữ liệu</div>";
	} else {
?>

			<?php
			$stt = 1;
			while ($row_phong = mysqli_fetch_array($selecet_phong)) {
				$r = mysqli_fetch_array(mysqli_query($conn, "SELECT loaiphong.ma_loai_phong, loaiphong.ten_loai_phong, giaphong.gia_phong_gio, giaphong.gia_phong_ngay FROM Loaiphong, giaphong where loaiphong.id = '$row_phong[id_loai_phong]'"));
				//end địa chỉ
				// lấy tên lớp
				 $row_ktcok=(mysqli_query($conn,"SELECT thuephong.id as idtp FROM thuephong where thuephong.thoi_gian_ra is null and thuephong.id_phong='$row_phong[id]'"));
				 $row_sl=mysqli_fetch_array(mysqli_query($conn,"SELECT count(thuephong.id)  as row_sl FROM thuephong where thuephong.thoi_gian_ra is null and thuephong.id_phong='$row_phong[id]'"));
				//end tên lớp
				?>
				<div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
					<?php if (mysqli_num_rows($row_ktcok)) { // kiểm tra có ng đangthue
						echo "<div class='thumbnail maune_do'>";
					}else{
						echo "<div class='thumbnail maune_12'>";

					}
					 ?>
					<button type="button" class="sokhachhang" data-dismiss="modal"><?php echo $row_sl['row_sl']; ?></button>
						<div class="caption text-center">
							<h3>Phòng <?php echo $row_phong['ma_phong'];?></h3>
							<h4 class="chuinthuong"><?php echo $r['ten_loai_phong']; ?></h4>
							<p>
								<input style="width:30%; " type="button" name="edit" value="Thuê" id="<?php echo $row_phong['id']; ?>" class="btn btn-success id_sua_thuephong" />
								<input style="width:30%; " type="button" name="view" value="Xem" id="<?php echo $row_phong['id']; ?>" class="btn btn-warning view_chitietthuephong" />
								<input style="width:30%; " type="button" name="delete" value="Trả Phòng" id="<?php echo $row_phong['id']; ?>" class="btn btn-info btn-danger xoa_thuephong" />
							</p>
						</div>
					</div>
				</div>
				
				<?php echo "
			</tr>
			";
			$stt++;
			}
			?>
		

<?php
}
?>