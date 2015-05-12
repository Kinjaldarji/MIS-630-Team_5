<?php
		$businessType = "";
		$city = "";
		$businessType = $_POST["businessType"];
		$city = $_POST["city"];

		
if (empty($_POST["businessType"])) {
     $businessType='';
	}

if (empty($_POST["city"])) {
     echo "Enter City!";
	}

		
if (empty($_POST["businessType"]) or empty($_POST["city"])) {
     echo "Enter all mandatory fields!";
	}
	else{
		/*$servername = "mysql8.000webhost.com";
		$username = "a4036724_tsb";
		$password = "Kinjal123";
		$dbname = "a4036724_tsb";*/
		
		$servername = "mysql16.000webhost.com";
		$username = "a8047771_mysql";
		$password = "welcome1";
		$dbname = "a8047771_mysqldb";

		$conn = mysqli_connect($servername, $username, $password, $dbname); // Create connection
		
		if (!$conn) {
			die ("Connection failed: " . mysqli_connect_error());
		}
		
		//$sql = "SELECT * FROM BUSINESS WHERE businessType='$businessType' AND city='$city'";
		$sql = "select businessType, descr, city, zip, review, review_date, response, response_date from BUSINESS, REVIEW WHERE BUSINESS.businessID = REVIEW.businessID and businessType='$businessType' AND city='$city'";
		$result = mysqli_query($conn, $sql) or die(mysql_error());
		$row1 = mysqli_num_rows($result);
		echo '<table border="1" style="width:100%">';
		echo "<tr>";
		echo "<td>Type</td>";
		echo "<td>City</td>";
		echo "<td>Description</td>";
		echo "<td>Review</td>";
		echo "<td>Response</td>";
		echo "</tr>";
		if (mysqli_num_rows($result) >= 1) {
			// output data of each row
			while($row = mysqli_fetch_assoc($result)) {
			    echo "<tr style=font-family:verdana;font-size:80%;>";
					echo "<td>".$row["businessType"]."</td>";   
					echo "<td>".$row["city"]."</td>";  
					echo "<td>".$row["descr"]."</td>";
					echo "<td>".$row["review"]."</td>";
					echo "<td>".$row["response"]."</td>";
					
				echo "</tr>";
			   
			   //echo "City: " . $row["city"]. " - Business Type: " . $row["businessType"]. "<br>";
			}
		} else {
			echo "Sorry, we couldn't find value for your selection.";
		}	
		echo "</table>";

		mysqli_close($conn);

}
?>