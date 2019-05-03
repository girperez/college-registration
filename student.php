<?php 
    include_once('includes/incl.database.php');
    include_once('includes/incl.profile.php');
    include_once('includes/incl.courses.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include_once('head.php');?>
    <title>Student-Profile</title>
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
                if($_SESSION['type'] == "Teacher"){
                    $profileurl = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/teacher.php';
                    header('Location: ' . $profileurl);
                }
            }

            // PHP code for fetching Data for profile sections
            $profile = new Profile();
            $courses = new Courses();
            $profile_list;
            $enrolled_course;
            $courselist;
            if(isset($_SESSION['username'])){
                if($_SESSION['type'] == "Student"){
                    $profile_list = $profile->getStudentProfile($_SESSION['username']);
                    $enrolled_course = $profile->getEnrolledCourses($_SESSION['username']);
                    $courselist = $courses->getCourseList();
                }
            }else{
                echo '<script>alert("Error Fetching Student profile");</script>';
            }

            if(isset($_POST['addcourse'])){
                $course = $_POST['courseid'];
                foreach ($course as $value) {
                    $profile->enrollCourse($value, $_SESSION['username']);
                }
                
                $profileurl = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/student.php';
                header('Location: ' . $profileurl);

            }
        ?>
    </div>
    <div class="container-fluid">
        <hr class="my-5">
        <div class="card-columns">

            <!-- PROFILE SECTION -->
            <div class="card border-dark shadow" style="max-width: 30rem;">
                <div class="card-header"><h4 class="h4">Welcome back <?php echo $profile_list['First_name']; ?>!</h4></div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <span class="text-p h5">Username: </span>
                            <span class="text-info h5"><?php echo $profile_list['Username']; ?></span>
                        </li>
                        <li class="list-group-item">
                            <span class="text-p h5">Your E-mail: </span>
                            <span class="text-info h5"><?php echo $profile_list['Email']; ?></span>
                        </li>
                        <li class="list-group-item">
                        <span class="text-p h5">Your Contact no.: </span>
                            <span class="text-primary h5"><?php echo $profile_list['Phone_num']; ?></span>
                        </li>
                    </ul>
                </div>
            </div>


            <!-- COURSES SECTION -->
            <div class="card border-info shadow" style="width: 50vw;">
                <div class="card-header">
                    <ul class="nav nav-tabs card-header-tabs" id="profiletabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="enrolled-tab" data-toggle="tab" href="#enrolled-courses" aria-controls="enrolled-courses" aria-selected="true"><span class="text-info h5">Enrolled Courses</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="register-tab" data-toggle="tab" href="#register-courses" aria-controls="register-courses" aria-selected="false"><span class="text-info h5">Courses</span></a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content" id="tab-content">
                        <div class="tab-pane fade show active" id="enrolled-courses" role="tabpanel" aria-labelledby="enrolled-tab">
                            <ul class="list-group list-group-flush">
                                <?php
                                    if(!empty($enrolled_course)){
                                        foreach ($enrolled_course as $key => $value) {
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
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <h5 class="text-muted"><strong>Click Courses tab to enroll new course now!</strong></h5>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-pane fade" id="register-courses" role="tabpanel" aria-labelledby="register-tab">
                            <ul class="list-group list-group-flush" id="courses-normal">
                                <?php
                                    foreach ($courselist as $key => $value) {
                                       echo '<li class="list-group-item d-flex justify-content-between align-items-center">
                                                <h5><strong>'.$value['Title'].'</strong></h5>
                                                <h6><strong>'.$value['CourseCode'].'</strong></h6>
                                                <h6><strong>'.$value['Duration'].'</strong></h6>
                                            </li>';     
                                    }
                                ?>
                            </ul>
                            <ul class="list-group list-group-flush" id="courses-add">
                                <form action="" method="post">
                                        <?php 
                                            foreach ($courselist as $key => $value) {
                                                ?>
                                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                                    <div class="input-group"> 
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">
                                                                <input type="checkbox" name="courseid[]" value="<?php echo $value['CourseCode'];?>" id="<?php echo $value['CourseCode'];?>">
                                                            </div>
                                                        </div>
                                                        <label for="<?php echo $value['CourseCode'];?>" class="input-group-text bg-white border-dark">
                                                            <h5 class="mr-4"><strong>Title: <?php echo $value['Title'];?>-</strong></h5>
                                                            <h6 class="mr-4"><strong>Code: <?php echo $value['CourseCode'];?>-</strong></h6>
                                                            <h6><strong>Duration: <?php echo $value['Duration'];?></strong></h6>
                                                        </label>
                                                    </div>
                                                </li>
                                                <?php
                                            }
                                        ?>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <button type="submit" name="addcourse" class="btn btn-primary btn-lg">Add Course</button>
                                    </li>
                                </form>
                            </ul>
                            <a href="#" class="btn btn-primary" id="add-course-btn">Enroll New Course</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include_once('footer.php');?>
</body>
</html>