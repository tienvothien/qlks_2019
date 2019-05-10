<?php 	
	// tỉnh thay đổi sẽ chọn huyện thay đồi
	if (isset($_POST['tinh_them_nhan_vien'])) {
		$matinh = $_POST['tinh_them_nhan_vien'];
		include 'conn.php';
		$sqlhuyen = "SELECT * FROM huyen where matinh ='$matinh' ORDER by tenhuyen ASC";
		$queryhuyen = mysqli_query($conn, $sqlhuyen);
		echo " <option value=''>Chọn huyện</option>";
		while ($rowhuyen = mysqli_fetch_array($queryhuyen)) {
			$tenhuyen = $rowhuyen['tenhuyen'];
			$caphuyen = $rowhuyen['caphuyen'];
			$mahuyen = $rowhuyen['mahuyen'];
			echo "<option value='$mahuyen'>$caphuyen $tenhuyen</option>";}
	}//end tỉnh thay đổi sẽ chọn huyện thay đổi
	if (isset($_POST['huyen_them_nhan_vien'])) {// huyện thay đổi xã sẽ thay đổi
		$mahuyen = $_POST['huyen_them_nhan_vien'];
		include 'conn.php';
		$sqlxa = "SELECT * FROM xa where mahuyen ='$mahuyen' ORDER by tenxa ASC";
		$queryxa = mysqli_query($conn, $sqlxa);
		echo " <option value=''>Chọn Xã</option>";
		while ($rowxa = mysqli_fetch_array($queryxa)) {
			$tenxa = $rowxa['tenxa'];
			$capxa = $rowxa['capxa'];
			$maxa = $rowxa['maxa'];
			echo "<option value='$maxa'>$capxa $tenxa</option>";}
	}// end huyện thay đổi xã sẽ thay đổi
	if (isset($_POST['id_nhan_vien_sua'])) {// hiện tt xã sẽ thay đổi sửa tt sinh viên
		$id_nhan_vien_sua = $_POST['id_nhan_vien_sua'];
		include 'conn.php';
		$sqlxa = "SELECT xa.maxa, xa.capxa, xa.tenxa FROM nhanvien , huyen, xa WHERE nhanvien.id='$id_nhan_vien_sua' AND nhanvien.mahuyen= huyen.mahuyen AND huyen.mahuyen=xa.mahuyen ORDER by xa.capxa,xa.tenxa ASC";
		$sqlxahien = mysqli_fetch_array(mysqli_query($conn,"SELECT xa.maxa, xa.capxa, xa.tenxa FROM nhanvien , xa WHERE nhanvien.id='$id_nhan_vien_sua' AND nhanvien.maxa= xa.maxa ORDER by xa.capxa, xa.tenxa ASC"));
		$queryxa = mysqli_query($conn, $sqlxa);
		echo " <option value='".$sqlxahien['maxa']."'>".$sqlxahien['capxa']. $sqlxahien['tenxa']."</option>";
		while ($rowxa = mysqli_fetch_array($queryxa)) {
			$tenxa = $rowxa['tenxa'];
			$capxa = $rowxa['capxa'];
			$maxa = $rowxa['maxa'];
			echo "<option value='$maxa'>$capxa $tenxa</option>";}
	}// end hiện tt xã sẽ thay đổi sửa tt sinh viên
	if (isset($_POST['id_nhan_vien_sua_huyen'])) {// hiện tt xã sẽ thay đổi sửa tt sinh viên
		$id_nhan_vien_sua_huyen = $_POST['id_nhan_vien_sua_huyen'];
		include 'conn.php';
		$sqlhuyen = "SELECT huyen.mahuyen, huyen.caphuyen, huyen.tenhuyen FROM nhanvien , huyen, tinh WHERE nhanvien.id='$id_nhan_vien_sua_huyen' AND nhanvien.matinh=tinh.matinh AND huyen.matinh=tinh.matinh  ORDER by huyen.caphuyen, huyen.tenhuyen ASC";
		$sqlhuyenhien = mysqli_fetch_array(mysqli_query($conn,"SELECT huyen.mahuyen, huyen.caphuyen, huyen.tenhuyen FROM nhanvien , huyen WHERE nhanvien.id='$id_nhan_vien_sua_huyen' AND nhanvien.mahuyen= huyen.mahuyen ORDER by huyen.caphuyen, huyen.tenhuyen ASC"));
		$queryhuyen = mysqli_query($conn, $sqlhuyen);
		echo " <option value='".$sqlhuyenhien['mahuyen']."'>".$sqlhuyenhien['caphuyen']. $sqlhuyenhien['tenhuyen']."</option>";
		while ($rowhuyen = mysqli_fetch_array($queryhuyen)) {
			$tenhuyen = $rowhuyen['tenhuyen'];
			$caphuyen = $rowhuyen['caphuyen'];
			$mahuyen = $rowhuyen['mahuyen'];
			echo "<option value='$mahuyen'>$caphuyen $tenhuyen</option>";}
	}// end hiện tt xã sẽ thay đổi sửa tt sinh viên
?>