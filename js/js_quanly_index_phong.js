$(document).ready(function () {
	$('#cmnd_index_phong_sua_12').change(function() {
		if ($('#cmnd_index_phong_sua_12').val().length!=9) {
			alert('Số chứng minh phải 9 chữ số');
			document.getElementById('cmnd_index_phong_sua_12').focus();
		}else {
			var cmnd_index_phong_sua_12 = $('#cmnd_index_phong_sua_12').val();
			 $.ajax({
                     url:"./../dulieu/chitiet_khach_hang.php",
                     method:"POST",
                     data:{cmnd_index_phong_sua_12:cmnd_index_phong_sua_12},
                     success:function(data){
                          $('#tt_khachthue').html(data);
                     }
                });
			}
		});
	// Xem chi tiet thoong tin index_phong
	$(document).on('click', '.view_chitietthuephong', function(){
		var id_chitietindex_phong = $(this).attr("id");
		// alert(id_chitietindex_phong);
			$.ajax({
				url:"./../dulieu/dulieu_dangthue.php",
				method:"POST",
				data:{id_chitietindex_phong:id_chitietindex_phong},
				success:function(data){
					$('#thongtin_chitietindex_phong').html(data);
					$('#dataModal').modal('show');
				}
			});
	});
	// sửa thông tin index_phong
	$(document).on('click', '.id_sua_thuephong', function(){
		var id_index_phong_sua = $(this).attr("id");
		// alert(id_index_phong_sua);
		$.ajax({
			url:"../dulieu/fetch.php",
			method:"POST",
			data:{id_index_phong_sua:id_index_phong_sua},
			dataType:"json",
			success:function(data_sua_index_phong){
				var gia_gio= FormatNumber(data_sua_index_phong.gia_phong_gio);
				var gia_phong_ngay= FormatNumber(data_sua_index_phong.gia_phong_ngay);
				$('#ma_index_phong_sua_12').val(data_sua_index_phong.ma_phong);// tt mssv
				$('#idloai_phong_index_phong_sua_12').val(data_sua_index_phong.id_loai_phong);// thông tinh giới tính
				$('#id_index_phong_sua_12').val(data_sua_index_phong.id);// id sửa tt sinnh vien
				$('#gia_gio_index_phong_sua_12').val(gia_gio);// id sửa tt sinnh vien
				$('#gia_ngay_ma_index_phong_sua_12').val(gia_phong_ngay);// id sửa tt sinnh vien
				$('#insert').val("Thuê");
				$('#modal_sua_index_phong').modal('show');
			}
		});
	});
	// cap nhat tt Loại phòng
	$('#from_suathongtin_index_phong').on('submit', function(event){
		event.preventDefault();
		if(!confirm($(this).data('confirm'))){
			event.stopImmediatePropagation();
			event.preventDefault();
		}else{
				$.ajax({
					url:"./../dulieu/update_index_phong_moi.php",
					type:'POST',
					data:new FormData(this),
					contentType: false,
					cache: false,
					processData:false,
					success:function (kql_update_index_phong) {
						if (kql_update_index_phong==6) {
		          			alert('Số CMND không tồn tạo');
							document.getElementById("cmnd_index_phong_sua_12").focus();
		          		}else if (kql_update_index_phong==1) {
		          			alert('Lỗi vì Phòng đầy');
							$("#cmnd_index_phong_sua_12").val("");
							$('#tt_khachthue').html("");
		          		}else if (kql_update_index_phong==101) {
		          			alert('Lỗi vì Khách đang thuê phòng');
							$("#cmnd_index_phong_sua_12").val("");
							$('#tt_khachthue').html("");
		          		}else if (kql_update_index_phong==99) {
								alert('Cập nhật phòng mới thành công');
								$('#form_themindex_phongmoi')[0].reset();
								location.reload();
						}else {
								alert('Lỗi Thêm');
						}
						// alert(kql_update_index_phong);
			          		
					}
				});
		}
	});
	// end cập nhật thông tin Loại phòng
 //      // hiện thông tin xóa index_phong
	$(document).on('click', '.xoa_thuephong', function(){
		var id_index_phong_sua = $(this).attr("id");
		// alert(id_index_phong_sua);
			$.ajax({// hiện thoonh tin khách thuê phòng
				url:"./../dulieu/dulieu_dangthue.php",
				method:"POST",
				data:{id_chitietindex_phong:id_index_phong_sua},
				success:function(data1){
					$('#id_index_phong_xoa_12').val(id_index_phong_sua);
					$('#thongtinnv_xoa12').html(data1);
					$('#modal_xoa_index_phong').modal('show');
				}
			});// end hiện thông tin khách thuê phòng
			$.ajax({// hiện thông tin phòng
				url:"./../dulieu/chitiet_loaiptinhtien.php",
				method:"POST",
				data:{id_chitiet1_phong:id_index_phong_sua},
				success:function(data11){
					$('#tt_loaiphong').html(data11);
				}
			});// hiện thông tin phòng
			$.ajax({// hiện thông tin phòng
				url:"./../dulieu/chitiet_loaiptinhtien.php",
				method:"POST",
				data:{id_chitiet1_phong_o12:id_index_phong_sua},
				success:function(data11){
					$('#tt_tien').html(data11);
				}
			});// hiện thông tin phòng
	});
	// xử lý xoa index_phong 
	$('#From_xoa_index_phong').on('submit', function(event){
		event.preventDefault();
		if(!confirm($(this).data('confirm'))){
			event.stopImmediatePropagation();
			event.preventDefault();
		}else{
			var id_xoa_index_phong123=($('#id_index_phong_xoa_12').val());
			$.ajax({
				url:"./../dulieu/tinhtien_traphong.php",
				method:"POST",
				data:{id_xoa_index_phong123:id_xoa_index_phong123},
				success:function(kq_xoa_index_phong){
					// if (kq_xoa_index_phong==99) {
					// 	alert('Xóa phòng thành công công');
					// 	$('#From_xoa_index_phong')[0].reset();
					// 	$('#modal_xoa_index_phong').modal('hide');
					// 	// $('#dulieuindex_phong').load("./../dulieu/dulieuindex_phong.php")
					// 	location.reload();
					// }else {
					// 	alert('Lỗi xóa Loại phòng');
					// }
					alert(kq_xoa_index_phong);
				}
			});
		}   
	});

});
