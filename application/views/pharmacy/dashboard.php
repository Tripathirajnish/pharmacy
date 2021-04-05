<?php  include_once('includes/header.php');  ?>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
  <?php  include_once('includes/header-top.php');  ?>
  <?php  include_once('includes/side-menu.php'); ?> 
  
 

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
           

            <h1 class="m-0 text-white">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#"><h1 class="m-0 text-white">Developed By Ens Enterprises</h1></a></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
 <section class="content">
  <div class="row">
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-info"><i class="fa fa-user" aria-hidden="true"></i></span>

              <div class="info-box-content">
               <h4>
                <a href="#">Total Product: <?php echo $patient;?></a></h4>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-success"><i class="fa fa-file" aria-hidden="true"></i></span>

              <div class="info-box-content">
                <h4><a href="#">Total Supplier:  <?php echo $supplier;?></a></h4>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-danger"><i class="fa fa-credit-card" aria-hidden="true"></i></span>

              <div class="info-box-content">
               <h4><a href="#">Total ategory:  <?php echo $category;?></a></h4>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <div class="col-md-3 col-sm-6 col-12">
            <!-- <div class="info-box"> -->
              <!-- <span class="info-box-icon bg-dark"><i class="fa fa-id-card" aria-hidden="true"></i></span> -->

              <!-- <div class="info-box-content"> -->
               <!-- <h4><a href="http://hospital.einsteinnephew.com/superadmin/DoctorDepartmentController">Total Department:  <?php echo $department;?></a></h4> -->
              <!-- </div> -->
              <!-- /.info-box-content -->
            <!-- </div> -->
            <!-- /.info-box -->
          </div>
        </div>
          
          
      <form method='POST'>  
          <div class="form-group"> 
            <div class="col-md-12">
              <label>Search Patient</label>
              <input type="text" name="search" id="searchInput"
 placeholder="Search by Name/Mobile/UHID"class="form-control" style="width:33%;">
            </div> 
          </div>
      </form>
      <div id="t-view"> 
           <div id="searchResult" class="table">
            <?php if(isset($vehicle)) 
            { 
              foreach ($vehicle as $key => $value) 
              { ?> 
                <div class="col-md-4" id="patient-info">
                <h3><?=$value['first_name'] ?></h3>
               </div>
          <?php  
           } } ?> 
        </div> 
      </div>
    </section>
  </div>
</div>
  
      <script type="text/javascript">
  var input = document.getElementById('searchInput'); 
  if( input.value==""|| input.value !="") { input.onkeyup=
function() 
  {
    if(window.XMLHttpRequest) { 
       xmlhttp= new XMLHttpRequest(); 
    } else { 
       xmlhttp= new ActiveXObject("Microsoft.XMLHTTP"); 
   }
 xmlhttp.onreadystatechange=function() { 
   if(this.readyState ==4 && this.status==200) { 
     var searchOutput = JSON.parse(this.responseText); 
     html =""; 
     for(x in searchOutput) {
       html +="<div class='col-md-4' id='patient-info'>";
      html += "<img src='/images/enslogo.png' width='100px' height='100px' style='border-radius:100%'>"; 
       html += "<p>"; 
       html += searchOutput[x].first_name+" "+searchOutput[x].middle_name+" "+searchOutput[x].last_name; 
       html += "</p><p>"; 
       html += searchOutput[x].uhid;
       html += "</p><p>"; 
       html += searchOutput[x].mobile1; 
       html += "</p><p class='pat_id' style='visibility:hidden;'>"; 
       html +=searchOutput[x].id; 
       html += "</p>"; 
       html += "<a href='<?= base_url('superadmin/patientController/view'); ?>?id="+searchOutput[x].id+"'><button class='btn btn-primary' data='"+searchOutput[x].id+"'>View</button></a><a href='<?= base_url('patientController/pdfdetails'); ?>?id="+searchOutput[x].id+"'><button class='btn btn-danger'>Download</button></a>"; 
       html += "</div>"; 
    } 
    document.getElementById('searchResult').innerHTML = html;
   }
  }
 xmlhttp.open("POST","<?php echo site_url('superadmin/opdController/ajaxJavascriptSearch'); ?>",true);
 xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
 xmlhttp.send("search="+input.value); 
 } 
}  
</script> 

 <style>
  .custom-verified-section{
    background: white;
  }
  .custom-admin-panel{
    font-weight: 800;
  }
 </style>
 
<?php  include_once('includes/footer.php');  ?>
<?php  include_once('includes/footer-bottom.php');  ?>
