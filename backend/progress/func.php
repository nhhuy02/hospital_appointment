<?php
session_start();
$con=mysqli_connect("localhost","root","","myhmsdb");
if(isset($_POST['patsub'])){
	$email=$_POST['email'];
	$password=$_POST['password2'];
	$query="select * from patreg where email='$email' and password='$password';";
	$result=mysqli_query($con,$query);
	if(mysqli_num_rows($result)==1)
	{
		while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
      $_SESSION['pid'] = $row['pid'];
      $_SESSION['username'] = $row['fname']." ".$row['lname'];
      $_SESSION['fname'] = $row['fname'];
      $_SESSION['lname'] = $row['lname'];
      $_SESSION['gender'] = $row['gender'];
      $_SESSION['contact'] = $row['contact'];
      $_SESSION['email'] = $row['email'];
    }
		header("Location:../patient/patient-panel.php");
	}
  else {
    echo("<script>alert('Invalid Username or Password. Try Again!');
          window.location.href = '../index1.php';</script>");
  }
		
}
if(isset($_POST['update_data']))
{
	$contact=$_POST['contact'];
	$status=$_POST['status'];
	$query="update appointmenttb set payment='$status' where contact='$contact';";
	$result=mysqli_query($con,$query);
	if($result)
		header("Location:updated.php");
}


if(isset($_POST['doc_sub']))
{
	$doctor=$_POST['doctor'];
  $dpassword=$_POST['dpassword'];
  $demail=$_POST['demail'];
  $docFees=$_POST['docFees'];
	$query="insert into doctb(username,password,email,docFees)
          values('$doctor','$dpassword','$demail','$docFees')";
	$result=mysqli_query($con,$query);
	if($result)
		header("Location:adddoc.php");
}


?>