<?php
$con = mysqli_connect("localhost", "root", "", "myhmsdb");

if (isset($_POST['submit'])) {
    $id = $_POST["id"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $spec = $_POST["special"];
    $docFees = $_POST["docFees"];
    $image = $_FILES["image"]["name"];
    $query = "UPDATE `doctb` SET username='$username', password='$password', email='$email', spec='$spec', docFees='$docFees', image='$image' WHERE id='$id'";
    $result = mysqli_query($con, $query);
    if ($result) {
      move_uploaded_file($_FILES["image"]["tmp_name"], '../img/'. $_FILES["image"]["name"]);
      echo
      "
      <script>
        alert('Doctor added successfully!');
        document.location.href = '../admin-panel.php#list-doc';
      </script>
      ";
    }
}
?>