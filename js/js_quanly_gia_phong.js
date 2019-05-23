$(document).ready(function () {
	// Xem chi tiet thoong tin gia_phong
	$(document).on('click', '.view_chitietgiaphong', function(){
		var id_chitietgia_phong = $(this).attr("id");
		// alert(id_chitietgia_phong);
			$.ajax({
				url:"./../dulieu/chitiet_gia_phong.php",
				method:"POST",
				data:{id_chitietgia_phong:id_chitietgia_phong},
				success:function(data){
					$('#thongtin_chitietgia_phong').html(data);
					$('#dataModal').modal('show');
				}
			});
	});
	
	// sửa thông tin gia_phong
	$(document).on('click', '.id_sua_giaphong', function(){
		var id_gia_phong_sua = $(this).attr("id");
		// alert(id_gia_phong_sua);
		$.ajax({
			url:"../dulieu/fetch.php",
			method:"POST",
			data:{id_gia_phong_sua:id_gia_phong_sua},
			dataType:"json",
			success:function(data_sua_gia_phong){
				// alert(data_sua_gia_phong);
				// $('#ma_gia_phong_sua_12').val(data_sua_gia_phong.ma_gia_phong);// tt mssv
				$('#ten_gia_phong_sua_12').val(data_sua_gia_phong.ten_gia_phong);// tt tên Loại phòng
				$('#gia_phong_gio_sua_12').val(data_sua_gia_phong.gia_phong_gio);// tt ngày sinh
				$('#gia_phong_ngay_sua_12').val(data_sua_gia_phong.gia_phong_ngay);// thông tinh giới tính
				$('#idloai_phong_gia_phong_sua_12').val(data_sua_gia_phong.id_loai_phong);// thông tinh giới tính
				
				$('#id_gia_phong_sua_12').val(data_sua_gia_phong.id);// id sửa tt sinnh vien
				$('#insert').val("Cập nhật");
				$('#modal_sua_gia_phong').modal('show');
			}
		});
	});
	// cap nhat tt Loại phòng
	$('#from_suathongtin_gia_phong').on('submit', function(event){
		event.preventDefault();
		if(!confirm($(this).data('confirm'))){
			event.stopImmediatePropagation();
			event.preventDefault();
		}else{
				$.ajax({
					url:"./../dulieu/update_gia_phong_moi.php",
					type:'POST',
					data:new FormData(this),
					contentType: false,
					cache: false,
					processData:false,
					success:function (kql_update_gia_phong) {
						if (kql_update_gia_phong==6) {
		          			alert('Tên giá phòng đã tồn tại');
							document.getElementById("ten_gia_phong_sua_12").focus();
		          		}else if (kql_update_gia_phong==1) {
		          			alert('Giá phòng giờ phải lớn hơn 50,000 VNĐ');
							document.getElementById("gia_phong_gio_sua_12").focus();
		          		}else if (kql_update_gia_phong==2) {
		          			alert('Giá phòng ngày phải lớn hơn 50,000 VNĐ');
							document.getElementById("gia_phong_ngay_sua_12").focus();
		          		}else if (kql_update_gia_phong==99) {
								alert('Cập nhật giá phòng mới thành công');
								$('#form_themgia_phongmoi')[0].reset();
								location.reload();
						}else {
								alert('Lỗi Thêm');
						}
						// alert(kql_update_gia_phong);
			          		
					}
				});
		}
	});
	// end cập nhật thông tin Loại phòng
      // hiện thông tin xóa gia_phong
	$(document).on('click', '.xoa_giaphong', function(){
		var id_gia_phong_sua = $(this).attr("id");
		// alert(id_gia_phong_sua);
			$.ajax({
				url:"./../dulieu/chitiet_gia_phong.php",
				method:"POST",
				data:{id_chitietgia_phong:id_gia_phong_sua},
				success:function(data1){
					$('#id_gia_phong_xoa_12').val(id_gia_phong_sua);
					$('#thongtinnv_xoa12').html(data1);
					$('#modal_xoa_gia_phong').modal('show');
				}
			});
	});
	// xử lý xoa gia_phong 
	$('#From_xoa_gia_phong').on('submit', function(event){
		event.preventDefault();
		if(!confirm($(this).data('confirm'))){
			event.stopImmediatePropagation();
			event.preventDefault();
		}else{
			var id_xoa_gia_phong123=($('#id_gia_phong_xoa_12').val());
			$.ajax({
				url:"./../dulieu/delete.php",
				method:"POST",
				data:{id_xoa_gia_phong123:id_xoa_gia_phong123},
				success:function(kq_xoa_gia_phong){
					if (kq_xoa_gia_phong==99) {
						alert('Xóa giá phòng thành công');
						$('#From_xoa_gia_phong')[0].reset();
						$('#modal_xoa_gia_phong').modal('hide');
						// $('#dulieugia_phong').load("./../dulieu/dulieugia_phong.php")
						location.reload();
					}else {
						alert('Lỗi xóa Loại phòng');
					}
					// alert(kq_xoa_gia_phong);
				}
			});
		}   
	});

	// xuwrt lý nút thêm gia_phong mới
	$('#form_themgia_phongmoi').on('submit', function(event){
		event.preventDefault();
		
				$.ajax({
					url:"./../dulieu/add_gia_phong_moi.php",
					type:'POST',
					data:new FormData(this),
					contentType: false,
					cache: false,
					processData:false,
					success:function (kql_add_gia_phong) {
						 if (kql_add_gia_phong==6) {
		          			alert('Tên giá phòng đã tồn tại');
							document.getElementById("ten_gia_phongthemmoi_12").focus();
		          		}else if (kql_add_gia_phong==1) {
		          			alert('Giá phòng giờ phải lớn hơn 50,000 VNĐ');
							document.getElementById("gia_phong_giothemmoi_12").focus();
		          		}else if (kql_add_gia_phong==2) {
		          			alert('Giá phòng ngày phải lớn hơn 50,000 VNĐ');
							document.getElementById("gia_phong_ngaythemmoi_12").focus();
		          		}else if (kql_add_gia_phong==99) {
								alert('Thêm giá phòng mới thành công');
								$('#form_themgia_phongmoi')[0].reset();
								location.reload();
						}else {
								alert('Lỗi Thêm');
						}
		          		// alert(kql_add_gia_phong);
					}
				});
	});// end xử lý thêm Loại phòng
});
