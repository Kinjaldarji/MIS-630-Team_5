<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<script language='javascript'>

function showResults(){
	//alert('submitted22');
	//window.reviews.style.visibility='visible';
	//document.forms[0].submit;
	window.close();
}
</script>
</head>
<body onload=''>
<form action="">
<div align='center' style="border-style:solid;border-width:1px;">
<a href="form.html"><h6>Home</h6></a>
<br><br>
<?PHP
$servername = "mysql16.000webhost.com";
$username = "a8047771_mysql";
$password = "welcome1";
$dbname = "a8047771_mysqldb";
$conn = mysqli_connect($servername, $username, $password, $dbname); // Create connection
if (!$conn) { // Check connection
    die("Connection failed: " . mysqli_connect_error());
}
$businessID = $_POST["bid"];
$rid = $_POST["rid"];
$response = $_POST["response"];
//echo "bName" . $businessID . "rid" . $rid;
//echo "rid" . $rid;
if($response ) {
	 $sql = "UPDATE REVIEW SET RESPONSE='" . $response . "',STATUS='A' WHERE BUSINESSID='" . $businessID . "' AND RECEIPTID='" . $rid . "'";

	//echo "SQL query:  " . $sql ;
	$result = mysqli_query($conn, $sql);
	echo "</br></br></br>" ;
	echo "<font align='center' size='14' color='green'>Responses updated successfully</b></font>";
} else {
	echo "<font align='center'  size='14' color='red'>Responses is emmpty</b></font>";
	//exit();
}
mysqli_close($conn);
	echo "</br></br></br>" ;
	echo "LOG</br>" ;	
	echo "Executed SQL query:  " . $sql . "</br>";
	echo "Result  :" . $result;
?>


<div align='center' id='reviews' name='reviews'>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" value="Close" onclick='showResults()'/>
</div>
</div>
</form>
</body>
</html>
