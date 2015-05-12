<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Tri State Business - Submit Review Response</title>
<link rel="stylesheet" type="text/css" href="View.css" media="all">

</head>
<body id="main_body" >
	
	<img id="top" src="top.png" alt="">
	<div id="form_container">
	
		<h1><a>Submit Reviews</a></h1></br><a href="form.html"><h6>Home</h6></a>
		<div class="form_description">
			<h2>Tri State Business</h2>
			<p>Tri State Business is the best way to find the local businesses</p>
    		</div>	
<?php
$businessid = "";
$receiptid = "";
$review = "";
$businessid = test_input($_POST["businessid"]);
$receiptid = test_input($_POST["receiptid"]);
$review = test_input($_POST["review"]);

function test_input($data){
$data=trim($data);
//$data=stripslashes($data);
//$data=htmlspecialchars($data);
return $data;
}

if (empty($_POST["businessid"]) or empty($_POST["receiptid"]) or empty($_POST["review"])) {
     echo "Enter all mandatory fields!";
}
else{

/*$servername = "mysql2.000webhost.com";
$username = "a4350000_majula";
$password = "fernando1985";
$dbname = "a4350000_majula";*/
$servername = "mysql16.000webhost.com";
$username = "a8047771_mysql";
$password = "welcome1";
$dbname = "a8047771_mysqldb";

$conn = mysqli_connect($servername, $username, $password, $dbname); // Create connection

if (!$conn) {
die ("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM RECEIPT WHERE receiptID = '".$receiptid."' AND businessID ='".$businessid ."'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) == 1) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
       $receiptid = $row["receiptID"];
       $businessid = $row["businessID"];
       //echo "Receipt Id: " . $row["receiptID"]. " - Business Id: " . $row["businessID"]. "<br>";
    }
    $sql = "INSERT INTO REVIEW (businessID, receiptID, review,status,review_date)
                VALUES ($businessid,'$receiptid','$review', 'P',now())";

    if (mysqli_query($conn, $sql)) {
     echo "Review submitted successfully!";
    } else {
     echo "Error: " . $sql . "<br>" . mysqli_error($conn);
   }
} else {
    echo "Invalid Business Id or Receipt Id has been provided";
}
mysqli_close($conn);

}

?> 
					
		<div id="footer">
			
		</div>
	</div>
	<img id="bottom" src="bottom.png" alt="">
	</body>
</html>											