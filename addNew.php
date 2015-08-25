<form action='/crud-blog/rooting-functions.php' method='POST'>
	<div class="input-group">
		<span class="input-group-addon" id="basic-addon1">Add new post</span>
		<input type="text" class="form-control" name='postTitle' placeholder="Insert title here" aria-describedby="basic-addon1" required>
		<textarea class="form-control" rows="5" name='postContent' placeholder="Insert content here" required></textarea>
		<input type="submit" name='submitPost' class="btn btn-info" value="Submit Button">
	</div>
</form>