<?php
    include_once("includes/incl.database.php");
    include_once("includes/incl.register.php");

    if(isset($_POST['register'])){
        $user = $_POST['username'];
        $pass = $_POST['password'];
        $fname = $_POST['firstname'];
        $lname = $_POST['lastname'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];

        $reg = new Register();
        if(!$reg->validateAccount($user)){
            if($reg->reg($user, $pass, $fname, $lname, $phone, $email)){
                $user = "";
                $pass = "";
                $fname = "";
                $lname = "";
                $phone = "";
                $email = "";
            }
        }else{
            echo "<script>alert('Username already in use please try another name');</script>";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include_once('head.php') ?>
    <title>Register</title>
</head>
<body>
    <div id="header">
        <?php 
            include_once('navbar.php');
            //since the session_start() method is in the navbar.php we need to re direct the url
            if(isset($_SESSION['username'])) {
                if($_SESSION['type'] == "Teacher"){
                    $profileurl = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/teacher.php';
                    header('Location: ' . $profileurl);
                }
                elseif ($_SESSION['type'] == "Student") {
                    $profileurl = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/student.php';
                    header('Location: ' . $profileurl);
                }
            }
        ?>
    </div>
    <div class="container">
        <hr class="my-4">
        <div class="card bg-light mt-5 shadow-lg rounded">
            <div class="card-header"><h2 class="display-4 text-center">Registration Form</h2></div>
            <div class="card-body">
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="firstname">First Name</label>
                        <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Your Text Here" value="<?php if(!empty($fname)) echo $fname; ?>" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="lastname">Last Name</label>
                        <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Your Text Here" value="<?php if(!empty($lname)) echo $lname; ?>" required>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="email">E-mail Address</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="youremail@email.com" value="<?php if(!empty($email)) echo $email; ?>" required> 
                    <label for="phone">Phone Number</label>
                    <input type="tel" class="form-control" id="phone" name="phone" placeholder="514-000-0000" value="<?php if(!empty($phone)) echo $phone; ?>" required>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="Enter Username" value="<?php if(!empty($user)) echo $user; ?>" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password" required>
                    </div>
                </div>
                <button type="submit" name="register" class="btn btn-primary btn-lg">Register</button>
            </form>
            </div>
        </div>
    </div>
    <?php include_once('footer.php')?>
</body>
</html>

