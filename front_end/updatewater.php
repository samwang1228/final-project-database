<?php
include_once('connect.php');
include_once('./php/database_record.php');
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

				<!-- <img class="logo" src="logo.png"> -->

				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse baccolor4 " id="navbarNav">
					<ul class="navbar-nav  mx-auto">  <!--置中-->
						<li class="nav-item ">
							<a class="nav-link  navbar-fixed  " href="水庫水情.html" style="color: white">user</a>
						</li>
						<li class="nav-item manager-color" >
							<a class="nav-link  navbar-fixed  text-center" href="updatewater.php" style="color: white">用水</a>
						</li>
						<li class="nav-item " >
							<a class="nav-link  navbar-fixed  text-center" href="updatereservoir.php" style="color :white"  >水庫</a>
						</li>
						<li class="nav-item ">
							<a class="nav-link  navbar-fixed text-center" href="updatepostcode.php" style="color: white">地區</a>
						</li>
						<li class="nav-item ">
							<a class="nav-link  navbar-fixed text-center" href="updaterain.php" style="color: white">降雨</a>
						</li>
						<!-- <ul class="navbar-nav nav2">  --> <!--nav2為第二個class-->
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
			<section  class="section"style="background-image:url('img/reservoir/30503.jpg') ">
				<a name="slideN2"/>
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<div class="upper text-center">
								<form action="updatewater.php" method="post">
									<input name="indusearch" type="text" placeholder="工業用水縣市">
									<button type="submit" class="btn btn-outline-info" >搜尋</button><br />
								</form>
							</div>

						</div>
					</div>
				</div>
							<div class="text-center">
								<form action="updatewater.php" method="post">
									<input name="argsearch" type="text" placeholder="農業用水區域">
									<button type="submit" class="btn btn-outline-info" >搜尋</button><br />
								</form>
							</div>
							<div class="text-center">
								<form action="updatewater.php" method="post">
									<input name="livesearch" type="text" placeholder="生活用水縣市">
									<button type="submit" class="btn btn-outline-info" >搜尋</button><br />
								</form>
							</div>
			</body>
			<?php
			if(isset($_POST['list_button'])){
				for( $i=0 ;$i<count($_POST['reservoir_id']); $i++){
					$reservoir_name=$_POST['reservoir_name'][$i];
					$city=$_POST['city'][$i];
					$district=$_POST['district'][$i];
					$reservoir_id=$_POST['reservoir_id'][$i];
					$date=$_POST['date'][$i];
					$effective_water_storage=$_POST['effective_water_storage'][$i];
					$reservoir_rainfall=$_POST['reservoir_rainfall'][$i];
					$date_name=$_POST['date_name'][$i];

					$updatesql="UPDATE reservoir
					SET
					reservoir_name='$reservoir_name',
					city='$city',
					district='$district'
					WHERE
					reservoir_id='$reservoir_id'";

					$updatesql2="UPDATE reservoir_water_condition
					SET
					date='$date',
					effective_water_storage='$effective_water_storage',
					reservoir_rainfall='$reservoir_rainfall'
					WHERE
					reservoir_id='$reservoir_id' AND date='$date_name' " ;
         			//echo $updatesql."<br />";

					if(mysqli_query($link,$updatesql)){
						// die("<script> alert(\"已更新成功\");</script>"); 
						echo $updatesql;
					}else{
						// die("<script> alert(\"更新失敗\");</script>");
						echo $updatesql;
					}
					if(mysqli_query($link,$updatesql2)){
						// die("<script> alert(\"已更新成功\");</script>"); 
						echo $updatesql2;
					}else{
						// die("<script> alert(\"更新失敗\");</script>");
						echo $updatesql2;
					}
				}
			}

			if(isset($_POST['indu_delete_button'])){
				for( $i=0 ;$i<count($_POST['city']); $i++){
					if(isset($_POST['indu_delete_button'][$i])){
				// $i = $_POST['indu_delete_button'][0];
				$city=$_POST['city'][$i];
				$year=$_POST['year'][$i];
				$industrial_project=$_POST['industrial_project'][$i];
				// $industrial_project_area=$_POST['industrial_project_area'][$i]
				$updatesql="DELETE 
				FROM industrial_water
				WHERE city='$city' and year='$year' and industrial_project='$industrial_project'";
				if(mysqli_query($link,$updatesql)){ //sucess
					change_record($link,0,1);
					echo $updatesql;
				}else{ //failed						
					echo $updatesql;
				}
					}
				}				 
			}

			if(isset($_POST['argi_delete_button'])){
				for( $i=0 ;$i<count($_POST['area']); $i++){
					if(isset($_POST['argi_delete_button'][$i])){
				// $i = $_POST['indu_delete_button'][0];
				$area=$_POST['area'][$i];
				$year=$_POST['year'][$i];
				$irrigation=$_POST['irrigation'][$i];
				$aquaculture=$_POST['aquaculture'][$i];
				$livestock=$_POST['livestock'][$i];
				// $industrial_project_area=$_POST['industrial_project_area'][$i]
				$updatesql="DELETE 
				FROM agriculture_wateri
				WHERE area='$area' and year='$year'";
				if(mysqli_query($link,$updatesql)){ //sucess
					change_record($link,0,1);
					echo $updatesql;
				}else{ //failed						
					echo $updatesql;
				}
					}
				}				 
			}
			if(isset($_POST['live_delete_button'])){
				for( $i=0 ;$i<count($_POST['city']); $i++){
					if(isset($_POST['live_delete_button'][$i])){
				// $i = $_POST['indu_delete_button'][0];
				$city=$_POST['city'][$i];
				$year=$_POST['year'][$i];
				$tapwater_population=$_POST['tapwater_population'][$i];
				$tapwater_used=$_POST['tapwater_used'][$i];
				$selftake_population=$_POST['selftake_population'][$i];
				$selftake_used=$_POST['selftake_used'][$i];
				// $industrial_project_area=$_POST['industrial_project_area'][$i]
				$updatesql="DELETE 
				FROM living_water
				WHERE city='$city' and year='$year'";
				if(mysqli_query($link,$updatesql)){ //sucess
					change_record($link,0,1);
					echo $updatesql;
				}else{ //failed						
					echo $updatesql;
				}
					}
				}				 
			}
				if(isset($_POST['indusearch'])){
					$search_name=$_POST['indusearch'];
					$sql="SELECT *
					FROM industrial_water
					WHERE
					city ='$search_name'";
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
						<form action="updatewater.php" method="post" name="mylist">
						<table cellspacing=1px>
						<tr>
						<td>縣市</td>
						<td>年份:</td>
						<td>工業項目:</td>
						<td>工業項目面積:</td>
						<td>工業項目用水</td>
						</tr>
						<?php
						$num = 0;
						do{
							?>
							<tr>
							<td>
							<input type="text" size='13px' name="city[]" value="<?php echo $row['city']; ?>">
							</td>
							<td>
							<input type="text"size='13px' name="year[]" value="<?php echo $row['year']; ?>">
							</td>
							<td>
							<input type="text"size='13px' name="industrial_project[]" value="<?php echo $row['industrial_project']; ?>">
							</td>
							<td>
							<input type="text"size='13px' name="industrial_project_area[]" value="<?php echo $row['industrial_project_area']; ?>">
							</td>
							<td>
							<input type="text"size='13px' name="industrial_project_used[]" value="<?php echo $row['industrial_project_area']; ?>">
							</td> 
							<td>
								<button class="btn btn-danger" style="width:70px" type="submit" name="indu_delete_button[]" value="<?php echo $num; ?>">刪除</button>
							</td>
							</tr>
							<?php
							
							$num+=1;
						}while($row=mysqli_fetch_assoc($ro));
						?>
						<tr>
						<td colspan="6">
						<button type="submit" name="list_button" class="btn btn-outline-info ">修改</button><br />
						</td>
						</tr>
						</table>
						<?php
					}else{
						echo "查無資料";
					}
				}
				if(isset($_POST['argsearch'])){
					$search_name=$_POST['argsearch'];
					$sql="SELECT *
					FROM agriculture_water
					WHERE
					area ='$search_name'";
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
						<form action="updatewater.php" method="post" name="mylist">
						<table cellspacing=1px>
						<tr>
						<td>縣市</td>
						<td>年份:</td>
						<td>工業項目:</td>
						<td>工業項目面積:</td>
						<td>工業項目用水</td>
						</tr>
						<?php
						$num = 0;
						do{
							?>
							<tr>
							<td>
							<input type="text" size='13px' name="area[]" value="<?php echo $row['area']; ?>">
							</td>
							<td>
							<input type="text"size='13px' name="year[]" value="<?php echo $row['year']; ?>">
							</td>
							<td>
							<input type="text"size='13px' name="irrigation[]" value="<?php echo $row['irrigation']; ?>">
							</td>
							<td>
							<input type="text"size='13px' name="aquaculture[]" value="<?php echo $row['aquaculture']; ?>">
							</td>
							<td>
							<input type="text"size='13px' name="livestock[]" value="<?php echo $row['livestock']; ?>">
							</td> 
							<td>
								<button class="btn btn-danger" style="width:70px" type="submit" name="argi_delete_button[]" value="<?php echo $num; ?>">刪除</button>
							</td>
							</tr>
							<?php
							
							$num+=1;
						}while($row=mysqli_fetch_assoc($ro));
						?>
						<tr>
						<td colspan="6">
						<button type="submit" name="list_button" class="btn btn-outline-info ">修改</button><br />
						</td>
						</tr>
						</table>
						<?php
					}else{
						echo "查無資料";
					}
				}
				if(isset($_POST['livesearch'])){
					$search_name=$_POST['livesearch'];
					$sql="SELECT *
					FROM living_water
					WHERE
					city ='$search_name'";
			// echo $sql;
					$ro=mysqli_query($link,$sql);
					$row=mysqli_fetch_assoc($ro);
					$total=mysqli_num_rows($ro);
					if($total!=0){
				// echo "查尋到".$total."筆資料<br />";
						?>
						<div class="container-fluid">
						<div class="row">
						<!-- <div class="col-lg-1"></div> -->
						<div class="col-lg-6">
						<form action="updatewater.php" method="post" name="mylist">
						<table cellspacing=1px>
						<tr>
						<td>縣市:</td>
						<td>年份:</td>
						<td>自來水供應量供水人口</td>
						<td>自來水供應量用水量</td>
						<td>自來水取水量供水人口</td>
						<td>自來水取水量用水量</td>
						</tr>
						<?php
						$num = 0;
						do{
							?>
							<tr>
							<td>
							<input type="text" size='16px' name="city[]" value="<?php echo $row['city']; ?>">
							</td>
							<td>
							<input type="text"size='16px' name="year[]" value="<?php echo $row['year']; ?>">
							</td>
							<td>
							<input type="text"size='16px' name="tapwater_population[]" value="<?php echo $row['tapwater_population']; ?>">
							</td>
							<td>
							<input type="text"size='16px' name="tapwater_used[]" value="<?php echo $row['tapwater_used']; ?>">
							</td>
							<td>
							<input type="text"size='16px' name="selftake_population[]" value="<?php echo $row['selftake_population']; ?>">
							</td>
							<td>
							<input type="text"size='16px' name="selftake_used[]" value="<?php echo $row['selftake_used']; ?>">
							</td>  
							<td>
								<button class="btn btn-danger" style="width:70px" type="submit" name="live_delete_button[]" value="<?php echo $num; ?>">刪除</button>
							</td>
							</tr>
							<?php
							
							$num+=1;
						}while($row=mysqli_fetch_assoc($ro));
						?>
						<tr>
						<td colspan="6">
						<button type="submit" name="list_button" class="btn btn-outline-info ">修改</button><br />
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