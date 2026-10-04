<?php include "db.php"; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Add Habit</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">

<h2>Add New Habit</h2>

<form method="POST">
    <input type="text" name="habit" placeholder="Enter habit name" required>
    <button name="submit">Add Habit</button>
</form>

</div>

<?php
if (isset($_POST['submit'])) {
    $habit = $_POST['habit'];

    mysqli_query($conn, "INSERT INTO habits (name, streak) VALUES ('$habit', 0)");
    header("Location: index.php");
}
?>

</body>
</html>