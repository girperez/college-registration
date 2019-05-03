<?php 
    include_once('includes/incl.database.php');
    include_once('includes/incl.courses.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include_once('head.php');?>
    <title>Document</title>
</head>
<body>
    <div>
        <?php 
            include_once('navbar.php');
            // since the session_start() method is in the navbar.php we need to re direct the url
            if(!isset($_SESSION['username'])) {
                $homeurl = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/index.php';
                header('Location: ' . $homeurl);
            }elseif (isset($_SESSION['username'])){
                if($_SESSION['type'] == "Student"){
                    $profileurl = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/student.php';
                    header('Location: ' . $profileurl);
                }
            }
            $courses = new Courses();
            $courselist;
            if(isset($_SESSION['username'])){
                if($_SESSION['type'] == "Teacher"){
                    $courselist = $courses->getCourseList();
                }
            }else{
                echo '<script>alert("Error Fetching Teacher profile");</script>';
            }

            if(isset($_POST['addcourse'])){
                $courses->insertCourse($_POST['course-title'], $_POST['course-duration']);
                $profileurl = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/teacher.php';
                header('Location: ' . $profileurl);
            }
        ?>
    </div>
    <div class="container-fluid">
        <hr class="my-5">
        <div class="card-columns">
            <div class="card border-dark shadow" style="max-width: 30rem;">
                <div class="card-header"><h4 class="h4">Welcome back!</h4></div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <span class="text-p h5">Username: </span>
                            <span class="text-info h5"><?php echo $_SESSION['username'] ?></span>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="card border-info shadow" style="width: 50vw;">
                <div class="card-header">
                    <ul class="nav nav-tabs card-header-tabs" id="profiletabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="enrolled-tab" data-toggle="tab" href="#enrolled-courses" aria-controls="enrolled-courses" aria-selected="true"><span class="text-info h5">Course Lists</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="register-tab" data-toggle="tab" href="#register-courses" aria-controls="register-courses" aria-selected="false"><span class="text-info h5">Add new Course</span></a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content" id="tab-content">
                        <div class="tab-pane fade show active" id="enrolled-courses" role="tabpanel" aria-labelledby="enrolled-tab">
                            <ul class="list-group list-group-flush">
                                <?php
                                    if(!empty($courselist)){
                                        foreach ($courselist as $key => $value) {
                                            echo '<li class="list-group-item d-flex justify-content-between align-items-center">
                                                     <h5><strong>'.$value['Title'].'</strong></h5>
                                                     <h6><strong>'.$value['CourseCode'].'</strong></h6>
                                                     <h6><strong>'.$value['Duration'].'</strong></h6>
                                                 </li>';
                                        }
                                    }else{
                                        echo '<li class="list-group-item d-flex justify-content-between align-items-center">
                                                     <h5 class="text-muted"><strong>No Courses to Display</strong></h5>
                                                 </li>';
                                    }
                                ?>
                            </ul>
                        </div>
                        <div class="tab-pane fade" id="register-courses" role="tabpanel" aria-labelledby="register-tab">
                            <ul class="list-group list-group-flush" id="add-courses">
                                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <div class="input-group"> 
                                            <div class="input-group-prepend">
                                                <label for="course-title" class="input-group-text bg-light border-dark">Course Title</label>
                                            </div>
                                            <input type="text" class="form-control border-dark" name="course-title" id="course-title" required>
                                        </div>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <div class="input-group"> 
                                            <div class="input-group-prepend">
                                                <label for="course-duration" class="input-group-text bg-light border-dark">Course Duration</label>
                                            </div>
                                            <input type="text" class="form-control border-dark" name="course-duration" id="course-duration" required>
                                        </div>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <button type="submit" name="addcourse" class="btn btn-primary btn-lg">Add Course</button>
                                    </li>
                                </form>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include_once('footer.php');?>
</body>
</html>