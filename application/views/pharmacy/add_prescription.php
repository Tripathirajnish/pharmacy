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
                <center><h1 class="m-0 text-dark">Add Prescription</h1></center>
              </div><!-- /.col -->
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Add Prescription</li>
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
          <div class="row">
            <div class="col-md-12">
              <center><h3>Add Prescription</h3></center>
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
              <section>
                <!-- <?php include('sidebar.php');?> -->
                <div class="main-content" >
                  <!-- <?php include('topbar_patient.php');?> -->
                  <div class="wrapper">
                    <div class="panel deep-white-box">
                      <div class="panel-body">
                        <div class='row'>
                          <div class='panel deep-white-box' style="width:100%;"> 
                            <div class='panel-body'>
                              <div class='col-sm-9'>
                                <table >
                                  <tr style="display: inline;">                              
                                   <?php
                                   if( $p_info = $this->session->userdata('patient_info'))
                                     {      $p_id = $p_info['p_id'];                              
                                   ?>
                                   <td style="display: inline;" ><?= $p_info['p_name'];?></td> 
                                   <td style='padding-left:30px;display: inline;'><?= $p_info['p_gender'] ;?></td>
                                   <td style='padding-left:30px;display: inline;'><?= $p_info['p_age'] ;?> Years</td>
                                   <td style='padding-left:30px ; display: inline;'>(ID: <?= $p_info['p_id'] ;?>)</td> 
                                 <?php  }?> 
                               </tr>
                             </table>
                           </div>
                         </div>
                       </div>                   
                     </div>
                     <div class="row">
                      <!-- <?php include('patient_sidebar.php');?> -->
                <!-- <div class='col-sm-10'>
                   
                    <div class="row"> 
                        <div class="col-md-10">
                           <div class='panel deep-white-box'>
                                
                           </div>
                        </div>
                    </div>
                  </div> -->
                  <div class="col-sm-2">
                    <img src="https://cdn.pixabay.com/photo/2015/03/04/22/35/head-659651_960_720.png" height="100px" width="100px">
                  </div>
                  <div class='col-sm-2'>
                    <ul class="nav nav-pills nav-stacked">
                      <li class=""><a href="<?= base_url('superadmin/prescriptionController/patient_treatment');?>?id=<?= $p_id; ?>"><i class="fa fa-user"></i> <span>Profile</span></a></li>
                      <!-- <li class=""><a href="<?= base_url('Clinical_notes')?>"><i class="fa fa-book"></i> <span>Clinical Notes</span></a></li> -->
                      
                            <!-- <li class="menu-list"><a href=""><i class="fa fa-book"></i> <span>File</span></a>
                               
                            </li> -->
                            <li class=""><a href="<?= base_url('superadmin/prescriptionController/patient_prescription')?>?patient_id=<?= $p_id; ?>"><i class="fa fa-book"></i> <span>Prescription</span></a></li>             
                          </ul>
                        </div>
                        <div class='col-sm-12'>
                          <?php echo form_open('superadmin/prescriptionController/add_prescribe_drug');?>
                          <div class="row"> 
                           
                           <div class="col-md-9">
                            <table class="table table-bordered" id="item_table" style="width:100%" align="center">
                              <tbody class="cstmtbody">
                               <tr>
                                <th>Medicin Name </th>
                                <th>Medicine Strength</th>
                                <th>Instruction</th>
                                <th>Duration</th>
                                <th><button type="button" name="add" class="btn btn-success btn-sm ststsmli">+</button></th>
                              </tr>
                          <!--  <tr class="clsmttr">
                                <td><input type="text" required=""  value="" name="medicine_name[]" id="searchInput" class="form-control">
								</td>

                                <td><input type="text" required=""  value="" name="strength[]" class="form-control"></td>
								<td><input type="text" required=""  value="" name="duration[]" class="form-control"></td>
								<td><input type="text" required=""  value="" name="instruction[]" class="form-control"></td>
                              <td><button type="button" name="remove" class="btn btn-danger btn-sm remove"><b>-</b></button></td>
                            </tr> -->

                          </tbody></table>
                          <table class="table table-bordered" id="item_table1" style="width:100%" align="center">
                            <tbody class="cstmtbody">
                             <tr>
                              <th>Lab Test Name </th>
                              <th><button type="button" name="add" class="btn btn-success btn-sm ststsmli1">+</button></th>
                            </tr>
                            <tr class="clsmttr">
                              <td><select type="text" required=""  value="" name="lab_name[]" class="form-control">
                                <?php foreach($labtests as $labtest){ ?><option value="<?= $labtest->test_name; ?>"><?= $labtest->test_name; ?></option><?php } ?></select>
                              </td>
                              <td><button type="button" name="remove1" class="btn btn-danger btn-sm remove"><b>x</b></button></td>
                            </tr> 

                          </tbody></table>
                        </div>
                        <script>
                          
                          $(document).ready(function(){
                            $(document).on('click', '.remove', function(){
                              $(this).closest('tr').remove();
                            });
                            $(document).on('click', '.remove1', function(){
                              $(this).closest('tr').remove();
                            });
                            
                            
                            $(document).on('click', '.ststsmli1', function(){
                              var co = 1;
                              var html = '';
                              co=co+1;
                              html += '<tr>';
                              html += ' <td><select type="text" required=""  value="" name="lab_name[]" class="form-control"><?php foreach($labtests as $labtest){ ?><option value="<?= $labtest->test_name; ?>"><?= $labtest->test_name; ?></option><?php } ?></select></td>';
                              html += '<td><button type="button" name="remove" class="btn btn-danger btn-sm remove1"><b>x</b></button></td></tr>';
                              $('#item_table1').append(html);
                            });
                          });
                        </script>
                        <div class="col-md-3">
                          <label> Search medicine</label>
                          <input type="text" required=""  value="" name="" id="searchInput" class="form-control" placeholder="Search Medicine By Name">
                          <div id="searchResult" class="table"></div>
                        </div>
                      </div>
                      <div class="col-md-12">
                       <br>
                       <input type="submit" value="Submit" name="submit" class="btn btn-primary">
                       <input type="reset" value="Reset" class="btn btn-danger">
                     </div>
                   </form>
                 </div>
               </div>
             </div>
           </div>         
         </div>
       </div>
     </section>
   </div>
 </div>

