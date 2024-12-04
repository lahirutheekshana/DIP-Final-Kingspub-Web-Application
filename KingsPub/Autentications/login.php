<?php
error_reporting(E_ALL | E_STRICT);
ini_set('display_errors', 1);

include_once("../Connection/connection.php");

if(isset($_POST['login'])) {
    $Role = $_POST['check'];
    $email = $_POST['email'];
    $password = $_POST['pass'];

    if (!empty($email) && !empty($password)) {
        switch ($Role) {
            case "customer":
                $sql = "SELECT * FROM customers WHERE cus_email = '$email' AND cus_password = '$password'";
                $result = mysqli_query($connection , $sql);
                $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
                $count = mysqli_num_rows($result);
                if($count == 1) {
                    header("Location: ../Customer/customer.php");
                    exit();
                }
                else{
                    echo"Wrong Password or email";
                    die();
                }
                break;

            case "delivery_agent":
                $sql = "SELECT * FROM delivery_agent WHERE emp_email = '$email' AND emp_password = '$password'";
                $result = mysqli_query($connection , $sql);
                $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
                $count = mysqli_num_rows($result);
                if($count == 1) {
                    header("Location: ../Delivery/deliveryAgent.php");
                    exit();
                }
                else{
                    echo"Wrong Password or email";
                    die();
                }
                break;

            case "manager":
                $sql = "SELECT * FROM manager WHERE emp_email = '$email' AND emp_password = '$password'";
                $result = mysqli_query($connection , $sql);
                $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
                $count = mysqli_num_rows($result);
                if($count == 1) {
                    header("Location: ../Manager/manager.php");
                    exit();
                }
                else{
                    echo"Wrong Password or email";
                    die();
                }
                break;

            default:
                echo "<h1> Please Select the Role Correctly </h1>";
                break;
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
    <link rel="stylesheet" href="../css/register.css">
    <link rel="stylesheet" href="../css/footer.css">

</head>

<body>
    <div class="head">
        <div class="regi-box">
            <h1>Welcome to Login</h1><br>

            <form action="../Autentications/login.php" method="post" class="form">
                <?php if (isset($_GET['error'])) { ?>
                    <p class="error"> <?php echo $_GET['error']; ?></p>
                <?php } ?>

                <div class="check">
                    <select id="check" name="check" aria-placeholder="hello">
                        <option value="manager">Manager</option>
                        <hr>
                        <option value="delivery_agent">Delivery Agent</option>
                        <hr>
                        <option value="customer">Customer</option>
                    </select>
                </div>
                <input type="email" id="Lname" class="txts" placeholder="  Email" name="email"><br>
                <input type="password" id="pass" class="txts" placeholder="  Password" name="pass"><br>
                <div class="btn">
                    <input type="submit" id="con_pass" class="btns" value="Login" name="login"><br>
                    <p>I don't have an account</p>
                    <a href="../Autentications/register.php"><input type="button" id="con_pass" class="btns" value="Register"></a>
                </div>
                <div class="adminLogin">
                    <a href="../Autentications/adminLogin.php"><h5> Admin Login </h5></a>
                </div>
            </form>
        </div>
    </div><br>
</body>

</html>

<?php include_once('../Admin/Partials/footer.php'); ?>