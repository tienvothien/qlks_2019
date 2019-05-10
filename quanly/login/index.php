<!DOCTYPE html>
<html>
	<head>
		<title>Login Page</title>
		<!--Made with love by Mutiullah Samim -->
		<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
		<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
		<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script src="./../../js/js_md5.js"></script>
		<script src="./1.js"></script>
		<!------ Include the above in your HEAD tag ---------->
		<!--Bootsrap 4 CDN-->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<!--Fontawesome CDN-->
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
		<!--Custom styles-->
		<link rel="stylesheet" type="text/css" href="1.css">
	</head>
	<body>
		<div class="container">
			<div class="d-flex justify-content-center h-100">
				<div class="card ">
					<div class="card-header">
						<h3 class=" text-center">Đăng nhập</h3>
						
					</div>
					<div class="card-body">
						<div class="row">
							<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
								<img src="./../../images/images (1).jpg" class="img-responsive" alt="Image">
							</div>
							<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
								<form id="from_login1">
									<div class="input-group form-group">
										<div class="input-group-prepend">
											<span class="input-group-text"><i class="fas fa-user"></i></span>
										</div>
										<input type="text" id="tendangnhap_login" name="tendangnhap_login" class="form-control" placeholder="Nhập tên đăng nhập" required>
										
									</div>
									<div class="input-group form-group">
										<div class="input-group-prepend">
											<span class="input-group-text"><i class="fas fa-key"></i></span>
										</div>
										<input type="password"  id="matkhau_login"  name=" matkhau_login" class="form-control" placeholder="Nhập mật khẩu" required>
									</div>
									
									<div class="form-group">
										<input type="submit" value="Đăng nhập" class="btn float-right login_btn">
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>