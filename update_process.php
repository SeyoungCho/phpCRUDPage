<?php
rename('data/'.$_POST["old_name"], 'data/'.$_POST['title']);
file_put_contents('data/'.$_POST['title'], $_POST['description']);
header('Location: /~cse20161646/php/index.php?id='.$_POST['title']);
?>
