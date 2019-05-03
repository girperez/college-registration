<?php 
  include_once('includes/incl.login.php');
  session_start();
  $log = new Login();
  $validate = TRUE;
  if(isset($_POST['login'])){
    $validate = $log->Sign_in($_POST['username'], $_POST['password']);
  }

  if(isset($_POST['logout'])){
    $log->Sign_out();
  }
?>
<nav class="navbar navbar-expand-lg navbar-light colored">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <a class="navbar-brand" href="index.php"><img class="profile-light-image" src="images/logo.png" alt="logo" width="95" height="95"></a>

  <div class="collapse navbar-collapse" id="navbar">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item active">
        <a class="nav-link" href="index.php"><h4>Tripple-A-College</h4><span class="sr-only">(current)</span></a>
      </li>
      <?php
        if(isset($_SESSION['type'])){
          if($_SESSION['type']=="Student"){
            echo '<li class="nav-item">
                <a class="nav-link btn btn-outline-secondary" href="student.php"><h5>Profile</h5></a>
                </li>';
          }elseif ($_SESSION['type']=="Teacher") {
            echo '<li class="nav-item">
                <a class="nav-link btn btn-outline-secondary" href="teacher.php"><h5>Profile</h5></a>
                </li>';
          }
        }
      ?>
      
    </ul>
    <form class="form-inline my-2 my-lg-0" action = "<?php echo $_SERVER['PHP_SELF']; ?>" style = "position: relative" method="post">
      <?php
       if(!isset($_SESSION['username'])){
         if($validate){
            echo '<input class="form-control mr-sm-2" type="text" name="username" placeholder="Username" aria-label="Username">
            <input class="form-control mr-sm-2" type="password" name="password" placeholder="Password" aria-label="Password">
            <button class="btn btn-outline-primary my-2 my-sm-0" name="login" type="submit">Log-in</button>';
         }else{
          echo '<input class="form-control mr-sm-2 is-invalid" type="text" name="username" placeholder="Username" aria-label="Username">
          <input class="form-control mr-sm-2 is-invalid" type="password" name="password" placeholder="Password" aria-label="Password">
          <button class="btn btn-outline-primary my-2 my-sm-0" name="login" type="submit">Log-in</button>
          <div class="invalid-feedback" style = "position: absolute; top: 5vh;"> username or password is invalid.</div>';
         }
       }else{
        echo '<h4 mr-3>You are logged in as : '.$_SESSION['username'].'</h4>
        <button class="btn btn-outline-primary my-2 my-sm-0" name="logout" type="submit" >Log-out</button>';
       }
      ?>
    </form>
  </div>
</nav>