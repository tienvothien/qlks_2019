$(document).ready(function () {
	$(function() {	
		$("#file_anh_sv").change(function() {
			var file = this.files[0];
			var imagefile = file.type;
			var match= ["image/jpeg","image/png","image/jpg"];
			if(!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2]))){
				$('#previewing_themsvload').attr('src','adasdas');
				alert("Bạn phải chọn file ảnh có đuôi là (jpeg, jpg and png)");
				// $("#message").html("<p id='error'>Bạn phải chọn pha</p>"+"<h4>Note</h4>"+"<span id='error_message'>Only  Images type allowed</span>");
				return false;
			}else{
				var reader = new FileReader();
				reader.onload = imageIsLoaded;
				reader.readAsDataURL(this.files[0]);
			}
		});
		function imageIsLoaded(e) {
			$("#file_anh_sv").css("color","green");
			$('#image_preview_themssv').css("display", "block");
			$('#previewing_themsvload').attr('src', e.target.result);
			$('#previewing_themsvload').attr('width', '100px');
			$('#previewing_themsvload').attr('height', '130px');
		};
		$("#file_anh_sv_sua").change(function() {
			var file = this.files[0];
			var imagefile = file.type;
			var match= ["image/jpeg","image/png","image/jpg"];
			if(!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2]))){
				$('#previewing_nhan_vien_sua123_load').attr('src','ấdasd');
				alert("Bạn phải chọn file ảnh có đuôi là (jpeg, jpg and png)");
				// $("#message").html("<p id='error'>Bạn phải chọn pha</p>"+"<h4>Note</h4>"+"<span id='error_message'>Only  Images type allowed</span>");
				return false;
			}else{
				var reader = new FileReader();
				reader.onload = imageIsLoaded2;
				reader.readAsDataURL(this.files[0]);
			}
		});
		function imageIsLoaded2(e) {
			$("#file_anh_sv_sua").css("color","green");
			$('#image_preview_sinhvien_sua123').css("display", "block");
			$('#previewing_nhan_vien_sua123_load').attr('src', e.target.result);
			$('#previewing_nhan_vien_sua123_load').attr('width', '100px');
			$('#previewing_nhan_vien_sua123_load').attr('height', '130px');
			$('#previewing_nhan_vien_sua123_load').attr('border', '1px solid #d8d8d8');
		};
		// nêu tỉnh thay đổi sẽ  chọn huyện thay đổi
		$('#tinh_them_nhan_vien').change(function() {
			var tinh_them_nhan_vien=$('#tinh_them_nhan_vien').val();
			$.ajax({
				url:"./../dulieu/xuly_chon_hktt.php",
				type: "post",
				data: {tinh_them_nhan_vien:tinh_them_nhan_vien},
				async:true,
				success:function(kq){
					$("#huyen_them_nhan_vien").html(kq);
					$("#xa_them_nhan_vien").html('<option value="">Chọn xã</option>');
				}
			});
		}); // end nêu tỉnh thay đổi sẽ  chọn huyện thay đổi
		// nêu tỉnh , huyện thay đổi sẽ  chọn xã thay đổi
		$('#huyen_them_nhan_vien').change(function() {
			var huyen_them_nhan_vien=$('#huyen_them_nhan_vien').val();
			$.ajax({
				url:"../dulieu/xuly_chon_hktt.php",
				type: "post",
				data: {huyen_them_nhan_vien:huyen_them_nhan_vien},
				async:true,
				success:function(kq){
					$("#xa_them_nhan_vien").html(kq);
				}
			});
		});//end  nêu tỉnh , huyện thay đổi sẽ  chọn xã thay đổi
		// nêu CMND thay đổi sẽ  chọn xã thay đổi
		$('#cmnd_them_nhan_vien').change(function() {
			var cmnd_them_nhan_vien=$('#cmnd_them_nhan_vien').val();
			if (cmnd_them_nhan_vien.length!=9) {
				alert('Số chứng minh nhân dân phải 9 chữ số');
				document.getElementById('cmnd_them_nhan_vien').focus();
			}
		});//end  nêu CMND thay đổi sẽ  chọn xã thay đổi
		// nêu CMND thay đổi sẽ  chọn xã thay đổi
		$('#so_dt_them_nhan_vien').change(function() {
			var so_dt_them_nhan_vien=$('#so_dt_them_nhan_vien').val();
			if (so_dt_them_nhan_vien.length!=10 || $('#so_dt_them_nhan_vien').val().slice(0, 1)!=0) {
				alert('Số chứng minh nhân dân phải 9 chữ số và phải bắt đầu là số 0');
				document.getElementById('so_dt_them_nhan_vien').focus();
			}
		});//end  nêu CMND thay đổi sẽ  chọn xã thay đổi
		
	});
	// Xem chi tiet thoong tin nhan_vien
	$(document).on('click', '.view_chitietnhanvien', function(){
		var id_chitietnhan_vien = $(this).attr("id");
		// alert(id_chitietnhan_vien);
			$.ajax({
				url:"./../dulieu/chitiet_nhan_vien.php",
				method:"POST",
				data:{id_chitietnhan_vien:id_chitietnhan_vien},
				success:function(data){
					$('#thongtin_chitietnhan_vien').html(data);
					$('#dataModal').modal('show');
				}
			});
	});
	// nêu tỉnh thay đổi sẽ  chọn huyện thay đổi
		$('#tinh_nhan_vien_sua_12').change(function() {
			var tinh_them_nhan_vien=$('#tinh_nhan_vien_sua_12').val();
			$.ajax({
				url:"./../dulieu/xuly_chon_hktt.php",
				type: "post",
				data: {tinh_them_nhan_vien:tinh_them_nhan_vien},
				async:true,
				success:function(kq){
					$("#huyen_nhan_vien_sua_12").html(kq);
					$("#xa_nhan_vien_sua_12").html('<option value="">Chọn xã</option>');
				}
			});
		}); // end nêu tỉnh thay đổi sẽ  chọn huyện thay đổi
		// nêu tỉnh , huyện thay đổi sẽ  chọn xã thay đổi
		$('#huyen_nhan_vien_sua_12').change(function() {
			var huyen_them_nhan_vien=$('#huyen_nhan_vien_sua_12').val();
			$.ajax({
				url:"../dulieu/xuly_chon_hktt.php",
				type: "post",
				data: {huyen_them_nhan_vien:huyen_them_nhan_vien},
				async:true,
				success:function(kq){
					$("#xa_nhan_vien_sua_12").html(kq);
				}
			});
		});//end  nêu tỉnh , huyện thay đổi sẽ  chọn xã thay đổi
	// sửa thông tin nhan_vien
	$(document).on('click', '.id_sua_nhanvien', function(){
		var id_nhan_vien_sua = $(this).attr("id");
		// alert(id_nhan_vien_sua);
		// hiện thông tin xã
		$.ajax({
				url:"../dulieu/xuly_chon_hktt.php",
				type: "post",
				data: {id_nhan_vien_sua:id_nhan_vien_sua},
				async:true,
				success:function(kq){
					$("#xa_nhan_vien_sua_12").html(kq);
				}
			});
		// end hiện thông tin xã
		// hiện thông tin huyện
		$.ajax({
				url:"../dulieu/xuly_chon_hktt.php",
				type: "post",
				data: {id_nhan_vien_sua_huyen:id_nhan_vien_sua},
				async:true,
				success:function(kq){
					$("#huyen_nhan_vien_sua_12").html(kq);
				}
			});
		// end hiện thông tin huyện
		
		$.ajax({
			url:"../dulieu/fetch.php",
			method:"POST",
			data:{id_nhan_vien_sua:id_nhan_vien_sua},
			dataType:"json",
			success:function(data_sua_nhan_vien){
				// alert(data_sua_nhan_vien);
				$('#file_anh_sv_sua').attr("value",data_sua_nhan_vien.anhcanhan);// tt hinh ảnh
				$('#previewing_nhan_vien_sua123_load').attr('src','./../images/'+data_sua_nhan_vien.anhcanhan);
				$('#ma_nhan_vien_sua_12').val(data_sua_nhan_vien.ma_nhan_vien);// tt mssv
				$('#ho_nhan_vien_sua_12').val(data_sua_nhan_vien.ho_nhan_vien);// tt ho sv
				$('#ten_nhan_vien_sua_12').val(data_sua_nhan_vien.ten_nhan_vien);// tt tên nhân viên
				$('#ngaysinh_nhan_vien_sua_12').val(data_sua_nhan_vien.ngay_sinh);// tt ngày sinh
				$('#gioitinh_nhan_vien_sua_12').val(data_sua_nhan_vien.gioi_tinh);// thông tinh giới tính
				$('#quequan_nhan_vien_sua_12').val(data_sua_nhan_vien.que_quan);// tt quê quán
				$('#cmnd_nhan_vien_sua_12').val(data_sua_nhan_vien.cmnd);// tt số cmnd
				$('#ngay_capcnnd_nhan_vien_sua_12').val(data_sua_nhan_vien.ngay_cap); // tt ngay cấp cmnd
				$('#noicap_nhan_vien_sua_12').val(data_sua_nhan_vien.noicap);// tt nơi cấp cmnd
				$('#tinh_nhan_vien_sua_12').val(data_sua_nhan_vien.matinh);// tt tỉnh
				$('#sonha_nhan_vien_sua_12').val(data_sua_nhan_vien.sonha);// tt số nhà
				$('#so_dt_nhan_vien_sua_12').val(data_sua_nhan_vien.so_dien_thoai);// tt sdt

				$('#id_nhan_vien_sua_12').val(data_sua_nhan_vien.id);// id sửa tt sinnh vien
				$('#insert').val("Cập nhật");
				$('#modal_sua_nhan_vien').modal('show');
			}
		});
	});
	// cap nhat tt nhân viên
	$('#from_suathongtin_nhan_vien').on('submit', function(event){
		event.preventDefault();
		if(!confirm($(this).data('confirm'))){
			event.stopImmediatePropagation();
			event.preventDefault();
		}else{
			if ($('#cmnd_nhan_vien_sua_12').val().length!=9) {
				alert('Chứ minh nhân dân phải 9 chữ số');
				document.getElementById('cmnd_nhan_vien_sua_12').focus();
			}else if ( $('#so_dt_nhan_vien_sua_12').val().length!='' && ($('#so_dt_nhan_vien_sua_12').val().length!=10 || document.getElementById('so_dt_nhan_vien_sua_12').value.slice(0, 1)!=0)) {
				alert('Số điện thoại nhân viên phải 10 số và bất đầu là số "0"');
				document.getElementById('so_dt_nhan_vien_sua_12').focus();
			}else {
				$.ajax({
					url:"./../dulieu/update_nhan_vien_moi.php",
					type:'POST',
					data:new FormData(this),
					contentType: false,
					cache: false,
					processData:false,
					success:function (kql_update_nhan_vien) {
						// alert(kql_update_nhan_vien);
						if (kql_update_nhan_vien==6) {
			       			alert('Số CMND nhân viên đã tồn tạo');
							document.getElementById("cmnd_nhan_vien_sua_12").focus();
			       		}else if (kql_update_nhan_vien==2) {
			       			alert('Số điện thoại nhân viên đã tồn tạo');
							document.getElementById("so_dt_nhan_vien_sua_12").focus();
			       		}else if (kql_update_nhan_vien==99) {
							alert('Cập nhật thông tin nhân viên mới thành công');
							$('#modal_sua_nhan_vien').modal('hide');
							$('#from_suathongtin_nhan_vien')[0].reset();
							// $('#dulieunhan_vien').load("./../dulieu/dulieunhan_vien.php");
							location.reload();
						}else if (kql_update_nhan_vien==88) {
							alert('Bạn phải chọn file ảnh');
						}else{
							alert('Lỗi Cập nhật thông tin');
						}
			          		
					}
				});
		     }
		}
	});
	// end cập nhật thông tin nhân viên
      // hiện thông tin xóa nhan_vien
	$(document).on('click', '.xoa_nhanvien', function(){
		var id_nhan_vien_sua = $(this).attr("id");
		// alert(id_nhan_vien_sua);
			$.ajax({
				url:"./../dulieu/chitiet_nhan_vien.php",
				method:"POST",
				data:{id_chitietnhan_vien:id_nhan_vien_sua},
				success:function(data1){
					$('#id_nhan_vien_xoa_12').val(id_nhan_vien_sua);
					$('#thongtinnv_xoa12').html(data1);
					$('#modal_xoa_nhan_vien').modal('show');
				}
			});
	});
	// xử lý xoa nhan_vien 
	$('#From_xoa_nhan_vien').on('submit', function(event){
		event.preventDefault();
		if(!confirm($(this).data('confirm'))){
			event.stopImmediatePropagation();
			event.preventDefault();
		}else{
			var id_xoa_nhan_vien123=($('#id_nhan_vien_xoa_12').val());
			$.ajax({
				url:"./../dulieu/delete.php",
				method:"POST",
				data:{id_xoa_nhan_vien123:id_xoa_nhan_vien123},
				success:function(kq_xoa_nhan_vien){
					if (kq_xoa_nhan_vien==99) {
						alert('Xóa nhân viên thành công công');
						$('#From_xoa_nhan_vien')[0].reset();
						$('#modal_xoa_nhan_vien').modal('hide');
						// $('#dulieunhan_vien').load("./../dulieu/dulieunhan_vien.php")
						location.reload();
					}else {
						alert('Lỗi xóa nhân viên');
					}
					// alert(kq_xoa_nhan_vien);
				}
			});
		}   
	});

	// xuwrt lý nút thêm nhan_vien mới
	$('#form_themnhan_vienmoi').on('submit', function(event){
		event.preventDefault();
		var anh1 = document.getElementById('file_anh_sv');
		var loaianh = anh1.files[0].type;
		var match= ["image/jpeg","image/png","image/jpg"];
		if(!((loaianh==match[0]) || (loaianh==match[1]) || (loaianh==match[2]))){
				alert("Bạn phải chọn file ảnh có đuôi là (jpeg, jpg and png)");
		}else{
			if ($('#cmnd_them_nhan_vien').val().length!=9) {
				alert('Chứ minh nhân dân phải 9 chữ số');
				document.getElementById('cmnd_them_nhan_vien').focus();
			}else if ($('#so_dt_them_nhan_vien').val().length!='' &&($('#so_dt_them_nhan_vien').val().length!=10 || $('#so_dt_them_nhan_vien').val().slice(0, 1)!=0)) {
				alert('Số điện thoại phải 10 số và bất đầu là số "0" và bất đầu là số "0"');
				document.getElementById('so_dt_them_nhan_vien').focus();
			}else {
				$.ajax({
					url:"./../dulieu/add_nhan_vien_moi.php",
					type:'POST',
					data:new FormData(this),
					contentType: false,
					cache: false,
					processData:false,
					success:function (kql_add_nhan_vien) {
						 if (kql_add_nhan_vien==6) {
		          			alert('Số CMND nhân viên đã tồn tạo');
							document.getElementById("cmnd_them_nhan_vien").focus();
		          		}else if (kql_add_nhan_vien==2) {
		          			alert('Số điện thoại nhân viên đã tồn tạo');
							document.getElementById("so_dt_them_nhan_vien").focus();
		          		}else if (kql_add_nhan_vien==99) {
								alert('Thêm nhân viên mới thành công');
								$('#form_themnhan_vienmoi')[0].reset();
								location.reload();
						}else {
								alert('Lỗi Thêm');
						}
		          		// alert(kql_add_nhan_vien);
					}
				});
	     	}
		}
	});// end xử lý thêm nhân viên
});
