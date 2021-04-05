<html lang="en">
<head>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.min.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
</head>
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
            <center><h1 class="m-0 text-dark">Purchase Medicine</h1></center>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Purchase Medicine</li>
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
  <h3 class="text-center">Purchase Medicine</h3>
     <!--    <?php //echo form_open('doctorController/addDoctor');?> -->

		<form action="<?= base_url('pharmacyController/addpurchasemedicine'); ?>" enctype="multipart/form-data" method="post">
		           <div class="row">
				  <!-- <div class="col-md-4"  style="margin-button 15px;">
						  <label>Patient Type</label>
						  <select value="" name="name" class="form-control cstmprice" id="patienttype"> 
						  <option value="">--select patient type--</option>
						  <option value="opd">OPD</option>
						  <option value="ipd">IPD</option>
						  </select>
						  <?php if (isset($this->session->flashdata('error1')['name'])) 
									echo $this->session->flashdata('error1')['name'];?>
                    </div> -->
				     <div class="col-md-4"  style="margin-button 15px;">
						  <label>Supplier Name</label>
						  <select value="" name="name" class="form-control chosen patientlist">		 <option>select supplier</option>
						  <?php foreach($suppliers as $spl){ ?>
						  <option value="<?= $spl->id ?>"><?= $spl->name ?> </option>
						  <?php } ?>
						  </select>
						  <?php if (isset($this->session->flashdata('error1')['name'])) 
									echo $this->session->flashdata('error1')['name'];?>
                    </div>
					 <div class="col-md-4"  style="margin-button 15px;">
						  <label>Invoice No</label>
						  <input type="text" value="<?= $invoice; ?>" name="invoice" class="form-control">
						  <?php if (isset($this->session->flashdata('error1')['email'])) 
									echo $this->session->flashdata('error1')['email'];?>
                    </div>

					 <div class="col-md-4"  style="margin-button 15px;">
						  <label>Purchase Date</label>
						  <input type="date" value="" name="pdate" class="form-control">
						  <?php if (isset($this->session->flashdata('error1')['address'])) 
									echo $this->session->flashdata('error1')['address'];?>
                    </div>
					  <div class="col-md-12">
                        <table class="table table-bordered" id="item_table" style="width:100%;     margin-top: 50px;" align="center">
                            <tbody class="cstmtbody">
							<tr>
                                <th style="font-size: 15px; width:15%;">Medicin category<span style="color:red">*</span></th>
                                <th style="font-size: 15px;width:15%;">Medicin Name<span style="color:red">*</span></th>
                                <th style="font-size: 15px;">Batch No<span style="color:red">*</span></th>
                                <th style="font-size: 15px;">Expiry Date<span style="color:red">*</span></th>
                                <th style="font-size: 15px;">MRP<span style="color:red">*</span></th>
								<th style="font-size: 15px;">Purchase Price<span style="color:red">*</span></th>
								<th style="font-size: 15px;">Sale Price<span style="color:red">*</span></th>
								<th style="font-size: 15px; width: 11%;">Quantity<span style="color:red">*</span></th>
                                <th style="font-size: 15px;">Total Price<span style="color:red">*</span></th>
							    <th ><button type="button" name="add" class="btn btn-success btn-sm add">+</button></th>
                            </tr>
				             <tr class="clsmttr">
                                <td><select name="mcat[]" id="cat" class="form-control chosen item_unit medcat " required="">
								<option>select</option>
								<?php foreach($category as $ct){?>
								<option value="<?= $ct->id; ?>"><?= $ct->category_name; ?></option>
								<?php } ?>
								</select></td>

                                <td><select type="text" name="mname[]" id="mname" class="form-control mednames" required=""><option>select</option></select>
								</td>
								<td><input type="text" name="bno[]" value="" id="bno" class="form-control batch_no "  required="" >
								</td>
								<td><input type="date" name="expdate[]" value="" id="expdate" class="form-control expdate "  required="" >
								</td>
								<td><input type="text" name="mrp[]" id="mrp" class="form-control mrp"  required="" value="" >
								</td>
								<td><input type="text" name="medprice[]" id="medprice" class="form-control medprice"  required="" value="" >
								</td>
								<td><input type="text" name="saleprice[]" id="saleprice" class="form-control saleprice"  required="" value="" >
								</td>
								<td><input type="text" name="medquan[]" id="medquan" value="" class="form-control medquan"  required="">
								</td>
								<td><input type="text" name="tprice[]" id="tprice" class="form-control tprice"  value="" required="">
								</td>
                              <td><button type="button" name="remove" class="btn btn-danger btn-sm remove"><b>-</b></button></td>
						   </tr>
                        </tbody></table>
						</div>
						<br><br>
						
						</div>
						<div class="customproductdata"></div>
					<div class="row">
					<div class="col-md-6">
					
					 <div class="col-md-12">
					<label><b><br>Discount Narration </b></label>
						<textarea class="form-control" name="dnarration" placeholder="Discount Narration"></textarea>
					</div>
					</div>
					<div class="col-md-6">
					<table class="table table-bordered" align="center">
                    <tbody>
					<tr>
					<td style="width:30%">Grand Total</td>
					<td></td>
					<td><input type="text"  name="grandtotal" class="form-control ctsm_grandtotal" value="0"></td>
					</tr>
                    <tr>
						<td style="width:30%">Discount</td>
						<td> <input type="number" class="form-control" name="discounts" id="discount" value="" placeholder="Discount %"></td>
						<td> <input type="text" class="form-control" name="discount" id="discountamt" value="0"></td>
					</tr>
					<tr>
						<td style="width:30%">Tax</td>
						<td> <input type="number" class="form-control" name="tax" id="tax"  placeholder="Tax %"></td>
						<td> <input type="text" class="form-control" name="tax" id="taxamt" value="0"></td>
					</tr>
					<tr>
						<td style="width:30%">Net Pay</td>
                        <td></td>
						<td><input type="text" class="form-control" name="finalpay" id="finalpay" value="0"></td>
					</tr>
					</tbody>
					</table>
						</div>
                    <div class="col-md-12 ">
					   <div class="col-md-9">
					   <input type="submit" value="print & save" name="submit" class="btn btn-primary float-right cstmsub d-none">
					   </div>
					   <div class="col-md-3 ">
					   <input type="text" value="Calculate" class="btn btn-primary float-left" id="cstmcal">
						</div>
						
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
 <script type="text/javascript">
	$(".chosen").select2();
	$(".mednames").select2();	
