<?php
	include './../dulieu/kiemtradangnhap.php';
?>
<!DOCTYPE html>
<html lang="en"><head>
	<title> Quản lý thông tin loại phòng </title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- <link rel="shortcut icon" type="image/jpg" href="./../images/vnkgu.png"/> -->
	<script type="text/javascript" src="../vendor/bootstrap.js"></script>
	<link rel="stylesheet" href="../vendor/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../css/12.css">
	<script type="text/javascript" src="./../js/js_quanly_loaiphong.js"></script>
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
								<h2>Quản lý thông tin loại phòng ở</h2>
							</div>
						</div>
					<hr class="ngay_ad"></div>
					<div class="container-fluid">
						<div class="row"><!-- nho doi ten class -->
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<div class="dulieu_loaiphong"><?php include './../dulieu/dulieu_loai_phong.php'; ?></div>
						</div>
						<div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
							<input type="button" class="btn btn-basic btn-block" name="them_loai_phong" value="Thêm mới" data-toggle="modal" data-target="#them_loai_phong1">
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
		<div class="modal" id="them_loai_phong1">
			<div class="modal-dialog themloai_phong2 loai_phong_themmoi ">
				<div class="modal-content">
					<!-- Modal Header -->
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<div class="row">
							<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
								<h4 class="modal-title">Thêm loại phòng</h4>
							</div>
							
						</div>
					</div>
					<!-- Modal body -->
					<div class="modal-body _1themtoanha">
						<form action="" id="form_themloai_phongmoi" name="form_themloai_phongmoi" 	method="POST" role="form" class="_1themphong1 "  enctype="multipart/form-data" data-confirm="Bạn có chắn muốn cập nhật lại thông tin này?">
							<!-- <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 hoten_cb_sua">
								<label>Ảnh</label>
								<input id="file_anh_sv" type="file" accept="image/*" name="image12" required="" />
							</div>
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 hoten_cb_sua text-center">
								<div id="message"></div>
								<div id="image_preview_themssv">
									<img id="previewing_themsvload" class="img-responsive"  src="" />
								</div>
							</div> -->
							<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 hoten_cb_sua ">
								<label>Mã loại phòng</label>
								<?php
									$r=mysqli_fetch_array(mysqli_query($conn,"SELECT ma_loai_phong FROM loaiphong order by ma_loai_phong DESC LIMIT 1"));
									$ma1=$r['ma_loai_phong'];
									$matang1 =substr($ma1, 2, 5);
									$maatang2 = $matang1+1;
									$mnvmoi= 'LP'.$maatang2;
								?>
								<input style="width:" type="text" name="ma_loai_phong_themmoi123" id="ma_loai_phong_themmoi123" class="form-control chuinhoa " value="<?php echo $mnvmoi ;?>"  required="" placeholder="Nhập mã loại phòng"  readonly=""/>
							</div>
							
							<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 hoten_cb_sua">
								<label>Tên loại phòng</label>
								<input  name="ten_loai_phongthemmoi_12" id="ten_loai_phongthemmoi_12" class="form-control chuinthuong" rows="1" required="" placeholder="Nhập tên loại phòng" >
							</div>
							<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 hoten_cb_sua">
								<label>Người ở</label>
								<input  type="number" name="nguoi_o_loai_phongthemmoi_12" id="ngaysinh_loai_phongthemmoi_12" class="form-control " min="1" rows="1" required="" placeholder="Nhập số người ở">
							</div>
							<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 hoten_cb_sua">
								<label>diện tích ( m<sup>2</sup>)</label>
								<input  type="number" name="dien_tich_loai_phongthemmoi_12" id="ngaysinh_loai_phongthemmoi_12" class="form-control " min="20" rows="1" required="" placeholder="Nhập diện tích phòng">
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
		
		<!-- xem thông tin loai_phong -->
		<div id="dataModal" class="modal fade">
			<div class="modal-dialog ">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Thông tin loại phòng</h4>
					</div>
					<div class="modal-body" id="thongtin_chitietloai_phong">
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>
		<!-- Cập nhật lại thông tin phòng -->
		<div id="modal_sua_loai_phong" class="modal fade">
			<div class="modal-dialog ">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Cập nhật thông tin loại phòng</h4>
					</div>
					<div class="modal-body">
						<form action="" id="from_suathongtin_loai_phong" name="from_suathongtin_loai_phong" 	method="POST" role="form" class="_1themphong1 " enctype="multipart/form-data" data-confirm="Bạn có chắn muốn cập nhật lại thông tin này?">
							<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 hoten_cb_sua ">
								<label>Mã loại phòng</label>
								
								<input style="" type="text" name="ma_loai_phong_sua_12" id="ma_loai_phong_sua_12" class="form-control chuinhoa " value=""  required="" readonly="" placeholder="Nhập mã loại phòng"  />
							</div>
							<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 hoten_cb_sua">
								<label>Tên loại phòng</label>
								<input  name="ten_loai_phong_sua_12" id="ten_loai_phong_sua_12" class="form-control chuinthuong" rows="1" required="" placeholder="Nhập tên loại phòng" >
							</div>
							<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 hoten_cb_sua">
								<label>Người ở</label>
								<input  type="number" name="nguoi_o_loai_phong_sua_12" id="nguoi_o_loai_phong_sua_12" class="form-control " min="1" rows="1" required="" >
							</div>
							<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 hoten_cb_sua">
								<label>diện tích ( m<sup>2</sup>)</label>
								<input  type="number" name="dien_tich_loai_phong_sua_12" id="dien_tich_loai_phong_sua_12" class="form-control " min="20" rows="1" required="" >
								<br>
							</div>
							<input type="hidden" name="id_loai_phong_sua_12" id="id_loai_phong_sua_12" />
						</div>
						<div class="modal-footer">
							<input type="submit" name="insert" id="insert" value="Insert" class="btn btn-danger capnhattb" />
						<button type="button" class="btn btn-primary" data-dismiss="modal">Trở lại</button></form>
					</div>
				</div>
			</div>
		</div>
		<!-- Xoa loại phòng -->
		<div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
			<div id="modal_xoa_loai_phong" class="modal fade">
				<div class="modal-dialog ">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title canhgiua">Xóa loại phòng</h4>
						</div>
						<div class="modal-body" id="thongtinnv_xoa12">
						</div>
						<form method="post" id="From_xoa_loai_phong" data-confirm="Bạn có chắn muốn xóa thông tin này?">
							<input type="hidden" name="id_loai_phong_xoa_12" id="id_loai_phong_xoa_12" />
							<div class="modal-footer">
								<input type="submit" name="insert_xoa" id="insert_xoa" value="Xóa" class="btn btn-danger canhgiua" />
								<button type="button" class="btn btn-primary" data-dismiss="modal">Trở lại</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>