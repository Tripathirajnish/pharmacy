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
            <center><h1 class="m-0 text-dark">Stock Medicine Details</h1></center>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Stock Medicine Details</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
	
<?php 

if($success = $this->session->flashdata('success')){ ?>
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
    <div class="row">
      <div class="col-md-12">
        <a href="<?= base_url('pharmacyController/export_medicin'); ?>"><button class="btn btn-primary add-doctor">Export</button></a>
        <center><h3>Stock Medicine Details</h3></center>
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
	  <br><br>
  <form action="<?= base_url('pharmacyController/stock'); ?>" enctype="multipart/form-data" method="post">
		           <div class="row" style="width:80%;">
				     <div class="col-md-12"  style="display:flex;">
						  <label style="margin-left:30px;">Show Data</label>
						  <select value="" name="name" class="form-control chosen patientlist" style="width:30%; margin:0px 30px">		 <option>select</option>
						        <option>All</option>
								<option>This Month</option>
								<option>Last Three Month</option>
								<option>Last Six Month</option>
								<option>This Year</option>
						  </select>
						  <?php if (isset($this->session->flashdata('error1')['name'])) 
									echo $this->session->flashdata('error1')['name'];?>
						<input type="submit" value="search" name="submit" class="btn btn-primary float-right">
                    </div>
				</div>
				   </form>
  <br><br>
          <table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
              <tr>
			    <th>S No.</th>
                <th>Medicine Name</th>
				<th>Quantity</th>
                <th>Created_at</th>
                <th>Updated_at</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>S No.</th>
                <th>Medicine Name</th>
				<th>Quantity</th>
                <th>Created_at</th>
                <th>Updated_at</th>
              </tr>
            </tfoot>
            <tbody>
              <?php 
			  $sn = 1;
			  foreach($stock as $stocks):?> 
              <tr>
                <td><?= $sn; ?></td>
                <td><?= $stocks->medicine_name; ?></td>
                <td><?= $stocks->medicine_quantity; ?></td>
                <td><?= $stocks->created_at;?></td>
                <td><?= $stocks->updated_at; ?></td>
              </tr>
              
            <?php 
			$sn++;
			endforeach;?>
            </tbody>
          </table>
        </div>
      </div>
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
