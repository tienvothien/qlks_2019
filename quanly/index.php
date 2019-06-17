<?php
	include './../dulieu/kiemtradangnhap.php';
?>
<!DOCTYPE html>
<html lang="en"><head>
	<title> Hệ Thống Quản Lý Khách Sạn </title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- <link rel="shortcut icon" type="image/jpg" href="./../images/vnkgu.png"/> -->
	<script type="text/javascript" src="../vendor/bootstrap.js"></script>
	<link rel="stylesheet" href="../vendor/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../css/12.css">
	<script type="text/javascript" src="./../js/js_hien_thi_dang_tien.js"></script>
	<script type="text/javascript" src="./../js/js_hien_thi_cmnd.js"></script>
	<script type="text/javascript" src="./../js/js_quanly_index_phong.js"></script>
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
								<h2>Danh sách phòng</h2>
							</div>
						</div>
					<hr class="ngay_ad"></div>
					<div class="container-fluid">
						<div class="row"><!-- nho doi ten class -->
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<div class="dulieu_giaphong"><?php include './../dulieu/dulieu_index_phong.php'; ?></div>
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
		
		<!-- xem thông tin index_phong -->
		<div id="dataModal" class="modal fade">
			<div class="modal-dialog " style="width: 700px;">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Thông tin phòng</h4>
					</div>
					<div class="modal-body" id="thongtin_chitietindex_phong">
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>
		<!-- Cập nhật lại thông tin phòng -->
		<div id="modal_sua_index_phong" class="modal fade">
			<div class="modal-dialog ">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Thông tin thuê phòng</h4>
					</div>
					<div class="modal-body">
						<form action="" id="from_suathongtin_index_phong" name="from_suathongtin_index_phong" 	method="POST" role="form" class="_1themphong1 " enctype="multipart/form-data" data-confirm="Bạn có chắn muốn thêm thông tin này?">
							
							<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 hoten_cb_sua ">
								<label>Mã phòng</label>
								
								<input style="" type="text" name="ma_index_phong_sua_12" id="ma_index_phong_sua_12" class="form-control chuinhoa " value=""  required=""  placeholder="Nhập mã phòng" readonly="" />
							</div>
							
							<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 hoten_cb_sua">
								<label>Loại phòng</label>
								<select  name="idloai_phong_index_phong_sua_12" id="idloai_phong_index_phong_sua_12" class="form-control chuinthuong" required="required" disabled="">
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
							</div>
							<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 hoten_cb_sua ">
								<label>Giá giờ (VNĐ)</label>
								<input style="" type="text" name="gia_gio_index_phong_sua_12" id="gia_gio_index_phong_sua_12" class="form-control chuinhoa " value=""  required=""  placeholder="Nhập mã phòng" disabled="" />
							</div>
							<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 hoten_cb_sua ">
								<label>Giá ngày (VNĐ)</label>
								<input style="" type="text" name="gia_ngay_ma_index_phong_sua_12" id="gia_ngay_ma_index_phong_sua_12" class="form-control chuinhoa " value=""  required=""  placeholder="Nhập mã phòng" disabled="" />
							</div>
							<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 hoten_cb_sua ">
								<label>Số CMND khách thuê</label>
								<input style="" type="number" name="cmnd_index_phong_sua_12" id="cmnd_index_phong_sua_12" class="form-control  " value=""  required=""  placeholder="Nhập số CMND" />
							</div>
							<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 hoten_cb_sua ">
								<label>Thời gian nhận phòng</label>
								<input style="" type="text" name="" id="" class="form-control  " value="<?php echo date("H:i:s d/m/Y"); ?>"  required=""  disabled="" />
							</div>
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 hoten_cb_sua ">
								<label>Thông tin khách thuê phòng</label>
								<div id="tt_khachthue">
									
								</div>
								<br>
							</div>
							
							<input type="hidden" name="id_index_phong_sua_12" id="id_index_phong_sua_12" />
						</div>
						<div class="modal-footer" style="border: none;">
							<input type="submit" name="insert" id="insert" value="Insert" class="btn btn-danger capnhattb" />
						<button type="button" class="btn btn-primary" data-dismiss="modal">Trở lại</button></form>
					</div>
				</div>
			</div>
		</div>
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
									<h4 class="text-center">Thông tin phòng</h4>
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
							<input type="hidden" name="id_index_phong_xoa_12" id="id_index_phong_xoa_12" />
							<div class="modal-footer">
								<!-- <button type="button" class="btn btn-info xuat_ex_hoadon" name="xuat_ex_hoadon" id="xuat_ex_hoadon">Xuất Excel</button> -->
								<input type="submit" name="insert_xoa" id="insert_xoa" value="Thanh toán" class="btn btn-danger canhgiua" />
								<button type="button" class="btn btn-primary" data-dismiss="modal">Trở lại</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>