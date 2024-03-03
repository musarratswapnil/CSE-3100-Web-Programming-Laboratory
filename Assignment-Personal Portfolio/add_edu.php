<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Education</title>
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    <div class="container">
    <form role="form" action="update.php" method="post">
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
              <textarea rows="10" cols="40" id="about_edu" name="about_edu" required></textarea>
              <br>
              <button type="submit" name="add-edu">Add</button>
            </form>

    </div>
    
</body>
</html>