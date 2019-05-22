<?php
	include './../dulieu/kiemtradangnhap.php';
?>
<!DOCTYPE html>
<html lang="en"><head>
	<title> Quản lý thu chi </title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- <link rel="shortcut icon" type="image/jpg" href="./../images/vnkgu.png"/> -->
	<script type="text/javascript" src="../vendor/bootstrap.js"></script>
	<link rel="stylesheet" href="../vendor/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../css/12.css">
	<script type="text/javascript" src="./../js/js_hien_thi_dang_tien.js"></script>
	<script type="text/javascript" src="./../js/js_quanly_daonh_thu.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" />
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" />
	<script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
</head>
<body >
	<div class="container-fluid">
		<a href="index.php" title="">
			<div class="container-fluid">
				<div class="row anhbia  text-center">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<img class="img-responsive" src="../images/QLKSM.png" alt="">
					</div>
					
				</div>
			</div>
		</a>
		<br>
		<div class="container-fluid">
			<div class="row">
				<?php include 'menutrai.php';?>
				<div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 benphai">
					<div class="container-fluid" style="padding: 0px;">
						<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 chutieude">
								<h2>Quản lý thông tin lợi nhuận</h2>
							</div>
						</div>
					<hr class="ngay_ad"></div>
					<div class="container-fluid">
						<div class="row">
							<form action="" method="POST" id="from_tim_doanhthu" role="form">
								<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
									
								</div>
								<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 ">
									
									<input type="" name="" id="" class="form-control ngaytim1" value="Từ ngày" title="" style="width: 15%; border: none;">
									<input type="date" name="tim_doanhthu_ngaybd" id="tim_doanhthu_ngaybd" class="form-control ngaytim1" value="" title="">
									<input type="" name="" id="" class="form-control ngaytim1" value="đến" title="" style="width: 10%; border: none;">
									<input type="date" name="tim_doanhthu_ngaykt" id="tim_doanhthu_ngaykt" class="form-control ngaytim1" value="" title="">
								</div>
								<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
									<select name="tim_doanhthu_id_phong" id="tim_doanhthu_id_phong" class="form-control" >
										<option value="">Chọn phòng</option>
										<?php 
											$qr = mysqli_query($conn,"SELECT * FROM phong where phong.xoa=0 order by phong.ma_phong");
											if (mysqli_num_rows($qr)) {
												while ($r=mysqli_fetch_array($qr)) {
													echo "
														<option value='".$r['id']."'>$r[ma_phong]</option>
													";
												}
											}

										 ?>
									</select>
								</div>
								<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
									<button type="submit" name="tim_doanhthu_nut" class="btn btn-primary">Tìm</button>
									
								</div>
							</form>
						</div>
						<br>
						<div class="row"><!-- nho doi ten class -->
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<div class="dulieu_doanhthu" id="dulieu_doanhthu"><?php include './../dulieu/dulieu_doanhthu.php'; ?></div>
						</div>
					
						</div><!-- end thaydoi1 -->
						</div><!-- end noidungthaydoi -->
						</div> <!-- end col-9 -->
						</div> <!-- end row noi dung -->
					</div>
				</div>
			</body>
		</html>
		<script>
				$(document).ready( function () {
				$('#myTable').DataTable();
				} );
		</script>
		<!-- Xoa phòng -->
		<div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
			<div id="modal_xoa_index_phong" class="modal fade">
				<div class="modal-dialog " style="width: 700px;">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title ">Trả phòng</h4>
						</div>
						<div class="modal-body" >
							<h4 class="text-center">Thông tin khách thuê</h4><hr id="hr1">
							<div id="thongtinnv_xoa12">	</div>
							<div class="row">
								<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
									<h4 class="text-center">Thông phòng</h4>
									<div id="tt_loaiphong">
									</div>
								</div>
								<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
									<h4 class="text-center">Thông tin tiền</h4>
									<div id="tt_tien">
									</div>
								</div>
								<br>
							</div>
						</div>
						<form method="post" id="From_xoa_index_phong" data-confirm="Bạn có chắn muốn tính tiền phòng này?">
							<input type="" name="id_index_phong_xoa_12" id="id_index_phong_xoa_12" />
							<div class="modal-footer">
								<input type="submit" name="insert_xoa" id="insert_xoa" value="Trả phòng" class="btn btn-danger canhgiua" />
								<button type="button" class="btn btn-primary" data-dismiss="modal">Trở lại</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>