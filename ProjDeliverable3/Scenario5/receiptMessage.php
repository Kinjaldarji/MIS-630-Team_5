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
$rid1 = $_POST["rid1"];
$rid2 = $_POST["rid2"];
$rid3 = $_POST["rid3"];
$rid4 = $_POST["rid4"];
//echo "bName" . $businessID . "rid" . $rid;
//echo "rid" . $rid;
$count = 0;
if($rid1 ) {	
	$sql1 = "insert into RECEIPT values('" . $businessID . "','" . $rid1 . "')";
	$result1 = mysqli_query($conn, $sql1);	
	if($result1 == 1){
		$count = $count+1;
		echo "<font align='center' size='6' color='green'> Receipt ID ".$rid1." inserted successfully</b></font><br>";
	}else{
		echo "<font align='center' size='6' color='red'> Receipt ID ".$rid1." is not inserted</b></font><br>";
	}
	echo "Executed SQL query:  " .$sql1. "</br>";
} 
if($rid2 ) {
	$sql2 = "insert into RECEIPT values('" . $businessID . "','" . $rid2 . "')";
	$result2 = mysqli_query($conn, $sql2);	
	
	if($result2 == 1){
		$count = $count+1;
		echo "<font align='center' size='6' color='green'> Receipt ID ".$rid2." inserted successfully</b></font><br>";
	}else{
		echo "<font align='center' size='6' color='red'> Receipt ID ".$rid2." is not inserted</b></font><br>";
	}
	echo "Executed SQL query:  " .$sql2. "</br>";
} 
if($rid3 ) {
	$sql3 = "insert into RECEIPT values('" . $businessID . "','" .$rid3. "')";
	$result3 = mysqli_query($conn, $sql3);	
	
	if($result3 == 3){
		$count = $count+1;
		echo "<font align='center' size='6' color='green'> Receipt ID ".$rid3." inserted successfully</b></font><br>";
	}else{
		echo "<font align='center' size='6' color='red'> Receipt ID ".$rid3." is not inserted</b></font><br>";
	}
	echo "Executed SQL query:  " . $sql3 . "</br>";
} 
if($rid4 ) {
	$sql4 = "insert into RECEIPT values('" . $businessID . "','" .$rid4. "')";
	$result4 = mysqli_query($conn, $sql4);	
	
	if($result4 == 1){
		$count = $count+1;
		echo "<font align='center' size='6' color='green'> Receipt ID ".$rid4." inserted successfully</b></font><br>";
	}else{
		echo "<font align='center' size='6' color='red'> Receipt ID ".$rid4." is not inserted</b></font><br>";
	}
	echo "Executed SQL query:  " . $sql4 . "</br>";
} 
echo "</br></br></br>" ;
if($count>0){
	echo "<font align='center' size='14' color='green'>".$count." Receipt ID's inserted successfully</b></font>";
} else {
	echo "<font align='center'  size='14' color='red'> 0 Receipt ID's inserted  </b></font>";
	//exit();
}
mysqli_close($conn);
	echo "</br></br></br>" ;
	//echo "LOG</br>" ;	

?>


<div align='center' id='reviews' name='reviews'>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" value="Close" onclick='showResults()'/>
</div>
</div>
</form>
</body>
</html>
