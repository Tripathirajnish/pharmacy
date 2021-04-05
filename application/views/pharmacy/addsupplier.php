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
            <center><h1 class="m-0 text-dark">Add Supplier</h1></center>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Add Supplier</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
<?php if($success = $this->session->flashdata('success1')){ ?>
      <div class="col-sm-12">
      <div class="alert alert-success alert-dismissible">
          <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
          <strong><?= $success ?></strong>
      </div>
    </div>
      <?php   } ?>
       <?php if($error = $this->session->flashdata('error1')){ ?>
      <div class="col-sm-12">
      <div class="alert alert-danger alert-dismissible">
          <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
          <strong><?= $error?></strong>
      </div>
    </div>
      <?php   } ?>
    <!-- Main content -->
	<br><br>
<section class="content">
     <!--    <?php //echo form_open('doctorController/addDoctor');?> -->
<form action="<?= base_url('pharmacyController/addsupplier'); ?>" enctype="multipart/form-data" method="post">
        <div class="row">
		<div class="col-md-4">
          <label>Supplier Name</label>
          <input type="text" value="" id="supplier" name="name" class="form-control" placeholder="Supplier Name " >
          <input type="hidden" value="" id="cstmid" name="hid" class="form-control">
		  <div id="searchResult" class="table"></div>
		  <?php if (isset($this->session->flashdata('error1')['name'])) 
                    echo $this->session->flashdata('error1')['name'];?>
        </div>
        <div class="col-md-4">
          <label>Email</label>
          <input type="email" value="" name="email" class="form-control" >
		  <?php if (isset($this->session->flashdata('error1')['code'])) 
                    echo $this->session->flashdata('error1')['code'];?>
        </div>
        <div class="col-md-4">
          <label>Contact No</label>
          <input type="text" value="" name="contact_no" class="form-control" >
		  <?php if (isset($this->session->flashdata('error1')['formulation'])) 
                    echo $this->session->flashdata('error1')['formulation'];?>
        </div>
        <div class="col-md-4">
          <label>Address</label>
          <input type="text" value="" name="address" class="form-control" >
		  <?php if (isset($this->session->flashdata('error1')['p_price'])) 
                    echo $this->session->flashdata('error1')['p_price'];?>
        </div>
		 <div class="col-md-12">
         <br>
          <input type="submit" value="Submit" name="submit" class="btn btn-primary">
        </div>
      </div>
    </form>
	<!--<button><a href="<?= base_url('superadmin/SendsmsController/index'); ?>">Sendsms</a></button> -->
   <br><br>
       <div class="col-md-12">
      <table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
              <tr>
                <th>S no.</th>
                <th>Supplier Name</th>
                <th>Email</th>
                <th>Contact No</th>
                <th>Address</th>
                <th>Edit</th>
                <th>Delete</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>S no.</th>
                <th>Supplier Name</th>
                <th>Email</th>
                <th>Contact No</th>
                <th>Address</th>
                <th>Edit</th>
                <th>Delete</th>
              </tr>
            </tfoot>
            <tbody>
              <?php
                $sn = 1; 
			  foreach($suppliers as $spl):
			  ?> 
              <tr>
                <td><?= $sn; ?></td>
                <td><?= $spl->name; ?></td>
                <td><?= $spl->email; ?></td>
                <td><?= $spl->contact_no; ?></td>
                <td><?= $spl->address; ?></td>
				<td><a href="<?= base_url('pharmacyController/editsupplier'); ?>?id=<?= $spl->id; ?>"><button type="button" class="btn btn-primary" ><span class="glyphicon glyphicon-pencil"></span></button></a></td>
                <td><a href="<?= base_url('pharmacyController/deletesupplier'); ?>?id=<?= $spl->id; ?>"><button type="button" class="btn btn-success" ><span class="glyphicon glyphicon-remove"></span></button></a></td>
              </tr>
            <?php 
			$sn++;
			endforeach;?>
            </tbody>
          </table>
		  </div>
     
       </section>
     </div>
   </div>
</body>
 <style>
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
#searchResult{
    z-index: 1;
    position: absolute;
    background: #fff;
    width: 92%;
}
#searchResult .ststsmli.add{ padding:10px; border-bottom: 1px solid; }
 </style>
  <script type="text/javascript">
  $(document).ready(function(){
	  $('#datatable').dataTable();
    $("[data-toggle=tooltip]").tooltip()
  });
</script> 
    <!-- /.content -->
  </div>
<!-- ./wrapper -->
<?php  include_once('includes/footer.php');  ?>
<?php  include_once('includes/footer-bottom.php');  ?>
