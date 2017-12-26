<?php
include_once('entrypoint.php');

//registerSession(1);
//$a = array('email' => 'shyamsundar011@gmail.co', 'pass' => cryptPass('shyam'), 'fname' => 'Shyam1', 'lname' => 'Sundar1', 'user_type' => 'Admin', 'created_at' => date('Y-m-d H:i:s'));
//echo crud::create('users',$a);
//echo crud::delete('users', ' AND id=5 ');
//echo LoginRegister::register(array('email' => 'shyamsundar011@gmail.co.in','pass'=>'shyamyadav'));

if(isset($_POST['dologin'])){
	$trylogin = LoginRegister::login($_POST['email'], $_POST['password']);
	$_SESSION['err'][] = $trylogin;
}

if( isset($_SESSION['user_type']) && isset($_SESSION['id']) ){
	echo '<meta http-equiv="refresh" content="1; url='.SITE_URL_ADMIN.'dashboard.php">';//exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Admin | Login</title>
<link href="assests/css/bootstrap.min.css" rel="stylesheet">
<link href="assests/css/font-awesome.min.css" rel="stylesheet">
<link href="assests/css/nprogress.css" rel="stylesheet">
<link href="assests/css/animate.min.css" rel="stylesheet">
<link href="assests/css/custom.min.css" rel="stylesheet">
</head>

<body class="login">
<div> <a class="hiddenanchor" id="signup"></a> <a class="hiddenanchor" id="signin"></a>
  <div class="login_wrapper">
    <div class="animate form login_form">
      <section class="login_content">
        <form method="post">
          <h1>Login Form</h1>
<?php showSessionMessage($_SESSION['err']); ?>
          <div><input type="text" class="form-control" name="email" value="<?php echo @$_POST['email']?>" placeholder="Email" required /></div>
          <div><input type="password" name="password" value="<?php echo @$_POST['password']?>" class="form-control" placeholder="Password" required /></div>
          <div> <input type='submit' class="btn btn-default submit" name="dologin" value="Log in"> <a class="reset_pass" href="#">Lost your password?</a> </div>
          <div class="clearfix"></div>
          <div class="separator">
            <p class="change_link">New to site? <a href="#signup" class="to_register"> Create Account </a> </p>
            <div class="clearfix"></div>
            <br />
            <div><h1><i class="fa fa-paw"></i> Gentelella Alela!</h1>
            <p>©2016 All Rights Reserved. Gentelella Alela! is a Bootstrap 3 template. Privacy and Terms</p>
            </div>
          </div>
        </form>
      </section>
    </div>
    <div id="register" class="animate form registration_form">
      <section class="login_content">
        <form>
          <h1>Create Account</h1>
          <div><input type="email" class="form-control" placeholder="Email" required /></div>
          <div><input type="password" class="form-control" placeholder="Password" required /></div>
          <div> <a class="btn btn-default submit">Submit</a> </div>
          <div class="clearfix"></div>
          <div class="separator">
            <p class="change_link">Already a member ? <a href="#signin" class="to_register"> Log in </a> </p>
            <div class="clearfix"></div>
            <br />
            <div><h1><i class="fa fa-paw"></i> Gentelella Alela!</h1>
              <p>©2016 All Rights Reserved. Gentelella Alela! is a Bootstrap 3 template. Privacy and Terms</p>
            </div>
          </div>
        </form>
      </section>
    </div>
  </div>
</div>
</body>
</html>
