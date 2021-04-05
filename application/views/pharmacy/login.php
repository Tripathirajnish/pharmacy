<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">

<!------ Include the above in your HEAD tag ---------->

<div class="container login-container">
  <div class="row">
    <div class="col-md-6 login-form-2">
      

      <div class="login-logo">
        <img src="<?php echo base_url(); ?>images/enslogo.png" class="" alt="Logo" height="30px">
      </div>
      <?php if($error1 = $this->session->flashdata('fail_login')){ ?>
        <div class="col-sm-12">
          <div class="alert alert-danger alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
            <strong><?= $error1; ?></strong>
          </div>
        </div>
      <?php   } ?>
      
      <?php if($success = $this->session->flashdata('success')){ ?>
        <div class="col-sm-12">
          <div class="alert alert-success alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
            <strong><?= $success?></strong>
          </div>
        </div>
      <?php   } ?>
      <h3>Login in Pharmacy</h3>
      <?php echo form_open('authController/login');?>
      <div class="form-group input-group has-feedback">
        <input type="email" class="form-control" name="email" placeholder="Email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        <?php echo form_error('email',"<p class='text-danger'>","</p>");?>
      </div>
      <div class="form-group input-group has-feedback">
        <input type="password" class="form-control" name="password" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        <?php echo form_error('password',"<p class='text-danger'>","</p>");?>
      </div>
      <div class="form-group">

        <a href="<?= base_url('pharmacy/authController/password'); ?>" class="btnForgetPwd" value="Login">Forget Password?</a>
      </div>


      <div class="form-group">
       <button type="submit" class="btn btn-primary btn-block btn-flat" name="submit"><i class="fa fa-paper-plane-o"></i> Sign In</button></div>
     </div>
     
   </form>

 </div>
</div>
</div>

<style type="text/css">
  body
  {
    background-image: url(/images/background.jpg);
    background-repeat: no-repeat;
    background-position: center;
    background-size: cover;
  }
  
  .login-container{
    margin-top: 5%;
    margin-bottom: 5%;
  }
  .login-logo{
    position: relative;
    margin-left: -41.5%;
  }
  .login-logo img{
    margin-top: -28%;
    margin-left: 33%;
    height: 85px;
  }
  .login-form-1{
    padding: 9%;
    background:#282726;
    box-shadow: 0 5px 8px 0 rgba(0, 0, 0, 0.2), 0 9px 26px 0 rgba(0, 0, 0, 0.19);
  }
  .login-form-1 h3{
    text-align: center;
    margin-bottom:12%;
    color:#fff;
  }
  .login-form-2{
    padding: 9%;
    background: #5e4de487;
    box-shadow: 0 5px 8px 0 rgba(0, 0, 0, 0.2), 0 9px 26px 0 rgba(0, 0, 0, 0.19);
    margin: 5% auto;
    width: 100%;
  }
  .login-form-3
  {
    background: #ffa600;
  }
  .login-form-2 h3{
    text-align: center;
    margin-bottom:12%;
    color: #fff;
  }
  .btnSubmit{
    font-weight: 600;
    width: 50%;
    color: #282726;
    background-color: #fff;
    border: none;
    border-radius: 1.5rem;
    padding:2%;
  }
  .btnForgetPwd{
    color: #fff;
    font-weight: 600;
    text-decoration: none;
  }
  .btnForgetPwd:hover{
    text-decoration:none;
    color:#fff;
  }
</style>