<div class="col-xs-12 col-sm-12 col-md-2 col-lg-2 menutrai ">
	<nav class="navbar navbar-default" role="navigation">
		<div class="container-fluid " style="padding-left: 0px; padding-right: 0px;">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				</button>
				<a href="thongke.php" class="navbar-brand "><span class="fa fa-home"></span> Trang chủ</a>
			</div>
			<div class="collapse navbar-collapse navbar-ex1-collapse">
				<div class="sidenav">
					<button class="dropdown-btn chuinthuong">
					<?php
						include 'conn.php';
						$queryho_ten_cb = mysqli_query($conn,"SELECT nhanvien.id AS idnv, nhanvien.ma_nhan_vien, nhanvien.ho_nhan_vien, nhanvien.ten_nhan_vien FROM nhanvien WHERE nhanvien.id ='$_SESSION[idnv]' ");
						$row_nv = mysqli_fetch_array($queryho_ten_cb);
						$ho_nhan_vien = $row_nv['ho_nhan_vien'];
						$ten_nhan_vien = $row_nv['ten_nhan_vien'];
						echo   $ho_nhan_vien. "&nbsp" .$ten_nhan_vien;
					?>
					<i class=" fa fa-caret-down"></i>
					</button>
					<div class="dropdown-container">
						<a href="quanly_thongtintaikhoang.php" class="list-group-item">Quản Lý Tài khoản</a>
						<a href="../dulieu/dangxuat.php"><span class="fa fa-log-in"></span> Đăng xuất</a>
					</div>
					<?php if ($_SESSION['idnv']==2) {
						
					?>
					<button class="dropdown-btn">Quản lý nhân viên
					<i class="fa fa-caret-down"></i>
					</button>
					<div class="dropdown-container">
						<a href="quanly_nhanvien.php" class="list-group-item">Thông tin nhân viên</a>
					</div>
					<?php } ?>
					<button class="dropdown-btn">Quản Lý Khách Hàng
					<i class="fa fa-caret-down"></i>
					</button>
					<div class="dropdown-container">
						<a href="quanly_thongtin_khach.php" class="list-group-item">Thông Tin Khách Hàng</a>
					</div>
					<button class="dropdown-btn">Quản lý phòng
					<i class="fa fa-caret-down"></i>
					</button>
					<div class="dropdown-container">
						<a href="index.php" class="list-group-item">Danh Sách Phòng</a>
						<a href="quanly_thongtin_gia_phong.php" class="list-group-item">Giá Phòng</a>
						<a href="quanly_thongtin_phong.php" class="list-group-item">Thông Tin Phòng</a>
						<a href="quanly_thongtin_loai_phong.php" class="list-group-item">Quản Lý Loại Phòng</a>
						<a href="quanly_thongtin_dathue.php" class="list-group-item">Quản Lý Khách Đã Thuê Phòng</a>
						<a href="quanly_thongtin_dangthue.php" class="list-group-item">Quản Lý Khách Đang Thuê Phòng</a>
					</div>
					<button class="dropdown-btn">Quản lý Thiết Bị
					<i class="fa fa-caret-down"></i>
					</button>
					<div class="dropdown-container">
						<a href="quanly_thietbi.php" class="list-group-item">Danh Sách Thiết Bị</a>
						<a href="#" class="list-group-item">Quản Lý Thiết Bị Trong Từng Loại Phòng</a>
					</div>
					<button class="dropdown-btn">Quản Lý Hóa Đơn
					<i class="fa fa-caret-down"></i>
					</button>
					<div class="dropdown-container">
						<a href="quanly_thongtin_thutien.php" class="list-group-item">Quản Lý Tiền</a>
					</div>
					
					<!-- <button class="dropdown-btn">Thống kê
					<i class="fa fa-caret-down"></i>
					</button>
					<div class="dropdown-container">
						<a href="" class="list-group-item">Thống kê danh sách</a>
					</div> -->
					
					
				</div>
			</div>
		</div>
	</nav>
</div>
<script>
	var dropdown = document.getElementsByClassName("dropdown-btn");
var i;
for (i = 0; i < dropdown.length; i++) {
dropdown[i].addEventListener("click", function() {
this.classList.toggle("active");
var dropdownContent = this.nextElementSibling;
if (dropdownContent.style.display === "block") {
dropdownContent.style.display = "none";
} else {
dropdownContent.style.display = "block";
}
});
}
</script>