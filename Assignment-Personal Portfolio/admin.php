<?php
require('db.php');
if (!isset($_SESSION['isUserLoddesIn'])) {
  echo "<script>window.location.href='login.php';</script>";
}
$query1 = "SELECT * FROM contact";
$run = mysqli_query($db, $query1);

if ($run) {

  $data = mysqli_fetch_assoc($run);
} else {

  // Handle query failure, check for errors
  echo "Query failed: " . mysqli_error($db);
}

?>


<span style="font-family: verdana, geneva, sans-serif;">


  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8" />
    <title>Admin Panel</title>
    <link rel="stylesheet" href="css/admin.css" />
    <link rel="stylesheet" href="css/table.css">
    <!-- <link rel="stylesheet" href="css/login.css"> -->
    <!-- Font Awesome Cdn Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
  </head>

  <body>
    <div class="container">
      <nav>
        <ul>
          <!-- <li><a href="#" class="logo">
              <img src="/logo.jpg" alt="">
              <span class="nav-item">Section Control</span>
            </a></li> -->

          <li><a href="admin.php?homesetting=true">
              <i class="fas fa-home"></i>
              <span class="nav-item">Home</span>
            </a></li>

          <li><a href="admin.php?aboutsetting=true">
              <i class="fas fa-user"></i>
              <span class="nav-item">About</span>
            </a></li>

          <li><a href="admin.php?educationsetting=true">
              <i class="fas fa-wallet"></i>
              <span class="nav-item">Education</span>
            </a></li>

          <!-- <li><a href="admin.php?skillssetting=true">
              <i class="fas fa-chart-bar"></i>
              <span class="nav-item">Skills</span>
            </a></li> -->

          <li><a href="admin.php?projectssetting=true">
              <i class="fas fa-tasks"></i>
              <span class="nav-item">Projects</span>
            </a></li>

          <li><a href="admin.php?contactsetting=true">
              <i class="fas fa-cog"></i>
              <span class="nav-item">Contact</span>
            </a></li>

          <!-- <li><a href="admin.php?settings=true">
              <i class=" fas fa-question-circle"></i>
              <span class="nav-item">Settings</span>
            </a></li> -->

          <li><a href="logout.php" class="logout">
              <i class="fas fa-sign-out-alt"></i>
              <span class="nav-item">Log out</span>
            </a></li>
        </ul>
      </nav>


      <section class="content">



        <div class="row">

          <?php if (isset($_GET['homesetting'])) { ?>
            <?php
            require('db.php');
            $query_home = "SELECT * FROM home, social_media";
            $run_home = mysqli_query($db, $query_home);

            if ($run_home) {

              $data_home = mysqli_fetch_assoc($run_home);
            } else {

              // Handle query failure, check for errors
              echo "Query failed: " . mysqli_error($db);
            }

            ?>
            <form role="form" action="update.php" method="post">
              <h2>Update Home</h2>
              <label for="title">Name:</label>
              <input type="text" id="name" name="name" value="<?= $data_home['name'] ?>" required>
              <br>
              <label for="title">Title:</label>
              <input type="text" id="title" name="title" value="<?= $data_home['title'] ?>" required>
              <br>
              <label for="subtitle">Subtitle:</label>
              <input type="text" id="subtitle" name="subtitle" value="<?= $data_home['subtitle'] ?>" required>
              <br>
              <label for="email">Email:</label>
              <input type="text" id="email" name="email" value="<?= $data_home['email'] ?>" >
              <br>
              <label for="facebook">Facebook:</label>
              <input type="text" id="facebook" name="facebook" value="<?= $data_home['facebook'] ?>" >
              <br>
              <label for="instagram">Instagram:</label>
              <input type="text" id="instagram" name="instagram" value="<?= $data_home['instagram'] ?>" >
              <br>
              <label for="linkedin">Linkedin:</label>
              <input type="text" id="linkedin" name="linkedin" value="<?= $data_home['linkedin'] ?>" >
              <br>
              <label for="github">Github:</label>
              <input type="text" id="github" name="github" value="<?= $data_home['github'] ?>" >
              <br>
              <label for="phone">Phone:</label>
              <input type="text" id="phone" name="phone" value="<?= $data_home['phone'] ?>" >
              <br>

              <br>
              <button type="submit" name="update-home">Update</button>
            </form>

          <?php

          } else if (isset($_GET['aboutsetting'])) { ?>
            <?php
            require('db.php');
            $query_about = "SELECT * FROM about";
            $run_about = mysqli_query($db, $query_about);

            if ($run_about) {

              $data_about = mysqli_fetch_assoc($run_about);
            } else {

              // Handle query failure, check for errors
              echo "Query failed: " . mysqli_error($db);
            }

            ?>
            
            <form role="form" action="update.php" method="post" enctype="multipart/form-data">
              <h2>Update About</h2>
              <label for="about_pic">About Image:</label>
              <input type="file" id="about_pic" name="about_pic"  ><br>
              <img src="images/<?= $data_about['about_pic']?>" alt="" class="pic" style="width: 100px">

              <!-- <label for="title">Title:</label>
              <input type="text" id="about_title" name="about_title" value=""> -->
              <br>
              <label for="description">About Description:</label>
              <textarea rows"20" cols="50" id="about_desc" name="about_desc" required><?= $data_about['about_desc'] ?></textarea>
              <br>
              <button type="submit" name="update-about">Update</button>
            </form>

          <?php

          } else if (isset($_GET['educationsetting'])) {
          ?>
            <h3>Education</h3>
            <table>
              <thead>
                <tr>
                  <th>#</th>
                  <th>Type</th>
                  <th>Title</th>
                  <th>Institution</th>
                  <th>Time</th>
                  <th>Description</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                require('db.php');
                $q = "SELECT * FROM education";
                $r = mysqli_query($db, $q);
                $c = 1;
                while ($pi = mysqli_fetch_array($r)) {

                ?>

                  <tr>
                    <td><?= $c ?></td>
                    <td><?= $pi['type'] ?></td>
                    <td><?= $pi['edu_title'] ?></td>
                    <td><?= $pi['institution'] ?></td>
                    <td><?= $pi['time'] ?></td>
                    <td><?= $pi['about_edu'] ?></td>
                    <td><a href="update_edu.php? id=<?= $pi['id'] ?> ">Update</a><a href="delete_edu.php? id=<?= $pi['id'] ?>">Delete</a></td>
                  </tr>
                <?php
                  $c++;
                }
                ?>
              </tbody>
              
            </table>
            <form role="form" action="add_edu.php" method="post">
    
                <button type="submit" name="add-edu">Add Education</button><br>
            </form>


            

            <!-- <form role="form" action="update.php" method="post">
              <h2>Add Education</h2>
              <label for="type">Select Type:</label>
              <select name="type">
                <option value="education">Education</option>
                <option value="experience">Experience</option>
              </select>
              <br>
              <label for="title">Title:</label>
              <input type="text" id="edu_title" name="edu_title" required>
              <br>
              <label for="institute">Institute:</label>
              <input type="text" id="institution" name="institution" required>
              <br>
              <label for="time">Time:</label>
              <input type="text" id="time" name="time" required>
              <br>
              <label for="about_edu">Description:</label>
              <textarea cols="80" id="about_edu" name="about_edu" required></textarea>
              <br>
              <button type="submit" name="add-edu">Add</button>
            </form> -->

          <?php

          } else if (isset($_GET['projectssetting'])) {
          ?>
            <h3>View Projects</h3>
            <table>
              <thead>
                <tr>
                  <th>#</th>
                  <th>Title</th>
                  <th>Image</th>
                  <th>Link</th>
                  <th>Description</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                require('db.php');
                $q = "SELECT * FROM projects";
                $r = mysqli_query($db, $q);
                $c = 1;
                while ($pi = mysqli_fetch_array($r)) {

                ?>

                  <tr>
                    <td><?= $c ?></td>
                    <td><?= $pi['project_title'] ?></td>
                    <td><img src="images/<?=$pi['project_image']?>" style="width: 100px" alt=""></td>
                    <td><a href="<?= $pi['project_link'] ?>" target="_blank">Open Link</a></td>
                    <td><?= $pi['project_desc'] ?></td>
                    <td><a href="update_project.php? id=<?= $pi['id'] ?> ">Update</a><a href="delete_project.php? id=<?= $pi['id'] ?>">Delete</a></td>
                  </tr>
                <?php
                  $c++;
                }
                ?>
              </tbody>
            </table>

            <form role="form" action="add_project.php" method="post">
    
                <button type="submit" name="add-projects">Add Project</button><br>
            </form>

            <!-- <form role="form" action="update.php" method="post" enctype="multipart/form-data">
              <h2>Add Project</h2>
              <label for="project_title">Title:</label>
              <input type="text" id="project_title" name="project_title"  required>
              <br>
              <label for="project_image">Image:</label>
              <input type="file" id="project_image" name="project_image" >
              <br>
              <label for="project_link">Project Link:</label>
              <input type="text" id="project_link" name="time" >
              <br>
              <label for="project_desc">Project Description:</label>
              <textarea cols="80" id="project_desc" name="project_desc" required>></textarea>
              <br>
              <button type="submit" name="add-project">Add Project</button><br><br>
            </form> -->

          <?php
          } else if(isset($_GET['contactsetting'])){?>

          <h3>Your Messages are Here!</h3>
          <table>
          <thead>
                <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Number</th>
                  <th>Subject</th>
                  <th>Message</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                require('db.php');
                $q = "SELECT * FROM contact";
                $r = mysqli_query($db, $q);
                $c = 1;
                while ($pi = mysqli_fetch_array($r)) {

                ?>

                  <tr>
                    <td><?= $c ?></td>
                    <td><?= $pi['name'] ?></td>
                    <td><?= $pi['email'] ?></td>
                    <td><?= $pi['number'] ?></td>
                    <td><?= $pi['subject'] ?></td>
                    <td><?= $pi['message'] ?></td>
                    <td><a href="delete_message.php? id=<?= $pi['id'] ?>">Delete</a></td>
                  </tr>
                <?php
                  $c++;
                }
                ?>
              </tbody>
            </table>


          <?php
          }else{

          ?>



            <!-- <form method="post" action="update.php">
              <?php
              require('db.php');
              $query = "SELECT * FROM section_control";
              $run = mysqli_query($db, $query);

              if ($run) {

                $user_data = mysqli_fetch_assoc($run);
              } else {

                // Handle query failure, check for errors
                echo "Query failed: " . mysqli_error($db);
              }
              ?>
              <div class="custom-switch">
                <input type="checkbox" id="flexSwitchCheckChecked" class="custom-switch-input" checked>
                <?php if ($user_data['about_section']) {
                  echo "checked";
                }
                ?>
                <label for="flexSwitchCheckChecked" class="custom-switch-label">Home Section</label>
              </div>

              <div class="custom-switch">
                <input type="checkbox" id="flexSwitchCheckChecked" class="custom-switch-input" checked>
                <?php if ($user_data['about_section']) {
                  echo "checked";
                }
                ?>
                <label for="flexSwitchCheckChecked" class="custom-switch-label">About Section</label>
              </div>

              <div class="custom-switch">
                <input type="checkbox" id="flexSwitchCheckChecked" class="custom-switch-input" checked>
                <?php if ($user_data['education_section']) {
                  echo "checked";
                }
                ?>
                <label for="flexSwitchCheckChecked" class="custom-switch-label">Education Section</label>
              </div>

              <div class="custom-switch">
                <input type="checkbox" id="flexSwitchCheckChecked" class="custom-switch-input" checked>
                <?php if ($user_data['skills_section']) {
                  echo "checked";
                }
                ?>
                <label for="flexSwitchCheckChecked" class="custom-switch-label">Skills Section</label>
              </div>

              <div class="custom-switch">
                <input type="checkbox" id="flexSwitchCheckChecked" class="custom-switch-input" checked>
                <?php if ($user_data['projects_section']) {
                  echo "checked";
                }
                ?>
                <label for="flexSwitchCheckChecked" class="custom-switch-label">Projects Section</label>
              </div>

              <div class="custom-switch">
                <input type="checkbox" id="flexSwitchCheckChecked" class="custom-switch-input" checked>
                <?php if ($user_data['contact_section']) {
                  echo "checked";
                }
                ?>
                <label for="flexSwitchCheckChecked" class="custom-switch-label">Contact Section</label>
              </div>



              <input type="submit" name="update-section" value="Save Changes">

            </form> -->

          <?php
          }
          ?>

        </div>
      </section>

    </div>
  </body>

  </html>
</span>