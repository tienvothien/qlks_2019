$(document).ready(function() {
	$('#from_login1').on('submit', function (event) {
		event.preventDefault();
		var tendangnhap_login= $('#tendangnhap_login').val();
		var matkhau_login= MD5(MD5(MD5($('#matkhau_login').val())));
		$.ajax({
			url:"./../../dulieu/login.php",
			type:'POST',
			data:{tendangnhap_login:tendangnhap_login,matkhau_login:matkhau_login},
			success:function(kq_login){
				// alert(kq_login);
				if (kq_login==2) {
					alert('Tên đăng nhập không đúng');
					document.getElementById('tendangnhap_login').focus();	
				}else if (kq_login==1) {
					alert('Mật khẩu không đúng');
					document.getElementById('matkhau_login').focus();
				}else {
					alert('Đăng nhập thành cống');
					 window.location="./../index.php";
				}
			}
		});
	});
	
});