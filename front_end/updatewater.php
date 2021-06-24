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
								<div class="reservoir-show-name">工業用水</div>
								<form action="updatewater.php" method="post">
								<select name="indusearch" >
										<?php
										$sql="SELECT distinct(city) FROM city_area NATURAL JOIN industrial_water ";
										// $list =mysql_query($str,$link);
										$ro=mysqli_query($link,$sql);
										$row=mysqli_fetch_assoc($ro);
										$total=mysqli_num_rows($ro);
										// $result = mysqli_query($link, $sql) or die("資料選取錯誤！".mysqli_error($link));
										// while($data=mysqli_fetch_assoc($result)){
										do
										{
											?>
											<option value="<?php echo $row['city']; ?>"><?php echo $row['city'];?></option>
											<?php
										}while($row=mysqli_fetch_assoc($ro));
										?>

									</select>
									<select name="indusearch_year" >
										<?php
										$sql="SELECT distinct(year) FROM industrial_water ORDER BY year DESC";
										// $list =mysql_query($str,$link);
										$ro=mysqli_query($link,$sql);
										$row=mysqli_fetch_assoc($ro);
										$total=mysqli_num_rows($ro);
										// $result = mysqli_query($link, $sql) or die("資料選取錯誤！".mysqli_error($link));
										// while($data=mysqli_fetch_assoc($result)){
										do
										{
											?>
											<option value="<?php echo $row['year']; ?>"><?php echo $row['year'];?></option>
											<?php
										}while($row=mysqli_fetch_assoc($ro));
										?>

									</select>
									<button type="submit" class="btn btn-outline-info" >搜尋</button><br />
								</form>
							</div>

						</div>
					</div>
				</div>
							<div class="text-center">
								<form action="updatewater.php" method="post">
									<div >農業用水</div>
								<form action="updatewater.php" method="post">
								<select name="argsearch" >
										<?php
										$sql="SELECT distinct(area) FROM city_area NATURAL JOIN agriculture_water";
										// $list =mysql_query($str,$link);
										$ro=mysqli_query($link,$sql);
										$row=mysqli_fetch_assoc($ro);
										$total=mysqli_num_rows($ro);
										// $result = mysqli_query($link, $sql) or die("資料選取錯誤！".mysqli_error($link));
										// while($data=mysqli_fetch_assoc($result)){
										do
										{
											?>
											<option value="<?php echo $row['area']; ?>"><?php echo $row['area'];?></option>
											<?php
										}while($row=mysqli_fetch_assoc($ro));
										?>

									</select>
									<select name="argsearch_year" >
										<?php
										$sql="SELECT distinct(year) FROM agriculture_water ORDER BY year DESC";
										// $list =mysql_query($str,$link);
										$ro=mysqli_query($link,$sql);
										$row=mysqli_fetch_assoc($ro);
										$total=mysqli_num_rows($ro);
										// $result = mysqli_query($link, $sql) or die("資料選取錯誤！".mysqli_error($link));
										// while($data=mysqli_fetch_assoc($result)){
										do
										{
											?>
											<option value="<?php echo $row['year']; ?>"><?php echo $row['year'];?></option>
											<?php
										}while($row=mysqli_fetch_assoc($ro));
										?>

									</select>
									<button type="submit" class="btn btn-outline-info" >搜尋</button><br />
								</form>
							</div>
							<div class="text-center">
								<form action="updatewater.php" method="post">
									<div >民生用水</div>
								<form action="updatewater.php" method="post">
								<select name="livesearch" >
										<?php
										$sql="SELECT distinct(city) FROM city_area NATURAL JOIN living_water";
										// $list =mysql_query($str,$link);
										$ro=mysqli_query($link,$sql);
										$row=mysqli_fetch_assoc($ro);
										$total=mysqli_num_rows($ro);
										// $result = mysqli_query($link, $sql) or die("資料選取錯誤！".mysqli_error($link));
										// while($data=mysqli_fetch_assoc($result)){
										do
										{
											?>
											<option value="<?php echo $row['city']; ?>"><?php echo $row['city'];?></option>
											<?php
										}while($row=mysqli_fetch_assoc($ro));
										?>

									</select>
									<select name="livesearch_year" >
										<?php
										$sql="SELECT distinct(year) FROM living_water ORDER BY year DESC";
										// $list =mysql_query($str,$link);
										$ro=mysqli_query($link,$sql);
										$row=mysqli_fetch_assoc($ro);
										$total=mysqli_num_rows($ro);
										// $result = mysqli_query($link, $sql) or die("資料選取錯誤！".mysqli_error($link));
										// while($data=mysqli_fetch_assoc($result)){
										do
										{
											?>
											<option value="<?php echo $row['year']; ?>"><?php echo $row['year'];?></option>
											<?php
										}while($row=mysqli_fetch_assoc($ro));
										?>

									</select>
									<button type="submit" class="btn btn-outline-info" >搜尋</button><br />
								</form>
							</div>
			</body>
			<?php
		
			if(isset($_POST['indu_delete_button'])){
				// for( $i=0 ;$i<count($_POST['city']); $i++){
					// if(isset($_POST['indu_delete_button'][$i])){
				// $i = $_POST['indu_delete_button'][0];
				$i=$_POST['indu_delete_button'][0];
				$city=$_POST['city'][$i];
				$year=$_POST['year'][$i];
				$industrial_project=$_POST['industrial_project'][$i];
				// $industrial_project_area=$_POST['industrial_project_area'][$i]
				$updatesql="DELETE 
				FROM industrial_water
				WHERE city='$city' and year='$year' and industrial_project='$industrial_project'";
				if(mysqli_query($link,$updatesql)){ //sucess
					change_record($link,0,1,'Delete');
					// echo $updatesql;
				}else{ //failed						
					// echo $updatesql;
				}
					// }
				// }				 
			}
			if(isset($_POST['indu_update_button'])){
				// for( $i=0 ;$i<count($_POST['city']); $i++){
					// if(isset($_POST['indu_delete_button'][$i])){
				// $i = $_POST['indu_delete_button'][0];
				$i=$_POST['indu_update_button'][0];
				$city=$_POST['city'][$i];
				$year=$_POST['year'][$i];
				$industrial_project=$_POST['industrial_project'][$i];
				$industrial_project_area=$_POST['industrial_project_area'][$i];
				$industrial_project_used=$_POST['industrial_project_used'][$i];
				// $industrial_project_area=$_POST['industrial_project_area'][$i]
				$updatesql="UPDATE industrial_water
				SET
				industrial_project_area='$industrial_project_area',
				industrial_project_used='$industrial_project_used'
				WHERE city='$city' and year='$year' and industrial_project='$industrial_project'";
				if(mysqli_query($link,$updatesql)){ //sucess
					change_record($link,8,$i,'Update');
					// echo $updatesql;
				}else{ //failed						
					// echo $updatesql;
				}
					// }
				// }				 
			}
			if(isset($_POST['argi_delete_button'])){
				// for( $i=0 ;$i<count($_POST['area']); $i++){
					// if(isset($_POST['argi_delete_button'][$i])){
				$i = $_POST['argi_delete_button'][0];
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
					change_record($link,6,$i,'Delete');
					// echo $updatesql;
				}else{ //failed						
					// echo $updatesql;
				}
					// }
				// }				 
			}
				if(isset($_POST['argi_update_button'])){
				// for( $i=0 ;$i<count($_POST['city']); $i++){
					// if(isset($_POST['indu_delete_button'][$i])){
				// $i = $_POST['indu_delete_button'][0];
				$i=$_POST['argi_update_button'][0];
				$area=$_POST['area'][$i];
				$year=$_POST['year'][$i];
				$irrigation=$_POST['irrigation'][$i];
				$aquaculture=$_POST['aquaculture'][$i];
				$livestock=$_POST['livestock'][$i];
				// $industrial_project_area=$_POST['industrial_project_area'][$i]
				$updatesql="UPDATE agriculture_water
				SET
				irrigation='$irrigation',
				aquaculture='$aquaculture',
				livestock='$livestock'
				WHERE area='$area' and year='$year'";
				if(mysqli_query($link,$updatesql)){ //sucess
					change_record($link,6,$i,'Update');
					echo $updatesql;
				}else{ //failed						
					echo $updatesql;
				}
					// }
				// }				 
			}
			if(isset($_POST['live_delete_button'])){
				// for( $i=0 ;$i<count($_POST['city']); $i++){
					// if(isset($_POST['live_delete_button'][$i])){
				$i = $_POST['indu_delete_button'][0];
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
					change_record($link,0,7,'Delete');
					echo $updatesql;
				}else{ //failed						
					echo $updatesql;
				}
					// }
				// }				 
			}
			if(isset($_POST['live_update_button'])){
				$i=$_POST['live_update_button'][0];
				$city=$_POST['city'][$i];
				$year=$_POST['year'][$i];
				$tapwater_population=$_POST['tapwater_population'][$i];
				$tapwater_used=$_POST['tapwater_used'][$i];
				$selftake_population=$_POST['selftake_population'][$i];
				$selftake_used=$_POST['selftake_used'][$i];
				// $industrial_project_area=$_POST['industrial_project_area'][$i]
				$updatesql="UPDATE living_water
				SET
				tapwater_population='$tapwater_population',
				tapwater_used='$tapwater_used',
				selftake_population='$selftake_population',
				selftake_used='$selftake_used'
				WHERE city='$city' and year='$year'";
				if(mysqli_query($link,$updatesql)){ //sucess
					change_record($link,7,$i,'Update');
					echo $updatesql;
				}else{ //failed						
					echo $updatesql;
				}
					// }
				// }				 
			}
				if(isset($_POST['indusearch_year'])){
					$search_name=$_POST['indusearch'];
					$year=$_POST['indusearch_year'];
					$sql="SELECT *
					FROM industrial_water
					WHERE
					city ='$search_name' AND year='$year'";
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
						<td>工業項目面積(可修改):</td>
						<td>工業項目用水(可修改)</td>
						</tr>
						<?php
						$num = 0;
						do{
							?>
							<tr>
							<td>
							<input type="text" size='13px' name="city[]" value="<?php echo $row['city']; ?>" readonly='readonly'>
							</td>
							<td>
							<input type="text"size='13px' name="year[]" value="<?php echo $row['year']; ?>" readonly='readonly'>
							</td>
							<td>
							<input type="text"size='13px' name="industrial_project[]" value="<?php echo $row['industrial_project']; ?>"readonly='readonly'>
							</td>
							<td>
							<input type="text"size='13px' name="industrial_project_area[]" value="<?php echo $row['industrial_project_area']; ?>">
							</td>
							<td>
							<input type="text"size='13px' name="industrial_project_used[]" value="<?php echo $row['industrial_project_used']; ?>">
							</td> 
							<td>
								<button class="btn btn-danger" style="width:70px" type="submit" name="indu_delete_button[]" value="<?php echo $num; ?>">刪除</button>
							</td>
							<td>
								<button class="btn btn-primary" style="width:70px" type="submit" name="indu_update_button[]" value="<?php echo $num; ?>">修改</button>
							</td>
							</tr>
							<?php
							
							$num+=1;
						}while($row=mysqli_fetch_assoc($ro));
						?>
						</table>
						<?php
					}else{
						echo "查無資料";
					}
				}
				if(isset($_POST['argsearch_year'])){
					$search_name=$_POST['argsearch'];
					$year=$_POST['argsearch_year'];
					$sql="SELECT *
					FROM agriculture_water
					WHERE
					area ='$search_name' AND year='$year'";
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
							<input type="text" size='13px' name="area[]" value="<?php echo $row['area']; ?>" readonly='readonly'>
							</td>
							<td>
							<input type="text"size='13px' name="year[]" value="<?php echo $row['year']; ?>" readonly='readonly'>
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
							<td>
								<button class="btn btn-primary" style="width:70px" type="submit" name="argi_update_button[]" value="<?php echo $num; ?>">修改</button>
							</td>
							</tr>
							<?php
							
							$num+=1;
						}while($row=mysqli_fetch_assoc($ro));
						?>
						</table>
						<?php
					}else{
						echo "查無資料";
					}
				}
				if(isset($_POST['livesearch_year'])){
					$search_name=$_POST['livesearch'];
					$year=$_POST['livesearch_year'];
					$sql="SELECT *
					FROM living_water
					WHERE
					city ='$search_name' AND year='$year'";
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
						<td>自來水供應量供水人口(可修改)</td>
						<td>自來水供應量用水量(可修改)</td>
						<td>自來水取水量供水人口(可修改)</td>
						<td>自來水取水量用水量(可修改)</td>
						</tr>
						<?php
						$num = 0;
						do{
							?>
							<tr>
							<td>
							<input type="text" size='16px' name="city[]" value="<?php echo $row['city']; ?>" readonly='readonly'>
							</td>
							<td>
							<input type="text"size='16px' name="year[]" value="<?php echo $row['year']; ?>"readonly='readonly'>
							</td>
							<td>
							<input type="text"size='16px' name="tapwater_population[]" value="<?php echo $row['tapwater_population']; ?>" >
							</td>
							<td>
							<input type="text"size='16px' name="tapwater_used[]" value="<?php echo $row['tapwater_used']; ?>" >
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
							<td>
								<button class="btn btn-primary" style="width:70px" type="submit" name="live_update_button[]" value="<?php echo $num; ?>">修改</button>
							</td>
							</tr>
							<?php
							
							$num+=1;
						}while($row=mysqli_fetch_assoc($ro));
						?>
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