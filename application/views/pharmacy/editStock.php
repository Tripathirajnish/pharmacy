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
            <center><h1 class="m-0 text-dark">Edit Stock</h1></center>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Edit Stock</li>
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
	<br><br>
<section class="content">
     <!--    <?php //echo form_open('doctorController/addDoctor');?> -->
<form action="<?= base_url('pharmacyController/updateStock'); ?>" enctype="multipart/form-data" method="post">
        <div class="row">
		<div class="col-md-4">
        
          <input type="hidden" value="<?=$stock->id; ?>" name="sid">
          <input type="hidden" value="" id="cstmid" name="hid" class="form-control">
          <label>Code</label>
          <input type="text" value="<?=$stock->code; ?>" name="code" class="form-control" >
		  <?php if (isset($this->session->flashdata('error1')['code'])) 
                    echo $this->session->flashdata('error1')['code'];?>
        </div>
        <div class="col-md-4">
          <label>Medicine Name</label>
          <input type="text" value="<?=$stock->product_name; ?>" name="product_name" class="form-control" >
		  <?php if (isset($this->session->flashdata('error1')['product_name'])) 
                    echo $this->session->flashdata('error1')['product_name'];?>
        </div>
        <div class="col-md-4">
          <label>Unit</label>
          <input type="text" value="<?=$stock->unit; ?>" name="unit" class="form-control" >
		  <?php if (isset($this->session->flashdata('error1')['unit'])) 
                    echo $this->session->flashdata('error1')['unit'];?>
        </div>
        <div class="col-md-4">
          <label>Current Stock</label>
          <input type="text" value="<?=$stock->current_stock; ?>" name="current_stock" class="form-control" >
      <?php if (isset($this->session->flashdata('error1')['current_stock'])) 
                    echo $this->session->flashdata('error1')['current_stock'];?>
        </div>
        <div class="col-md-4">
          <label>Sales Scheme</label>
          <input type="text" value="<?=$stock->sales_scheme; ?>" name="sales_scheme" class="form-control" >
      <?php if (isset($this->session->flashdata('error1')['sales_scheme'])) 
                    echo $this->session->flashdata('error1')['sales_scheme'];?>
        </div>       
        <div class="col-md-4">
          <label>Sales Scheme Deal</label>
          <input type="text" value="<?=$stock->sales_scheme_deal; ?>" name="sales_scheme_deal" class="form-control" >
      <?php if (isset($this->session->flashdata('error1')['sales_scheme_deal'])) 
                    echo $this->session->flashdata('error1')['sales_scheme_deal'];?>
        </div>       
        <div class="col-md-4">
          <label>Sales Scheme Free</label>
          <input type="text" value="<?=$stock->sales_scheme_free; ?>" name="sales_scheme_free" class="form-control" >
      <?php if (isset($this->session->flashdata('error1')['unit'])) 
                    echo $this->session->flashdata('error1')['unit'];?>
        </div>       
        <div class="col-md-4">
          <label>Purc Scheme Deal</label>
          <input type="text" value="<?=$stock->purc_scheme_deal; ?>" name="purc_scheme_deal" class="form-control" >
      <?php if (isset($this->session->flashdata('error1')['purc_scheme_deal'])) 
                    echo $this->session->flashdata('error1')['purc_scheme_deal'];?>
        </div>       
        <div class="col-md-4">
          <label>Purc Scheme Free</label>
          <input type="text" value="<?=$stock->purc_scheme_free; ?>" name="purc_scheme_free" class="form-control" >
      <?php if (isset($this->session->flashdata('error1')['purc_scheme_free'])) 
                    echo $this->session->flashdata('error1')['purc_scheme_free'];?>
        </div>       
        <div class="col-md-4">
          <label>Cost Price</label>
          <input type="text" value="<?=$stock->cost_price; ?>" name="cost_price" class="form-control" >
      <?php if (isset($this->session->flashdata('error1')['unit'])) 
                    echo $this->session->flashdata('error1')['unit'];?>
        </div>
        <div class="col-md-4">
          <label>M.R.P.</label>
          <input type="text" value="<?=$stock->mrp; ?>" name="mrp" class="form-control" >
      <?php if (isset($this->session->flashdata('error1')['mrp'])) 
                    echo $this->session->flashdata('error1')['mrp'];?>
        </div>
        <div class="col-md-4">
          <label>Purchase Price</label>
          <input type="text" value="<?=$stock->purchase_price; ?>" name="purchase_price" class="form-control" >
      <?php if (isset($this->session->flashdata('error1')['unit'])) 
                    echo $this->session->flashdata('error1')['unit'];?>
        </div>
        <div class="col-md-4">
          <label>Sales Price</label>
          <input type="text" value="<?=$stock->sales_price; ?>" name="sales_price" class="form-control" >
      <?php if (isset($this->session->flashdata('error1')['sales_price'])) 
                    echo $this->session->flashdata('error1')['sales_price'];?>
        </div>
        <div class="col-md-4">
          <label>Company</label>
          <input type="text" value="<?=$stock->company; ?>" name="company" class="form-control" >
      <?php if (isset($this->session->flashdata('error1')['company'])) 
                    echo $this->session->flashdata('error1')['company'];?>
        </div>
        <div class="col-md-4">
          <label>Manufacturer</label>
          <input type="text" value="<?=$stock->manufacturer; ?>" name="manufacturer" class="form-control" >
      <?php if (isset($this->session->flashdata('error1')['manufacturer'])) 
                    echo $this->session->flashdata('error1')['manufacturer'];?>
        </div>
        <div class="col-md-4">
          <label>Rack No.</label>
          <input type="text" value="<?=$stock->rack_no; ?>" name="rack_no" class="form-control" >
      <?php if (isset($this->session->flashdata('error1')['rack_no'])) 
                    echo $this->session->flashdata('error1')['rack_no'];?>
        </div>

		 <div class="col-md-12">
         <br>
          <input type="submit" value="Update" name="submit" class="btn btn-primary">
        </div>
      </div>
    </form>
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
