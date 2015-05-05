<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<script language='javascript'>
function submitLogin(){
	//alert('submit login');
	document.login.submit();
}

function submitRes(){
	//alert('submit response.');
	document.response.submit();
}
</script>
</head>
<body onload='hideReview()' >
<form action="businessOwnerlogin.php" name='login' id='login' method='post'>
	<div align='center' >
	<label style="font-size:16px;"  ><b>Try State Businesses</b></label><br><br><br>
	</div>
<div align='center' style="border-style:solid;border-width:1px;" >
<br><br>
<label style="font-size:12px;">Business ID : </label>
<input type='text' name='bName' value="" maxlength="25" size="25" /> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<label style="font-size:12px;">Password : </label>
<input type='text' name='bPwd'  value="" maxlength="25" size="25" /> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="button" value="Login" onClick='submitLogin()'/><br><br>
</div>
</form>
<br>
<form action='responsemessage.php' name='response' id='response' method='post'>
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
$businessID = $_POST["bName"];
$pwd = $_POST["bPwd"];
//echo "bName" . $businessID;
if($businessID ) {
//$sql = "SELECT employeeNumber, firstname, lastname FROM Employees where jobTitle regexp '" . $title ."'";
$sql = "SELECT * FROM BUSINESS WHERE BUSINESSID=" . $businessID ;
//var_dump($sql);
} else {
//echo "no businessID  is supplied";
exit();
}

//echo "php code=====33333";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
   
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {		
         if($row["pwd"] == $pwd){			
			 //echo "valid user.";
			 $reviewsql = "SELECT * FROM REVIEW WHERE BUSINESSID=" . $businessID ;
			 $reviewResult = mysqli_query($conn, $reviewsql);
				if (mysqli_num_rows($reviewResult) > 0) {					
					echo "<table cellspacing='0' border='1'>";
					echo "<tr > <th> Business ID </th> <th> Receipt ID </th> <th> Review </th> <th> Response </th></tr>";
					// output data of each row
					while($reviewrow = mysqli_fetch_assoc($reviewResult)) {
						echo "<tr>";
						echo "<td><input type='text' name='bid' value='" . $reviewrow["businessID"]. "'></td><td><input type='text' name='rid' value='" . $reviewrow["receiptID"]. "'> </td><td>" . $reviewrow["review"]. "</td><td><textarea rows='4' cols='50' name='response' > </textarea> </td>" ;
						echo "</tr>";
						break; //take only the first pending respose to make simple
					}
					echo "</table> <br> <div align='center'><input  type='button' value='Submit Response' onClick='submitRes()'/> </div><br><br>";					
				} else {
					echo "0 results";
				}			
		 }else{
			echo "<font color='red'>Business ID or password invalid.</font>";
		 }		 
	}    
} else {
    echo "0 results, echo Not a valid user.";
}


mysqli_close($conn);
?>
</form>
</body>
</html>
