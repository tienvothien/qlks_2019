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
								<h2>Quản lý thông tin phòng ở</h2>
							</div>
						</div>
					<hr class="ngay_ad"></div>
					<div class="container-fluid">
						<div class="row"><!-- nho doi ten class -->
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<div class="dulieu_giaphong"><?php include './../dulieu/dulieu_1_phong.php'; ?></div>
						</div>
						<div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
							<input type="button" class="btn btn-basic btn-block" name="them_1_phong" value="Thêm mới" data-toggle="modal" data-target="#them_1_phong1">
						</div>
						<br>
						<br>
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
							<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
								<h4 class="modal-title">Thêm phòng</h4>
							</div>
							
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
		
		<!-- xem thông tin 1_phong -->
		<div id="dataModal" class="modal fade">
			<div class="modal-dialog ">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Thông tin phòng</h4>
					</div>
					<div class="modal-body" id="thongtin_chitiet1_phong">
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>
		<!-- Cập nhật lại thông tin phòng -->
		<div id="modal_sua_1_phong" class="modal fade">
			<div class="modal-dialog ">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Cập nhật thông tin phòng</h4>
					</div>
					<div class="modal-body">
						<form action="" id="from_suathongtin_1_phong" name="from_suathongtin_1_phong" 	method="POST" role="form" class="_1themphong1 " enctype="multipart/form-data" data-confirm="Bạn có chắn muốn cập nhật lại thông tin này?">
							
							<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 hoten_cb_sua ">
								<label>Mã phòng</label>
								
								<input style="" type="text" name="ma_1_phong_sua_12" id="ma_1_phong_sua_12" class="form-control chuinhoa " value=""  required=""  placeholder="Nhập mã phòng"  />
							</div>
							
							<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 hoten_cb_sua">
								<label>Loại phòng</label>
								<select  name="idloai_phong_1_phong_sua_12" id="idloai_phong_1_phong_sua_12" class="form-control chuinthuong" required="required">
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
							
							<input type="hidden" name="id_1_phong_sua_12" id="id_1_phong_sua_12" />
						</div>
						<div class="modal-footer">
							<input type="submit" name="insert" id="insert" value="Insert" class="btn btn-danger capnhattb" />
						<button type="button" class="btn btn-primary" data-dismiss="modal">Trở lại</button></form>
					</div>
				</div>
			</div>
		</div>
		<!-- Xoa phòng -->
		<div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
			<div id="modal_xoa_1_phong" class="modal fade">
				<div class="modal-dialog ">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title canhgiua">Xóa phòng</h4>
						</div>
						<div class="modal-body" id="thongtinnv_xoa12">
						</div>
						<form method="post" id="From_xoa_1_phong" data-confirm="Bạn có chắn muốn xóa thông tin này?">
							<input type="hidden" name="id_1_phong_xoa_12" id="id_1_phong_xoa_12" />
							<div class="modal-footer">
								<input type="submit" name="insert_xoa" id="insert_xoa" value="Xóa" class="btn btn-danger canhgiua" />
								<button type="button" class="btn btn-primary" data-dismiss="modal">Trở lại</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>