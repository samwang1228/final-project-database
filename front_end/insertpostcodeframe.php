<?php session_start(); 
	require_once 'connect.php';
	include_once('./php/database_record.php');
?>
<!doctype html>
	<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="Shortcut Icon" type="image/x-icon" href='know.ico' />
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
		<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"><!-- icon -->
		<link rel="stylesheet" type="text/css" href="css/main.css?v=time()">
		<link rel="stylesheet" type="text/css" href="css/side-menu.css">
		<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.6.1/gsap.min.js"></script> 
		<title>我不知道</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script src="./js/global.js"></script>
		<link href="css/manager.css?=time()" rel="stylesheet" type="text/css">
		<script src="js/controller/clickHandler.js"></script>
	</head>
	<body>
		<nav class="navbar navbar-expand-lg navbar-light fixed-top "> <!-- bg-light修改模式 fixed-top-->
			<div class="container-fluid ">

				<img class="logo" src="logo.png">

				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse baccolor4 " id="navbarNav">
					<ul class="navbar-nav  mx-auto">  <!--置中-->
						<li class="nav-item text-center">
							<a class="nav-link  navbar-fixed  " href="水庫水情.html" style="color: white">user</a>
						</li>
						<li class="nav-item manager-color text-center">
							<a class="nav-link  navbar-fixed text-center" href="insertpostcodeframe.php" style="color: white">地區資料</a>
						</li>
						<li class="nav-item text-center">
							<a class="nav-link  navbar-fixed " href="insertwaterframe.php" style="color: white">用水資料</a>
						</li>
					</ul>
					<ul class="navbar-nav nav2">  <!--nav2為第二個class-->
						<li class="nav-item ">
							<a class="nav-link navbar-fixed text-center" href="updatepostcode.php" style="color: white">update</a>
						</li>
						<li class="nav-item">
							<a class="nav-link navbar-fixed" href="http://localhost/reservoir_project/front_end/login.php" style="color: white">Log Out</a>
						</li>
					</ul>
				</div>
			</div>		
		</nav>
		
		<!--  -->
		<!-- 左側menu -->
		<section>
			<div class="container-fluid black-image"> <!--滿版格式  -->
				<div class="row "> <!-- 圖片 -->
			<div class="col-lg-6 col-md-6 d-none  d-md-block postcode-image-container"></div><!-- col滿版為12 ig->md 螢幕大到小rwd 
				d-none d-md-block讓圖片消失 僅在md範圍時出現-->
				<!-- <img src="下雨.gif"> -->
				<div class="col-lg-6 col-md-6 manager-block">		<!--登入 -->		
					
					<div class="col-lg-9 col-md-12 col-sm-9 col-xs-12 manager-form">
						<h2 class="text-center mb-3 mt-5" style="color:white"> 
							<br/>
							<i class="fa fa-user-o" style="color:white" aria-hidden="true"  id='show_user_name'></i>							
						</h2>
						<h3 class="text-center" style="color:white">請輸入想新增的地區</h3>
						<form class="px-3"  action="insertpostcode.php" name="form1" method="post" onsubmit='return checkSubmit(this)'>
							<div class="form-input mb-3">
								<!-- <input class="form-control form-control-lg " type="text" name="city" placeholder="縣市名" required> -->
								<select name="city" >
										<?php
										$sql="SELECT distinct(city) FROM city_area ";
										// $list =mysql_query($str,$link);
										$ro=mysqli_query($link,$sql);
										$row=mysqli_fetch_assoc($ro);
										$total=mysqli_num_rows($ro);
										do
										{
										?>
										      <option value="<?php echo $row['city']; ?>"><?php echo $row['city'];?></option>
										<?php
										}while($row=mysqli_fetch_assoc($ro));
										?>
									
									</select>
							</div >
							<div class="form-input mb-3">
								<input class="form-control form-control-lg " type="text" name="district" placeholder="鄉鎮名" required>
							</div>

						</div>
						<span>
							<input type="submit" class="btn btn-outline-info fixed-button" name="data-submit" value="確認" onclick='onInsertButton()'>
						</form>
						<button type="button" class="btn btn-outline-info fixed-button">取消</button>
					</span>
				</div>
			</div>
		</div>
	</section>
	<script>	
		function getCookie(name) {
			const value = `; ${document.cookie}`;
			const parts = value.split(`; ${name}=`);
			if (parts.length === 2) return parts.pop().split(';').shift();
		}

		$('#show_user_name').html(getCookie('user')+'您好!');
	</script>
</body>
</html>