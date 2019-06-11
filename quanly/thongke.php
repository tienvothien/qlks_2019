<?php
	include './../dulieu/kiemtradangnhap.php';
?>
<!DOCTYPE html>
<html lang="en"><head>
	<title> Quản lý nhân viên </title>
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
								<h2>Hệ thống quản lý</h2>
							</div>
						</div>
					<hr class="ngay_ad"></div>
					<div class="container-fluid">
						<div class="row"><!-- nho doi ten class -->
							<div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
								<a href="quanly_thongtin_phong.php" title="">
								<div class="thumbnail maune_hethong" >
	                               	<div class='caption text-center'>
	                                    <?php  include './../dulieu/tong_so_phong.php'?>
	                                </div>
	                            </div>
	                            </a>
							</div>

							<div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
								<a href="quanly_thongtin_loai_phong.php" title="">
								<div class="thumbnail maune_lp" >
	                               	<div class='caption text-center'>
	                                    <?php  include './../dulieu/tong_so_loai_phong.php'?>
	                                </div>
	                            </div>
	                            </a>
							</div>
						
							<div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
								<a href="index.php" title="">
									<div class="thumbnail maune_phongcokhach" >
		                               	<div class='caption text-center'>
		                                    <?php  include './../dulieu/tong_so_phong_co_khachhang.php'?>
		                                </div>
		                            </div>
	                        	</a>
							</div>
						
							<div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
								<a href="index.php" title="">
								<div class="thumbnail maune_phongtrong" >
	                               	<div class='caption text-center'>
	                                    <?php  include './../dulieu/tong_so_phong_trong.php'?>
	                                </div>
	                            </div>
	                            </a>
							</div>
							<div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
								<a href="quanly_thongtin_thutien.php" title="">
								<div class="thumbnail maune_hoadon" >
	                               	<div class='caption text-center'>
	                                    <?php  include './../dulieu/tong_so_hoa_don.php'?>
	                                </div>
	                            </div>
	                            </a>
							</div>
							<div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
								<a href="quanly_nhanvien.php" title="">
								<div class="thumbnail maune_nhanvien" >
	                               	<div class='caption text-center'>
	                                    <?php  include './../dulieu/tong_so_nhan_vien.php'?>
	                                </div>
	                            </div>
	                            </a>
							</div>
							<div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
								<a href="quanly_thietbi.php" title="">
								<div class="thumbnail maune_loaithietbi" >
	                               	<div class='caption text-center'>
	                                    <?php  include './../dulieu/tong_so_loai_thiet_bi.php'?>
	                                </div>
	                            </div>
	                            </a>
							</div>
							<div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
								<a href="quanly_thongtin_phong.php" title="">
								<div class="thumbnail maune_quatdoi" >
	                               	<div class='caption text-center'>
	                                    <?php  include './../dulieu/tong_so_phong_quat_doi.php'?>
	                                </div>
	                            </div>
	                            </a>
							</div>
							<div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
								<a href="quanly_thongtin_phong.php" title="">
								<div class="thumbnail maune_quatdon" >
	                               	<div class='caption text-center'>
	                                    <?php  include './../dulieu/tong_so_phong_quat_don.php'?>
	                                </div>
	                            </div>
	                            </a>
							</div>
							<div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
								<a href="quanly_thongtin_phong.php" title="">
								<div class="thumbnail maune_lanhdon" >
	                               	<div class='caption text-center'>
	                                    <?php  include './../dulieu/tong_so_phong_lanh_don.php'?>
	                                </div>
	                            </div>
	                            </a>
							</div>
							<div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
								<a href="quanly_thongtin_phong.php" title="">
								<div class="thumbnail maune_vipdoi" >
	                               	<div class='caption text-center'>
	                                    <?php  include './../dulieu/tong_so_phong_vip_doi.php'?>
	                                </div>
	                            </div>
	                            </a>
							</div>
							<div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
								<a href="quanly_thongtin_phong.php" title="">
								<div class="thumbnail maune_vipdon" >
	                               	<div class='caption text-center'>
	                                    <?php  include './../dulieu/tong_so_phong_vip_don.php'?>
	                                </div>
	                            </div>
	                            </a>
							</div>
							<div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
								<a href="quanly_thongtin_dangthue.php" title="">
								<div class="thumbnail maune_vipdon" >
	                               	<div class='caption text-center'>
	                                    <?php  include './../dulieu/tong_so_khach_dang_thuê.php'?>
	                                </div>
	                            </div>
	                            </a>
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