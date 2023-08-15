<!DOCTYPE html>
<?php
$con = mysqli_connect("localhost", "root", "", "myhmsdb");

?>
<html lang="en">

<head>


    <!-- Required meta tags -->
    <meta charset="utf-8">
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.png" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/css/style.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=IBM+Plex+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css"
        integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
            integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <a class="navbar-brand" href="#"><i class="fa fa-user-plus" aria-hidden="true"></i> Global Hospital </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>


        <style>
            .bg-primary {
                background: -webkit-linear-gradient(left, #3931af, #00c6ff);
            }


            .btn-primary {
                background-color: #3c50c1;
                border-color: #3c50c1;
            }
        </style>

    </nav>
</head>
<style type="text/css">
    button:hover {
        cursor: pointer;
    }

    #inputbtn:hover {
        cursor: pointer;
    }

    .form-group {
        margin-top: 100px;
        padding: 0 200px;
    }
</style>

<body style="padding-top:50px;">
    <?php
    $id = $_GET["id"];
    $rows = mysqli_query($con, "SELECT * FROM doctb WHERE id = $id");
    ?>
    <?php foreach ($rows as $row): ?>
        <form class="form-group" method="post" action="progress_update_doctor.php" autocomplete="off"
            enctype="multipart/form-data">
            <div class="row">
                <input type="hidden" name="id" id="id" required value="<?php echo $row["id"]; ?>"> <br>
                <div class="col-md-4"><label>Doctor Name:</label></div>
                <div class="col-md-8"><input type="text" class="form-control" name="username"
                        value="<?php echo $row['username']; ?>" onkeydown="return alphaOnly(event);" required></div><br><br>
                <div class="col-md-4"><label>Avatar:</label></div>
                <div class="col-md-8"><input type="file" class="form-control" name="image" accept=".jpg, .jpeg, .png" required>
                <img src="<?php echo "../img/". $row["image"]; ?>" width='80px' height='80px' alt=""></div><br><br>
                <div class="col-md-4"><label>Specialization:</label></div>
                <div class="col-md-8">
                    <select name="special" class="form-control" id="special" required="required">
                        <option value="head" name="spec" disabled selected>Select Specialization</option>
                        <option value="General" name="spec" <?php
                        if ($row['spec'] == 'General') {
                            echo "selected";
                        }
                        ?>>General
                        </option>
                        <option value="Cardiologist" name="spec" <?php
                        if ($row['spec'] == 'Cardiologist') {
                            echo "selected";
                        }
                        ?>>Cardiologist</option>
                        <option value="Neurologist" name="spec" <?php
                        if ($row['spec'] == 'Neurologist') {
                            echo "selected";
                        }
                        ?>>Neurologist</option>
                        <option value="Pediatrician" name="spec" <?php
                        if ($row['spec'] == 'Pediatrician') {
                            echo "selected";
                        }
                        ?>>Pediatrician</option>
                    </select>
                </div><br><br>
                <div class="col-md-4"><label>Email ID:</label></div>
                <div class="col-md-8"><input type="email" class="form-control" name="email" required
                        value="<?php echo $row['email']; ?>"></div><br><br>
                <div class="col-md-4"><label>Password:</label></div>
                <div class="col-md-8"><input type="password" class="form-control" name="password" id="password" required
                        value="<?php echo $row['password']; ?>"></div><br><br>
                <div class="col-md-4"><label>Confirm Password:</label></div>
                <div class="col-md-8" id='cpass'><input type="password" class="form-control" onkeyup='check();'
                        name="cdpassword" id="cdpassword" required>&nbsp &nbsp<span id='message'></span> </div><br><br>
                <div class="col-md-4"><label>Consultancy Fees:</label></div>
                <div class="col-md-8"><input type="text" class="form-control" name="docFees" required
                        value="<?php echo $row['docFees']; ?>"></div><br><br>
            </div>
            <input type="submit" name="submit" value="Update Doctor" class="btn btn-primary"
                onclick="return confirm('Do you really want to update?')">
        </form>
    <?php endforeach; ?>
</body>


</html>