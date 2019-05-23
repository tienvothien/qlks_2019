$(document).ready(function () {
	// Xem chi tiet thoong tin 1_phong
	$(document).on('click', '.view_chitietphong', function(){
		var id_chitiet1_phong = $(this).attr("id");
		// alert(id_chitiet1_phong);
			$.ajax({
				url:"./../dulieu/chitiet_1_phong.php",
				method:"POST",
				data:{id_chitiet1_phong:id_chitiet1_phong},
				success:function(data){
					$('#thongtin_chitiet1_phong').html(data);
					$('#dataModal').modal('show');
				}
			});
	});
	
	// sửa thông tin 1_phong
	$(document).on('click', '.id_sua_phong', function(){
		var id_1_phong_sua = $(this).attr("id");
		$.ajax({
			url:"../dulieu/fetch.php",
			method:"POST",
			data:{id_1_phong_sua:id_1_phong_sua},
			dataType:"json",
			success:function(data_sua_1_phong){
				
				$('#ma_1_phong_sua_12').val(data_sua_1_phong.ma_phong);// tt mssv
				$('#idloai_phong_1_phong_sua_12').val(data_sua_1_phong.id_loai_phong);// thông tinh giới tính
				$('#id_1_phong_sua_12').val(data_sua_1_phong.id);// id sửa tt sinnh vien
				$('#insert').val("Cập nhật");
				$('#modal_sua_1_phong').modal('show');
			}
		});
	});
	// cap nhat tt Loại phòng
	$('#from_suathongtin_1_phong').on('submit', function(event){
		event.preventDefault();
		if(!confirm($(this).data('confirm'))){
			event.stopImmediatePropagation();
			event.preventDefault();
		}else{
				$.ajax({
					url:"./../dulieu/update_1_phong_moi.php",
					type:'POST',
					data:new FormData(this),
					contentType: false,
					cache: false,
					processData:false,
					success:function (kql_update_1_phong) {
						if (kql_update_1_phong==6) {
		          			alert('Mã phòng đã tồn tại');
							document.getElementById("ma_1_phong_sua_12").focus();
		          		}else if (kql_update_1_phong==99) {
								alert('Cập nhật phòng mới thành công');
								$('#form_them1_phongmoi')[0].reset();
								location.reload();
						}else {
								alert('Lỗi Thêm');
						}
						// alert(kql_update_1_phong);
			          		
					}
				});
		}
	});
	// end cập nhật thông tin Loại phòng
      // hiện thông tin xóa 1_phong
	$(document).on('click', '.xoa_phong', function(){
		var id_1_phong_sua = $(this).attr("id");
		// alert(id_1_phong_sua);
			$.ajax({
				url:"./../dulieu/chitiet_1_phong.php",
				method:"POST",
				data:{id_chitiet1_phong:id_1_phong_sua},
				success:function(data1){
					$('#id_1_phong_xoa_12').val(id_1_phong_sua);
					$('#thongtinnv_xoa12').html(data1);
					$('#modal_xoa_1_phong').modal('show');
				}
			});
	});
	// xử lý xoa 1_phong 
	$('#From_xoa_1_phong').on('submit', function(event){
		event.preventDefault();
		if(!confirm($(this).data('confirm'))){
			event.stopImmediatePropagation();
			event.preventDefault();
		}else{
			var id_xoa_1_phong123=($('#id_1_phong_xoa_12').val());
			$.ajax({
				url:"./../dulieu/delete.php",
				method:"POST",
				data:{id_xoa_1_phong123:id_xoa_1_phong123},
				success:function(kq_xoa_1_phong){
					if (kq_xoa_1_phong==99) {
						alert('Xóa phòng thành công');
						$('#From_xoa_1_phong')[0].reset();
						$('#modal_xoa_1_phong').modal('hide');
						// $('#dulieu1_phong').load("./../dulieu/dulieu1_phong.php")
						location.reload();
					}else {
						alert('Lỗi xóa Loại phòng');
					}
					// alert(kq_xoa_1_phong);
				}
			});
		}   
	});

	// xuwrt lý nút thêm 1_phong mới
	$('#form_them1_phongmoi').on('submit', function(event){
		event.preventDefault();
		
				$.ajax({
					url:"./../dulieu/add_1_phong_moi.php",
					type:'POST',
					data:new FormData(this),
					contentType: false,
					cache: false,
					processData:false,
					success:function (kql_add_1_phong) {
						 if (kql_add_1_phong==6) {
		          			alert('Số phòng đã tồn tại');
							document.getElementById("ma_1_phong_themmoi123").focus();
		          		}else if (kql_add_1_phong==99) {
								alert('Thêm phòng mới thành công');
								$('#form_them1_phongmoi')[0].reset();
								location.reload();
						}else {
								alert('Lỗi Thêm');
						}
		          		// alert(kql_add_1_phong);
					}
				});
	});// end xử lý thêm Loại phòng
});
