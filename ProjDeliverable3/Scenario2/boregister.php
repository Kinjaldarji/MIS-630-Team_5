<html>
<head>
<meta charset="ISO-8859-1">
<script language='javascript'>
</script>
</head>
<body onload=''>
<form action="">
<div align='center' style="border-style:solid;border-width:1px;">
<br><br>
<?php
//header("Location: /reviewresponse.php");
//echo "php code=====11111";
$servername = "mysql16.000webhost.com";
$username = "a8047771_mysql";
$password = "welcome1";
$dbname = "a8047771_mysqldb";
$conn = mysqli_connect($servername, $username, $password, $dbname); // Create connection
if (!$conn) { // Check connection
    die("Connection failed: " . mysqli_connect_error());
}
//echo "php code=====22222";
$businessType = $_POST["businessType"];
$userID = $_POST["userID"];
$pwd = $_POST["pwd"];
$descr = $_POST["descr"];
$fName = $_POST["fName"];
$lName = $_POST["lName"];
$addr1 = $_POST["addr1"];
$addr2 = $_POST["addr2"];
$city = $_POST["city"];
$state = $_POST["state"];
$zip = $_POST["zip"];
//echo "bName" . $businessID;
if($businessType ) {
//$sql = "SELECT employeeNumber, firstname, lastname FROM Employees where jobTitle regexp '" . $title ."'";
$sql = "SELECT MAX(businessID) as businessID  FROM BUSINESS";
//var_dump($sql);
} else {
echo "no businessID  is supplied";
exit();
}

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {   
    while($row = mysqli_fetch_assoc($result)) {	
			$bid = $row["businessID"] ;
			$bid = $bid+1;
			//echo " businessID  is supplied" . $bid ;
         if($bid){			
			 $reviewsql = "INSERT INTO BUSINESS VALUES(". $bid .",'" .$businessType."','".$userID."','".$pwd."','".$descr."','".$fName."','".$lName."','".$addr1."','".$addr2."','".$city."','".$state."','".$zip."')";
			 $reviewResult = mysqli_query($conn, $reviewsql);
			 //echo "SQL".$reviewResult;
				if ($reviewResult = 1) {					
					echo "<font align='center' size='12' color='Green'>Business registration completed. Your business ID is ". $bid."</font>";					
				} else {
					echo "<font align='center' size='12' color='red'>Business registration not completed. Please try later</font>";
				}			
		 }else{
			echo "<font color='red'>Business IDinvalid.</font>";
		 }	
			 echo "</br></br></br>LOG</br>SQL".$reviewsql ;
	}    
} else {
    echo "0 results, echo Not a valid user.";
}


mysqli_close($conn);
?>
</div>
</form>
</body>
</html>