<?php
error_reporting(E_ALL | E_STRICT);
ini_set('display_errors', 1);

include_once("../Connection/connection.php");

if(isset($_POST['Adminlogin'])) {
    $email = $_POST['email'];
    $password = $_POST['pass'];

    if (!empty($email) && !empty($password)) {
        $sql = "SELECT * FROM `admin` WHERE admin_email = '$email' AND admin_password = '$password'";
        $result = mysqli_query($connection , $sql);
        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
        $count = mysqli_num_rows($result);
        if($count == 1) {
            header("Location: ../Admin/admin.php");
            exit();
        }
        else{
            echo"Wrong Admin Password or email";
            die();
        }
    } else {
        echo"<h1> Email Password Can not be empty </h1>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login With Kings Pub</title>
    <link rel="stylesheet" href="../css/AdminLogin.css">
    <link rel="stylesheet" href="../css/footer.css">
</head>

<body>
    <div class="head">
        <div class="regi-box">
            <h1>Welcome to Login</h1><br>

            <form action="../Autentications/adminLogin.php" method="post" class="form">
                <?php if (isset($_GET['error'])) { ?>
                    <p class="error"> <?php echo $_GET['error']; ?></p>
                <?php } ?>

                <input type="email" id="Lname" class="txts" placeholder="  Email" name="email"><br>
                <input type="password" id="pass" class="txts" placeholder="  Password" name="pass"><br>
                <div class="btn">
                    <input type="submit" id="con_pass" class="btns" value="Login" name="Adminlogin"><br>
                </div>
                <div class="adminLogin">
                    <a href="../Autentications/login.php"> <h5>user Login</h5> </a>
                </div>
            </form>
        </div>
    </div><br>
</body>

</html>

<?php include_once('../Admin/Partials/footer.php'); ?>