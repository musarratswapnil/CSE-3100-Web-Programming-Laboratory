<?php
// session_start();
require('db.php');



if (isset($_POST['update-edu'])) {
    $type = mysqli_real_escape_string($db, $_POST['type']);
    $edu_title = mysqli_real_escape_string($db, $_POST['edu_title']);
    $institute = mysqli_real_escape_string($db, $_POST['institute']);
    $time = mysqli_real_escape_string($db, $_POST['time']);
    $about_edu = mysqli_real_escape_string($db, $_POST['about_edu']);

    $query = "UPDATE education SET ";
    $query .= "type = '$type', ";
    $query .= "edu_title = '$edu_title', ";
    $query .= "institute = '$institute', ";
    $query .= "time = '$time', ";
    $query .= "about_edu = '$about_edu' WHERE id = 1";

    $run = mysqli_query($db, $query);
    if ($run) {
        echo "<script>window.location.href='admin.php'</script>";
        exit();
    }
}
?>

