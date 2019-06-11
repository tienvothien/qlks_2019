<?php
	include './../dulieu/kiemtradangnhap.php';
?>
<!DOCTYPE html>
<html lang="en"><head>
	<title> Quản lý thông tin phòng </title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- <link rel="shortcut icon" type="image/jpg" href="./../images/vnkgu.png"/> -->
	<script type="text/javascript" src="../vendor/bootstrap.js"></script>
	<link rel="stylesheet" href="../vendor/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../css/12.css">
	<script type="text/javascript" src="./../js/js_hien_thi_dang_tien.js"></script>
	<script type="text/javascript" src="./../js/js_quanly_1_phong.js"></script>
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
								<h2>L</h2>
							</div>
						</div>
					<hr class="ngay_ad"></div>
					<div class="container-fluid">
						<div class="row"><!-- nho doi ten class -->
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<div class="dulieu_dem_lp_quat_don"><?php include './../quanly/dem_lphong_quat_don.php'; ?></div>
						</div>
						<div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
							<input type="button" class="btn btn-basic btn-block" name="them_1_phong" value="Thêm mới" data-toggle="modal" data-target="#them_1_phong1">
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
		<div class="modal" id="them_1_phong1">
			<div class="modal-dialog them1_phong2 1_phong_themmoi ">
				<div class="modal-content">
					<!-- Modal Header -->
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<div class="row">
							
							
						</div>
					</div>
					<!-- Modal body -->
					<div class="modal-body _1themtoanha">
						<form action="" id="form_them1_phongmoi" name="form_them1_phongmoi" 	method="POST" role="form" class="_1themphong1 "  enctype="multipart/form-data" data-confirm="Bạn có chắn muốn cập nhật lại thông tin này?">
							
							<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 hoten_cb_sua ">
								<label>Mã phòng</label>
								
								<input style="" type="number" name="ma_1_phong_themmoi123" id="ma_1_phong_themmoi123" class="form-control chuinhoa " value=""  required="" placeholder="Nhập mã phòng"  />
							</div>
							
							<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 hoten_cb_sua">
								<label>Loại phòng</label>
								<select  name="idloai_phong_1_phongthemmoi_12" id="idloai_phong_1_phongthemmoi_12" class="form-control chuinthuong" required="required">
									<option value="" >Chọn Loại phòng</option>
									<?php 
										$qr= mysqli_query($conn,"SELECT loaiphong.id,loaiphong.ma_loai_phong, loaiphong.ten_loai_phong FROM loaiphong Where loaiphong.xoa=0");
										while ($r=mysqli_fetch_array($qr)) {
											echo "
													<option value='".$r['id']."'>".$r['ma_loai_phong']."-".$r['ten_loai_phong']."</option>
											";
										}
									 ?>
									
								</select>
								<br>
							</div>
						</div>
						<!-- Modal footer -->
						<div class="modal-footer " style="border: none;" >
							<button  type="submit" class="btn btn-danger">Thêm mới</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		</div><!-- end model -->
		
		