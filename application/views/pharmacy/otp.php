<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">

<!------ Include the above in your HEAD tag ---------->

<div class="container login-container">
            <div class="row">
                
                <div class="col-md-6 login-form-2">
                    <?php if($error1 = $this->session->flashdata('error')){ ?>
                          <div class="col-sm-12">
                          <div class="alert alert-danger alert-dismissible">
                              <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
                              <strong><?= $error1?></strong>
                          </div>
                        </div>
                    <?php   } ?>
                    <div class="login-logo">
                        <img src="<?php echo base_url(); ?>images/enslogo.png" class="" alt="Logo" height="30px">
                    </div>
                    <h3>OTP for Admin</h3>
                    <?php
                    // $error1 = $this->session->flashdata('error1')



                    ?>


                        <?php echo form_open('authController/admin_otp');?>
                         <!-- echo $_SESSION['OTP']['otp']; -->


                <div class="input-group form-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-book"></i>OTP</span>
                    </div>
                    <input type="text" name="otp" class="form-control" placeholder="OTP" required="">
                </div>

               
                    <input type="hidden" name="otp_confirm" value="<?php echo $_SESSION['OTP']['otp']; ?>" class="form-control" placeholder="Password" required="">
             
               <!--  <div class="form-group">

                            <a href="#" class="btnForgetPwd" value="Login">Forget Password?</a>
                        </div>
 -->
                <div class="form-group">
                    <input type="submit" name="submit" value="Sign In" class="btn  btn-primary  login_btn">
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