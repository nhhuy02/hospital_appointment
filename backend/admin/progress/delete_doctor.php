<?php
$con = mysqli_connect("localhost", "root", "", "myhmsdb");
if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "delete from `doctb` where id=$id";
  $result = mysqli_query($con, $query);
  if ($result) {
    echo "<script>alert('Doctor added successfully!'); window.location.href = '../admin-panel.php#list-doc';</script>";
    exit; 
  }
}
?>