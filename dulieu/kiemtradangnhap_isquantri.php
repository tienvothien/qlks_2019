<?php
session_start();
if (isset($_SESSION['idnv']) && $_SESSION['kt_dangnhap_nv'] == 1 && isset($_SESSION['ma_nhan_vien'])) {
} else {
	header("location:./../quanly/login");
}
?>
