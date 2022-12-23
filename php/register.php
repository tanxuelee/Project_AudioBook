<?php
$servername = "localhost";
$username = "moneymon_audiobook_user";
$password = "V-uWX%rR8Ljg";
$dbname = "moneymon_audiobook_db";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}

print "<link href='https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css' rel='stylesheet'
integrity='sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT' crossorigin='anonymous'>";
echo '
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
  ';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>
    <style>
        body {
            background-color: #E5E4E2;
            font-family: "Inter", Arial, Helvetica, sans-serif;
        }

        form {
            width: 90%;
            margin: 20px;
            padding: 40px;
            background: #f4f7f8;
        }
    </style>
    <script>
        var check = function() {
            if (document.getElementById('user_password').value ==
                document.getElementById('confirm_password').value) {
                document.getElementById('message').style.color = 'green';
                document.getElementById('message').innerHTML = 'matching';
            } else {
                document.getElementById('message').style.color = 'red';
                document.getElementById('message').innerHTML = 'not matching';
            }
        }
    </script>
</head>
<body>
<div class="d-flex justify-content-center">
        <form action="" id="form" method="post" class="rounded-3">
            <h1><strong>Registration Form</strong></h1>
            <hr><br>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label" for="name">Full Name:*</label>
                <div class="col-10">
                    <input type="name" class="form-control" name="user_name" placeholder="Your name" required>
                </div>
            </div>
            <br>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label" for="phone">Contact Number:*</label>
                <div class="col-10">
                    <input type="tel" class="form-control" name="user_phone" placeholder="Your phone number" required>
                </div>
            </div>
            <br>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label" for="email">Email Address:*</label>
                <div class="col-10">
                    <input type="email" class="form-control" name="user_email" placeholder="Your email address" required>
                </div>
            </div>
            <br>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label" for="password">Password:*</label>
                <div class="col-10">
                    <input type="password" class="form-control" name="user_password" id="user_password" onkeyup='check();' placeholder="Your password" required>
                </div>
            </div>
            <br>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label" for="password">Confirm Password:*</label>
                <div class="col-10">
                    <input type="password" class="form-control" id="confirm_password" onkeyup='check();' placeholder="Confirm password" required>
                    <span id='message'></span>
                </div>
            </div>
            <br>
            <div class="d-grid">
                <button class="btn btn-secondary btn-lg" name="submit" type="submit">Register Now</button>
            </div>
            <br>

            <?php
            if (isset($_POST["submit"])) {
                $user_name = $_POST['user_name'];
                $user_email = $_POST['user_email'];
                $user_password = $_POST['user_password'];
                $user_phone = $_POST['user_phone'];

                $sqlinsert = "INSERT INTO tbl_users (user_name,user_email,user_password,user_phone) VALUES ('" . $user_name . "', '" . $user_email . "', '" . $user_password . "' , '" . $user_phone . "')";
                if ($conn->query($sqlinsert) === TRUE) {
                        echo "<script>alert('Registration Successful!');</script>";
                }
            }
            ?>
        </form>
    </div>
</body>
</html>