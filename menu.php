<div class="row">
    <nav class="navbar navbar-default">
		<a href='/crud-blog/index.php' class="btn btn-primary navbar-btn">Home</a>
		<a href='/crud-blog/?page=lostpassword' class="btn btn-primary navbar-btn">Lost password?</a>
		<a href='/crud-blog?page=registration' class="btn btn-danger navbar-btn">User Registration</a>  
		<?php if(isAdmin()){  ?>
			<a href='/crud-blog?page=addNew' class="btn btn-primary navbar-btn">Add New Post</a>  
		<?php } ?>
		<?php if($_GET['page'] == 'single' AND isAdmin()){  ?>
			<a href='/crud-blog?page=edit&id=<?php echo $_GET['id'];?>&edit' class="btn btn-success navbar-btn">Edit this post</a>  
		<?php } ?>
		<?php if($_GET['page'] == 'single' AND isAdmin()){  ?>
			<a href='/crud-blog?page=single&id=<?php echo $_GET['id'];?>&delete' class="btn btn-danger navbar-btn">Delete this post</a>  
		<?php } ?>
	</nav>
</div>