<?php
	include './../dulieu/kiemtradangnhap.php';
?>
<!DOCTYPE html>
<html lang="en"><head>
	<title> Quản lý thiết bị </title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- <link rel="shortcut icon" type="image/jpg" href="./../images/vnkgu.png"/> -->
	<script type="text/javascript" src="../vendor/bootstrap.js"></script>
	<link rel="stylesheet" href="../vendor/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../css/12.css">
	<script type="text/javascript" src="./../js/js_quanly_thietbi.js"></script>
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
								<h2>Danh sách thiết bị</h2>
							</div>
						</div>
					<hr class="ngay_ad"></div>
					<div class="container-fluid">
						<div class="row"><!-- nho doi ten class -->
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<div class="dulieu_thietbi"><?php include './../dulieu/dulieu_thietbi.php'; ?></div>
						</div>
						<div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
							<button style="margin-bottom: 50px;" type="button" class="btn btn-info btn-lg nutthemnek themtb" data-toggle="modal" data-target="#myModal">Thêm</button>
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
	<!-- Thêm thiết bị -->
		<div class="modal fade" id="myModal" role="dialog">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">Thêm loại thiết bị</h4>
                                        </div>
                                        <div class="modal-body">
                                            <form style="font-size: 20px; margin: auto;"  id="themthietbivaoloaip123" class="form-horizontal" action="themthietbi.php">
                                                <div class="form-group">
                                                    <label class="control-label col-sm-4" for="email">Mã loại thiết bị</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control " id="them_ma_tb"  placeholder="Nhập mã loại thiết bị" name="mathietbi">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-sm-4" for="pwd">Tên loại thiết bị</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" id="them_loai_tb" placeholder="Nhập tên loại thiết bị" name="tenthietbi">
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default thietbi_tl" data-dismiss="modal">Trở lại</button>
                                            <button type="submit" class="btn btn-success  " onclick="themtb();">Thêm</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

 <!-- Câp nhat lại thong tin thiêt bị -->
            <div id="thietbi_data_Modal" class="modal fade">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Cập nhật thông tin thiết bị</h4>
                        </div>
                        <div class="modal-body">
                            <form method="post" id="capnhatthietbi12345" data-confirm="Bạn có chắn muốn cập nhật lại thông tin này?">
                                <label>Mã thiết bị</label>
                                <input disabled type="text" name="ma_thietbicapnhat" id="ma_thietbicapnhat" class="form-control "style="text-transform: uppercase;" />
                                <br />
                                <label>Tên thiết bị</label>
                                <textarea   name="ten_ltpcapnhat" id="ten_ltpcapnhat" class="form-control" rows="1" style=" text-transform: capitalize;"></textarea>
                                <br />
                                <input type="hidden" name="ma_tbsua1" id="ma_tbsua1" />
                                <input type="hidden" name="thong_bao_loi_capnhat1" id="thong_bao_loi_capnhat1" />
                                <input type="submit" name="insert" id="insert" value="Insert" class="btn btn-danger capnhattb" />
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Trở lại</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Xoa thiêt bị -->
            <div id="xoa_loaithietbi123_data_Modal" class="modal fade">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Xóa loại thiết bị</h4>
                        </div>
                        <div class="modal-body">
                            <form method="post" id="xoa_ltb_form" data-confirm="Bạn có chắn muốn xóa thông tin này?">
                                <label>Mã Loại thiết bị</label>
                                <input disabled type="text" name="mathietbixoa123" id="mathietbixoa123" class="form-control "style="text-transform: uppercase;" />
                                <br />
                                <label>Tên loại thiết bị</label>
                                <textarea disabled  name="tenthietbixoa" id="tenthietbixoa" class="form-control" rows="1" style=" text-transform: capitalize;"></textarea>
                                <br />
                                <input type="hidden" name="ma_tb_canxoa12" id="ma_tb_canxoa12" />
                                <input type="hidden" name="thong_bao_loi_capnhat" id="thong_bao_loi_capnhat" />
                                <input type="submit" name="insert1" id="xoatb1231415" value="Xóa" class="btn btn-danger"  />
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Trở lại</button>
                        </div>
                    </div>
                </div>
            </div>