<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Project</title>
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    <div class="container">
    <form role="form" action="update.php" method="post" enctype="multipart/form-data">
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
              <textarea rows="10" cols="40" id="project_desc" name="project_desc" required></textarea>
              <br>
              <button type="submit" name="add-project">Add Project</button><br><br>
            </form>
    </div>
</body>
</html>