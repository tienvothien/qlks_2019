<?php
include 'conn.php';
$dl1 = mysqli_query($conn, "SELECT * FROM loaiphong where xoa =0");
if (mysqli_num_rows($dl1)) {
	while ($row = mysqli_fetch_array($dl1)) {
		echo "

					 		<div class='col-xs-6 col-sm-3 col-md-3 col-lg-3'>
					 				<div class='thumbnail tbtrongloaiphong'>
					 					<div class='caption text-center'>
					 						<h4>Loại phòng</h4>
					 						<h4 class='tenloaiphong'>
					 							$row[ten_loai_phong]

					 						</h4>
					 						";?>
				<p>
					<button type="button" class="btn btn-info sua_tbphong " id="<?php echo $row['ma_loai_phong']; ?>" >Xóa</button>
					<button type="button" class="btn btn-info chitiet_tbp" id="<?php echo $row['ma_loai_phong']; ?>" >Chi tiết</button>
				</p>
					 						<?php echo ";</div>

					 					</div>
					 				</div>
			";
	}
}

?>