<?php
    include_once("includes/incl.database.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        include_once('head.php');
    ?>
    <title>Triple-A College - Home</title>
</head>
<body>
    <div id="header">
        <?php include_once('navbar.php');?>
    </div>
    <div class="jumbotron transparent">
        <div class="container-fluid" id="slide-top">
            <div id="indexslides" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="images\group-01-original.jpg" alt="img1" class="imageslide">
                    </div>
                    <div class="carousel-item">
                        <img src="images\group-02-original.jpg" alt="img2" class="imageslide">
                    </div>
                    <div class="carousel-item">
                        <img src="images\group-03-original.jpg" alt="img3" class="imageslide">
                    </div>
                </div>
            </div>
        <div id="wiw">
            <blockquote class="block-quote quote text-left">
                <p class="display-4" style="font-size:5vw;">"Our college offers group and personal lessons for all ages and levels of knowledge."</p>
            </blockquote>
            <a href="register.php"><button class="btn btn-lg btn-primary">Enroll Now!</button></a>
        </div>
        </div>
    </div>

    <div class="jumbotron colored">
        <div class="container">
            <h1 class="display-4">Create Your Own Future. Achieve Your Dream.</h1>
            <hr class="my-4">
        </div>
    </div>
    <div class="container-fluid" id="course">
        <div class="container">
            <h2 class="font-weight-bold text-center">Courses We Offer</h2>
            <hr class="my-4">
        </div>
        <div class="container">
            <div id="courses-offer" class="card-deck">
                <div class="card course-card">
                    <img src="images/programmer.png" class="mx-auto d-block icon-course" alt="card1">
                    <div class="card-body">
                        <h4 class="card-title font-weight-normal text-center course-quote">Programmer Analyst</h4>
                    </div>
                </div>

                <div class="card course-card">
                    <img src="images/networking.png" class="mx-auto d-block icon-course" alt="card2">
                    <div class="card-body">
                        <h4 class="card-title font-weight-normal text-center course-quote">Network and Internet Security Specialist</h4>
                    </div>
                </div>

                <div class="card course-card">
                    <img src="images/management.png" class="mx-auto d-block icon-course" alt="card3">
                    <div class="card-body">
                        <h4 class="card-title font-weight-normal text-center course-quote">Financial Management</h4>
                    </div>
                </div>

                <div class="card course-card">
                    <img src="images/pilot.png" class="mx-auto d-block icon-course" alt="card4">
                    <div class="card-body">
                        <h4 class="card-title font-weight-normal text-center course-quote">Air Transportaion</h4>
                    </div>
                </div>

                <div class="card course-card">
                    <img src="images/mainte.png" class="mx-auto d-block icon-course" alt="card5">
                    <div class="card-body">
                        <h4 class="card-title font-weight-normal text-center course-quote">Aircraft Maintenance</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <br> <br>
    <div class="jumbotron colored">
        <div class="d-inline-block col-lg-4 col-offset-2" id="block-1">
            <h3 class="font-weight-bold">Our Satisfied Students</h3>
            <hr class="my-4">
            <div id="blockslide" class="carousel slide carousel-fade col-lg-12 col-offset-2" data-ride="carousel_n">
                <ol class="carousel-indicators">
                    <li data-target="#blockslide" data-slide-to="0" class="active"></li>
                    <li data-target="#blockslide" data-slide-to="1"></li>
                    <li data-target="#blockslide" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active indc">
                       <article>
                        <h3>Warren Buffet</h3>
                        <br>
                        <p class="student">"The staff here is really supportive, teachers are great, the school has a good structure. Thank you!"</p>
                       </article>
                    </div>
                    <div class="carousel-item indc">
                       <article>
                        <h3>James Harden</h3>
                        <br>
                        <p class="student">"I am really enjoying my experience here. Teachers are very friendly and there is a friendly atmosphere."</p>
                       </article>
                    </div>
                    <div class="carousel-item indc">
                       <article>
                        <h3>Kate Middleton</h3>
                        <br>
                        <p class="student">"I like that it has a busy atmosphere but it’s never stressful. Everyone is very nice and you can ask anything at any time."</p>
                       </article>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-inline-block col-lg-4 col-offset-2" id="block-2">
                <h2 class="text-black text-uppercase font-weight-bold wow">Our Teachers</h2>
                <div>
                    <div class="wow">
                        <article class="profile-light"><img class="profile-light-image" src="images/home-3-6-95x95.jpg" alt="" width="95" height="95">
                            <div class="profile-light-main">
                                <p class="profile-light-position text-black-lighter">Programming Teacher</p>
                                <h5 class="profile-light-name p-3 mb-2 bg-dark text-white">Sam Johnson</h5>
                            </div>
                        </article>
                    </div>
                    <div class="wow">
                        <article class="profile-light"><img class="profile-light-image" src="images/home-3-7-95x95.jpg" alt="" width="95" height="95">
                            <div class="profile-light-main">
                                <p class="profile-light-position text-black-lighter">Financial Management Teacher</p>
                                <h5 class="profile-light-name p-3 mb-2 bg-dark text-white">Pamela Reed</h5>
                            </div>
                        </article>
                    </div>
                    <div class="wow">
                        <p class="big mt-md-30 mt-xl-50 text-black">1000 Saint-Jean Blvd, # 500, Pointe-Claire, QC, H9R 5P1</p>
                        <article class="box-inline-1"><span class="icon mdi mdi-phone"></span><a href="tel:#">1-800-346-6277</a></article>
                    </div>
                </div>
        </div>
        <hr class="my-4">
    </div>
    <?php include_once('footer.php')?>
</body>
</html>