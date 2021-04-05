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
   <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <center><h1 class="m-0 text-dark">Medicine Import</h1></center>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Medicine Import</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- Main content -->
	<br><br><br>
<section class="content" style="background: #ffff; padding: 30px;">
<h3 style="padding:15px;">medicines</h3>
<p style="padding:15px; border-bottom: 1px solid gray; border-top: 1px solid gray;">Note: Your CSV data should be in the format below.</p>
         <div class="row">
        <!-- Import link --> 
        <div class="col-md-4 head">
            <div class="float-right">
                <a href="javascript:void(0);" class="btn btn-success" onclick="formToggle('importFrm');"><i class="plus"></i>Csv Import</a>
            </div>
        </div>
		<br><br>
        <!-- File upload form -->
        <div class="col-md-12" id="importFrm" style="display: none;">
            <form action="<?php echo base_url('ImportController/import'); ?>" method="post" enctype="multipart/form-data">
			    <div class="col-md-3 head">
				        <label>Medicine Category<span style="color:red">*</span></label>
						<select name="medcat" class="form-control" required>
						 <?php foreach($category as $cat) { ?>
						 <option value="<?=$cat->id; ?>"><?= $cat->category_name; ?></option>
						 <?php } ?>
						</select>
				</div>
				<div class="col-md-3 head">
				<label>Select CSV File<span style="color:red">*</span></label>
                <input type="file" name="file" required />
				</div>
				<div class="col-md-2 head">
                <input type="submit" class="btn btn-primary" name="importSubmit" value="IMPORT">
				</div>
				<div class="col-md-3 head">
				<button class="btn btn-primary"><a href="<?php echo base_url('ImportController/sample'); ?>" style="color:#fff"> Download Sample CSV File</a></button>
				</div>
            </form>
        </div>

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
.combo {
  display: block;
  margin-bottom: 1.5em;
  max-width: 400px;
  position: relative;
}
.combo-menu {
  background-color: #f5f5f5;
  border: 1px solid rgba(0,0,0,.42);
  border-radius: 0 0 4px 4px;
  display: none;
  max-height: 300px;
  overflow-y:scroll;
  left: 0;
  position: absolute;
  top: 100%;
  width: 100%;
  z-index: 100;
}

.open .combo-menu {
  display: block;
}

.combo-option {
  padding: 10px 12px 12px;
}

.combo-option.option-current,
.combo-option:hover {
  background-color: rgba(0,0,0,0.1);
}

.combo-option.option-selected {
  padding-right: 30px;
  position: relative;
}

.combo-option.option-selected::after {
  border-bottom: 2px solid #000;
  border-right: 2px solid #000;
  content: '';
  height: 16px;
  position: absolute;
  right: 15px;
  top: 50%;
  transform: translate(0, -50%) rotate(45deg);
  width: 8px;
}

 </style>
 <script>
function formToggle(ID){
    var element = document.getElementById(ID);
    if(element.style.display === "none"){
        element.style.display = "block";
    }else{
        element.style.display = "none";
    }
}
 </script>
    <!-- /.content -->
  </div>
<!-- ./wrapper -->
<?php  include_once('includes/footer.php');  ?>
<?php  include_once('includes/footer-bottom.php');  ?>
