<?php
	include './../dulieu/kiemtradangnhap.php';
?>
<!DOCTYPE html>
<html lang="en"><head>
	<title> Hệ thông KTX ĐH Kiên Giang </title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- <link rel="shortcut icon" type="image/jpg" href="./../images/vnkgu.png"/> -->
	<script type="text/javascript" src="../vendor/bootstrap.js"></script>
	<link rel="stylesheet" href="../vendor/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../css/12.css">
	<script type="text/javascript" src="./../js/js_quanly_nhanvien.js"></script>
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
						<img class="img-responsive" src="../images/Capture.PNG" alt="">
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
								<h2>thông tin tài khoản</h2>
							</div>
						</div>
					<hr class="ngay_ad"></div>
					<div class="container-fluid">
						<div class="row"><!-- nho doi ten class -->
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<div class="dulieu_nhanvien"><?php include './../dulieu/dulieu_tt_taikhoan.php'; ?></div>
						</div>
						<div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
							<input type="button" class="btn btn-primary btn-block" name="them_nhan_vien" value="Thêm mới" data-toggle="modal" data-target="#them_nhan_vien1">
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
		<div class="modal" id="them_nhan_vien1">
			<div class="modal-dialog themnhan_vien2 nhan_vien_themmoi ">
				<div class="modal-content">
					<!-- Modal Header -->
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<div class="row">
							<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
								<h4 class="modal-title">Thêm nhân viên</h4>
							</div>
							
						</div>
					</div>
					<!-- Modal body -->
					<div class="modal-body _1themtoanha">
						<form action="" id="form_themnhan_vienmoi" name="form_themnhan_vienmoi" 	method="POST" role="form" class="_1themphong1 "  enctype="multipart/form-data" data-confirm="Bạn có chắn muốn cập nhật lại thông tin này?">
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 hoten_cb_sua">
								<label>Ảnh</label>
								<input id="file_anh_sv" type="file" accept="image/*" name="image12" required="" />
							</div>
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 hoten_cb_sua text-center">
								<div id="message"></div>
								<div id="image_preview_themssv">
									<img id="previewing_themsvload" class="img-responsive"  src="" />
								</div>
							</div>
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 hoten_cb_sua ">
								<label>Mã nhân viên</label>
								<?php
									$r=mysqli_fetch_array(mysqli_query($conn,"SELECT ma_nhan_vien FROM nhanvien order by ma_nhan_vien DESC LIMIT 1"));
									$ma1=$r['ma_nhan_vien'];
									$matang1 =substr($ma1, 2, 5);
									$maatang2 = $matang1+1;
									$mnvmoi= 'NV'.$maatang2;
								?>
								<input style="width:50%" type="text" name="ma_nhan_vien_themmoi123" id="ma_nhan_vien_themmoi123" class="form-control chuinhoa " value="<?php echo $mnvmoi ;?>"  required="" placeholder="Nhập mã nhân viên"  readonly=""/>
							</div>
							<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 hoten_cb_sua">
								<label>Họ nhân viên</label>
								<input  name="ho_nhan_vienthemmoi_12" id="ho_nhan_vienthemmoi_12" class="form-control chuinthuong" rows="1" required="" placeholder="Nhập họ nhân viên" >
							</div>
							<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 hoten_cb_sua">
								<label>Tên nhân viên</label>
								<input  name="ten_nhan_vienthemmoi_12" id="ten_nhan_vienthemmoi_12" class="form-control chuinthuong" rows="1" required="" placeholder="Nhập tên nhân viên" >
							</div>
							<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 hoten_cb_sua">
								<label>Ngày sinh</label>
								<input  type="date" name="ngaysinh_nhan_vienthemmoi_12" id="ngaysinh_nhan_vienthemmoi_12" class="form-control " rows="1" required="">
							</div>
							<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 hoten_cb_sua">
								<label>Giới tính</label>
								<select  name="gioitinh_nhan_vienthemmoi_12" id="gioitinh_nhan_vienthemmoi_12" class="form-control chuinthuong" required="required">
									<option value="" >Chọn giới tính</option>
									<option value="Nam">Nam</option>
									<option value="Nữ">Nữ</option>
								</select>
							</div>
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 hoten_cb_sua">
								<label for="">Hộ khẩu thường trú </label>
							</div>
							<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 hoten_cb_sua">
								<label>Tỉnh</label>
								<select name="tinh_them_nhan_vien" id="tinh_them_nhan_vien" class="form-control" required="required">
									<option value="">Chọn tỉnh</option>
									
									<?php
										$tinh = mysqli_query($conn, 'SELECT * FROM tinh ORDER BY tinh.tentinh ASC');
										while ($row_tinh= mysqli_fetch_array($tinh)) {
											echo "<option value='".$row_tinh['matinh']."'>$row_tinh[tentinh]</option>";
										}
									?>
								</select>
							</div>
							<div class="col-xs-12 col-sm-6col-md-6 col-lg-6 hoten_cb_sua">
								<label> Quận/Huyện</label>
								<select name="huyen_them_nhan_vien" id="huyen_them_nhan_vien" class="form-control" required="required">
									<option value="">Chọn huyện</option>
								</select>
							</div>
							<div class="col-xs-12 col-sm-6col-md-6 col-lg-6 hoten_cb_sua">
								<label>Xã/Phường</label>
								<select name="xa_them_nhan_vien" id="xa_them_nhan_vien" class="form-control" required="required">
									<option value="">Chọn Xã</option>
								</select>
							</div>
							<div class="col-xs-12 col-sm-6col-md-6 col-lg-6 hoten_cb_sua">
								<label>Số nhà-Tổ-Ấp </label>
								<input type="text" name="sonha_them_nhan_vien" id="sonha_them_nhan_vien" class="form-control chuinthuong" rows="1" required="" placeholder="Nhập số nhà">
							</div>
							
							<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 hoten_cb_sua">
								<label>Quê quán</label>
								<select name="quequan_them_nhan_vien" id="quequan_them_nhan_vien" class="form-control" required="required">
									<option value="">Chọn quê quán</option>
									
									<?php
										$tinh = mysqli_query($conn, 'SELECT * FROM tinh ORDER BY tinh.tentinh ASC');
										while ($row_tinh= mysqli_fetch_array($tinh)) {
											echo "<option value='$row_tinh[matinh]'>$row_tinh[tentinh]</option>";
										}
									?>
								</select>
							</div>
							<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 hoten_cb_sua">
								<label>Số CMND</label>
								<input  type="number" name="cmnd_them_nhan_vien" id="cmnd_them_nhan_vien" class="form-control" rows="1" min="0" required="" placeholder="Nhập số CMND" >
							</div>
							<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 hoten_cb_sua">
								<label>Ngày cấp CMND</label>
								<input  type="date" name="ngay_capcnnd_them_nhan_vien" id="ngay_capcnnd_them_nhan_vien" class="form-control" rows="1" required="">
							</div>
							<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 hoten_cb_sua">
								<label>Nơi cấp</label>
								<select name="noicap_them_nhan_vien" id="noicap_them_nhan_vien" class="form-control" required="required">
									<option value="">Chọn quê quán</option>
									<?php
										$tinh = mysqli_query($conn, 'SELECT * FROM tinh ORDER BY tinh.tentinh ASC');
										while ($row_tinh= mysqli_fetch_array($tinh)) {
											echo "<option value='$row_tinh[matinh]'>$row_tinh[tentinh]</option>";
										}
									?>
								</select>
							</div>
							<div class="col-xs-12 col-sm-6 col-md-12 col-lg-12 hoten_cb_sua">
								<label>Điện thoại</label>
								<input  style="width: 50%;" type="number" name="so_dt_them_nhan_vien" id="so_dt_them_nhan_vien" class="form-control" rows="1" placeholder="Nhập nhập số điện thoại">
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
		
		<!-- xem thông tin nhan_vien -->
		<div id="dataModal" class="modal fade">
			<div class="modal-dialog ">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Thông tin nhân viên</h4>
					</div>
					<div class="modal-body" id="thongtin_chitietnhan_vien">
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>
		<!-- Cập nhật lại thông tin phòng -->
		<div id="modal_sua_nhan_vien" class="modal fade">
			<div class="modal-dialog ">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Cập nhật thông tin nhân viên</h4>
					</div>
					<div class="modal-body">
						<form action="" id="from_suathongtin_nhan_vien" name="from_suathongtin_nhan_vien" 	method="POST" role="form" class="_1themphong1 " enctype="multipart/form-data" data-confirm="Bạn có chắn muốn cập nhật lại thông tin này?">
							<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 hoten_cb_sua">
								<label>Ảnh</label>
								<input id="file_anh_sv_sua" type="file" accept="image/*" name="image_123" />
							</div>
							<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 hoten_cb_sua text-center">
								<div id="message"></div>
								<div id="image_preview_nhan_vien_sua123">
									<img id="previewing_nhan_vien_sua123_load" class="img-responsive" style="width:100px;" rc="" />
								</div>
							</div>
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 hoten_cb_sua ">
								<label>Mã nhân viên</label>
								
								<input style="width:50%" type="text" name="ma_nhan_vien_sua_12" id="ma_nhan_vien_sua_12" class="form-control chuinhoa " value=""  required="" readonly="" placeholder="Nhập mã nhân viên"  />
							</div>
							<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 hoten_cb_sua">
								<label>Họ nhân viên</label>
								<input  name="ho_nhan_vien_sua_12" id="ho_nhan_vien_sua_12" class="form-control chuinthuong" rows="1" required="" placeholder="Nhập họ nhân viên" >
							</div>
							<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 hoten_cb_sua">
								<label>Tên nhân viên</label>
								<input  name="ten_nhan_vien_sua_12" id="ten_nhan_vien_sua_12" class="form-control chuinthuong" rows="1" required="" placeholder="Nhập tên nhân viên" >
							</div>
							<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 hoten_cb_sua">
								<label>Ngày sinh</label>
								<input  type="date" name="ngaysinh_nhan_vien_sua_12" id="ngaysinh_nhan_vien_sua_12" class="form-control " rows="1" required="">
							</div>
							<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 hoten_cb_sua">
								<label>Giới tính</label>
								<select  name="gioitinh_nhan_vien_sua_12" id="gioitinh_nhan_vien_sua_12" class="form-control chuinthuong" required="required">
									<option value="" >Chọn giới tính</option>
									<option value="Nam">Nam</option>
									<option value="Nữ">Nữ</option>
								</select>
							</div>
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 hoten_cb_sua">
								<label for="">Hộ khẩu thường trú </label>
							</div>
							<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 hoten_cb_sua">
								<label>Tỉnh</label>
								<select name="tinh_nhan_vien_sua_12" id="tinh_nhan_vien_sua_12" class="form-control" required="required">
									<option value="">Chọn tỉnh</option>
									
									<?php
										$tinh = mysqli_query($conn, 'SELECT * FROM tinh ORDER BY tinh.tentinh ASC');
										while ($row_tinh= mysqli_fetch_array($tinh)) {
											echo "<option value='".$row_tinh['matinh']."'>$row_tinh[tentinh]</option>";
										}
									?>
								</select>
							</div>
							<div class="col-xs-12 col-sm-6col-md-6 col-lg-6 hoten_cb_sua">
								<label> Quận/Huyện</label>
								<select name="huyen_nhan_vien_sua_12" id="huyen_nhan_vien_sua_12" class="form-control" required="required">
									<option value="">Chọn huyện</option>
								</select>
							</div>
							<div class="col-xs-12 col-sm-6col-md-6 col-lg-6 hoten_cb_sua">
								<label>Xã/Phường</label>
								<select name="xa_nhan_vien_sua_12" id="xa_nhan_vien_sua_12" class="form-control" required="required">
									<option value="">Chọn Xã</option>
								</select>
							</div>
							<div class="col-xs-12 col-sm-6col-md-6 col-lg-6 hoten_cb_sua">
								<label>Số nhà-Tổ-Ấp </label>
								<input type="text" name="sonha_nhan_vien_sua_12" id="sonha_nhan_vien_sua_12" class="form-control chuinthuong" rows="1" required="" placeholder="Nhập số nhà">
							</div>
							
							<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 hoten_cb_sua">
								<label>Quê quán</label>
								<select name="quequan_nhan_vien_sua_12" id="quequan_nhan_vien_sua_12" class="form-control" required="required">
									
									<?php
										$tinh = mysqli_query($conn, 'SELECT * FROM tinh ORDER BY tinh.tentinh ASC');
										while ($row_tinh= mysqli_fetch_array($tinh)) {
											echo "<option value='$row_tinh[matinh]'>$row_tinh[tentinh]</option>";
										}
									?>
								</select>
							</div>
							<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 hoten_cb_sua">
								<label>Số CMND</label>
								<input  type="number" name="cmnd_nhan_vien_sua_12" id="cmnd_nhan_vien_sua_12" class="form-control" rows="1" min="0" required="" placeholder="Nhập số CMND" >
							</div>
							<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 hoten_cb_sua">
								<label>Ngày cấp CMND</label>
								<input  type="date" name="ngay_capcnnd_nhan_vien_sua_12" id="ngay_capcnnd_nhan_vien_sua_12" class="form-control" rows="1" required="">
							</div>
							<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 hoten_cb_sua">
								<label>Nơi cấp</label>
								<select name="noicap_nhan_vien_sua_12" id="noicap_nhan_vien_sua_12" class="form-control" required="required">
									<option value="">Chọn quê quán</option>
									<?php
										$tinh = mysqli_query($conn, 'SELECT * FROM tinh ORDER BY tinh.tentinh ASC');
										while ($row_tinh= mysqli_fetch_array($tinh)) {
											echo "<option value='$row_tinh[matinh]'>$row_tinh[tentinh]</option>";
										}
									?>
								</select>
							</div>
							<div class="col-xs-12 col-sm-6 col-md-12 col-lg-12 hoten_cb_sua">
								<label>Điện thoại</label>
								<input  style="width: 50%;" type="number" name="so_dt_nhan_vien_sua_12" id="so_dt_nhan_vien_sua_12" class="form-control" rows="1" placeholder="Nhập nhập số điện thoại">
							</div>
							<input type="hidden" name="id_nhan_vien_sua_12" id="id_nhan_vien_sua_12" />
						</div>
						<div class="modal-footer">
							<input type="submit" name="insert" id="insert" value="Insert" class="btn btn-danger capnhattb" />
						<button type="button" class="btn btn-primary" data-dismiss="modal">Trở lại</button></form>
					</div>
				</div>
			</div>
		</div>
		<!-- Xoa nhân viên -->
		<div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
			<div id="modal_xoa_nhan_vien" class="modal fade">
				<div class="modal-dialog ">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title canhgiua">Xóa nhân viên</h4>
						</div>
						<div class="modal-body" id="thongtinnv_xoa12">
						</div>
						<form method="post" id="From_xoa_nhan_vien" data-confirm="Bạn có chắn muốn xóa thông tin này?">
							<input type="hidden" name="id_nhan_vien_xoa_12" id="id_nhan_vien_xoa_12" />
							<div class="modal-footer">
								<input type="submit" name="insert_xoa" id="insert_xoa" value="Xóa" class="btn btn-danger canhgiua" />
								<button type="button" class="btn btn-primary" data-dismiss="modal">Trở lại</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>