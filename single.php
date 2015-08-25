<?php  $id = $_GET['id']; 
	$fullPost = getPost($id); 
?>

<h2>Title: <?php echo $fullPost[0]['title']; ?> </h2>
<p>Content: <?php echo $fullPost[0]['content']; ?> </p>
<p>Created: <?php echo $fullPost[0]['created']; ?> </p>