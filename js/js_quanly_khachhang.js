$(document).ready(function () {
	$(function() {	
		// nêu tỉnh thay đổi sẽ  chọn huyện thay đổi
		$('#tinh_them_khach_hang').change(function() {
			var tinh_them_khach_hang=$('#tinh_them_khach_hang').val();
			$.ajax({
				url:"./../dulieu/xuly_chon_hktt.php",
				type: "post",
				data: {tinh_them_nhan_vien:tinh_them_khach_hang},
				async:true,
				success:function(kq){
					$("#huyen_them_khach_hang").html(kq);
					$("#xa_them_khach_hang").html('<option value="">Chọn xã</option>');
				}
			});
		}); // end nêu tỉnh thay đổi sẽ  chọn huyện thay đổi
		// nêu tỉnh , huyện thay đổi sẽ  chọn xã thay đổi
		$('#huyen_them_khach_hang').change(function() {
			var huyen_them_khach_hang=$('#huyen_them_khach_hang').val();
			$.ajax({
				url:"../dulieu/xuly_chon_hktt.php",
				type: "post",
				data: {huyen_them_nhan_vien:huyen_them_khach_hang},
				async:true,
				success:function(kq){
					$("#xa_them_khach_hang").html(kq);
				}
			});
		});//end  nêu tỉnh , huyện thay đổi sẽ  chọn xã thay đổi
		// nêu CMND thay đổi sẽ  chọn xã thay đổi
		$('#cmnd_them_khach_hang').change(function() {
			var cmnd_them_khach_hang=$('#cmnd_them_khach_hang').val();
			if (cmnd_them_khach_hang.length!=9) {
				alert('Số chứng minh nhân dân phải 9 chữ số');
				document.getElementById('cmnd_them_khach_hang').focus();
			}
		});//end  nêu CMND thay đổi sẽ  chọn xã thay đổi
		// nêu CMND thay đổi sẽ  chọn xã thay đổi
		$('#so_dt_them_khach_hang').change(function() {
			var so_dt_them_khach_hang=$('#so_dt_them_khach_hang').val();
			if (so_dt_them_khach_hang.length!=10 || $('#so_dt_them_khach_hang').val().slice(0, 1)!=0) {
				alert('Số chứng minh nhân dân phải 9 chữ số và phải bắt đầu là số 0');
				document.getElementById('so_dt_them_khach_hang').focus();
			}
		});//end  nêu CMND thay đổi sẽ  chọn xã thay đổi
		
	});
	// Xem chi tiet thoong tin khach_hang
	$(document).on('click', '.view_chitietkhachhang', function(){
		var id_chitietkhach_hang = $(this).attr("id");
		// alert(id_chitietkhach_hang);
			$.ajax({
				url:"./../dulieu/chitiet_khach_hang.php",
				method:"POST",
				data:{id_chitietkhach_hang:id_chitietkhach_hang},
				success:function(data){
					$('#thongtin_chitietkhach_hang').html(data);
					$('#dataModal').modal('show');
				}
			});
	});
	// nêu tỉnh thay đổi sẽ  chọn huyện thay đổi
		$('#tinh_khach_hang_sua_12').change(function() {
			var tinh_them_khach_hang=$('#tinh_khach_hang_sua_12').val();
			$.ajax({
				url:"./../dulieu/xuly_chon_hktt.php",
				type: "post",
				data: {tinh_them_nhan_vien:tinh_them_khach_hang},
				async:true,
				success:function(kq){
					$("#huyen_khach_hang_sua_12").html(kq);
					$("#xa_khach_hang_sua_12").html('<option value="">Chọn xã</option>');
				}
			});
		}); // end nêu tỉnh thay đổi sẽ  chọn huyện thay đổi
		// nêu tỉnh , huyện thay đổi sẽ  chọn xã thay đổi
		$('#huyen_khach_hang_sua_12').change(function() {
			var huyen_them_khach_hang=$('#huyen_khach_hang_sua_12').val();
			$.ajax({
				url:"../dulieu/xuly_chon_hktt.php",
				type: "post",
				data: {huyen_them_nhan_vien:huyen_them_khach_hang},
				async:true,
				success:function(kq){
					$("#xa_khach_hang_sua_12").html(kq);
				}
			});
		});//end  nêu tỉnh , huyện thay đổi sẽ  chọn xã thay đổi
	// sửa thông tin khach_hang
	$(document).on('click', '.id_sua_khachhang', function(){
		var id_khach_hang_sua = $(this).attr("id");
		// alert(id_khach_hang_sua);
		// hiện thông tin xã
		$.ajax({
				url:"../dulieu/xuly_chon_hktt.php",
				type: "post",
				data: {id_khach_hang_sua:id_khach_hang_sua},
				async:true,
				success:function(kq){
					$("#xa_khach_hang_sua_12").html(kq);
				}
			});
		// end hiện thông tin xã
		// hiện thông tin huyện
		$.ajax({
				url:"../dulieu/xuly_chon_hktt.php",
				type: "post",
				data: {id_khach_hang_sua_huyen:id_khach_hang_sua},
				async:true,
				success:function(kq){
					$("#huyen_khach_hang_sua_12").html(kq);
				}
			});
		// end hiện thông tin huyện
		
		$.ajax({
			url:"../dulieu/fetch.php",
			method:"POST",
			data:{id_khach_hang_sua:id_khach_hang_sua},
			dataType:"json",
			success:function(data_sua_khach_hang){
				// alert(data_sua_khach_hang);
				
				$('#ma_khach_hang_sua_12').val(data_sua_khach_hang.ma_khach_hang);// tt mssv
				$('#ho_khach_hang_sua_12').val(data_sua_khach_hang.ho_khach_hang);// tt ho sv
				$('#ten_khach_hang_sua_12').val(data_sua_khach_hang.ten_khach_hang);// tt tên khách hàng
				$('#ngaysinh_khach_hang_sua_12').val(data_sua_khach_hang.ngay_sinh);// tt ngày sinh
				$('#gioitinh_khach_hang_sua_12').val(data_sua_khach_hang.gioi_tinh);// thông tinh giới tính
				$('#quequan_khach_hang_sua_12').val(data_sua_khach_hang.que_quan);// tt quê quán
				$('#cmnd_khach_hang_sua_12').val(data_sua_khach_hang.cmnd);// tt số cmnd
				$('#ngay_capcnnd_khach_hang_sua_12').val(data_sua_khach_hang.ngay_cap); // tt ngay cấp cmnd
				$('#noicap_khach_hang_sua_12').val(data_sua_khach_hang.noicap);// tt nơi cấp cmnd
				$('#tinh_khach_hang_sua_12').val(data_sua_khach_hang.matinh);// tt tỉnh
				$('#sonha_khach_hang_sua_12').val(data_sua_khach_hang.sonha);// tt số nhà
				$('#so_dt_khach_hang_sua_12').val(data_sua_khach_hang.so_dien_thoai);// tt sdt

				$('#id_khach_hang_sua_12').val(data_sua_khach_hang.id);// id sửa tt sinnh vien
				$('#insert').val("Cập nhật");
				$('#modal_sua_khach_hang').modal('show');
			}
		});
	});
	// cap nhat tt khách hàng
	$('#from_suathongtin_khach_hang').on('submit', function(event){
		event.preventDefault();
		if(!confirm($(this).data('confirm'))){
			event.stopImmediatePropagation();
			event.preventDefault();
		}else{
			if ($('#cmnd_khach_hang_sua_12').val().length!=9) {
				alert('Chứ minh nhân dân phải 9 chữ số');
				document.getElementById('cmnd_khach_hang_sua_12').focus();
			}else if ( $('#so_dt_khach_hang_sua_12').val().length!='' && ($('#so_dt_khach_hang_sua_12').val().length!=10 || document.getElementById('so_dt_khach_hang_sua_12').value.slice(0, 1)!=0)) {
				alert('Số điện thoại khách hàng phải 10 số và bất đầu là số "0"');
				document.getElementById('so_dt_khach_hang_sua_12').focus();
			}else {
				$.ajax({
					url:"./../dulieu/update_khach_hang_moi.php",
					type:'POST',
					data:new FormData(this),
					contentType: false,
					cache: false,
					processData:false,
					success:function (kql_update_khach_hang) {
						// alert(kql_update_khach_hang);
						if (kql_update_khach_hang==6) {
			       			alert('Số CMND khách hàng đã tồn tạo');
							document.getElementById("cmnd_khach_hang_sua_12").focus();
			       		}else if (kql_update_khach_hang==2) {
			       			alert('Số điện thoại khách hàng đã tồn tạo');
							document.getElementById("so_dt_khach_hang_sua_12").focus();
			       		}else if (kql_update_khach_hang==99) {
							alert('Cập nhật thông tin khách hàng mới thành công');
							$('#modal_sua_khach_hang').modal('hide');
							$('#from_suathongtin_khach_hang')[0].reset();
							// $('#dulieukhach_hang').load("./../dulieu/dulieukhach_hang.php");
							location.reload();
						}else if (kql_update_khach_hang==88) {
							alert('Bạn phải chọn file ảnh');
						}else{
							alert('Lỗi Cập nhật thông tin');
						}
			          		
					}
				});
		     }
		}
	});
	// end cập nhật thông tin khách hàng
      // hiện thông tin xóa khach_hang
	$(document).on('click', '.xoa_khachhang', function(){
		var id_khach_hang_sua = $(this).attr("id");
		// alert(id_khach_hang_sua);
			$.ajax({
				url:"./../dulieu/chitiet_khach_hang.php",
				method:"POST",
				data:{id_chitietkhach_hang:id_khach_hang_sua},
				success:function(data1){
					$('#id_khach_hang_xoa_12').val(id_khach_hang_sua);
					$('#thongtinnv_xoa12').html(data1);
					$('#modal_xoa_khach_hang').modal('show');
				}
			});
	});
	// xử lý xoa khach_hang 
	$('#From_xoa_khach_hang').on('submit', function(event){
		event.preventDefault();
		if(!confirm($(this).data('confirm'))){
			event.stopImmediatePropagation();
			event.preventDefault();
		}else{
			var id_xoa_khach_hang123=($('#id_khach_hang_xoa_12').val());
			$.ajax({
				url:"./../dulieu/delete.php",
				method:"POST",
				data:{id_xoa_khach_hang123:id_xoa_khach_hang123},
				success:function(kq_xoa_khach_hang){
					if (kq_xoa_khach_hang==99) {
						alert('Xóa khách hàng thành công công');
						$('#From_xoa_khach_hang')[0].reset();
						$('#modal_xoa_khach_hang').modal('hide');
						// $('#dulieukhach_hang').load("./../dulieu/dulieukhach_hang.php")
						location.reload();
					}else {
						alert('Lỗi xóa khách hàng');
					}
					// alert(kq_xoa_khach_hang);
				}
			});
		}   
	});

	// xuwrt lý nút thêm khach_hang mới
	$('#form_themkhach_hangmoi').on('submit', function(event){
		event.preventDefault();
		
			if ($('#cmnd_them_khach_hang').val().length!=9) {
				alert('Chứ minh nhân dân phải 9 chữ số');
				document.getElementById('cmnd_them_khach_hang').focus();
			}else if ($('#so_dt_them_khach_hang').val().length!='' &&($('#so_dt_them_khach_hang').val().length!=10 || $('#so_dt_them_khach_hang').val().slice(0, 1)!=0)) {
				alert('Số điện thoại phải 10 số và bất đầu là số "0" và bất đầu là số "0"');
				document.getElementById('so_dt_them_khach_hang').focus();
			}else {
				$.ajax({
					url:"./../dulieu/add_khach_hang_moi.php",
					type:'POST',
					data:new FormData(this),
					contentType: false,
					cache: false,
					processData:false,
					success:function (kql_add_khach_hang) {
						 if (kql_add_khach_hang==6) {
		          			alert('Số CMND khách hàng đã tồn tạo');
							document.getElementById("cmnd_them_khach_hang").focus();
		          		}else if (kql_add_khach_hang==2) {
		          			alert('Số điện thoại khách hàng đã tồn tạo');
							document.getElementById("so_dt_them_khach_hang").focus();
		          		}else if (kql_add_khach_hang==99) {
								alert('Thêm khách hàng mới thành công');
								$('#form_themkhach_hangmoi')[0].reset();
								location.reload();
						}else {
								alert('Lỗi Thêm');
						}
		          		// alert(kql_add_khach_hang);
					}
				});
	     	}
	});// end xử lý thêm khách hàng
});
