<!doctype html>
	<html lang="en">
	<?php
	// include_once('connect.php');

	function select_menu($link,$table,$attr,$name){
		?>
		<select name='."$name."' >
			<?php
		$sql="SELECT '$attr' FROM '$table' ";
						// $list =mysql_query($str,$link);
		$ro=mysqli_query($link,$sql);
		$row=mysqli_fetch_assoc($ro);
		$total=mysqli_num_rows($ro);
		do
		{
			?>
			<option value="<?php echo $row[$attr]; ?>"><?php echo $row[$attr];?></option>
			<?php
		}while($row=mysqli_fetch_assoc($ro));
		?>
		</select>
}
</html>