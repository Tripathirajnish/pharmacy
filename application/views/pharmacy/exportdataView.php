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
            <center><h1 class="m-0 text-dark">Export Details</h1></center>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Export Details</li>
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
        
    <div class="row">
      <div class="col-md-12">
       <form action="<?= base_url('superadmin/ExportController/export'); ?>" method="post" accept-charset="utf-8">
          <?php $a=0;
          foreach ($fcon as $key ) {
            $value[$a] = $key;
            $a++;
          }
          // echo $report;
          if ($report == "annual ") {?>
            <input type="hidden" name="year" value="<?= $value[0]; ?>">
            <input type="hidden" name="report" value="<?= $report; ?>">
          <?php 
        }else{ ?>
          <input type="hidden" name="year" value="<?= $value[0]; ?>">
          <input type="hidden" name="month" value="<?= $value[1]; ?>">
          <input type="hidden" name="report" value="<?= $report; ?>">
       <?php }
          ?>
          <!-- <input type="hidden" name="h_id" value="<?= $value[2]; ?>"> -->
         <input type="submit" class="btn btn-primary" value="Download as CSV">
       </form> 

        <center><h3>Export Details</h3></center>
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
          <table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
              <tr>
                <th>Sr No.</th>
                <th>Patient Id</th>
                <th>Name</th>
                <th>Under</th>
                <th>Relative Name</th>
                <th>Gender</th>
                <th>Age</th>
                <th>Mobile1</th>
                <th>Mobile2</th>
                <th>Address</th>
                <!-- <th>Area</th> -->
                <th>City</th>
                <th>State</th>
                <!-- <th>Patient Type</th> -->
                <th>DOB</th>
                <th>Date</th>
                <!-- <th>Time</th> -->
                <!-- <th>View</th>
                <th>Download</th> -->
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>Sr No.</th>
                <th>Patient Id</th>
                <th>Name</th>
                <th>Under</th>
                <th>Relative Name</th>
                <th>Gender</th>
                <th>Age</th>
                <th>mobile1</th>
                <th>mobile2</th>
                <th>Address</th>
                <!-- <th>Area</th> -->
                <th>City</th>
                <th>State</th>
                <!-- <th>Patient Type</th> -->
                <th>DOB</th>
                <th>Date and Time</th>
                <!-- <th>Time</th> -->
                <!-- <th>View</th>
                <th>Download</th> -->
              </tr>
            </tfoot>
            <tbody>
              <?php $a=1; foreach($query as $patients):  ?> 
              <tr>
                <td><?= $a; ?></td>
                <td><?= $patients->uhid; ?></td>
                <td><?= $patients->first_name.' '.$patients->middle_name.' '.$patients->last_name; ?></td>
                <td><?= $patients->relative;?></td>
                <td><?= $patients->relative_name;?></td>
                <td><?= $patients->gender; ?></td>
                <td><?= $patients->age; ?></td>
                <td><?= $patients->mobile1; ?></td>
                <td><?= $patients->mobile2; ?></td>
                <td><?= $patients->address; ?></td>
                <!-- <td><?= isset($patients->area)?$patients->area:'' ; ?></td> -->
                <td><?= $patients->city; ?></td>
                <td><?= $patients->state; ?></td>
                <!-- <td><?= $patients->patient_type;?></td> -->
                <td><?= $patients->dob; ?></td>
                <td><?= $patients->created_at; ?></td>
              </tr>
            <?php $a++; endforeach;?>
            </tbody>
          </table>
          <!-- <?php print_r($fcon); ?> -->
        </div>
      </div>
    </div>

<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title custom_align" id="Heading">Edit Your Detail</h4>
      </div>
      <div class="modal-body">

        <div class="form-group">
          <input class="form-control " type="text" placeholder="Tiger Nixon">
        </div>
        <div class="form-group">
          <input class="form-control " type="text" placeholder="System Architect">
        </div>
        <div class="form-group">
          <input class="form-control " type="text" placeholder="Edinburgh">
        </div>
        </div>
          <div class="modal-footer ">
            
          </div>
        </div>
    <!-- /.modal-content --> 
      </div>
      <!-- /.modal-dialog --> 
    </div>
    <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title custom_align" id="Heading">Delete this entry</h4>
          </div>
          <div class="modal-body">
            <div class="alert alert-danger"><span class="glyphicon glyphicon-warning-sign"></span> Are you sure you want to delete this Record?</div>
       
          </div>
         <div class="modal-footer ">
          <a href="<?= base_url('doctorController/deleteDoctor'); ?>?id=<?= $doctors->id; ?>"><button type="button" class="btn btn-success" ><span class="glyphicon glyphicon-ok-sign"></span> Yes</button></a>
          <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> No</button>
        </div>
      </div>
    <!-- /.modal-content --> 
    </div>
      <!-- /.modal-dialog --> 
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
