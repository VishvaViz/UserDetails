<?php
	$name = $_POST['name'];
	$age = $_POST['age'];
	$email = $_POST['email'];
	$weight = $_POST['weight'];
	$healthreport = $_FILES['pdf_file']['healthreport'];

	$conn = new mysqli('localhost','root','','userdata');
	$targetDirectory='pdf_files/';
	$targetpath=$targetDirectory.$healthreport;

	if(move_uploaded_file($pdfTemp,$targetpath)){
		$sql="INSERT INTO data (name,age,email,weight,healthreport) VALUES('$name','$age','$email','$weight','$healthreport')";
			if(mysqli_query($connection,$sql)){
				echo ("User Details and PDF file are inserted sucessfully");

			}
			else{
				echo ("Error:" $sql."<br/>".mysqli_error($connection));
			}
	}
	else{
		echo("Error uploading the PDF file.");
	}

	mysqli_close($connection)

?>