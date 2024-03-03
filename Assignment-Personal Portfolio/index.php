<?php
require('db.php');

if (isset($_POST['submit'])) {
    $name =$_POST['name'];
    $email = $_POST['email'];
    $number = $_POST['number'];
    $subject =  $_POST['subject'];
    $message =  $_POST['message'];

    $query_c = "INSERT INTO contact (name, email, number, subject, message) VALUES ('$name', '$email', '$number', '$subject', '$message')";

    $run_c= mysqli_query($db, $query_c);
    if ($run_c) {
        echo "<script>alert('Message sent successfully.');</script>";
        echo "<script>window.location.href='index.php';</script>";
        exit();
    } else {
        echo "Error sending message: " . mysqli_error($db);
    }
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA_Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shaeer Musarrat Swapnil | Portfolio</title>

    <link rel="stylesheet" href="css/style.css">

    <!-- box icons -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>


    <?php

    // // include 'config.php';
    // $con = mysqli_connect('localhost:3307', 'root', '', 'portfolio');

    // $sql = "SELECT * FROM `users` WHERE `users`.`id` = 1";
    // $result = mysqli_query($con, $sql);

    // if ($result) {

    //     $data = mysqli_fetch_assoc($result);

    // } else {

    //     // Handle query failure, check for errors
    //     echo "Query failed: " . mysqli_error($con);
    // }

    require('db.php');
    $query = "SELECT * FROM home,section_control,social_media";
    $run = mysqli_query($db, $query);

    if ($run) {

        $user_data = mysqli_fetch_assoc($run);
        // $social_media_data = mysqli_fetch_assoc($run);
    } else {

        // Handle query failure, check for errors
        echo "Query failed: " . mysqli_error($db);
    }
    ?>

    <!-- ------------------header--------------- -->

    <header class="header">
        <a href="#" class="logo">Port<span>folio.</span><span class="animate" style="--i:1"></span></a>

        <div class="bx bx-menu" id="menu-icon"><span class="animate" style="--i:2"></span></div>



        <nav class="navbar">

            <?php
            if ($user_data['home_section']) {
            ?>
                <a href="#home" class="active">Home</a>
            <?php
            }
            ?>
            <?php
            if ($user_data['about_section']) {
            ?>
                <a href="#about">About</a>
            <?php
            }
            ?>
            <?php
            if ($user_data['education_section']) {
            ?>
                <a href="#education">Education</a>
            <?php
            }
            ?>
            <?php
            if ($user_data['skills_section']) {
            ?>
                <a href="#skills">Skills</a>
            <?php
            }
            ?>
            <?php
            if ($user_data['projects_section']) {
            ?>
                <a href="#portfolio">Projects</a>
            <?php
            }
            ?>
            <?php
            if ($user_data['contact_section']) {
            ?>
                <a href="#contact">Contact Me</a>
            <?php
            }
            ?>

            <span class="active-nav"></span>
            <span class="animate" style="--i:2"></span>
        </nav>
    </header>


    <!-- -----------home----------- -->

    <section class="home show-animate" id="home">
        <div class="home-content">
            <h1>Hi, I'm <span><?= $user_data['name'] ?></span><span class="animate" style="--i:2"></span></h1>
            <div class="text-animate">
                <h3><?= $user_data['title'] ?></h3>
                <span class="animate" style="--i:3"></span>
            </div>
            <p><?= $user_data['subtitle'] ?>
                <span class="animate" style="--i:4"></span>
            </p>
            <div class="btn-box">
                <a href="#" class="btn">CV</a>
                <a href="#" class="btn">Message</a>
                <span class="animate" style="--i:5"></span>
            </div>
        </div>



        <?php
        if ($user_data['show_icons']) {
        ?>
           <div class="home-sci">
    <?php if ($user_data['email'] != '') { ?>
        <a href="<?= $user_data['email'] ?>" target="_blank"><i class='bx bxl-gmail'></i></a>
    <?php } ?>

    <?php if ($user_data['facebook'] != '') { ?>
        <a href="<?= $user_data['facebook'] ?>" target="_blank"><i class='bx bxl-facebook'></i></a>
    <?php } ?>

    <?php if ($user_data['instagram'] != '') { ?>
        <a href="<?= $user_data['instagram'] ?>" target="_blank"><i class='bx bxl-instagram'></i></a>
    <?php } ?>

    <?php if ($user_data['linkedin'] != '') { ?>
        <a href="<?= $user_data['linkedin'] ?>" target="_blank"><i class='bx bxl-linkedin'></i></a>
    <?php } ?>

    <?php if ($user_data['github'] != '') { ?>
        <a href="<?= $user_data['github'] ?>" target="_blank"><i class='bx bxl-github'></i></a>
    <?php } ?>

    <?php if ($user_data['phone'] != '') { ?>
        <a href="<?= $user_data['phone'] ?>" target="_blank"><i class='bx bx-phone'></i></a>
    <?php } ?>
    
    <span class="animate" style="--i:6"></span>
</div>



        <?php
        }
        ?>

        <!-- <span class="animate" style="--i:6"></span> -->

        <!-- <div class="profile-img">
            <img src="images/about.jpg" alt="">
        </div> -->

        <div class="home-imgHover"></div>
        <span class="animate profile-img" style="--i:7"></span>
    </section>




    <!-- ----------about section----------- -->

    <?php

    require('db.php');
    $query_about = "SELECT * FROM about";
    $run_about = mysqli_query($db, $query_about);

    if ($run_about) {

        $user_data_about = mysqli_fetch_assoc($run_about);
    } else {

        // Handle query failure, check for errors
        echo "Query failed: " . mysqli_error($db);
    }

    ?>

    <section class="about" id="about">
        <h2 class="heading">About <span>Me</span><span class="animate scroll" style="--i:1"></span></h2>
        <div class="about-img">
            <img src="images/<?= $user_data_about['about_pic']?>" alt="">
            <span class="circle-spin"></span>
            <span class="animate scroll" style="--i:2"></span>
        </div>

        <div class="about-content">
            <h3>I am a <span class="multiple-text"></span><span class="animate scroll" style="--i:3"></span></h3>
            <p><?= $user_data_about['about_desc'] ?>
                <span class="animate scroll" style="--i:4"></span>
            </p>
            <!-- <div class="btn-box btns">
                <a href="#" class="btn">Read More</a>
                <span class="animate scroll" style="--i:5"></span>
            </div> -->
        </div>
    </section>

    <!-- -----------education section----------- -->


    <?php
    require('db.php');
    $query_education = "SELECT * FROM education";
    $run_education = mysqli_query($db, $query_education);

    if (!$run_education) {
        // Handle query failure, check for errors
        echo "Query failed: " . mysqli_error($db);
    }

    ?>

    <section class="education" id="education">
        <h2 class="heading">My <span>Journey</span><span class="animate scroll" style="--i:1"></span></h2>

        <div class="education-row">
            <div class="education-column">
                <h3 class="title">Education<span class="animate scroll" style="--i:2"></span></h3>

                <?php
                mysqli_data_seek($run_education, 0);
                $user_data_education = mysqli_fetch_assoc($run_education); // Fetch the first row outside the loop
                while ($user_data_education) {
                    if ($user_data_education['type'] == 'education') {
                ?>
                        <div class="education-box">
                            <div class="education-content">
                                <div class="content">
                                    <div class="year"><i class='bx bxs-calendar'></i><?= $user_data_education['time'] ?></div>
                                    <h3><?= $user_data_education['edu_title'] ?></h3>
                                    <h3><?= $user_data_education['institution'] ?></h3>
                                    <p>
                                    <h3><?= $user_data_education['about_edu'] ?></h3>
                                    </p>
                                </div>
                            </div>
                            <span class="animate scroll" style="--i:3"></span>
                        </div>
                <?php
                    }
                    $user_data_education = mysqli_fetch_assoc($run_education); // Fetch the next row
                }
                ?>
            </div>

            <div class="education-column">
                <h3 class="title">Experience<span class="animate scroll" style="--i:5"></span></h3>

                <?php
                mysqli_data_seek($run_education, 0);
                $user_data_education = mysqli_fetch_assoc($run_education); // Reset pointer to the beginning of the result set
                while ($user_data_education) {
                    if ($user_data_education['type'] == 'experience') {
                ?>
                        <div class="education-box">
                            <div class="education-content">
                                <div class="content">
                                    <div class="year"><i class='bx bxs-calendar'></i><?= $user_data_education['time'] ?></div>
                                    <h3><?= $user_data_education['title'] ?></h3>
                                    <h3><?= $user_data_education['institution'] ?></h3>
                                    <p>
                                    <h3><?= $user_data_education['about_edu'] ?></h3>
                                    </p>
                                </div>
                            </div>
                            <span class="animate scroll" style="--i:6"></span>
                        </div>
                <?php
                    }
                    $user_data_education = mysqli_fetch_assoc($run_education); // Fetch the next row
                }
                ?>
            </div>
        </div>
    </section>



    <!-- ----------skills section---------- -->

    <?php

    require('db.php');
    $query_skills = "SELECT * FROM skills";
    $run_skills = mysqli_query($db, $query_skills);

    if ($run_skills) {

        $user_data_skills = mysqli_fetch_assoc($run_skills);
    } else {

        // Handle query failure, check for errors
        echo "Query failed: " . mysqli_error($db);
    }

    ?>

    <section class="skills" id="skills">
        <h2 class="heading">My <span>Skills</span><span class="animate scroll" style="--i:1"></span></h2>

        <div class="skills-row">
            <div class="skills-column">
                <h3 class="title">Coding Skills<span class="animate scroll" style="--i:2"></span></h3>
                <div class="skills-box">
                    <div class="skills-content">
                        <?php
                        mysqli_data_seek($run_skills, 0);

                        while ($user_data_skills = mysqli_fetch_assoc($run_skills)) {
                        ?>

                            <div class="progress">
                                <h3><?= $user_data_skills['skill_name_1'] ?> <span><?= $user_data_skills['skill_level_1'] ?>%</span></h3>
                                <div class="bar" role="progressbar" aria-valuenow="<?= $user_data_skills['skill_level_1'] ?>" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>

                        <?php
                        }
                        ?>

                    </div>

                    <span class="animate scroll" style="--i:3"></span>
                </div>
            </div>

            <div class="skills-column">
                <h3 class="title">Coding Skills<span class="animate scroll" style="--i:5"></span></h3>
                <div class="skills-box">
                    <div class="skills-content">

                        <?php
                        mysqli_data_seek($run_skills, 0);

                        while ($user_data_skills = mysqli_fetch_assoc($run_skills)) {
                        ?>

                            <div class="progress">
                                <h3><?= $user_data_skills['skill_name_2'] ?> <span><?= $user_data_skills['skill_level_2'] ?>%</span></h3>
                                <div class="bar" role="progressbar" aria-valuenow="<?= $user_data_skills['skill_level_2'] ?>" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>

                        <?php
                        }
                        ?>
                    </div>

                    <span class="animate scroll" style="--i:6"></span>
                </div>
            </div>
        </div>
    </section>

    <!-- ------------Projects Section-------------- -->

    <?php
    require('db.php');
    $query_projects = "SELECT * FROM projects";
    $run_projects = mysqli_query($db, $query_projects);

    if ($run_projects) {
        // Fetch all rows into an array
        $data_projects = mysqli_fetch_all($run_projects, MYSQLI_ASSOC);
    } else {
        // Handle query failure, check for errors
        echo "Query failed: " . mysqli_error($db);
    }
?>

<section class="portfolio" id="portfolio">
    <h2 class="heading">Latest <span>Projects</span><span class="animate scroll" style="--i:1"></span></h2>

    <div class="portfolio-container">

        <?php
        foreach ($data_projects as $user_data_projects) {
        ?>

            <div class="portfolio-box">
                <img src="images/<?= $user_data_projects['project_image']?>" alt="">
                <div class="portfolio-layer">
                    <h4><?= $user_data_projects['project_title'] ?></h4>
                    <p><?= $user_data_projects['project_desc'] ?></p>
                    <a href="#"><i class='bx bx-link-external'><?= $user_data_projects['project_link'] ?></i></a>
                </div>
                <span class="animate scroll" style="--i:3"></span>
            </div>

        <?php
        }
        ?>

    </div>
</section>




    <!-- --------contact section------- -->

    <section class="contact" id="contact">
    <h2 class="heading">Contact <span>Me!</span><span class="animate scroll" style="--i:1"></span></h2>

    <form action="process_contact_form.php" method="post">
        <div class="input-box">
            <div class="input-field">
                <input type="text" placeholder="Full Name" name="name" required>
                <span class="focus"></span>
            </div>
            <div class="input-field">
                <input type="email" placeholder="Email Address" name="email" required>
                <span class="focus"></span>
            </div>
            <span class="animate scroll" style="--i:3"></span>
        </div>
        <div class="input-box">
            <div class="input-field">
                <input type="tel" placeholder="Mobile Number" name="number" required>
                <span class="focus"></span>
            </div>
            <div class="input-field">
                <input type="text" placeholder="Email Subject" name="subject" required>
                <span class="focus"></span>
            </div>
            <span class="animate scroll" style="--i:5"></span>
        </div>

        <div class="textarea-field">
            <textarea name="message" id="message" cols="30" rows="10" placeholder="Your Message" required></textarea>
            <span class="focus"></span>
            <span class="animate scroll" style="--i:7"></span>
        </div>

        <div class="btn-box btns">
            <button type="submit" class="btn" name="submit">Submit</button>
            <span class="animate scroll" style="--i:9"></span>
        </div>
    </form>
</section>

    <!-- -----------footer----------- -->
    <footer class="footer">
        <div class="footer-text">
            <p>
                Copyright &copy; 2024 by Shaeer Musarrat Swapnil | All Rights Reserved.
            </p>
            <span class="animate scroll" style="--i:1"></span>
        </div>

        <div class="footer-iconTop">
            <a href="login.php"><i class='bx bx-log-in'></i></a>
            <a href="#"><i class='bx bx-up-arrow-alt'></i></a>
            <span class="animate scroll" style="--i:2"></span>
        </div>
    </footer>


    <!-- typed js  -->
    <script src="https://unpkg.com/typed.js@2.1.0/dist/typed.umd.js"></script>


    <script src="js/script.js"></script>
</body>

</html>