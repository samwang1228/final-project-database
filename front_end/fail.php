<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link href="css/login.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"><!-- icon -->

	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
</head>
<body>
	<!--  -->
	<div class="container-fluid"> <!--滿版格式  -->
		<div class="row "> <!-- 圖片 -->
			<div class="col-lg-6 col-md-6 d-none  d-md-block infinity-image-container"></div><!-- col滿版為12 ig->md 螢幕大到小rwd 
			d-none d-md-block讓圖片消失 僅在md範圍時出現-->
			<div class="col-lg-6 col-md-6 infinity-form-container">		<!--登入 -->		
				<div class="col-lg-9 col-md-12 col-sm-9 col-xs-12 infinity-form">
					<!-- Logo -->
					<div class="text-center mb-3 mt-5"> <!--mb ->margin-button
						mt ->margin-top  -->
						<img src="logo.png" width="250px">
					</div>
					<form class="px-3"  action="action.php" name="form1" method="post">
						<!-- 輸入框 px padding-right 和 padding-left-->
						<div class="form-input">
							<span><i class="fa fa-envelope-o"></i></span><!-- icon -->
							<input type="text" name="ID" placeholder="管理者帳號" >
						</div>
						<div class="form-input">
							<span><i class="fa fa-lock"></i></span> <!-- icon -->
							<input type="password" name="password" placeholder="管理者密碼" required>
						</div>
						<div class="row mb-3">
							<!-- Remember Checkbox -->
							<div class="col-auto d-flex align-items-center">
								<div class="custom-control custom-checkbox">
									<input type="checkbox" class="custom-control-input" id="cb1">
									<label class="custom-control-label text-white" for="cb1">Remember me</label>
								</div>
							</div>
						</div>
						<div style="color:#cf0000"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i>帳號或密碼錯誤請在輸入一次</div>
						<!-- Login Button -->
						<div class="mb-3"> 
							<button type="submit" class="btn btn-block">Login</button>
						</div>
					</form>
				</div>					
			</div>
			
		</div>
	</div>

</body>
</html>
