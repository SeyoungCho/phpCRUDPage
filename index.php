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
	<title>My Page</title>
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
	<h2>Create Post</h2>
	<form action="create_process.php" method="post" >
		<input type="text" name="title" placeholder="Title" /><br><br>
		<textarea name="description" placeholder="description here..."></textarea>
		<br>
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
	<h2><a href="update.php?id=<?=$_GET["id"]?>">Update Post</a></h2> 
	
	<form action="delete_process.php" method="post">
		<input type="hidden" name="id" value="<?=$_GET['id']?>"/>
		<input type="submit" value="Delete" />
</body>
</html>
