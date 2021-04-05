<div class="col-md-6">                    
	<div class="panel panel-info" >
		<div class="panel-heading">
			<div class="panel-title">Enter OTP</div>                        
		</div> 
		<div style="padding-top:30px" class="panel-body" >
			
			<form id="authenticateform" class="form-horizontal" role="form" method="POST" action="<?= base_url('superadmin/authController/verify'); ?>">  					
				<div style="margin-bottom: 25px" class="input-group">
					<label class="text-success">Check your email for OTP</label>
					<input type="text" class="form-control" id="otp" name="otp" placeholder="One Time Password">                       
				</div>                          
				<div style="margin-top:10px" class="form-group">                               
					<div class="col-sm-12 controls">
					  <input type="submit" name="authenticate" value="Submit" class="btn btn-success">						  
					</div>
				</div>                                
			</form>   
		</div>                     
	</div>  
</div>