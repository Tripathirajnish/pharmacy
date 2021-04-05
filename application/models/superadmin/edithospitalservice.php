<?php  include_once('includes/header.php');  ?>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<script language="JavaScript" src="https://code.jquery.com/jquery-1.11.1.min.js" type="text/javascript"></script>
<script language="JavaScript" src="https://cdn.datatables.net/1.10.4/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script language="JavaScript" src="https://cdn.datatables.net/plug-ins/3cfcc339e89/integration/bootstrap/3/dataTables.bootstrap.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">

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
            <center><h1 class="m-0 text-dark">Edit Hospital Resource</h1></center>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Edit Hospital Resource</li>
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
       <?php if($error1 = $this->session->flashdata('error1')){ ?>
      <div class="col-sm-12">
      <div class="alert alert-danger alert-dismissible">
          <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
          <strong><?= $error1?></strong>
      </div>
    </div>
      <?php   } ?>
    <!-- Main content -->
<section class="content">
     
     <div class="card-body card-block">
                 <?php echo form_open('superadmin/HospitalserviceController/addServices');?>
                    <div id="dynamicInput">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="nf-email" class=" form-control-label"><b>Insurance Type</b></label>
                                <select name="insurance" class="form-control" required="">
                                    <option value="">--Select Type--</option>
                                    <option value="CASH" <?php if($datas->insurance_type == 'CASH'){ echo 'selected'; } ?> >CASH</option>
                                    <option value="TPA"  <?php if($datas->insurance_type == 'TPA'){ echo 'selected'; } ?> >TPA</option>
									</select></div>
                        </div>
                        <hr>

                        <div class="row">
                            <div class="col-md-4">
                                <label for="nf-email" class=" form-control-label">Primary Doctor Visit Per Day</label>
                                <input type="text" class="form-control" name="primary_v" id="primary_v" value="<?= $datas->p_doctor_visit; ?>" placeholder="Enter Primary Dr.Visit Charge..." required=""></div>
                            <div class="col-md-4">
                                <label for="nf-email" class=" form-control-label">Secondary Doctor Visit Per Day</label>
                                <input type="text" class="form-control" name="secondary_v" id="secondary_v"  value="<?= $datas->s_doctor_visit; ?>" placeholder="Enter Secondary Dr. Visit Charge..." required=""></div>
                            <div class="col-md-4">
                                <label for="nf-email" class=" form-control-label">AC Charge Per Day</label>
                                <input type="text" class="form-control"  value="<?= $datas->ac_charge; ?>" name="ac" id="ac" placeholder="Enter AC Charge..." required=""></div>
                        </div>
                        <br>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary btn-sm" name="submit">
                                <i class="fa fa-dot-circle-o"></i> Submit
                            </button>
                            <button type="reset" class="btn btn-danger btn-sm">
                                <i class="fa fa-ban"></i> Reset
                            </button>
                      </div>
        </div></form>
    </div>
       </section>
     </div>
   </div>
</body>
 <style>
   span.list-item {
  display: inline;
  /*margin-left: 0.02em;*/
  margin-left: 1em;
  margin-bottom: 0.2em;
}
  .custom-verified-section{
    background: white;
  }
  .custom-admin-panel{
    font-weight: 800;
  }
  .pagination>li {
display: inline;
padding:0px !important;
margin:0px !important;
border:none !important;
}
.modal-backdrop {
  z-index: -1 !important;
}
/*
Fix to show in full screen demo
*/
iframe
{
    height:700px !important;
}

.btn {
display: inline-block;
padding: 6px 12px !important;
margin-bottom: 0;
font-size: 14px;
font-weight: 400;
line-height: 1.42857143;
text-align: center;
white-space: nowrap;
vertical-align: middle;
-ms-touch-action: manipulation;
touch-action: manipulation;
cursor: pointer;
-webkit-user-select: none;
-moz-user-select: none;
-ms-user-select: none;
user-select: none;
background-image: none;
border: 1px solid transparent;
border-radius: 4px;
}

.btn-primary {
color: #fff !important;
background: #428bca !important;
border-color: #357ebd !important;
box-shadow:none !important;
}
.btn-danger {
color: #fff !important;
background: #d9534f !important;
border-color: #d9534f !important;
box-shadow:none !important;
}
 </style>
 <script>
    $(document).ready(function() {
      $('#datatable').dataTable();
    $("[data-toggle=tooltip]").tooltip();
    
    } );


 </script>
    <!-- /.content -->
  </div>
<!-- ./wrapper -->
<?php  include_once('includes/footer.php');  ?>
<?php  include_once('includes/footer-bottom.php');  ?>
