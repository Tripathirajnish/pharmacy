<?php  include_once('includes/header.php');  ?>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<script language="JavaScript" src="https://code.jquery.com/jquery-1.11.1.min.js" type="text/javascript"></script>
<script language="JavaScript" src="https://cdn.datatables.net/1.10.4/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script language="JavaScript" src="https://cdn.datatables.net/plug-ins/3cfcc339e89/integration/bootstrap/3/dataTables.bootstrap.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery
/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="http://cdn.datatables.net/plug-ins/3cfcc339e89/integration/bootstrap/3/dataTables.bootstrap.css">
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
  <?php  include_once('includes/header-top.php');  ?>
  <?php  include_once('includes/side-menu.php');  ?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <center><h1 class="m-0 text-dark float-left"><span class="font-weight-bold">IPD</span> Paper</h1></center>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">IPD Paper</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
<?php if($success = $this->session->flashdata('success')){ ?>
      <div class="col-sm-12">
      <div class="alert alert-success alert-dismissible">
          <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
          <strong><?= $success ?></strong>
      </div>
    </div>
      <?php   } ?>
       <?php if($error = $this->session->flashdata('error')){ ?>
      <div class="col-sm-12">
      <div class="alert alert-danger alert-dismissible">
          <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
          <strong><?= $error?></strong>
      </div>
    </div>
      <?php   } ?>
    <!-- Main content -->
    <section class="content">
        <div class="card-body card-block">
            <form action="<?= base_url('superadmin/addipd') ?>" method="post" class="">
                <div class="row">
                    <div class="col-md-4">
                        <label for="nf-email" class=" form-control-label">Patient Id</label> <input type="text" id="search" name="pid" required="" placeholder="" class="form-control" value="<?= $patient_details->uhid; ?>" readonly="">

                    </div>
                    <div class="col-md-4">
                        <label for="nf-email" class=" form-control-label">OPD Id</label>
                        <input type="text" name="opdid" class="form-control" placeholder="Enter OPD Id">
                    </div>
                    <div class="col-md-4">
                        <label for="nf-email" class=" form-control-label"><b>Patient Type <span style="color:#f44366;"><b>*</b></span></b></label><br>
                        <input type="radio" name="pstatus" value="Billing" required="">Billing
                        <input type="radio" name="pstatus" value="Non-Billing" required="">Non-Billing
                        <input type="radio" name="pstatus" value="VIP" required="">VIP

                    </div>
                </div>


                <div class="row">
                    <div class="col-md-4">
                        <label for="nf-email" class=" form-control-label">Patient Name</label>
                        <input type="text" id="name" name="name" class="form-control" value="<?= $patient_details->first_name.' '.$patient_details->middle_name. ' '. $patient_details->last_name; ?>" readonly="">
                    </div>
                    <div class="col-md-4">
                        <label for="nf-email" class=" form-control-label">Gender</label>
                        <input type="text" id="gender" name="gender" class="form-control" value="<?= $patient_details->gender; ?>" readonly="">
                    </div>
                    <div class="col-md-4">
                        <label for="nf-email" class=" form-control-label">Age</label>
                        <input type="text" id="age" name="age" class="form-control" value="<?= $patient_details->age; ?>" readonly="">
                    </div>
                </div>


                    <div class="row">
                        <div class="col-md-4">
                            <label for="nf-email" class=" form-control-label">Mobile</label>
                            <input type="text" id="mobile" name="mobile" placeholder="Enter Mobile Number.." class="form-control" value="<?= $patient_details->mobile1.','.$patient_details->mobile2; ?>" readonly="">
                        </div>
                        <div class="col-md-4">
                            <label for="nf-email" class=" form-control-label">Address</label>
                            <input type="text" id="address" name="address" placeholder="Enter Address.." class="form-control" value="<?= $patient_details->address; ?>" readonly="">
                        </div>
                        <div class="col-md-4">
                            <label for="nf-email" class=" form-control-label"><?php if($patient_details->gender == 'female'){ ?>W/O <?php } else { ?> S/O<?php } ?></label><br>
                            <input type="hidden" name="under" value="W/O"><input type="text" name="uname" value="<?= $patient_details->first_name.' '.$patient_details->middle_name. ' '. $patient_details->last_name;  ?>" readonly="" class="form-control"><br>
                        </div>

                    </div>
                <div class="row">
                    <div class="col-md-3">
                        <label for="nf-email" class=" form-control-label">Date <span style="color:#f44366;"><b>*</b></span></label>
                        <input type="date" name="date" class="form-control" value="<?= $date; ?>" required="">
                    </div>
                    <div class="col-md-3">
                        <label for="nf-email" class=" form-control-label">Time <span style="color:#f44366;"><b>*</b></span></label>
                        <input type="time" name="time" class="form-control" value="<?= $time; ?>">
                    </div>
                </div><br>
                <label for="nf-email" class=" form-control-label"><b>Doctor Details</b></label><br>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6"><label for="nf-email" class=" form-control-label">Primary Deparment <span style="color:#f44366;"><b>*</b></span></label>
                            <select name="primary" class="form-control" required="" id="primarydep" >
                                <option value="">--Select a department--</option>
                                <?php foreach($department as $departments){ ?>
                            <option value="<?php echo $departments->opd_name; ?>"><?php echo $departments->opd_name; ?></option>
							<?php }?>
                            </select></div>
                        <div class="col-md-6">                            <label for="nf-password" class=" form-control-label">Doctor Name <span style="color:#f44366;"><b>*</b></span></label>

                            <select name="pdrname" class="pdrname form-control" required="" id="ting">

                            </select></div></div><br>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6"><label for="nf-email" class=" form-control-label">Secondary deparment</label>
                                <select name="secondary" class="form-control" id="secondarydep">
                                    <option value="">--Select a department--</option>
                                <?php foreach($department as $departments){ ?>
                            <option value="<?php echo $departments->opd_name; ?>"><?php echo $departments->opd_name; ?></option>
							<?php }?>                               </select></div>
                            <div class="col-md-6">
                                <label for="nf-password" class=" form-control-label">Doctor Name</label>

                                <select name="sdrname" class="sdrname form-control" id="ting4">
                                </select></div></div></div><br>
                    <label for="nf-email" class=" form-control-label"><b>Insurance Details <span style="color:#f44366;"><b>*</b></span></b></label>
                    <div class="row">
                        <div class="col-md-6">

                            <select name="insurance" class="form-control" required="" id="insurance">
                                <option value="">--Select Type--</option>
                                <option value="CASH">CASH</option>
                                <option value="TPA">TPA</option>                                <option value="Others">OTHER</option>
                            </select>
                        </div>
                   <div class="col-md-3" id="ting5">
                        </div>
                    </div>
