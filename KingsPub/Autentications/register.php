 <?php
    session_start();
    include('../Connection/connection.php');

    if(isset($_POST['register'])) {
        $Role = $_POST['check'];
        $Fname = $_POST['Fname'];
        $Lname = $_POST['Lname'];
        $Mobile = $_POST['mobile'];
        $Email = $_POST['email'];
        $Password = $_POST['pass'];
        $Con_pass = $_POST['con_pass'];


        if (!empty($Fname) && !empty($Lname) && !empty($Mobile) && !empty($Email) && !empty($Password) && !empty($Con_pass)) {
            // Insert data into respective tables based on user_type
            switch ($Role) {
                case "customer":
                    $query = "INSERT INTO `customers` (`cus_fname`, `cus_lname`,`cus_email`,`cus_password`,`cus_tele`) VALUES ('{$Fname}','{$Lname}','{$Email}','{$Password}','{$Mobile}')";
                    break;
                case "delivery_agent":
                    $query = "INSERT INTO `delivery_agent`( `emp_fname`, `emp_lname`, `emp_tele`, `emp_email`, `emp_password`) VALUES ('{$Fname}','{$Lname}','{$Mobile}','{$Email}','{$Password}')";
                    break;
                case "manager":
                    $query = "INSERT INTO `manager`(`emp_fname`, `emp_lname`, `emp_tele`, `emp_email`, `emp_password`) VALUES ('{$Fname}','{$Lname}','{$Mobile}','{$Email}','{$Password}')";
                    break;
                default:
                    echo "Please Select the Role Correctly";
                    break;
            }

            $result = mysqli_query($connection, $query);
            if ($result) {
                echo "Record Added";
            } else {
                echo "Failed";
            }
        } else {
            echo "Please Enter the Correct Valid Information..";
            die;
        }
    }

    ?>



 <!DOCTYPE html>
 <html lang="en">

 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Register With Kings Pub</title>
     <link rel="stylesheet" href="../css/register.css">
     <link rel="stylesheet" href="../css/footer.css">

 </head>

 <body>
     <div class="head">
         <div class="regi-box">
             <h1>Sign in & Register</h1>

             <form action="../Autentications/register.php" method="post" class="form">
                 <div class="check">
                     <select id="check" name="check">
                         <option value="manager">Manager</option>
                         <hr>
                         <option value="delivery_agent">Delivery Agent</option>
                         <hr>
                         <option value="customer">Customer</option>
                     </select>
                 </div>
                 <div class="names">
                     <input type="text" name="Fname" class="txt" placeholder="   First Name">
                     <input type="text" name="Lname" class="txt" placeholder="   Last Name"><br>
                 </div>
                 <input type="text" name="mobile" class="txts" placeholder="   Mobile Number"><br>
                 <input type="email" name="email" class="txts" placeholder="   Email"><br>
                 <input type="password" name="pass" class="txts" placeholder="   Password"><br>
                 <input type="password" name="con_pass" class="txts" placeholder="   Confirm password"><br>
                 <div class="btn">
                     <input type="submit" id="con_pass" class="btns" value="Register" name="register"><br>
                     <p>I Already have an account</p>
                     <a href="../Autentications/login.php"><input type="button" id="con_pass" class="btns" value="Login"></a>
                 </div>
             </form>
         </div>
     </div><br>
 </body>

 </html>

 <?php include_once('../Admin/Partials/footer.php'); ?>