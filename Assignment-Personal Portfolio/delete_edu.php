<?php
// session_start(); 
require('db.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM education WHERE id = $id";
    $run = mysqli_query($db, $query);

    if ($run) {
        echo "<script>window.location.href='admin.php?educationsetting=true'</script>";
        exit();
    } else {
        // Error handling
        echo "Error: " . mysqli_error($db);
    }
}
