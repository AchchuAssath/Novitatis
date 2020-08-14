<!DOCTYPE html>
<html>
<head>
<title>Table with database</title>
<style type="text/css">
table{
	border-collapse:collapse;
	width:100%;
	color:#d96459;
	font-family:monospace;
	font-size:25px;
	text-align:left;
	}
</style>
</head>
<body>
	<table>
		<tr>
			<th>firstName</th>
			<th>lastName</th>
			<th>gender</th>
			<th>email</th>
			<!--<th>password</th>-->
			<th>number</th>
			<th>type</th>
			
		</tr>
	
<?php
	$firstName=$_POST['firstName'];
	$lastName=$_POST['lastName'];
	$gender=$_POST['gender'];
	$email=$_POST['email'];
	$password=$_POST['password'];
	$number=$_POST['number'];
	$type=$_POST['type'];

	//database connection

	$conn=new mysqli('localhost','root','12nadisha57','test');
	if($conn->connect_error){
	die('Connection Faild : '.$conn->connect_error);
	}
	else{
		$stmt=$conn->prepare("insert into registration(firstName,lastName,gender,email,password,number,type) 
		values(?,?,?,?,?,?,?)");
		//$stmt=$conn->prepare("insert into registration(firstName,lastName,gender,email,number,type) 
		//values(?,?,?,?,?,?)");
		$stmt->bind_param("sssssis",$firstName,$lastName,$gender,$email,$password,$number,$type);
		//$stmt->bind_param("sssssis",$firstName,$lastName,$gender,$email,$number,$type);
		$stmt->execute();
		echo"registration successfully";
		$stmt->close();
		//$conn->close();
	}

$sql="SELECT firstName,lastName,gender,email,password,number,type from registration";
	$result=$conn->query($sql);

	if($result->num_rows>0){
	while($row=$result->fetch_assoc()){
	//echo "<tr><td>".$row["firstName"]."</td><td>".$row["lastName"]."</td><td>".$row["gender"]."</td><td>".$row["email"]."</td><td>".$row["password"]."</td><td>".$row["number"]."</td><td>".$row["type"]."</td></tr>";
	echo "<tr><td>".$row["firstName"]."</td><td>".$row["lastName"]."</td><td>".$row["gender"]."</td><td>".$row["email"]."</td><td>".$row["number"]."</td><td>".$row["type"]."</td></tr>";
	}
	echo "</table>";
	}
	else{
	echo "0 result";
	}
	$conn->close();
?>

	</table>
</body>
</html>
