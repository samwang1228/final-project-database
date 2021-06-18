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
						<li class="nav-item " >
							<a class="nav-link  navbar-fixed  text-center" href="updatereservoir.php" style="color: white">水庫資料</a>
						</li>
						<li class="nav-item ">
							<a class="nav-link  navbar-fixed text-center" href="updatepostcode.php" style="color: white">地區資料</a>
						</li>
						<li class="nav-item manager-color">
							<a class="nav-link  navbar-fixed " href="updaterain.php" style="color: white">降雨資料</a>
						</li>
						<ul class="navbar-nav nav2">  <!--nav2為第二個class-->
							<li class="nav-item">
								<a class="nav-link navbar-fixed text-center" href="insertpostcode.html" style="color: white">insert</a>
							</li>
							<li class="nav-item">
								<a class="nav-link navbar-fixed" href="./login.php" style="color: white">Log Out</a>
							</li>
						</ul>
					</div>
				</div>		
			</nav>
			<section  class="section"style="background-image:url('img/postcode/新北市.jpg') ">
				<a name="slideN2"/>
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<div class="upper text-center">
								<form action="updaterain.php" method="post">
									<input name="isearch"  type="text" placeholder="請輸入縣市名字">
									<button type="submit" class="btn btn-outline-info" >搜尋</button><br />
								</form>
							</div>

						</div>
					</div>
				</div>


			</body>
			<?php
			if(isset($_POST['list_button'])){
				for($i=0 ;$i<count($_POST['city']) ;$i++){
					$name_=$_POST['name_'][$i];
					$date_name=$_POST['date_name'][$i];
					$number=$_POST['number'][$i];
					$name=$_POST['name'][0];
					$updatesql="UPDATE rain_station
					SET
					rain_station.name='$name'
					WHERE
					number='$number' ";
					echo $updatesql."<br />";
					if(mysqli_query($link,$updatesql)){
						echo "測站名稱".$_POST['name'][$i]." 資料更新成功!.<br />";
					}else{
						echo "測站名稱".$_POST['name'][$i]." 資料更新失敗!.<br />";
					}
				}
				for($i=0 ;$i<count($_POST['city']) ;$i++){
					$date_name=$_POST['date_name'][$i];
					$date=$_POST['date'][$i];
					$number=$_POST['number'][$i];
					// $district=$_POST['district'];
					// $area=$_POST['area'][$i];
					$today_rainfall=$_POST['today_rainfall'][$i];
					$updatesql="UPDATE rainfall 
					SET
					date='$date',
					today_rainfall='$today_rainfall'
					WHERE
					number='$number' and date='$date_name'";
					echo $updatesql."<br />";
					if(mysqli_query($link,$updatesql)){
						echo "縣市".$_POST['city'][$i]." 資料更新成功!.<br />";
					}else{
						echo "縣市".$_POST['city'][$i]." 資料更新失敗!.<br />";
					}
				}
			}

			if(isset($_POST['delete_button'])){
				// for( $i=0 ;$i<count($_POST['city']); $i++){
				// 	if(isset($_POST['delete_button'][$i])){
					// $city_name=$_POST['city_name'][$i];
				$i = $_POST['delete_button'][0];
				$number=$_POST['number'][$i];
				$date_name=$_POST['date_name'][$i];	
				$updatesql2="DELETE 
				FROM rainfall
				WHERE number='$number' and date='$date_name'";	
				// mysqli_query($link,$updatesql2);
				if(mysqli_query($link,$updatesql2)){ //sucess
					echo $updatesql2;
				}
				else{ //failed						
					echo $updatesql2;
				}
				// 	}				 
				// }
			}

			if(isset($_POST['isearch'])){
				$search_name=$_POST['isearch'];
				$sql="SELECT *
				FROM rain_station NATURAL JOIN rainfall
				WHERE
				city ='$search_name'";
			    echo $sql;
				$ro=mysqli_query($link,$sql);
				$row=mysqli_fetch_assoc($ro);
				$total=mysqli_num_rows($ro);
				if($total!=0){
				// echo "查尋到".$total."筆資料<br />";
					?>
					<div class="container-fluid">
						<div class="row">
							<div class="col-lg-6">
								<form action="updaterain.php" method="post" name="mylist">
									<table cellspacing=1px>
										<tr>
											<td>測站ID</td>
											<td>縣市名</td>
											<td>鄉鎮名</td>
											<td>修改前的測站名稱</td>
											<td>修改後的測站名稱</td>
											<td>修改前的日期</td>
											<td>修改後的日期</td>
											<td>累積雨量</td>
										</tr>
										<?php
										$num=0;
										do{
											?>
											<tr>
												<td>
													<input type="text" name="number[]" size='13px' value="<?php echo $row['number']; ?>">
												</td>
												<td>
													<input type="text" name="city[]" size='13px' value="<?php echo $row['city']; ?>">
												</td>
												<td>
													<input type="text" name="district[]"size='13px' value="<?php echo $row['district']; ?>">
												</td>
												<td>
													<input type="text" name="name_[]"size='13px' value="<?php echo $row['name']; ?>">
												</td>
												<td>
													<input type="text" name="name[]"size='13px' value="<?php echo $row['name']; ?>">
												</td>
												<td>
													<input type="date" name="date_name[]"size='13px' value="<?php echo $row['date']; ?>">
												</td>
												<td>
													<input type="date" name="date[]"size='13px' value="<?php echo $row['date']; ?>">
												</td>
												<td>
													<input type="text" name="today_rainfall[]"size='13px' value="<?php echo $row['today_rainfall']; ?>">
												</td>
												<td>
												<button class="btn btn-danger" type="submit" name="delete_button[]" style="width:70px" value="<?php echo $num; ?>">刪除</button>
												</td>
											</tr>
											<?php
											$num+=1;
										}while($row=mysqli_fetch_assoc($ro));
										?>
										<tr>
											<td colspan="6">
												<button type="submit" name="list_button" class="btn btn-outline-info">修改</button><br />
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