$("select.patientlist").change(function(){
        var ptype = $(this).children("option:selected").val();
		//alert(ptype);
	 $.ajax({
			url:"<?=base_url('pharmacyController/selectdoctor')?>",
			type:'POST',
			data: {ptype:ptype},
			success: function(response){
				
			if(response == ''){
				//alert(response);
				$(".doctordata").val('');
				$(".cstmdoctorhos").removeClass("d-none");
				$(".cstmdoctorhos").addClass("d-block");

				$("select.doctorlist").change(function(){
                 var dname = $(this).children("option:selected").val();
		         $(".doctordata").val(dname);
				});

			}else{
				
				$(".doctordata").val(response);
			    $(".cstmdoctorhos").addClass("d-none");

			}
			}
			});

			 });
			$("select.medcat").change(function(){
        var medcat = $(this).children("option:selected").val();
	 $.ajax({
			url:"<?=base_url('pharmacyController/getcategory')?>",
			type:'POST',
			data: {medcat:medcat},
			success: function(response){
				$(".mednames").html(response);
							}
			});

			 });
			  $(".medquan").keyup(function(){
				var quan = $(this).val();
				var price = $(this).parent().parent().find('.medprice').val();
				var tprice = price*quan;
				var price = $(this).parent().parent().find('.tprice').val(tprice);
				var subtotal = 0;
				$(".tprice").each(function(){
				var tprice = $(this).val();
                    subtotal = subtotal+parseInt(tprice);
               });
			   $(".ctsm_grandtotal").val(subtotal);
			 });
			 $("#cstmcal").click(function(){
				 $(".cstmsub").removeClass("d-none");
				 $(".cstmsub").addClass("d-block");
				 var total = $(".ctsm_grandtotal").val();
				 var dis = $("#discount").val();
				var discount = total*dis/100;
				$("#discountamt").val(discount);
				var netpay = total-discount;
				var tax = $("#tax").val();
				tax = netpay*tax/100;
                $("#taxamt").val(tax);
				var finalpay = netpay+tax;
				$("#finalpay").val(finalpay);
			 });
		$(document).ready(function(){
			var cat = 1;
			var med = 1;
			var bno = 1;
			var exd = 1;
			var mp = 1;
			var mq = 1;
			var mqa = 1;
			var mpt = 1;
			$('.add').on('click', function(){
var initSelect2 = function(){

    // function that will initialize the select2 plugin, to be triggered later
    var renderSelect = function(){
        $('.medcates').each(function(){
            $(this).select2();
        })
		$('.mednamees').each(function(){
            $(this).select2();
        })
    };

    // create select2 HTML elements
    var style = document.createElement('link');
    var script = document.createElement('script');
    style.rel = 'stylesheet';
    style.href = 'https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.4/css/select2.min.css';    
    script.type = 'text/javascript';
    script.src = 'https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.4/js/select2.full.min.js';

    // trigger the select2 initialization once the script tag has finished loading 
    script.onload = renderSelect;

    // render the style and script tags into the DOM
    document.getElementsByTagName('head')[0].appendChild(style);
    document.getElementsByTagName('head')[0].appendChild(script);
};

initSelect2();

		    var html = '';
            cat=cat+1;
            med=med+1;
            bno=bno+1;
            exd=exd+1;
            mp=mp+1;
            mq=mq+1;
            mqa=mqa+1;
            mpt=mpt+1;
			html += '<tr>';
			html += '<td><select name="mcat[]" id="mcat'+cat+'" class="form-control item_unit medcates chosen" required=""><option>select</option><?php foreach($category as $ct){?><option value="<?= $ct->id; ?>"><?= $ct->category_name; ?></option><?php } ?></select></td>';
			 html += '<td><select type="text" name="mname[]" value="" id="mname'+med+'" class="form-control item_quantity  mednamees"  required=""><option>select</option></select></td>'; 
			 html += '<td><input type="text" name="bno[]" value="" id="bno'+bno+'" class="form-control batch_no1 "  required="" ></td>';
			 html += '<td><input type="date" name="expdate[]" value="" id="expdate'+exd+'" class="form-control expdate1 "  required="" ></td>';
			 html += '<td><input type="text" name="mrp[]" id="mrp" class="form-control mrp"  required="" value="" ></td>'; 
			 html += '<td><input type="text" name="medprice[]" value="" id="medprice'+mp+'" class="form-control medprice1"  required="" ></td>';
			 html += '<td><input type="text" name="saleprice[]" id="saleprice" class="form-control saleprice"  required="" value="" ></td>'; 
			 html += '<td><input type="text" name="medquan[]" value="" id="medquan'+mq+'" class="form-control medquan"  required="">';
			 html += '<td><input type="text" name="tprice[]" value="" id="tprice'+mpt+'" class="form-control tprice"  required=""></td>';
			html += '<td><button type="button" name="remove" class="btn btn-danger btn-sm remove"><b>-</b></button></td></tr>';
			$('#item_table').append(html);
			  // $("#mcat"+cat).select2();	

				$("select#mcat"+cat).change(function(){
        var medcat = $(this).children("option:selected").val();
	 $.ajax({
			url:"<?=base_url('pharmacyController/getcategory')?>",
			type:'POST',
			data: {medcat:medcat},
			success: function(response){
				$("#mname"+med).html(response);
			}
			});

			 });
             $(".medquan").keyup(function(){
				var quan = $(this).val();
				var price = $(this).parent().parent().find('.medprice1').val();
				var tprice = price*quan;
				var price = $(this).parent().parent().find('.tprice').val(tprice);
				var subtotal = 0;
				$(".tprice").each(function(){
				var tprice = $(this).val();
                    subtotal = subtotal+parseInt(tprice);
               });
			   $(".ctsm_grandtotal").val(subtotal);
			 });
			});
			$(document).on('click', '.remove', function(){
               $(this).closest('tr').remove();
			});
		})
		
	
</script>
    <!-- /.content -->
  </div>
<!-- ./wrapper -->
<?php  include_once('includes/footer.php');  ?>
<?php  include_once('includes/footer-bottom.php');  ?>
