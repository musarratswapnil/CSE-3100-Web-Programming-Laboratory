<?php
require('db.php');

$id = $_GET['id'];
$sql = "SELECT * FROM education WHERE id =$id ";
$result = mysqli_query($db, $sql) or die(mysqli_error($db));

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Education</title>
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
<div class="container">
    <form role="form" action="update.php?id=<?= $id ?>" method="post">
        <h2>Update Education</h2>
        <label for="type">Select Type:</label>
        <select name="type">
            <option value="education" <?= $row['type'] == 'education' ? 'selected' : '' ?>>Education</option>
            <option value="experience" <?= $row['type'] == 'experience' ? 'selected' : '' ?>>Experience</option>
        </select>
        <br>
        <label for="title">Title:</label>
        <input type="text" id="edu_title" name="edu_title" value="<?= $row['edu_title'] ?>">
        <br>
        <label for="institute">Institute:</label>
        <input type="text" id="institution" name="institution" value="<?= $row['institution'] ?>" required>
        <br>
        <label for="time">Time:</label>
        <input type="text" id="time" name="time" value="<?= $row['time'] ?>" required>
        <br>
        <label for="about_edu">Description:</label>
        <textarea rows="10" cols="40" id="about_edu" name="about_edu" required><?= $row['about_edu'] ?></textarea>
        <br>
        <button type="submit" name="update-education">Update</button>
    </form>
    </div>
</body>
</html>

<?php
}
?>
