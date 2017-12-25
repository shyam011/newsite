<!DOCTYPE>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<title>Videos</title>
<link href="assests/css/materialize.min.css" rel="stylesheet" type="text/css">
</head>
<style>
body{margin:0px;padding:0px;font-family:Calibri;background:#fff;color:#333;height:100%;}
.clear{clear:both;}
ul,ol,p,h1,h2,h3,h4,h5,h6,p{margin:0px;padding:0px;font-weight:normal;}
.input-field {margin:0px;}
.loginpage {background:#08a5c7 url(assests/images/loginbg.png) no-repeat;background-size:cover;overflow:hidden;}
.logo {background:url(assests/images/logo.png) no-repeat top center;background-size:180px;margin:20px;color:#fff;text-align:center;}
.logo p {padding-top:50px;font-size:17px;}
.loginform {margin-top:15%;}
.loginform form {width:98%;margin:0px auto;position:relative;overflow:hidden;}
.loginform label,.loginform label.active { color:#fff !important;}
.loginform input { border-color: #fff !important; box-shadow:none !important;color:#fff;}
.loginform .input-field label:not(.label-icon).active {-webkit-transform:translateY(-5px) scale(0.8);transform:translateY(-5px) scale(0.8);}
.loginform .clickbtn {border:none;width:100%;display:block;background:#8498e6;padding:5px 10px;color:#fff;border-radius:15px;font-size:15px;cursor:pointer;}
.loginform a {text-align:center;color:#fff;font-size:15px;display:block;width:100%;border-radius:5px;}
.loginform [type="checkbox"]+label:before, .loginform [type="checkbox"]:not(.filled-in)+label:after {border:2px solid #fff;}
.loginform [type="checkbox"]:checked+label:before {border-top:2px solid transparent;border-left:2px solid transparent;}
.loginform [type="checkbox"]+label {padding-left:30px;line-height:21px;}
#singup, #forget {max-height:100%;height:100%;z-index:9;overflow:hidden;}
.closebtn {background:#8498e6;}
.closebtn a {color:#fff;padding:0 10px;}
.registation {margin-top:30;}

</style>
<body class="loginpage">
<div class="logo"><p>Lorem Ipsum is dummy text.</p></div>
<div class="loginform">
    <form class="col s12">
      <div class="row login">
      <div class="input-field col s12"><input id="email" type="email" class="validate"><label for="email">Email</label></div>
      <div class="input-field col s12"><input id="password" type="password" class="validate"><label for="password">Password</label></div>
      <div class="col s6"><input type="checkbox" id="test5" ><label for="test5">SAVE PASSWORD</label></div>
      <div class="col s6"><a href="#forget" class="modal-trigger waves-effect waves-light">Forget Password</a></div>
      <div class="clear" style="min-height:20px"></div>
      <div class="input-field col s6"><button class="waves-effect waves-light clickbtn">SIGN IN</button></div>
      <div class="input-field col s6"><a href="#singup" class="modal-trigger waves-effect waves-light clickbtn">Create Account</a></div>
      <div class="clear" style="min-height:40px"></div>
      <div class="input-field col s12"><button class="waves-effect waves-light indigo accent-2 clickbtn">Or Login with Facebook</button></div>
      </div>      
      </div>
    </form>
  </div>
<div id="forget" class="modal bottom-sheet">
<div class="closebtn"><a href="javascript:void(0);" class="modal-action modal-close waves-effect waves-blue btn-flat">Back</a></div>
  <div class="row registation">
      <div class="input-field col s12"><input id="loginmail" type="email" class="validate"><label for="loginmail">Email</label></div>
      <div class="input-field col s12"><input id="loginpassword" type="password" class="validate"><label for="loginpassword">Password</label></div>
      <div class="input-field col s12"><input id="conformpassword" type="password" class="validate"><label for="conformpassword">Conform Password</label></div>
      <div class="input-field col s6"><button class="btn indigo lighten-2 waves-effect waves-light clickbtn">SIGN IN</button></div>
      </div> 
  </div> 
 
  
<div id="singup" class="modal bottom-sheet">
<div class="closebtn"><a href="javascript:void(0);" class="modal-action modal-close waves-effect waves-blue btn-flat">Back</a></div>
  <div class="row registation">
      <div class="input-field col s12"><input id="name" type="text" class="validate"><label for="name">Full Name</label></div>
      <div class="input-field col s12"><input id="createemail" type="email" class="validate"><label for="createemail">Email</label></div>
      <div class="input-field col s12"><input id="createpassword" type="password" class="validate"><label for="createpassword">Password</label></div>
      <div class="input-field col s12"><input type="text" class="datepicker"><label for="password">Dath of Birth</label></div>
      <div class="sex col s6"><input class="with-gap" name="group1" type="radio" id="male" ><label for="male">Male</label></div>
      <div class="sex col s6"><input class="with-gap" name="group1" type="radio" id="female" ><label for="female">Female</label></div>
      <div class="clear" style="min-height:20px"></div>
      <div class="input-field col s12"><button class="btn indigo lighten-2 waves-effect waves-light clickbtn">SIGN IN</button></div>
      </div> 
  </div>  
  
  
<script src="assests/js/jquery.min.js"></script>
<script src="assests/js/materialize.min.js"></script>
<script>
$('.modal').modal();
$('.datepicker').pickadate({
    selectMonths: true, // Creates a dropdown to control month
    selectYears: 15, // Creates a dropdown of 15 years to control year,
    today: 'Today',
    clear: 'Clear',
    close: 'Ok',
    closeOnSelect: false // Close upon selecting a date,
  });
</script>
</body>
</html>
