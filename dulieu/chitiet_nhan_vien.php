<?php 
	if (isset($_POST["id_chitietnhan_vien"])) {
		    $output = '';
		    include 'conn.php';
		    $query = "SELECT * FROM nhanvien nv WHERE nv.id ='$_POST[id_chitietnhan_vien]' and nv.xoa=0";
		    $result = mysqli_query($conn, $query);
		    $output .= '
				<div class="table-responsive">
					<table class="table table-bordered table-hover table-striped">';
						$row = mysqli_fetch_array($result);
			         	// tìm quê quán  
						$quequan = mysqli_fetch_array(mysqli_query($conn,"SELECT tinh.tentinh FROM tinh  WHERE tinh.matinh ='$row[que_quan]'" ));
						// noi cap cmnd
						$noicapcmnd = mysqli_fetch_array(mysqli_query($conn,"SELECT tinh.tentinh FROM tinh  WHERE tinh.matinh ='$row[noicap]'" ));
						// tim lop
						
						$diachi = mysqli_fetch_array(mysqli_query($conn, "SELECT xa.tenxa, huyen.tenhuyen, tinh.tentinh FROM tinh INNER JOIN huyen ON tinh.matinh = huyen.matinh INNER JOIN xa ON huyen.mahuyen = xa.mahuyen WHERE xa.maxa = '$row[maxa]'"));
						$diachi1=$row['sonha'].", Xã ".$diachi['tenxa'].", Huyện ".$diachi['tenhuyen'].", tỉnh ".$diachi['tentinh'];
						//canbothem
						$canbothem = mysqli_fetch_array(mysqli_query($conn,"SELECT nhanvien.ma_nhan_vien, nhanvien.ho_nhan_vien, nhanvien.ten_nhan_vien FROM nhanvien WHERE nhanvien.id ='$row[id_nguoithem]'"));
						$output .= '
						<tr>
							
							<td colspan="4" style="text-transform: uppercase;">
								<img src="./../images/'. $row["anhcanhan"].'" class="img-responsive" alt="Image" style="width:300px; height:250px; margin: auto;">
							</td>
						</tr>
						<tr>
							<th width="16%">MANV</th>
							<td width="40%" class="chuinhoa">'.$row['ma_nhan_vien'].'</td>
							<th width="16%">Họ và tên</th>
							<td class="chuinthuong" width="30%">'.$row['ho_nhan_vien'] . '&nbsp;'.$row['ten_nhan_vien'].'</td>
						</tr>
						<tr>
							<th >Ngày Sinh</th>
							<td >' . date('d/m/Y', strtotime($row["ngay_sinh"])) . '</td>
							<th>Giới tính</th>
							<td class="chuinthuong">'.$row['gioi_tinh'].'</td>
						</tr>
						<tr>
							<th>Số CMND</th>
							<td>'.$row['cmnd'].'</td>
						
							<th>Ngày Cấp <br> Nơi cấp</th>
							<td class="chuinthuong">'.date('d/m/Y', strtotime($row['ngay_cap'])).' <br> '.$noicapcmnd['tentinh'].'</td>
						</tr>
						<tr>
							<th>HKTT</th>
							<td class="chuinthuong">'.$diachi1.'</td>
							<th>Quê quán</th>
							<td class="chuinthuong" >'.$quequan['tentinh'].'</td>
						</tr>
						<tr>
							<th>Điện thoại</th>
							<td class=" chuinhoa">'.$row['so_dien_thoai'].'</td>
							<th></th>
							<td></td>
						</tr>
						
						<tr>
							<th >Ngày thêm</th>
							<td >' . date('d/m/Y', strtotime($row["ngaythem"])) . '</td>
							<th>Cán bộ thêm</th>
							<td class="chuinthuong">'.$canbothem['ho_nhan_vien'].'&nbsp;'.$canbothem['ten_nhan_vien'].'<br>'.$canbothem['ma_nhan_vien'].'</td>
						</tr>
			';
			$output .= '
			    	</table>
			    </div>
			';
		echo $output;
		mysqli_close($conn);
	}

 ?>