</section>    
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
.ststsmli.add{
	padding: 10px;
	border-bottom: 1px solid;
}
.list-unstyled{
	margin-top:10px;
}
</style>
<script type="text/javascript">
  $(document).ready(function(){
    $("#searchInput").keyup(function(){
      var med = $(this).val();
      if(med != ''){
       $.ajax({
        url:"<?=base_url('superadmin/PrescriptionController/Searchmedicine')?>",
        type:'POST',
        data: {med: med},
        success: function(response){
          if(response == '<ul class="list-unstyled"></ul>'){
           $("#searchResult").fadeIn();
           $("#searchResult").html("<p class='text-danger'>Medicine not fount</p>");
         }else{
           $("#searchResult").fadeIn();
           $("#searchResult").html(response);
         }
       }
     });
     }else{
       $("#searchResult").fadeOut();
       $("#searchResult").html(" ");
     }
   });
    $(document).on('click', '.ststsmli', function(){
     
     
      var val = $(this).text();
      if(val == '+'){
        val = '';
      }else{
        val = $(this).text();
      }
      $("#searchResult").fadeOut();
      var co = 1;
      var html = '';
      co=co+1;
      html += '<tr>';
      html += ' <td><input type="text" required=""  value="'+val+'" name="medicine_name[]" class="form-control findmedicine"><div  class="table"></div> </td>';
      html += '<td><input type="text" required=""  value="" name="strength[]" class="form-control"></td>';
      html += '<td><input type="text" required=""  value="" name="instruction[]" class="form-control"></td>';
      html += ' <td style="display:flex;"><input type="text" required=""  value="" name="duration[]" class="form-control"><select name="d_type[]" styel="margin-left: 4px;border-radius: 5px;"><option value="Days">Days</option><option value="Months">Months</option></select></td>';
      html += '<td><button type="button" name="remove" class="btn btn-danger btn-sm remove"><b>x</b></button></td></tr>';
      $('#item_table').append(html);
    });
  });
</script> 

<!-- /.content -->
</div>
<!-- ./wrapper -->
<?php  include_once('includes/footer.php');  ?>
<?php  include_once('includes/footer-bottom.php');  ?>
