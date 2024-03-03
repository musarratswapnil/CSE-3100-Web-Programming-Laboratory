<?php
// session_start();
require('db.php');

// if (isset($_POST['update-section'])) {
//     $home = $_POST['home'] ?? 0;
//     $about = $_POST['about'] ?? 0;
//     $education = $_POST['education'] ?? 0;
//     $skills = $_POST['skills'] ?? 0;
//     $projects = $_POST['projects'] ?? 0;
//     $contact = $_POST['contact'] ?? 0;

//     $query = "UPDATE section_control SET ";
//     $query .= "home_section = '$home', ";
//     $query .= "about_section = '$about', ";
//     $query .= "education_section = '$education', ";
//     $query .= "skills_section = '$skills', ";
//     $query .= "projects_section = '$projects', ";
//     $query .= "contact_section = '$contact' WHERE id = 1";

//     $run = mysqli_query($db, $query);
//     if ($run) {
//         echo "<script>window.location.href='admin.php?homesetting=true'</script>";
//     }
// }

if (isset($_POST['update-home'])) {
    $name = mysqli_real_escape_string($db, $_POST['name']);
    $title = mysqli_real_escape_string($db, $_POST['title']);
    $subtitle = mysqli_real_escape_string($db, $_POST['subtitle']);

    $query = "UPDATE home SET ";
    $query .= "name = '$name', ";
    $query .= "title = '$title', ";
    $query .= "subtitle = '$subtitle' WHERE id = 1";

    $run = mysqli_query($db, $query);
    if ($run) {
        echo "<script>window.location.href='admin.php?homesetting'</script>";
        exit();
    }
}

if (isset($_POST['update-about'])) {
    $about_desc = mysqli_real_escape_string($db, $_POST['about_desc']);
    $imagename = time() . $_FILES['about_pic']['name'];
    $imgtemp = $_FILES['about_pic']['tmp_name'];

    if ($imagename == '') {
        $q = "SELECT * FROM about WHERE id = 1";
        $r = mysqli_query($db, $q);
        $d = mysqli_fetch_array($r);
        $imagename = $d['about_pic'];
    }

    $uploadPath = "images/$imagename"; // Corrected path

    if (move_uploaded_file($imgtemp, $uploadPath)) {
        $query = "UPDATE about SET ";
        $query .= "about_desc = '$about_desc', ";
        $query .= "about_pic = '$imagename' WHERE id = 1";

        $run = mysqli_query($db, $query);
        if ($run) {
            echo "<script>window.location.href='admin.php?aboutsetting'</script>";
            exit();
        } else {
            echo "Database update failed: " . mysqli_error($db);
        }
    } else {
        echo "File upload failed: " . $_FILES['about_pic']['error'];
    }
}


if(isset($_POST['add-edu'])){
    $type = $_POST['type'];
    $edu_title = $_POST['edu_title']; // Corrected the field name here
    $institution = $_POST['institution'];
    $time = $_POST['time'];
    $about_edu = $_POST['about_edu'];

    $query = "INSERT INTO education (type, edu_title, institution, time, about_edu) VALUES ('$type', '$edu_title', '$institution', '$time', '$about_edu')";

    $run = mysqli_query($db, $query);

    if($run){
        echo "<script>window.location.href='admin.php?educationsetting=true'</script>";
        exit();
    }
}


if(isset($_POST['update-education'])){
    // Get data from the form
    $id = $_GET['id'];
    $type = mysqli_real_escape_string($db, $_POST['type']);
    $edu_title = mysqli_real_escape_string($db, $_POST['edu_title']);
    $institution = mysqli_real_escape_string($db, $_POST['institution']);
    $time = mysqli_real_escape_string($db, $_POST['time']);
    $about_edu = mysqli_real_escape_string($db, $_POST['about_edu']);

    // Use prepared statements
    $query = "UPDATE education SET type=?, edu_title=?, institution=?, time=?, about_edu=? WHERE id=?";
    
    $stmt = mysqli_prepare($db, $query);
    mysqli_stmt_bind_param($stmt, "sssssi", $type, $edu_title, $institution, $time, $about_edu, $id);
    
    // Execute the query
    $run = mysqli_stmt_execute($stmt);

    // Check if the update was successful
    if($run){
        echo "<script>window.location.href='admin.php?educationsetting=true'</script>";
        exit();
    } else {
        // Error handling
        echo "Error updating education: " . mysqli_error($db);
    }

    // Close the statement
    mysqli_stmt_close($stmt);
}





if(isset($_POST['add-project'])){
    $project_title = mysqli_real_escape_string($db, $_POST['project_title']);
    $project_link = mysqli_real_escape_string($db, $_POST['project_link']);
    $project_desc = mysqli_real_escape_string($db, $_POST['project_desc']);

    $project_image =time(). $_FILES['project_image']['name'];
    
    // Corrected table name to "projects"
    

        move_uploaded_file($_FILES['project_image']['tmp_name'], "images/$project_image");

        $query = "INSERT INTO projects (project_title, project_image, project_link, project_desc) VALUES ('$project_title', '$project_image', '$project_link', '$project_desc')";
        
        $run = mysqli_query($db, $query);

        if($run){
        echo "<script>window.location.href='admin.php?projectssetting=true'</script>";
        exit();
    } else {
        // Error handling
        echo "Error: " . mysqli_error($db);
    }
}



if(isset($_POST['update-project'])){
    // Get data from the form
    $id = $_GET['id'];
    $project_title = mysqli_real_escape_string($db, $_POST['project_title']);
    $project_link = mysqli_real_escape_string($db, $_POST['project_link']);
    $project_desc = mysqli_real_escape_string($db, $_POST['project_desc']);

    // Check if a new image is uploaded
    $project_image = $_FILES['project_image']['name'];
    $temp_image = $_FILES['project_image']['tmp_name'];

    // If a new image is uploaded, move it to the desired location
    if(!empty($project_image)){
        move_uploaded_file($temp_image, "uploads/" . $project_image);
    }

    // Update query
    $query = "UPDATE projects SET ";
    $query .= "project_title = '$project_title', ";
    $query .= "project_link = '$project_link', ";
    $query .= "project_desc = '$project_desc' ";

    // If a new image is uploaded, add it to the update query
    if(!empty($project_image)){
        $query .= ", project_image = '$project_image'";
    }

    $query .= " WHERE id = $id";

    // Execute the query
    $run = mysqli_query($db, $query);

    // Check if the update was successful
    if($run){
        echo "<script>window.location.href='admin.php?projectssetting=true'</script>";
        exit();
    } else {
        echo "Error updating project: " . mysqli_error($db);
    }
}



?>







