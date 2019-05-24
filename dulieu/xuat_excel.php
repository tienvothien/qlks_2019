<?php
require('./../Classes/PHPExcel.php');
if(isset($_POST['xuat_ds_kh_dang_thue12']) ){
	session_start();
	$objExcel = new PHPExcel;
	$objExcel->setActiveSheetIndex(0);
	$sheet = $objExcel->getActiveSheet()->setTitle();
	$rowCount = 2;
	$sheet->setCellValue('A'.$rowCount,'Danh sách khách đang ở ngày '.date('d/m/Y') )->mergeCells('A2:'.'H2');
	$sheet->getStyle('A2:H2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
	$sheet->getStyle('A2:H2')->getFont()->setBold(true);
	$sheet->getStyle('A2:H2')->getFont()->setSize(20);
	$sheet->getStyle('A2:H2')->getFont()->setName("Times New Roman");
	$rowCount = 4;
	$sheet->setCellValue('A'.$rowCount,'STT');
	$sheet->setCellValue('B'.$rowCount,'Họ tên');
	$sheet->setCellValue('C'.$rowCount,'Ngày sinh');
	$sheet->setCellValue('D'.$rowCount,'Giới tính');
	$sheet->setCellValue('E'.$rowCount,'CMND');
	$sheet->setCellValue('F'.$rowCount,'Hộ khẩu thường trú');
	$sheet->setCellValue('G'.$rowCount,'Phòng');
	$sheet->setCellValue('H'.$rowCount,'Thời gian vào');
	
	$sheet->getColumnDimension("B")->setAutosize(true);// width âuto
	$sheet->getColumnDimension("C")->setAutosize(true); // width auto
	$sheet->getColumnDimension("D")->setAutosize(true); // width auto
	$sheet->getColumnDimension("E")->setAutosize(true); // width auto
	$sheet->getColumnDimension("F")->setAutosize(true); // width auto
	$sheet->getColumnDimension("G")->setAutosize(true); // width auto
	$sheet->getColumnDimension("H")->setAutosize(true); // width auto
	
	$sheet->getStyle('A4:H4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);// canh giữa
	$stt=1;
		
	include 'conn.php';
	$result = mysqli_query($conn, "SELECT khachhang.id as idkh, khachhang.ma_khach_hang, khachhang.ho_khach_hang,  khachhang.ten_khach_hang, khachhang.gioi_tinh, khachhang.ngay_sinh, khachhang.que_quan, khachhang.cmnd, khachhang.so_dien_thoai, khachhang.matinh, khachhang.mahuyen, khachhang.maxa,khachhang.sonha, phong.ma_phong, thuephong.thoi_gian_vao, thuephong.id as idtp  FROM khachhang, thuephong , phong WHERE thuephong.thoi_gian_ra is null and thuephong.id_khach_hang=khachhang.id and phong.id= thuephong.id_phong and khachhang.xoa=0 order by khachhang.ten_khach_hang, khachhang.ho_khach_hang");
	while($row_kh = mysqli_fetch_array($result)){

		
		$diachi2='';
		$diachi1='';
		// lấy địa chỉ
		$diachi = mysqli_fetch_array(mysqli_query($conn, "SELECT xa.capxa, xa.tenxa, huyen.tenhuyen, huyen.caphuyen, tinh.tentinh FROM tinh INNER JOIN huyen ON tinh.matinh = huyen.matinh INNER JOIN xa ON huyen.mahuyen = xa.mahuyen WHERE xa.maxa = '$row_kh[maxa]'"));
				$diachi1=$row_kh['sonha'].", ".$diachi["capxa"] .$diachi['tenxa'].", ".$diachi["caphuyen"].$diachi['tenhuyen'].", ".$diachi['tentinh'];
		$rowCount++;
		$sheet->getStyle('A'.$rowCount)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);// canh giữa
		$sheet->setCellValue('A'.$rowCount,$stt);
		$sheet->setCellValue('B'.$rowCount,$row_kh['ho_khach_hang'].' '.$row_kh['ten_khach_hang']);
		$sheet->setCellValue('C'.$rowCount,date('d/m/Y', strtotime($row_kh['ngay_sinh'])));
		$sheet->setCellValue('D'.$rowCount,$row_kh['gioi_tinh']);
		$sheet->setCellValue('E'.$rowCount,$row_kh['cmnd']);
		$sheet->setCellValue('F'.$rowCount,$diachi1);
		$sheet->setCellValue('G'.$rowCount,$row_kh['ma_phong']);
		$sheet->setCellValue('H'.$rowCount,date('d/m/Y H:i:s', strtotime($row_kh['thoi_gian_vao'])));
		

		$sheet->getStyle('C'.$rowCount.':E'.$rowCount)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$sheet->getStyle('G'.$rowCount.':H'.$rowCount)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		
		$stt++;
	}
	$styleArray=  array(// khung
		'borders' => array(
			'allborders'=>array(
				'style'=> PHPExcel_Style_Border::BORDER_THIN
			)
		)
	);
	$sheet->getStyle('A4:H'.$rowCount)->applyFromArray($styleArray);
	$rowCount+=2;
	$sheet->setCellValue('E'.$rowCount,'Kiên Giang, Ngày '.date('d').' tháng ' . date('m').' năm '.date('Y'))->mergeCells('E'.$rowCount.':H'.$rowCount);
	$sheet->getStyle('E'.$rowCount.':H'.$rowCount)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
	$rowCount+=1;
	$sheet->setCellValue('E'.$rowCount,'Người lập')->mergeCells('E'.$rowCount.':H'.$rowCount);
	$sheet->getStyle('E'.$rowCount.':H'.$rowCount)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

	$rowCount+=4;
	$ten = mysqli_fetch_array(mysqli_query($conn,"SELECT nhanvien.ho_nhan_vien, nhanvien.ten_nhan_vien FROM nhanvien WHERE nhanvien.id='".$_SESSION['idnv']."'"));
	$ten_ne = $ten['ho_nhan_vien'].' '.$ten['ten_nhan_vien'];
	$sheet->setCellValue('E'.$rowCount,$ten_ne)->mergeCells('E'.$rowCount.':H'.$rowCount);
	$sheet->getStyle('E'.$rowCount.':H'.$rowCount)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
	$sheet->getStyle('E'.$rowCount.':H'.$rowCount)->getFont()->setBold(true);
	$sheet->getStyle('A4:H'.$rowCount)->getFont()->setSize(13);
	$sheet->getStyle('A4:H'.$rowCount)->getFont()->setName("Times New Roman");
	$objWriter = new PHPExcel_Writer_Excel2007($objExcel);
	$tenfiel= strtotime(date('Y/m/d H:i:s'));
	$filename = 'danh_sach_khach_hanh'.$tenfiel.'.xlsx';
	$objWriter->save($filename);
	header('Content-Disposition: attachment; filename="' . $filename . '"');
	header('Content-Type: application/vnd.openxmlformatsofficedocument.spreadsheetml.sheet');
	header('Content-Length: ' . filesize($filename));
	header('Content-Transfer-Encoding: binary');
	header('Cache-Control: must-revalidate');
	header('Pragma: no-cache');
	readfile($filename);
	return ;
}

?>
