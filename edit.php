<?php  $id = $_GET['id']; 
	$fullPost = getPost($id); 
?>


<form action='/crud-blog/rooting-functions.php' method='POST'>
	<div class="input-group">
		<span class="input-group-addon" id="basic-addon1">Add new post</span>
		<input type="text" class="form-control" name='postTitle' value='<?php echo $fullPost[0]['title']; ?>' aria-describedby="basic-addon1" required>
		<textarea class="form-control" rows="5" name='postContent' required><?php echo $fullPost[0]['content']; ?></textarea>
		<input type='hidden' name='postId' value='<?php echo $fullPost[0]['id']; ?>' />
		<input type="submit" name='updatePost' class="btn btn-info" value="Update">
	</div>
</form>