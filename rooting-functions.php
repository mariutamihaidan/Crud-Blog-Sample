<?php
try {
	$handler = new PDO('mysql:host=localhost;dbname=cuimip_crud', 'cuimip_crud', 'cuimip');
	$handler->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
	echo $e->getMessage();
	die();
}
function getPosts(){
	global $handler;
	$allPosts = $handler->query('SELECT LEFT(content,50) as content, id, created_at, title FROM posts');
	while($r = $allPosts->fetch(PDO::FETCH_OBJ)){
		echo "<tr>";
		echo "<td>" . $r->id . "</td>";
		echo "<td><a href='/crud-blog?page=single&id=" . $r->id . "'>" . $r->title . "</a></td>";
		echo "<td>" . $r->content . "</td>";
		echo "<td>" . $r->created_at . "</td>";
		echo "</tr>";
	}
}
function isAdmin(){
	if(isset($_SESSION['email'])){
		global $handler;
		$email = $_SESSION['email'];
		$q = "SELECT type FROM users WHERE email='$email'; ";
		$query = $handler->query($q);
		$result = $query->fetchAll();
		$type = $result[0]['type'];
		if($type == 'admin'){
			return true;
		} else {
			return false;
		}
	}
}
function checkLogin($email,$password){
	global $handler;
	// only if you want to secure it somehow, but if you wanted to receive it by mail.. just leave it..
	// $password = md5($password);
	$q = "SELECT * FROM users WHERE email='$email' AND password='$password'; ";
	$query = $handler->query($q);
	$result = $query->fetchAll();
	if(!empty($result)){
		return true;
	} else { return false;}
}
function getPost($id){
	global $handler;
	$q = "SELECT * FROM posts WHERE id = $id ";
	$query = $handler->query($q);
	$result = $query->fetchAll();
	if(!empty($result)){
		return $result;
	} else { return false;}
}
function loggedIn(){
	@ob_start();
	session_start();
	if(isset($_SESSION['email'])){
		return true;
	} else { return false; }
}
if(isset($_POST['login'])){
	$email = $_POST['email'];
	// only if you want to secure it somehow, but if you wanted to receive it by mail.. just leave it..
	// $password = md5($_POST['password']);
	$password = $_POST['password'];
	
		if(isset($_POST['g-recaptcha-response'])&& $_POST['g-recaptcha-response']){
        $secret = "6LeHxAsTAAAAAJu8KQjCTNtQV_csUz-Vl3kIQ7b8";
        $ip = $_SERVER['REMOTE_ADDR'];
        $captcha = $_POST['g-recaptcha-response'];
        $rsp  = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$captcha&remoteip=$ip");
        $arr = json_decode($rsp,TRUE);
		}
        if($arr['success'] AND checkLogin($email,$password)){
			session_start();
			$_SESSION['email'] = $email;
			header("Location: /crud-blog/");
		}  else {
			header("Location: /crud-blog/");
		}
}
if(isset($_GET['delete']) AND isAdmin()){
	$id = $_GET['id'];
	$deleted = $handler->query("DELETE FROM posts WHERE id = $id; "); 
	if($deleted){
		header("Location: /crud-blog/");
	}
	}	
if(isset($_POST['submitPost'])){
	$title = $_POST['postTitle'];
	$content = $_POST['postContent'];
	if($title AND $content){
	$created_at = date('Y-m-d G:i:s');
	$insert = $handler->query("INSERT INTO posts (title, content, created_at) VALUES ('$title','$content','$created_at')"); 
	if($insert){
		header("Location: /crud-blog/");
	}} else {
		echo "Error, you forgot to fill some fields... ";
	}
	
}
if(isset($_POST['submitUser'])){
	$email = $_POST['userEmail'];
	$password = $_POST['userPassword'];
	if($email AND $password){
		if(isset($_POST['g-recaptcha-response'])&& $_POST['g-recaptcha-response']){
        $secret = "6LeHxAsTAAAAAJu8KQjCTNtQV_csUz-Vl3kIQ7b8";
        $ip = $_SERVER['REMOTE_ADDR'];
        $captcha = $_POST['g-recaptcha-response'];
        $rsp  = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$captcha&remoteip=$ip");
        $arr = json_decode($rsp,TRUE);
        if($arr['success']){
            $insert = $handler->query("INSERT INTO users (email,password,type) VALUES ('$email','$password','user')"); 
			if($insert){
				header("Location: /crud-blog/");
			}
        }else{
            echo 'Spamming boot..';
        }
		}
	}
}

if(isset($_POST['updatePost'])){
	$title = $_POST['postTitle'];
	$content = $_POST['postContent'];
	$id = $_POST['postId'];
	if($title AND $content AND $id){
		$insert = $handler->query("UPDATE posts SET title='$title', content='$content' WHERE id='$id'"); 
	if($insert){
		header("Location: /crud-blog/");
	}
	} else {
		echo "Error, you forgot to fill some fields... ";
	}
	
}
if(isset($_POST['sendPassword'])){
	$email = $_POST['email'];
	$q = "SELECT password FROM users WHERE email='$email'; ";
	$query = $handler->query($q);
	$result = $query->fetchAll();

	if($result[0]['password']){
		$password = $result[0]['password'];
		require_once 'swiftmailer/lib/swift_required.php';
		$transport = Swift_SmtpTransport::newInstance('montecarlo.websitewelcome.com', 465, 'ssl')
		  ->setUsername('swift@cuimip.ro')
		  ->setPassword('swiftmailer')
		  ;
		$mailer = Swift_Mailer::newInstance($transport);
		$message = Swift_Message::newInstance('Your crud blog password')
		  ->setFrom(array('swift@cuimip.ro' => 'Password recoverer'))
		  ->setTo(array($email => $email))
		  ->setBody("Hi, there! Your password for the CRUD sample blog is >>>    $password     <<< and email is $email :) ")
		  ;
		$result = $mailer->send($message);
		header("Location: /crud-blog/");
	} else {
		echo "This email seam not to exist in our database...";
	}
}
