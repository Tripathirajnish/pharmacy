<html>
<head>
<?php include('database.php'); ?>
<title>get product</title>
</head>
<body>
<!-- <form action="getproduct.php" method="POST">
<input type="text" name="zip" value="">
<input type="submit" name="submit" value="submit">
</form> -->
<?php
if ( isset( $_GET["zipcode"] ) ) {
$zip = $_GET['zipcode'];
//echo $zip;
  $sql = "SELECT product_id FROM `apizipcode` WHERE zip_code = $zip";
   $retval = mysqli_query($conn, $sql);
   while($product = mysqli_fetch_array($retval)){;
   $product_id =  $product['product_id'];
   $pro = "SELECT product_id, product_name FROM `apiproduct` WHERE product_id = $product_id";
   $product = mysqli_query($conn, $pro);
   $output = '';
   while($products = mysqli_fetch_array($product)){
   $product_id = $products['product_id'];
   $product_name = $products['product_name'];
   
   $curl_handle = curl_init();

$url = "https://ccf170a6ab10ffecd50e3e745c3507c1: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@wingreensindia.myshopify.com/admin/api/2021-01/products.json?limit=250&fields=id,variants,tags&since_id=0";

// Set the curl URL option
curl_setopt($curl_handle, CURLOPT_URL, $url);

// This option will return data as a string instead of direct output
curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, true);

// Execute curl & store data in a variable
$curl_data = curl_exec($curl_handle);

curl_close($curl_handle);

// Decode JSON into PHP array
$response_data = json_decode($curl_data);

// Print all data if needed
// print_r($response_data);
 //die();

// All user data exists in 'data' object
$user_data = $response_data->products;

// Extract only first 5 user data (or 5 array elements)
//$user_data = array_slice($user_data, 0, 4);

// Traverse array and print employee data

foreach ($user_data as $user) {
	if($product_id == $user->id){
		$output .= '['."<br>".' '.'{'."<br>";
		$output .= '<span class="productty">productid:'.$product_id."<br><span class='productty'>".'tags:'.$user->tags.'</span>';
	 echo "<br>";
	 $varients = $user->variants;
	 //print_r($varients);
	 echo "<br>";
	 foreach($varients as $varient){
		 echo "<br>";
		 $output .="<br>";
		 $output .='<span class="productty">varients:[{</span>';
		 $output .="<br>";
		 $output .='<span class="varient">'.'id:'.$varient->id.'</span><br><span class="varient">'.'sku:'.$varient->sku.'</span><br><span class="varient">'.'inventory_quantity:'.$varient->inventory_quantity.'</span>';
		 $output .='<br><span class="columnvarient">'.'}]'.'</span><br>';
	 }
	$output .= '}'."<br>".' '.']';
	}
}
   }
   print_r($output);
   }


}
?>
<style>
  .varient{ padding-left: 85px; }
  .productty{ padding-left:15px;}
  .columnvarient{ padding-left:70px;}
</style> 
</body>
</html>