<br><label for="nf-email" class=" form-control-label"><b>Ward Details</b></label><br>
<div class="row">
    <div class="col-md-6">
        <label for="nf-email" class=" form-control-label">Select A Ward <span style="color:#f44366;"><b>*</b></span></label><br>
        <select id="ward" name="ward" class="form-control" onchange="getroom()" required="">
            <option value="">--Select a ward--</option>
			<?php foreach($warddata as $warddatas){ ?>
                            <option value="<?php echo $warddatas->id; ?>"><?php echo $warddatas->ward_name; ?></option>
			<?php } ?>
        </select>
    </div>
    <div class="col-md-6">
        <div>
            <label for="nf-email" class=" form-control-label">Select A Bed <span style="color:#f44366;"><b>*</b></span></label><br>
            <select name="bed" class="cstmbed form-control" required="" id="show">
                </select>
        </div>
    </div>
</div>
  <div class="row">
       <div class="col-md-4">
		<label>Any Remark</label>
	<textarea class="form-control" placeholder="Any Remark" name="remark"></textarea></div>
</div><br>
<div id="pay">

</div>
  <div class="card-footer">
            <button type="submit" class="btn btn-primary btn-sm">
                <i class="fa fa-dot-circle-o"></i> Submit
            </button>
            <button type="reset" class="btn btn-danger btn-sm">
                <i class="fa fa-ban"></i> Reset
            </button> </div></div></form>
        </div>
    </section>
  
        </div>
      </div>
     <script>
	 $(document).ready(function(){
    $("select#primarydep").change(function(){
        var selectedep = $(this).children("option:selected").val();
		  $.ajax({
			 url:"<?=base_url('superadmin/getdepartment')?>",
			 type:'POST',
			 data: {selectedep: selectedep},
			 success: function(response){
			  if(response){
				   $('.pdrname').children().remove();
				  $('.pdrname').append(response);
				}
			 }
		   });
    });
	$("select#secondarydep").change(function(){
        var selectedep = $(this).children("option:selected").val();
		  $.ajax({
			 url:"<?=base_url('superadmin/getdepartment')?>",
			 type:'POST',
			 data: {selectedep: selectedep},
			 success: function(response){
			  if(response){
				   $('.sdrname').children().remove();
				  $('.sdrname').append(response);
				}
			 }
		   });
    });
	
	$("select#ward").change(function(){
        var selecteward = $(this).children("option:selected").val();
		  $.ajax({
			 url:"<?=base_url('superadmin/getdepartment')?>",
			 type:'POST',
			 data: {selecteward: selecteward},
			 success: function(response){
			  if(response){
                 $('.cstmbed').children().remove();
				 $('.cstmbed').append(response);
				}
			 }
		   });
    });
});
</script>

</body>
 <option value=""></option>
    <!-- /.content -->
  </div>
<!-- ./wrapper -->
<?php  include_once('includes/footer.php');  ?>
<?php  include_once('includes/footer-bottom.php');  ?>
