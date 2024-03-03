<?php
require('db.php');

$id = $_GET['id'];
$sql = "SELECT * FROM projects WHERE id =$id ";
$result = mysqli_query($db, $sql) or die(mysqli_error($db));

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Project</title>
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    <div class="container">
            <form role="form" action="update.php?id=<?= $id ?>" method="post" enctype="multipart/form-data">
              <h2>Add Project</h2>
              <label for="project_title">Title:</label>
              <input type="text" id="project_title" name="project_title" value="<?= $row['project_title'] ?>" required>
              <br>
              <label for="project_image">Image:</label>
              <input type="file" id="project_image" name="project_image" value="<?= $row['project_image'] ?>"><br>
              <img src="images/<?= $row['project_image']?>" alt="" class="pic" style="width: 100px">
              <br>
              <label for="project_link">Project Link:</label>
              <input type="text" id="project_link" name="project_link" value="<?= $row['project_link'] ?>">
              <br>
              <label for="project_desc">Project Description:</label>
              <textarea rows="10" cols="40" id="project_desc" name="project_desc" required><?= $row['project_desc'] ?></textarea>
              <br>
              <button type="submit" name="update-project">Update Project</button><br><br>
              
            </form>
            </div>
</body>
</html>

<?php
    }
}
?>
