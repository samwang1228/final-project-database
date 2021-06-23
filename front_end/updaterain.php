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
						<li class="nav-item " >
							<a class="nav-link  navbar-fixed  text-center" href="updatewater.php" style="color: white">用水</a>
						</li>
						<li class="nav-item " >
							<a class="nav-link  navbar-fixed  text-center" href="updatereservoir.php" style="color :white"  >水庫</a>
						</li>
						<li class="nav-item ">
							<a class="nav-link  navbar-fixed text-center" href="updatepostcode.php" style="color: white">地區</a>
						</li>
						<li class="nav-item manager-color">
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
			<section  class="section"style="background-image:url('img/postcode/新北市.jpg') ">
				<a name="slideN2"/>
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<div class="upper text-center">
								<form action="updaterain.php" method="post">
									<select name="isearch" >
										<?php
										$sql="SELECT distinct(city) FROM city_area ";
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
									<select name="isearch_name" >
										<?php
										$sql="SELECT date FROM rainfall WHERE date>='2021-01-01 00:00:00' ";
										// $list =mysql_query($str,$link);
										$ro=mysqli_query($link,$sql);
										$row=mysqli_fetch_assoc($ro);
										$total=mysqli_num_rows($ro);
										do
										{
										?>
										      <option value="<?php echo $row['date']; ?>"><?php echo $row['date'];?></option>
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


			</body>
			<?php
			if(isset($_POST['number'])){
				for($i=0 ;$i<count($_POST['city']) ;$i++){
					if(isset($_POST['u'.$i])){
					$date_name=$_POST['date_name'][$i];
					$number=$_POST['number'][$i];
					$today_rainfall=$_POST['today_rainfall'][$i];
					$updatesql="UPDATE rainfall
					SET
					today_rainfall='$today_rainfall'
					WHERE
					number='$number' and date='$date_name'";
					echo $updatesql."<br />";
					if(mysqli_query($link,$updatesql)){
						change_record($link,4,$i,'Update');
						die("<script> alert(\"已更新成功\");</script>"); 
					}else{
						die("<script> alert(\"更新失敗\");</script>"); 
					}
				}
			}
			}
			if(isset($_POST['number'])){
				for( $i=0 ;$i<count($_POST['city']); $i++){
				if(isset($_POST['d'.$i])){
				$number=$_POST['number'][$i];
				$date_name=$_POST['date_name'][$i];	
				$updatesql2="DELETE 
				FROM rainfall
				WHERE number='$number' and date='$date_name'";	
				// mysqli_query($link,$updatesql2);
				if(mysqli_query($link,$updatesql2)){ //sucess
					change_record($link,4,$i,'Delete');
					die("<script> alert(\"已刪除成功\");</script>"); 
					// echo $updatesql2;
				}
				else{ //failed						
					// echo $updatesql2;
					die("<script> alert(\"刪除失敗\");</script>"); 
				}
				}				 
				}
			}

			if(isset($_POST['isearch_name'])){
				$search_name=$_POST['isearch'];
				$date=$_POST['isearch_name'];
				$sql="SELECT *
				FROM rain_station NATURAL JOIN rainfall
				WHERE
				city ='$search_name' AND date='$date'";
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
											<td>日期</td>
											<td>測站名稱(可修改)</td>
											<td>累積雨量(可修改)</td>
										</tr>
										<?php
										$temp=0;
										$num=0;
										do{
											?>
											<tr>
												<td>
													<input type="text" name="number[]" size='13px' value="<?php echo $row['number']; ?>" readonly="readonly">
												</td>
												<td>
													<input type="text" name="city[]" size='13px' value="<?php echo $row['city']; ?>" readonly="readonly">
												</td>
												<td>
													<input type="text" name="district[]"size='13px' value="<?php echo $row['district']; ?>" readonly="readonly">
												</td>
												<td>
													<input type="date" name="date_name[]"size='13px' value="<?php echo $row['date']; ?>" readonly="readonly">
												</td>
												<td>
													<input type="text" name="name_[]"size='13px' value="<?php echo $row['name']; ?>">
												</td>
												<td>
													<input type="text" name="today_rainfall[]"size='13px' value="<?php echo $row['today_rainfall']; ?>">
												</td>
												<td>
													<button class="btn btn-danger" style="width:70px" type="submit" name="<?php echo 'd'.$temp ?>"value="<?php echo $num; ?>">刪除</button>
												</td>
												<td >
												<button type="submit" name="<?php echo'u' .$temp ?>" style="width:70px" class="btn btn-primary ">修改</button><br />
											</td>
											</tr>
											<?php
											$num+=1;
											$temp+=1;
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