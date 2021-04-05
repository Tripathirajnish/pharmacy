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
            <center><h1 class="m-0 text-dark">Sale Medicine</h1></center>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Sale Medicine</li>
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
<h6 class="btn btn-primary float-right"><a href="<?= base_url('pharmacyController/Sale_product_list'); ?>" style="color:#fff"><span style="font-size:15px;"></span>View Sale Product</a></h6> 
  <h3 class="text-center">Sale Medicine</h3>
     <!--    <?php //echo form_open('doctorController/addDoctor');?> -->

        <div class="row" style="margin-bottom: 54px; padding-bottom: 37px;">
        <div class="col-md-4">
          <label>Search Medicine</label>
          <input type="text" required=""  id="searchInput" value="" name="cname" class="form-control" placeholder="Search Medicine By Medicine Name">
		  <input type="hidden" value="" id="cstmid" name="hid" class="form-control ">
		  <div id="searchResult" class="table"></div>
        </div>
		<div class="col-md-4">
          <label>Medicine Quantity</label>
          <input type="text" required=""  id="hiddenquan" value="" name="quan" class="form-control" placeholder="Enter Medicine Quantity">
		  
        </div>
        <div class="col-md-4">
         <br>
          <input type="submit" id="checkavailablity" value="Check Availablity" name="submit" class="btn btn-primary">
        </div>
		 </div>
		
		<form action="<?= base_url('pharmacyController/updatesalemedicine'); ?>" enctype="multipart/form-data" method="post">
		           <div class="row">
				     <div class="col-md-4"  style="margin-button 15px;">
						  <label>Patient Name</label>
						  <input type="text" value="" name="name" class="form-control cstmprice">
						  <?php if (isset($this->session->flashdata('error1')['name'])) 
									echo $this->session->flashdata('error1')['name'];?>
                    </div>
					 <div class="col-md-4"  style="margin-button 15px;">
						  <label>Patient Email</label>
						  <input type="text" value="" name="email" class="form-control">
						  <?php if (isset($this->session->flashdata('error1')['email'])) 
									echo $this->session->flashdata('error1')['email'];?>
                    </div>
					 <div class="col-md-4"  style="margin-button 15px;">
						  <label>Patient Phone No</label>
						  <input type="text" value="" name="phone" class="form-control">
						  <?php if (isset($this->session->flashdata('error1')['phone'])) 
									echo $this->session->flashdata('error1')['phone'];?>
                    </div>
					 <div class="col-md-4"  style="margin-button 15px;">
						  <label>Patient Address</label>
						  <input type="text" value="" name="address" class="form-control">
						  <?php if (isset($this->session->flashdata('error1')['address'])) 
									echo $this->session->flashdata('error1')['address'];?>
                    </div>
					  <div class="col-md-12">
                        <table class="table table-bordered" id="item_table" style="width:80%;     margin-top: 50px;" align="center">
                            <tbody class="cstmtbody">
							<tr>
                                <th>Medicin Name </th>
                                <th>Medicine Price</th>
								<th>Medicine Quantity</th>
                                <th>Total Price</th>
							    <th><button type="button" name="add" class="btn btn-success btn-sm ststsmli">+</button></th>
                            </tr>
                        </tbody></table>
						</div><br><br>
						
						</div>
					<div class="row">
					<div class="col-md-3">
					<label><b>Grand Total <span style="color:#f44366;"><b>*</b></span></b></label>
					<input type="text"  name="grandtotal" class="form-control ctsm_grandtotal" value="0">
					</div>
					<div class="col-md-2">
						<label><b>Discount % <span style="color:#f44366;"><b>*</b></span></b></label>
						<input type="number" class="form-control" name="discount" id="discount" value=""></div>
					<div class="col-md-3">
						<label><b>Net Pay <span style="color:#f44366;"><b>*</b></span></b></label>
						<input type="text" class="form-control" name="finalpay" id="finalpay" value=""></div>
					<div class="col-md-3"> <label><b><br>Discount Narration </b></label>
						<textarea class="form-control" name="dnarration" placeholder="Discount Narration"></textarea>
					</div>
					<input type="hidden" name="mig" value="1" autocomplete="off">
                    <div class="col-md-12">
						<input type="submit" value="Procced Sale" name="submit" class="btn btn-primary">
						</div>
				</div>
				   </form>
				   <div class="cstmfieldhidden"></div>
				   <br>
				   <br><br>
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
#searchResult{
    z-index: 1;
    position: absolute;
    background: #fff;
    width: 92%;
}
#searchResult .ststsmli.add{ padding:10px; border-bottom: 1px solid; }
 </style>
 <script>
    $(document).ready(function() {
		  $('#datatable').dataTable();
		$("[data-toggle=tooltip]").tooltip();
		 $("#searchInput").keyup(function(){
			var med = $(this).val();
			if(med != ''){
			 $.ajax({
			url:"<?=base_url('pharmacyController/SearchSaleMedicine')?>",
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
				
			 var ival = $(this).children('.hiddenid').val(); 
			 //alert(ival);
				$('#cstmid').val(ival);		 
			var val = $(this).text();
			if(val == '+'){
				 val = '';
			}else{
				 val = $(this).text();
			}
				$('#searchInput').val(val);
			$("#searchResult").fadeOut();
		});
		
		$("#checkavailablity").click(function(){
			var id = $("#cstmid").val();
			var quan = $("#hiddenquan").val();
			
			 $.ajax({
			url:"<?=base_url('pharmacyController/CheckAvailablity')?>",
			type:'POST',
			data: {id: id, quan:quan},
			success: function(response){
				//alert(response);
				if(response != 1 && response != ''){
				$(".cstmfieldhidden").find(".list-unstyled").remove();
			$(".cstmfieldhidden").append(response);
			 var cmname = $(".cstmsalemname").val();
			  var cmquan = $(".cstmsalemquan").val();
			  var cmprice = $(".cstmsalemprice").val();
			  var id = $(".cstmsalemid").val();
			  var cmtotalprice = cmquan*cmprice;
			  var co = 1;
			  if(cmquan !=0){
				var html = '';
				co=co+1;
				html += '<tr>';
				html += ' <td><input type="text" required=""  value="'+cmname+'" name="medicine_name[]" class="form-control"><input type="hidden" value="'+id+'" name="hid[]" class="form-control"><div  class="table"></div> </td>';
				 html += '<td><input type="text" required=""  value="'+cmprice+'" name="cprice[]" class="form-control cstmmediprice"></td>';
				 html += '<td><input type="text" required=""  value="'+cmquan+'" name="cquan[]" class="form-control cstmmediquan"></td>';
				  html += ' <td style="display:flex;"><input type="text" required=""  value="'+cmtotalprice+'" name="ctotalprice[]" class="form-control cstmsalepri"></td>';
				html += '<td><button type="button" name="remove" class="btn btn-danger btn-sm remove"><b>x</b></button></td></tr>';
				$('#item_table').append(html);
				alert('Medicine Details show in the bellow list');
			   }else{
				   alert('quantity is zero please enter max quantity');
			   }
				}else if(response == 1){
					alert('This product not available in hospital');
			}else{
				alert('This quantity is not available please choose min');
			}
             var ctsprice = 0;
			$(".cstmsalepri").each(function(){
				ctsprice = ctsprice + parseInt($(this).val());
			});
			$(".ctsm_grandtotal").val(ctsprice);
			}
			});
			
		});
		$(document).on('click', '.remove', function(){
           $(this).closest('tr').remove();
         });
		$("#discount").keyup(function(){
			var disamt = $(this).val();
			var val = $(".ctsm_grandtotal").val();
			discountamt = val*disamt/100;
			var netpay = val-discountamt;
			$("#finalpay").val(netpay);
		});
		$("#discount").click(function(){
			var disamt = $(this).val();
			var val = $(".ctsm_grandtotal").val();
			discountamt = val*disamt/100;
			var netpay = val-discountamt;
			$("#finalpay").val(netpay);
		});
		
    });


 </script>
    <!-- /.content -->
  </div>
<!-- ./wrapper -->
<?php  include_once('includes/footer.php');  ?>
<?php  include_once('includes/footer-bottom.php');  ?>
