<?php
$con = mysqli_connect("localhost", "root", "", "myhmsdb");
if (isset($_POST["docsub"])) {
  if ($_FILES["image"]["error"] == 4) {
    echo
      "<script> alert('Image Does Not Exist'); </script>"
    ;
  } else {
    $fileName = $_FILES["image"]["name"];
    $fileSize = $_FILES["image"]["size"];
    $tmpName = $_FILES["image"]["tmp_name"];

    $validImageExtension = ['jpg', 'jpeg', 'png'];
    $imageExtension = explode('.', $fileName);
    $imageExtension = strtolower(end($imageExtension));
    if (!in_array($imageExtension, $validImageExtension)) {
      echo
        "
      <script>
        alert('Invalid Image Extension');
      </script>
      ";
    } else if ($fileSize > 1000000) {
      echo
        "
      <script>
        alert('Image Size Is Too Large');
      </script>
      ";
    } else {
      $newImageName = uniqid();
      $newImageName .= '.' . $imageExtension;
      $username = $_POST['username'];
      $password = $_POST['password'];
      $email = $_POST['email'];
      $spec = $_POST['special'];
      $docFees = $_POST['docFees'];

      move_uploaded_file($tmpName, '../img/' . $newImageName);
      $query = "insert into doctb(image, username,password,email,spec,docFees)values('$newImageName', '$username','$password','$email','$spec','$docFees')";
      mysqli_query($con, $query);
      echo
        "
      <script>
        alert('Doctor added successfully!');
        document.location.href = '../admin-panel.php';
      </script>
      ";
    }
  }
}
?>