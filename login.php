<form class="form-signin" action='/crud-blog/rooting-functions.php' method='POST' style='max-width:300px; margin: 0 auto;'>
    <h2 class="form-signin-heading">Signin form</h2>
    <label for="inputEmail" class="sr-only">Email address</label>
    <input type="email" id="inputEmail" name='email' class="form-control" placeholder="Email address" required autofocus>
    <label for="password" class="sr-only">Password</label>
		<input type="password" id="password" name='password' class="form-control" placeholder="Password" required>
    <div class="checkbox">
    <div class="g-recaptcha" data-sitekey="6LeHxAsTAAAAAFq9GrGfTqIK39llrWXeb_6wRJ5W"></div><br /><br /><br /><br />
	<label>
		<input type="checkbox" value="remember-me"> Remember me
    </label>
    </div>
    <button class="btn btn-lg btn-primary btn-block" name='login' type="submit">Sign in</button>
</form>