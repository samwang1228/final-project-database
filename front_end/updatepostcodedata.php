<?php
include_once('connect.php');
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
	</head>


<!-- <iframe src="updatepostcode.php"></iframe> -->
<?php
			
			if(isset($_POST['update_button'])){
				// for($i=0 ;$i<count($_POST['city']) ;$i++){
					$i = $_POST['update_button'][0];
					$city_name=$_POST['city_name'][$i];
					$area_name=$_POST['area_name'][$i];
					$city=$_POST['city'][$i];
					// $district=$_POST['district'];
					// $area=$_POST['area'][$i];
					$updatesql="UPDATE city_area
					SET
					city='$city'
					WHERE
					city='$city_name' and area='$area_name'";
					echo $updatesql."<br />";
					if(mysqli_query($link,$updatesql)){
						echo "縣市".$_POST['city'][$i]." 資料更新成功!.<br />";
					}else{
						echo "縣市".$_POST['city'][$i]." 資料更新失敗!.<br />";
					}
				// for($i=0 ;$i<count($_POST['city']) ;$i++){
					$district_name=$_POST['district_name'][$i];
					// $city_name=$_POST['city_name'][$i];
					$district=$_POST['district'][$i];
					// $district=$_POST['district'];
					// $area=$_POST['area'][$i];
					$updatesql="UPDATE postcode_area
					SET
					district='$district'
					WHERE
					city='$city_name' and district='$district_name'";
					echo $updatesql."<br />";
					if(mysqli_query($link,$updatesql)){
						echo "縣市".$_POST['city'][$i]." 資料更新成功!.<br />";
					}else{
						echo "縣市".$_POST['city'][$i]." 資料更新失敗!.<br />";
					}
				}

			if(isset($_POST['delete_button'])){
				// for($i=0 ;$i<count($_POST['city_name']); $i++){
				// 	if(isset($_POST['delete_button'][$i])){
				$i = $_POST['delete_button'][0];
				$city_name=$_POST['city_name'][$i];
				$district_name=$_POST['district_name'][$i];
				echo '<Script>console.log("'.$district_name.'")</Script>';
				
				$updatesql="DELETE 
				FROM postcode_area
				WHERE city='$city_name' and district='$district_name'";					

				if(mysqli_query($link,$updatesql)){ //sucess
					change_record($link,2,1,'Delete');
					echo $updatesql;
				}else{ //failed						
					echo $updatesql;
				}
				// 	}				 
				// }
			}

			if(isset($_POST['isearch'])){
				$search_name=$_POST['isearch'];
				$sql="SELECT *
				FROM postcode_area NATURAL JOIN city_area
				WHERE
				postcode_area.city ='$search_name'";
			  // echo $sql;
				$ro=mysqli_query($link,$sql);
				$row=mysqli_fetch_assoc($ro);
				$total=mysqli_num_rows($ro);
				if($total!=0){
				// echo "查尋到".$total."筆資料<br />";
					?>
					<div class="container-fluid">
						<div class="row">
							<div class='col-lg-1'></div>
							<div class="col-lg-6">
								<form  method="post" name="mylist">
									<table cellspacing=1px>
										<tr>
											<td>地區</td>
											<td>修改前的縣市名</td>
											<td>修改後的縣市名</td>
											<td>修改前的鄉鎮名</td>
											<td>修改後的鄉鎮名</td>
											
										</tr>
										<?php
										$num=0;
										do{
											?>
											<tr>
												<td>
													<input type="text"size='13px' name="area_name[]" value="<?php echo $row['area']; ?>" readonly='readonly'>
												</td>
												<td>
													<input type="text" size='13px' name="city_name[]" value="<?php echo $row['city']; ?>">
												</td>
												<td>
													<input type="text" size='13px' name="city[]" value="<?php echo $row['city']; ?>">
												</td>
												<td>
													<input type="text"  size='13px' name="district_name[]" value="<?php echo $row['district']; ?>">
												</td>
												<td>
													<input type="text"size='13px'  name="district[]" value="<?php echo $row['district']; ?>">
												</td>
												
												<td>
													<button class="btn btn-danger" type="submit" name="delete_button[]" value="<?php echo $num; ?>" style="width:70px">刪除</button>
												</td>
												<td >
													<button type="submit" name="update_button[]" style="width:70px" class="btn btn-primary "value="<?php echo $num; ?>">修改</button><br />
												</td>
											</tr>											
											<?php
											$num=$num+1;
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