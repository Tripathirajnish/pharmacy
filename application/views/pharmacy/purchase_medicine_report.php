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
              <center><h1 class="m-0 text-dark">Pharmacy Report Export</h1></center>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Pharmacy Report Export</li>
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
       <!--    <?php //echo form_open('doctorController/addDoctor');?> -->
       <div class="card" style="padding: 12px;">
        <div class="card-header">
          <strong>Pharmacy Purchase Report Export</strong>
        </div>
        <div class="card-body card-block">
          <form action="<?= base_url('superadmin/pharmacyReportController/ExportPurchase'); ?>" method="post" name="f2">
            <div id="dynamicInput">
              <!-- <label><b> Pharmacy Sale Report</b></label> -->
              <div class="form-group col-sm-12">
                <label class="col-sm-2 control-label text-right"><label for="Report_Type">Report Type</label></label>
                <div class="col-sm-10">
                  <input checked="checked" id="ReportType" name="ReportType" type="radio" value="Yearly"> Yearly
                  <input id="ReportType" name="ReportType" type="radio" value="Monthly"> Monthly
                  <input checked="checked" id="ReportType" name="ReportType" type="radio" value="Daily"> Daily
                  <!-- <input id="ReportType" name="ReportType" type="radio" value="Total"> Total   -->
                </div>
              </div>
              <!-- <div class="box-body col-md-6 col-sm-12 bArea"> -->
                <div class="form-group col-sm-12" id="ydata">
                  <label class="col-sm-2 control-label text-right"><label for="From_Date">Year</label></label>
                  <div class="col-sm-4">
                    <select name="year"  class="form-control" required="">
                      <option value="">--Year--</option>
                      <option value="2017" if(09-10-2020="=2017)" selected="">2017</option><option value="2018" if(09-10-2020="=2018)" selected="">2018</option><option value="2019" if(09-10-2020="=2019)" selected="">2019</option>
                      <option value="2020" if(09-10-2020="=2020)" selected="">2020</option>
                      <option value="2021" if(09-10-2020="=2021)" selected="">2021</option>
                    </select>
                    
                  </div>
                  <!-- </div> -->
                </div>
                <div class="form-group col-sm-12" id="mdata">
                  <label class="col-sm-2 control-label text-right"><label for="From_Date"> Month</label></label>
                  <div class="col-sm-4">
                    <select class="form-control" name="month">
                      <option value="">--Month--</option>
                      <option value="01">Jan</option>
                      <option value="02">Feb</option>
                      <option value="03">Mar</option>
                      <option value="04">Apr</option>
                      <option value="05">May</option>
                      <option value="06">Jun</option>
                      <option value="07">Jul</option>
                      <option value="08">Aug</option>
                      <option value="09">Sep</option>
                      <option value="10">Oct</option>
                      <option value="11">Nov</option>
                      <option value="12">Dec</option>
                    </select>
                    
                  </div>
                  <label class="col-sm-2 control-label text-right"><label for="From_Date">Year</label></label>
                  <div class="col-sm-4">
                    <select name="year"  class="form-control" required="">
                      <option value="">--Year--</option>
                      <option value="2017" if(09-10-2020="=2017)" selected="">2017</option><option value="2018" if(09-10-2020="=2018)" selected="">2018</option><option value="2019" if(09-10-2020="=2019)" selected="">2019</option><option value="2020" if(09-10-2020="=2020)" selected="">2020</option>
                    </select>
                    
                  </div>
                  <!-- </div> -->
                </div>
                <div class="form-group col-sm-12" id="ddata">
                  <label class="col-sm-2 control-label text-right"><label for="From_Date">From Date</label></label>
                  <div class="col-sm-4">
                    <input value="1/1/2021" class="form-control" id="Enterdatepicker" name="FromDate" type="Date">
                    
                  </div>
                  <label class="col-sm-2 control-label text-right"><label for="From_Date">To Date</label></label>
                  <div class="col-sm-4">
                    <input value="1/1/2021" class="form-control" id="Enterdatepicker" name="FromDate" type="Date">
                    
                  </div>
                  <!-- </div> -->
                </div>
                <div class="col-md-2"><br>
                 <div class="col-md-6">
                  <!-- <button type="submit" class="btn btn-primary btn-sm" name="submit" onclick="f2.action='pharmacyReportController/ExportPurchase';return true;">
                    <i class="fa fa-dot-circle-o"></i>View
                  </button> -->
                </div>
                <div class="col-md-6">
                  <button type="submit" class="btn btn-primary btn-sm" name="submit" onclick="this.form.target='pharmacyReportController/ExportPurchase';return true;">
                    <i class="fa fa-dot-circle-o"></i>Export CSV
                  </button>
                </div>
              </div>


            </div>
          </form>
        </div>
        


      </div>
    </div>

  </div>
  <!-- /.modal-dialog -->  

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
.add-doctor
{
  margin:20px;
}
</style>
<script>
  $(document).ready(function() {
   $('#datatable').dataTable();
   $("[data-toggle=tooltip]").tooltip();
   $("#ydata").hide();
   $("#mdata").hide();
   $("#ddata").hide();
   $("input#ReportType").click(function(){
    $("#ydata").hide();
    $("#mdata").hide();
    $("#ddata").hide();
    var ReportType = $(this).val();
    // alert(ReportType);

    if(ReportType == "Yearly"){
       // alert(ReportType);
       $("#ydata").show();

       var year = $(this).children("option:selected").val();;
       // alert(year);
       // $
     }
     else if(ReportType == "Monthly"){
       // alert(ReportType);
       $("#mdata").show();
     }
     else if(ReportType == "Daily"){
       // alert(ReportType);
       $("#ddata").show();
     }
    // else if(ReportType == "Total"){
    //    // alert(ReportType);
    // }

  });




   $("select#patientreport").change(function(){
     var monthyear = $(this).children("option:selected").val();
     if(monthyear == 'month'){
      $('.patientmonth').addClass("d-block");
      $('.patientyear').addClass("d-block");
      $('.patientctsmbs').addClass("col-md-4");
    }
    if(monthyear == 'annual'){
      $('.patientmonth').removeClass("d-block");
      $('.patientyear').addClass("d-block");
      $('.patientctsmbs').addClass("col-md-4");
    }
  });
   $("select#opdreport").change(function(){
     var monthyear = $(this).children("option:selected").val();
     if(monthyear == 'month'){
      $('.opdmonth').addClass("d-block");
      $('.opdyear').addClass("d-block");
      $('.opdctsmbs').addClass("col-md-4");
    }
    if(monthyear == 'annual'){
      $('.opdmonth').removeClass("d-block");
      $('.opdyear').addClass("d-block");
      $('.opdctsmbs').addClass("col-md-4");
    }
  });
   $("select#ipdreport").change(function(){
     var monthyear = $(this).children("option:selected").val();
     if(monthyear == 'month'){
      $('.ipdmonth').addClass("d-block");
      $('.ipdyear').addClass("d-block");
      $('.ipdctsmbs').addClass("col-md-4");
    }
    if(monthyear == 'annual'){
      $('.ipdmonth').removeClass("d-block");
      $('.ipdyear').addClass("d-block");
      $('.ipdctsmbs').addClass("col-md-4");

    }
  });
 });
  function makerequestobject()
  {
    var xmlHttp=false;
    try
    {
      xmlHttp= new ActiveXObject('Msxml2.XMLHTTP');
    }
    catch(e)
    {
      try
      {
        xmlHttp= new ActiveXObject('Microsoft.XMLHTTP');
      }
      catch(E)
      {
        xmlHttp=false;
      }
    }
    if(!xmlHttp && typeof (XMLHttpRequest)!=undefined)
    {
      xmlHttp=new XMLHttpRequest();
    }
    return xmlHttp;
  }
  function getreport()
  {
    var xmlHttp=makerequestobject();
    var file= 'getreport.php?department='+document.getElementById('department').value+'&' +'sdate='+ document.getElementById('sdate').value+'&' +'tdate='+ document.getElementById('tdate').value;
    xmlHttp.open('GET',file,true);

    xmlHttp.onreadystatechange= function()
    {
      if(xmlHttp.readyState==4 && xmlHttp.status==200)
      {

        var content=xmlHttp.responseText;


        if(content)
        {
          document.getElementById('report').innerHTML=content;
        }
      }
    }
    xmlHttp.send(null);
  }
  function getmonth()
  {
    var xmlHttp=makerequestobject();
    var file= 'getmonth.php?report='+document.getElementById('report').value;
    xmlHttp.open('GET',file,true);

    xmlHttp.onreadystatechange= function()
    {
      if(xmlHttp.readyState==4 && xmlHttp.status==200)
      {

        var content=xmlHttp.responseText;


        if(content)
        {
          document.getElementById('report1').innerHTML=content;
        }
      }
    }
    xmlHttp.send(null);
  }
  function getmonth1()
  {
    var xmlHttp=makerequestobject();
    var file= 'getmonth.php?report='+document.getElementById('report11').value;
    xmlHttp.open('GET',file,true);

    xmlHttp.onreadystatechange= function()
    {
      if(xmlHttp.readyState==4 && xmlHttp.status==200)
      {

        var content=xmlHttp.responseText;


        if(content)
        {
          document.getElementById('report21').innerHTML=content;
        }
      }
    }
    xmlHttp.send(null);
  }
  function getmonth2()
  {
    var xmlHttp=makerequestobject();
    var file= 'getmonth.php?report='+document.getElementById('report41').value;
    xmlHttp.open('GET',file,true);

    xmlHttp.onreadystatechange= function()
    {
      if(xmlHttp.readyState==4 && xmlHttp.status==200)
      {

        var content=xmlHttp.responseText;


        if(content)
        {
          document.getElementById('report31').innerHTML=content;
        }
      }
    }
    xmlHttp.send(null);
  }
</script>
<!-- /.content -->

<!-- ./wrapper -->
<?php  include_once('includes/footer.php');  ?>
<?php  include_once('includes/footer-bottom.php');  ?>
