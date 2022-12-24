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

session_start();
$user_id = $_SESSION['user_id'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Profile Page</title>
    <style>
        body {
            background-color: #E5E4E2;
            font-family: "Inter", Arial, Helvetica, sans-serif;
        }
        
        .container1 {
            display: flex;
            align-items: center;
        }
        
        .text {
            padding: 30px;
        }
        
        .copyright {
            font-size: 15px;
            text-align: center;
        }
    </style>
</head>
<body>
    <img src="../images/others/bannerTop.png" class="img-fluid" alt="Responsive image">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand">
                <img src="../images/others/logo2.png" height="50">
            </a>
            <div class="container-fluid">
                <span class="navbar-brand h2"><strong>Welcome to Polygon AudioBook Website</strong></span>
            </div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <strong>Menu</strong>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-light dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#"><strong>Home</strong></a></li>
                            <li><a class="dropdown-item" href="#"><strong>Favourite</strong></a></li>
                            <li><a class="dropdown-item active bg-dark" aria-current="true" href="profile.php" style="color: white"><strong>Profile</strong></a></li>
                            <div class="dropdown-divider"></div>
                            <li><a class="dropdown-item" href="login.php"><strong>Logout</strong></a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    
        <div class="container py-5">
            <div class="row">
                <div class="col-lg-3">
                    <div class="card mb-4">
                        <div class="card-body text-center">
                            <img src="" alt="user pic" class="rounded-circle img-fluid" style="width: 130px;">
                            <?php
                                $sqlread = "SELECT * FROM tbl_users WHERE user_id = '$user_id'";
                                $result = $conn->query($sqlread);
                                if ($result->num_rows > 0) {
                                    $row = mysqli_fetch_assoc($result);
                                }
                            ?>
                            <h5 class="my-3"><?php echo $row['user_name']; ?></h5>
                            <div class="d-flex justify-content-center mb-2">
                                <button type="button" class="btn btn-outline-secondary ms-1">Change Profile Picture</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Full Name</p>
                                </div>
                                <div class="col-sm-7">
                                    <p class="text-muted mb-0"><?php echo $row['user_name']; ?></p>
                                </div>
                                <div class="col-sm-2">
                                    <button type="button" class="btn btn-outline-secondary btn-sm">Update Name</button>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Email</p>
                                </div>
                                <div class="col-sm-7">
                                    <p class="text-muted mb-0"><?php echo $row['user_email']; ?></p>
                                </div>
                                <div class="col-sm-2">
                                    <button type="button" class="btn btn-outline-secondary btn-sm">Update Email</button>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Phone</p>
                                </div>
                                <div class="col-sm-7">
                                    <p class="text-muted mb-0"><?php echo $row['user_phone']; ?></p>
                                </div>
                                <div class="col-sm-2">
                                    <button type="button" class="btn btn-outline-secondary btn-sm">Update Phone</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <form action="login.php" enctype="multipart/form-data" id="form" method="post">
                        <div class="d-grid gap-2 col-12 mx-auto">
                            <button type="submit" class="btn btn-secondary btn-lg btn-block">Logout</button>
                        </div>
                    </form>
                </div>
            </div>
            <hr>
            <div class="copyright">
                <p>Copyright &copy reserved by <strong>Polygon AudioBook</strong></p>
            </div>
            <hr>
        </div>
</body>
</html>