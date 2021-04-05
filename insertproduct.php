<html>
<head>
<title></title>
<?php include('database.php'); ?>
</head>
<body>
<form action="" method="post">
<input type="submit" name="submit" value="InsertProduct">
</form>
<?php
if(isset($_POST['submit'])){
$curl_handle = curl_init();

$url = "https://ccf170a6ab10ffecd50e3e745c3507c1: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@wingreensindia.myshopify.com/admin/api/2021-01/products.json?limit=250&fields=id,title,tags&since_id=0";

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
	$data = array(
	'product_name' => $user->title,
	'product_id' =>  $user->id,
	
	);
	
	$sql = "INSERT INTO apiproduct (product_name, product_id)
VALUES ('".$user->title."','".$user->id."' )";
 $result = $conn->query($sql);
}
if($result){
	echo "sussfull";
}
}
?>
</body>
</html>