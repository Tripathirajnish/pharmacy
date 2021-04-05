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
                    <h2 style="float: left;width: 100%;"><span style="padding-right: 41px;">Medicine Slip</span></h2>
                </div>
                <div style="float: right;width: 85px;margin-right: 3px;margin-top: 15px;">
                    <h4 style="float: right;margin: 0px;width: 71%;border: 1px solid;padding: 2px 3px;font-size: 13px;text-align: center;">
                        <img src="https://th.bing.com/th?q=Doctor+Plus+Symbol" style="margin:5px auto;height: 60px;width: 60px;float: right;"/></h4>
                </div>
            </div>
        </div>
        <div class="discharge_body">
            <div class="history">
                <fieldset><legend style="font-family: sans-serif;font-size: 24px;"><b>Patient Personal Info:</b></legend>
                <table style="border-collapse: collapse;font-size: 14px;width: 100%">
                    <thead>
                        <tr style="border-collapse: collapse;">
                            <th style="padding: 5px;text-align: left;">Patient's Name :</th>
                            <td style="text-align: left;"><?=isset($patientdatas->name)?$patientdatas->name:'-'?></td>
                            <th style="text-align: left;">Contact No :</th>
                            <td  style="text-align: left;"><?=isset($patientdatas->phone)?$patientdatas->phone:'-'?></td>
                        </tr>
                        <tr style="border-collapse:collapse;">
                            <th style="text-align: left; ">Email:</th>
                            <td style="text-align: left;"><?=isset($patientdatas->email)?$patientdatas->email:'-'?></td>
							 <th style="text-align:left;">Address :</th>
                            <td style="text-align: left;"><?=isset($patientdatas->address)?$patientdatas->address:'-'?></td>
                        </tr>
                    </thead>
                </table>
            </fieldset>
			 <fieldset>
                <legend style="font-size: 24px;"><b>Medicine Information:</b></legend>
                <table style="border-collapse: collapse;font-size: 14px;width: 100%">
                    <thead>
                        <tr style="border-collapse: collapse;">
                            <th style="padding: 5px;text-align: left;">S.no :</th>
							<th style="text-align:left;">Medicine Name :</th>
							<th style="text-align:left;">Medicine Price :</th>
							<th style="text-align:left;">Quantity :</th>
							<th style="text-align:left;">Total Cost :</th>
						</tr>
					   <?php     $data1 = json_decode($patientdatas->medicine_name);
			                     $array1 = (array) $data1;
								 $data2 = json_decode($patientdatas->quantity);
			                     $array2 = (array) $data2;
								 $data3 = json_decode($patientdatas->price);
			                     $array3 = (array) $data3;
								 $data4 = json_decode($patientdatas->total_price);
			                     $array4 = (array) $data4;
								 $zipped = array_map(null, $array1, $array2, $array3, $array4);
								 $sn = 1;
		                for($i = 0 ; $i<count($array1) ; $i++) { ?>
						<tr style="border-collapse: collapse;">
							<td style="text-align: left;"><?=isset($sn)?$sn:'-'?></td>
                            <td style="text-align: left;"><?=isset($array1[$i])? $array1[$i]:'-'?></td>
                            <td style="text-align: left;"><?=isset($array3[$i])? $array3[$i]:'-'?></td>
                            <td style="text-align: left;"><?=isset($array2[$i])? $array2[$i]:'-'?></td>
                            <td style="text-align: left;"><?=isset($array4[$i])? $array4[$i]:'-'?></td>
                        </tr>
						<?php $sn++; } 
						$totalprice = array_sum($array4);
						?>
						<tr style="border-collapse: collapse;">
						     <td style="text-align: right;" colspan="4">Total Cost</td>
							<td style="text-align: left;"><?=isset($totalprice)?$totalprice:'-'?></td> 
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