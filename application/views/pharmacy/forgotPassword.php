<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>forget password</title>
	<link rel="stylesheet" href="">
</head>
<style type="text/css" media="screen">
	body {
  font-family: "Open Sans", sans-serif;
  /*height: 100vh;*/
  /*background: url("https://i.imgur.com/HgflTDf.jpg") 50% fixed;*/
   background-color: #2f889a;
  background-size: cover;
}
.container:hover .top:before, .container:hover .top:after, .container:hover .bottom:before, .container:hover .bottom:after, .container:active .top:before, .container:active .top:after, .container:active .bottom:before, .container:active .bottom:after {
  margin-left: 200px;
  transform-origin: -200px 50%;
  transition-delay: 0s;
}
.container:hover .center, .container:active .center {
  opacity: 1;
  transition-delay: 0.2s;
}

.top:before, .top:after, .bottom:before, .bottom:after {
  content: '';
  display: block;
  position: absolute;
  width: 200vmax;
  height: 200vmax;
  top: 50%;
  left: 50%;
  margin-top: -100vmax;
  transform-origin: 0 50%;
  transition: all 0.5s cubic-bezier(0.445, 0.05, 0, 1);
  z-index: 10;
  opacity: 0.65;
  transition-delay: 0.2s;
}

.top:before {
  transform: rotate(45deg);
  background: #e46569;
}
.top:after {
  transform: rotate(135deg);
  background: #ecaf81;
}

.bottom:before {
  transform: rotate(-45deg);
  background: #60b8d4;
}
.bottom:after {
  transform: rotate(-135deg);
  background: #3745b5;
}

.center {
  position: absolute;
  width: 400px;
  height: 400px;
  top: 50%;
  left: 50%;
  margin-left: -200px;
  margin-top: -200px;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  /*padding: 30px;*/
  opacity: 0;
  transition: all 0.5s cubic-bezier(0.445, 0.05, 0, 1);
  transition-delay: 0s;
  color: #333;
}
.center .login-box-body input, .center .login-box-body button {
  width: 100%;
  padding: 15px 0;
  margin: 5px;
  border-radius: 1px;
  border: 1px solid #ccc;
  font-family: inherit;
}


</style>
<body class="hold-transition login-page" style="background-size: cover; overflow: hidden;">
  
<div class="container" onclick="onclick">
  <div class="top"></div>
  <div class="bottom"></div>
  <div class="center">    
    <form action="<?php echo base_url(); ?>superadmin/authController/forgotPassword" method="post">
      <div class="login-box-body">
    <p class="login-box-msg" align="center"><img src="<?php echo base_url(); ?>assets/images/enslogo.png" alt="Logo" height="50px" ></p><br>
    <?php if($error = $this->session->flashdata('fail_login')){ ?>
    <p class="text-danger"><?php echo  $error; ?></p>
    <?php } ?>
    <label>Email ID :</label>
	<input type="text" name="email" id="name" placeholder="Email ID" required /><br />
	<button type="submit" value="login" name="forgot_pass">Submit</button><br />
	</div>
    </form>
  </div>
</div>
</body>
</html>