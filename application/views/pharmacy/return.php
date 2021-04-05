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
<link rel = "stylesheet" type = "text/css" href = "<?php echo base_url(); ?>/select2.min.css">
<script type="text/javascript" src="<?php echo base_url(); ?>/select2.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>/jquery-3.2.1.min.js"></script>
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
            <center><h1 class="m-0 text-dark">Return Product</h1></center>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Return Product</li>
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
       <?php if($err = $this->session->flashdata('err')){ ?>
      <div class="col-sm-12">
      <div class="alert alert-danger alert-dismissible">
          <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
          <strong><?= $err?></strong>
      </div>
    </div>
      <?php   } ?>
    <!-- Main content -->
<section class="content">
     <!--    <?php //echo form_open('doctorController/addDoctor');?> -->
<form action="<?= base_url('superadmin/pharmacyController/returnProduct'); ?>" enctype="multipart/form-data" method="post" id="presForm">
        <div class="row">
        
        <div class="col-md-6">
          <label>Prescription Reference Id</label>
          <select name="prescription_ref_id" class="form-control" id="prescription_ref_id">
            <option value=''>-- Select User --</option>    
            <?php foreach($prescription as $prescriptions):?>
            <option value="<?php echo $prescriptions->prescription_ref_id;?>"><?php echo $prescriptions->prescription_ref_id;?></option>
          <?php endforeach;?>
          </select>
        </div>
         <div class="col-md-6">
          <label>Contact Number</label>
          <input type="text" required=""   name="contact"  class="form-control">
          <?php if (isset($this->session->flashdata('error')['contact'])) 
                    echo $this->session->flashdata('error')['contact'];?>
         </div>
         <div class="col-md-6">
          <div class="product" id="product">
            <label>Product Name</label>
            <select name='product_name' class='form-control' id='product_name'><option>Select</option></select>
          </div>
          
         </div>
         <div class="col-md-6">
          <label>Quantity</label>
          <input type="number" required=""  value="" name="quantity" class="form-control" id="quantity">
          <div class="error text-danger">
          </div> 
        </div>
        <div class="cquantity">
          
        </div>
        <div class="col-md-12">
         <br>
          <input type="submit" value="Submit" name="submit" class="btn btn-primary" id="submitBtn">
          <input type="reset" value="Reset" class="btn btn-danger">
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
 </style>
 <script>
    $(document).ready(function() {
      $('#datatable').dataTable();
      $("[data-toggle=tooltip]").tooltip();
      $("#prescription_ref_id").change(function(){ 
      var prescription_ref_id = $(this).val();
      var dataString = "prescription_ref_id="+prescription_ref_id;
      $.ajax({ 
        type: "POST", 
        url: "<?= base_url('superadmin/pharmacyController/presproduct'); ?>", 
        data: dataString, 
        success: function(result){ /* GET THE TO BE RETURNED DATA */
          $("#product").html(result); /* THE RETURNED DATA WILL BE SHOWN IN THIS DIV */
        }
      });
      $("#prescription_ref_id").select2();
    });
    

    /*$("#submitBtn").click(function(){   
      var quantity=$('#quantity').val();
      var quantity1=$('#quantity1').val();
      if(quantity<=quantity1)
      {
        $("#presForm").submit();
      }
      else
      {
        $(".error").html(result);
        return false;
      }   
        //$("#presForm").submit(); // Submit the form
    });*/
    } );


 </script>

    <!-- /.content -->
  </div>
<!-- ./wrapper -->
<?php  include_once('includes/footer.php');  ?>
<?php  include_once('includes/footer-bottom.php');  ?>
