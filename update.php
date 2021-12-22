<?php 
	function print_title(){
		if(isset($_GET["id"])){
			echo $_GET["id"];
		}else{
			echo "PHP";
		}	
	}
?>

<?php
	function print_description(){
		if(isset($_GET["id"])){
			echo file_get_contents("data/".$_GET["id"]);
		}else{
			echo "Hello, PHP";
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Update Post</title>
</head>
<body>
	<h1><a href="index.php">Web</a></h1>
	<br>
	<ol>
		<?php
			$i = 0;
			$list = scandir("data");
			while($i < count($list)){
				if($list[$i] != '.' && $list[$i] != ".."){
					?><li><a href="index.php?id=<?=$list[$i] ?>"><?=$list[$i]?></a></li>
				<?php }
				$i += 1;
		} ?>
	</ol>
	<h2>Update Post</h2>
	<form action="update_process.php" method="post" >
		<input type="text" name="title" placeholder=<?=$_GET["id"]?> value=<?php print_title() ?> /><br><br>
		<textarea name="description" placeholder=<?php print_description(); ?>><?php print_description() ?></textarea>
		<br>
		<input type="hidden" name="old_name" value="<?= $_GET['id'] ?>"/>
		<input type="submit" value="Submit" />
	</form>
		
	<h1>
		<?php 
			print_title();
		?>
	</h1>
	<p>
		<?php
			print_description();	
		?>
	</p>

</body>
</html>
