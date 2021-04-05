<!DOCTYPE html>
<html>
<style>
    .wrapper{
        border: 1px solid;
        width: 10in;
        height: 8in;
        margin: 0 auto; 
        font-family: sans-serif;
        border-collapse: collapse;
    }
    .header{
        float: left;
        width: 99.6%;
        /*border-bottom: 1px solid;*/
    }
    .history fieldset{
        /*border: 1px solid blue;*/
         margin : 20px 0px;
    }
    
    .history table{
        border-collapse: collapse;font-size: 14px;width: 100%;
    }
    .history table tr{
        border-collapse: collapse;
    }
    .history table tr td{
        padding: 5px;text-align: left;
    }


</style>
<body>
    <div class="wrapper">
        <div class="header">
            <div style="float: left;width: 99.6%;border-bottom: 0px solid;">
                <img src="<?= base_url() ?>images/enslogo.png" style="margin:5px auto;height: 50px;width: 100px;float: left;"/>
                <div style="float: left;width: 271px;margin-top: 10px;">
                    <h1 style="float: left;margin: 0px;font-size: 21px;"><?php //$HospitalDetails['HospitalFullName']?></h1>
                    <h6 style="margin: 0px;float: left;width: 100%;"><?php //$HospitalDetails['HospitalAddress']?></h6>
                    <h6 style="float: left;width: 100%;">Phone: <?= isset($phonos->phone)?$phonos->phone:'-'?> </h6>
                </div>
                <div style="float: left;width: 475px;margin-top: 10px;">
                    <h2 style="float: left;width: 100%;"><span style="padding-right: 41px;">Medicine Bill Slip</span></h2>
                </div>
                <div style="float: right;width: 85px;margin-right: 3px;margin-top: 15px;">
                    <h4 style="float: right;margin: 0px;width: 71%;border: 1px solid;padding: 2px 3px;font-size: 13px;text-align: center;">
                        <img src="https://th.bing.com/th?q=Doctor+Plus+Symbol" style="margin:5px auto;height: 60px;width: 60px;float: right;"/></h4>
                </div>
            </div>
        </div>
        <div class="discharge_body">
            <div class="history">
                <fieldset>
                <table style="border-collapse: collapse;font-size: 14px;width: 100%">
                    <thead>
					<tr style="border-collapse: collapse;">
                            <th style="padding: 5px;text-align: left;">Invoice No :</th>
                            <td style="text-align: left;"><?=isset($invoice)?$invoice:'-'?></td>
                            <th style="text-align: left;">Date:</th>
                            <td  style="text-align: left;"><?=isset($pdate)?$pdate:'-'?></td>
                        </tr>
                        <tr style="border-collapse: collapse;">
						<?php $spl = $this->db->get_where('supplier', ['id' => $supplier])->row(); ?>
                            <th style="padding: 5px;text-align: left;">Supplier Name :</th>
                            <td style="text-align: left;"><?=isset($spl->name)?$spl->name:'-'?></td>
                            <th style="text-align: left;">Email Id:</th>
                            <td  style="text-align: left;"><?=isset($spl->email)?$spl->email:'-'?></td>
                        </tr>
                       
                    </thead>
                </table>
            </fieldset>
			 <fieldset>
               
                <table style="border-collapse: collapse;font-size: 14px;width: 100%">
                    <thead>
                        <tr style="border-collapse: collapse;">
                            <th style="padding: 5px;text-align: left;">S.no :</th>
							<th style="text-align:left;">Medicine Name :</th>
							<th style="text-align:left;">batch no :</th>
							<th style="text-align:left;">Expiry Date :</th>
							<th style="text-align:left;">Quantity :</th>
							<th style="text-align:left;">price :</th>
							<th style="text-align:left;">Total Cost :</th>
						</tr>
					   <?php    
                     $mname;
					 $bno;
					 $expdate;
					 $medprice;
					 $medquan;
					 $tprice;
					$zipped = array_map(null, $mname, $bno, $expdate, $medprice, $medquan, $tprice);
						 $sn = 1;
		                for($i = 0 ; $i<count($mname) ; $i++) { 
						$med = $this->db->get_where('product', ['id' =>$mname[$i] ])->row();
						?>
						<tr style="border-collapse: collapse;">
							<td style="text-align: left;"><?=isset($sn)?$sn:'-'?></td>
                            <td style="text-align: left;"><?=isset($med->medicine_name)? $med->medicine_name:'-'?></td>
                            <td style="text-align: left;"><?=isset($bno[$i])? $bno[$i]:'-'?></td>
                            <td style="text-align: left;"><?=isset($expdate[$i])? $expdate[$i]:'-'?></td>
							<td style="text-align: left;"><?=isset($medquan[$i])? $medquan[$i]:'-'?></td>
                            <td style="text-align: left;"><?=isset($medprice[$i])? $medprice[$i]:'-'?></td>
							<td style="text-align: left;"><?=isset($tprice[$i])? $tprice[$i]:'-'?></td>
                        </tr>
						<?php $sn++; } ?>
                    </thead>
                </table>
            </fieldset> 
			<fieldset>
                <table style="border-collapse: collapse;font-size: 14px;width: 100%">
                    <thead>
                        <tr style="border-collapse: collapse;">
                            <th style="padding: 5px;text-align: right; width:70%">Total :</th>
                            <td style="text-align: right; width:30%"><?=isset($grandtotal)?$grandtotal:'-'?></td>
                        </tr>
						<tr style="border-collapse: collapse;">
                            <th style="padding: 5px;text-align:right; width:70%">Discount :</th>
                            <td style="text-align: right; width:30%;"><?=isset($discount)?$discount:'-'?></td>
                        </tr>
						<tr style="border-collapse: collapse;">
                            <th style="padding: 5px;    text-align: right; width:70%">Tax :</th>
                            <td style="text-align: right; width:30%;"><?=isset($tax)?$tax:'-'?></td>
                        </tr>
						<tr style="border-collapse: collapse;">
                            <th style="padding: 5px;text-align: right; width:70%;">Net Pay :</th>
                            <td style="text-align: right; width:30%;"><?=isset($finalpay)?$finalpay:'-'?></td>
                        </tr>
						<tr style="border-collapse: collapse;">
                            <th style="padding: 5px;text-align: right; width:70%;">Note :</th>
                            <td style="text-align: right; width:30%;"><?=isset($dnarration)?$dnarration:'-'?></td>
                        </tr>
                       
                    </thead>
                </table>
            </fieldset>
            </div>
        </div>
    </div>
	<!--- <div class="cstmprintdata"><p class="cstmprint">print</p></div> -->
</body>
</html>

<script type="text/javascript">
    window.onload = function () {
        window.print();
    }
	//$(document).ready(function(){
	//	alert('ddd');
		//$(".cstmprint").click(function(){
		//	window.print();
		//});
//	});
</script>