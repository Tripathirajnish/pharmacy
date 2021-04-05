<html>
<head>
<title></title>
<?php include('database.php'); 
$query = mysqli_query($conn, "select * from apiproduct");
?>
</head>  
<body>
<button><a href="getproduct.php?zipcode=345672" style="color:#000">Get Product</a></button><button><a href="insertproduct.php" style="color:#000">Insert Product</a></button>

<form action="productapi.php" method="post" enctype="multipart/form-data">

<label>Product Id</label>
          <select type="text" required=""  value="" name="product" >
		  <option>select</option>
		  <?php  while($row= mysqli_fetch_array( $query )){ 
		 ?>
     	<option value="<?= $row['product_id']; ?>"><?= $row['product_name']; ?></option>
		  <?php }  ?> 
		  </select>
		  <label>Select CSV File<span style="color:red">*</span></label>
		<input type="file" name="file" required />
<input type="submit" name="submit" />
</form> 
		<?php
		if ( isset( $_POST['submit'] ) ) {
$product = $_POST['product'];

$filename=$_FILES["file"]["tmp_name"];    
     if($_FILES["file"]["size"] > 0)
     {
        $file = fopen($filename, "r");
		
          while (($getData = fgetcsv($file, 100000, ",")) !== FALSE){
		 $data = $getData[0]; 
		 if($data != 0){
		$sql = "INSERT INTO apizipcode (product_id, zip_code)
VALUES ('".$product."','". $data."' )";
if ($conn->query($sql) === TRUE) {
echo "success";  
}
		 }	 
		 }
}

		}
		?>
</body>
<html>

