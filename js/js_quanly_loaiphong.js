$(document).ready(function () {
	// Xem chi tiet thoong tin loai_phong
	$(document).on('click', '.view_chitietloaiphong', function(){
		var id_chitietloai_phong = $(this).attr("id");
		// alert(id_chitietloai_phong);
			$.ajax({
				url:"./../dulieu/chitiet_loai_phong.php",
				method:"POST",
				data:{id_chitietloai_phong:id_chitietloai_phong},
				success:function(data){
					$('#thongtin_chitietloai_phong').html(data);
					$('#dataModal').modal('show');
				}
			});
	});
	
	// sửa thông tin loai_phong
	$(document).on('click', '.id_sua_loaiphong', function(){
		var id_loai_phong_sua = $(this).attr("id");
		$.ajax({
			url:"../dulieu/fetch.php",
			method:"POST",
			data:{id_loai_phong_sua:id_loai_phong_sua},
			dataType:"json",
			success:function(data_sua_loai_phong){
				// alert(data_sua_loai_phong);
				
				$('#ma_loai_phong_sua_12').val(data_sua_loai_phong.ma_loai_phong);// tt mssv
				$('#ten_loai_phong_sua_12').val(data_sua_loai_phong.ten_loai_phong);// tt tên Loại phòng
				$('#nguoi_o_loai_phong_sua_12').val(data_sua_loai_phong.nguoi_o);// tt ngày sinh
				$('#dien_tich_loai_phong_sua_12').val(data_sua_loai_phong.dien_tich);// thông tinh giới tính
				

				$('#id_loai_phong_sua_12').val(data_sua_loai_phong.id);// id sửa tt sinnh vien
				$('#insert').val("Cập nhật");
				$('#modal_sua_loai_phong').modal('show');
			}
		});
	});
	// cap nhat tt Loại phòng
	$('#from_suathongtin_loai_phong').on('submit', function(event){
		event.preventDefault();
		if(!confirm($(this).data('confirm'))){
			event.stopImmediatePropagation();
			event.preventDefault();
		}else{
				$.ajax({
					url:"./../dulieu/update_loai_phong_moi.php",
					type:'POST',
					data:new FormData(this),
					contentType: false,
					cache: false,
					processData:false,
					success:function (kql_update_loai_phong) {
						// alert(kql_update_loai_phong);
						if (kql_update_loai_phong==6) {
			       			alert('Tên Loại phòng đã tồn tạo');
							document.getElementById("cmnd_loai_phong_sua_12").focus();
			       		}else if (kql_update_loai_phong==99) {
							alert('Cập nhật thông tin Loại phòng mới thành công');
							$('#modal_sua_loai_phong').modal('hide');
							$('#from_suathongtin_loai_phong')[0].reset();
							// $('#dulieuloai_phong').load("./../dulieu/dulieuloai_phong.php");
							location.reload();
						}else if (kql_update_loai_phong==88) {
							alert('Bạn phải chọn file ảnh');
						}else{
							alert('Lỗi Cập nhật thông tin');
						}
						// alert(kql_update_loai_phong);
			          		
					}
				});
		}
	});
	// end cập nhật thông tin Loại phòng
      // hiện thông tin xóa loai_phong
	$(document).on('click', '.xoa_loaiphong', function(){
		var id_loai_phong_sua = $(this).attr("id");
		// alert(id_loai_phong_sua);
			$.ajax({
				url:"./../dulieu/chitiet_loai_phong.php",
				method:"POST",
				data:{id_chitietloai_phong:id_loai_phong_sua},
				success:function(data1){
					$('#id_loai_phong_xoa_12').val(id_loai_phong_sua);
					$('#thongtinnv_xoa12').html(data1);
					$('#modal_xoa_loai_phong').modal('show');
				}
			});
	});
	// xử lý xoa loai_phong 
	$('#From_xoa_loai_phong').on('submit', function(event){
		event.preventDefault();
		if(!confirm($(this).data('confirm'))){
			event.stopImmediatePropagation();
			event.preventDefault();
		}else{
			var id_xoa_loai_phong123=($('#id_loai_phong_xoa_12').val());
			$.ajax({
				url:"./../dulieu/delete.php",
				method:"POST",
				data:{id_xoa_loai_phong123:id_xoa_loai_phong123},
				success:function(kq_xoa_loai_phong){
					if (kq_xoa_loai_phong==99) {
						alert('Xóa Loại phòng thành công công');
						$('#From_xoa_loai_phong')[0].reset();
						$('#modal_xoa_loai_phong').modal('hide');
						// $('#dulieuloai_phong').load("./../dulieu/dulieuloai_phong.php")
						location.reload();
					}else {
						alert('Lỗi xóa Loại phòng');
					}
					// alert(kq_xoa_loai_phong);
				}
			});
		}   
	});

	// xuwrt lý nút thêm loai_phong mới
	$('#form_themloai_phongmoi').on('submit', function(event){
		event.preventDefault();
				$.ajax({
					url:"./../dulieu/add_loai_phong_moi.php",
					type:'POST',
					data:new FormData(this),
					contentType: false,
					cache: false,
					processData:false,
					success:function (kql_add_loai_phong) {
						 if (kql_add_loai_phong==6) {
		          			alert('Tên Loại phòng đã tồn tạo');
							document.getElementById("cmnd_them_loai_phong").focus();
		          		}else if (kql_add_loai_phong==99) {
								alert('Thêm Loại phòng mới thành công');
								$('#form_themloai_phongmoi')[0].reset();
								location.reload();
						}else {
								alert('Lỗi Thêm');
						}
		          		// alert(kql_add_loai_phong);
					}
				});
	});// end xử lý thêm Loại phòng
});
