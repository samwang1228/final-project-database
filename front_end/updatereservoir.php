<?php
include_once('connect.php');
  // $sql="SELECT * FROM reservoir";
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
						<li class="nav-item ">
							<a class="nav-link  navbar-fixed  " href="水庫水情.html" style="color: white">user</a>
						</li>
						<li class="nav-item manager-color" >
							<a class="nav-link  navbar-fixed  text-center" href="updatereservoir.php" style="color: white">水庫資料</a>
						</li>
						<li class="nav-item">
							<a class="nav-link  navbar-fixed text-center" href="updatepostcode.php" style="color: white">地區資料</a>
						</li>
						<li class="nav-item ">
							<a class="nav-link  navbar-fixed " href="updatewater.php" style="color: white">用水資料</a>
						</li>
						<ul class="navbar-nav nav2">  <!--nav2為第二個class-->
							<li class="nav-item">
								<a class="nav-link navbar-fixed text-center" href="insertreservoir.html" style="color: white">insert</a>
							</li>
							<li class="nav-item">
								<a class="nav-link navbar-fixed" href="./login.php" style="color: white">Log Out</a>
							</li>
						</ul>
					</div>
				</div>		
			</nav>
			<section  class="section"style="background-image:url('img/reservoir/30503.jpg') ">
				<a name="slideN2"/>
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<div class="upper text-center">
								<form action="updatereservoir.php" method="post">
									<input name="isearch" type="text" placeholder="請輸入水庫名字">
									<button type="submit" class="btn btn-outline-info" >搜尋</button><br />
								</form>
							</div>

						</div>
					</div>
				</div>
			

		</body>
		<?php
		if(isset($_POST['list_button'])){
			$reservoir_name=$_POST['reservoir_name'];
			$city=$_POST['city'];
			$district=$_POST['district'];
			$reservoir_id=$_POST['reservoir_id'];
			$updatesql="UPDATE reservoir
			SET
			reservoir_name='$reservoir_name',
			city='$city',
			district='$district'
			WHERE
			reservoir_id='$reservoir_id'";
         //echo $updatesql."<br />";
			if(mysqli_query($link,$updatesql)){
					die("<script> alert(\"已更新成功\");</script>"); 
		// echo $updatesql;
			}else{
				die("<script> alert(\"更新失敗\");</script>");
		// echo $updatesql;
			}
		}
		if(isset($_POST['isearch'])){
			$search_name=$_POST['isearch'];
			$sql="SELECT *
			FROM reservoir
			WHERE
			reservoir_name ='$search_name'";
			// echo $sql;
			$ro=mysqli_query($link,$sql);
			$row=mysqli_fetch_assoc($ro);
			$total=mysqli_num_rows($ro);
			if($total!=0){
				// echo "查尋到".$total."筆資料<br />";
				?>
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-2"></div>
						<div class="col-lg-6">
							<form action="updatereservoir.php" method="post" name="mylist">
								<table cellspacing=1px>
									<tr>
										<td>水庫ID</td>
										<td>水庫名</td>
										<td>縣市</td>
										<td>鄉鎮</td>
									</tr>
									<?php
									do{
										?>
										<tr>
											<td>
												<input type="text" name="reservoir_id" value="<?php echo $row['reservoir_id']; ?>">
											</td>
											<td>
												<input type="text" name="reservoir_name" value="<?php echo $row['reservoir_name']; ?>">
											</td>
											<td>
												<input type="text" name="city" value="<?php echo $row['city']; ?>">
											</td>
											<td>
												<input type="text" name="district" value="<?php echo $row['district']; ?>">
											</td>
											<td>
												<button class="btn btn-outline-info" name="delete" style="width:70px">刪除</button>
											</td>
										</tr>
										<?php
									}while($row=mysqli_fetch_assoc($ro));
									?>
									<tr>
										<td colspan="6">
											<button type="submit"name="list_button" class="btn btn-outline-info ">修改</button><br />
										</td>
									</tr>
								</table>
								<?php
							}else{
								echo "查無資料";
							}
						}
						?>
					</form>
				</div>
			</div>
		</div>
	</div>
	</section>