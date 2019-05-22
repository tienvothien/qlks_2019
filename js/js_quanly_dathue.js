$(document).ready(function () {
	// xử lý tìm doanh thu
	$('#from_tim_dathue').on('submit', function(event){
		event.preventDefault();
			$.ajax({
				url:"./../dulieu/dulieu_dathue.php",
				type:'POST',
				data:new FormData(this),
				contentType: false,
				cache: false,
				processData:false,
				success:function(kq_dltim_phong){
					// alert(kq_dltim_phong);
					$('#dulieu_khachhang').html(kq_dltim_phong);
				}
			});
	});

});
