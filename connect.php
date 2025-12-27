<?php
     $firstName= $_POST['firstName'];
     $lastName= $_POST['lastName'];
     $interestedField= $_POST['interestedField'];
     $email= $_POST['email'];
     $furtherStudies= $_POST['furtherStudies'];
     $phoneNumber= $_POST['phoneNumber'];
     $gender= $_POST['gender'];
	
    //  database
    $conn = new mysqli('localhost',username: 'root',password: '', database: 'registration form');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into information(firstName, lastName, interestedField, email, furtherStudies, phoneNumber, gender) values(?, ?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("sssssis", $firstName, $lastName, $interestedField, $email, $furtherStudies, $phoneNumber, $gender);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
    }
	?>